# MySQL
class { 'mysql::server':
	restart => true,
	override_options => {
		'mysqld' => {
			'bind-address' => '0.0.0.0',
		}
	}
} ->
mysql_user { 'swapshop@%':
        ensure => present,
        password_hash => '*230AA840746462ED0E50CC15271761681A90B304' # swapshop
} ->
mysql_database { [ 'swapshop', 'wacan' ]:
        ensure => present
} ->
mysql_grant { 'swapshop@%/*.*':
	ensure => present,
	user => 'swapshop@%',
	table => '*.*',
	options => ['GRANT'],
	privileges => ['ALL']
}

# Other system packages
package { [
	'git-core',
	'vim',
	'screen',
	'tmux', # way better than screen
]:
	ensure => latest
}

# PHP
package { [
        "php5-cli",
        "php5-curl",
        "php5-gd",
        "php5-ldap",
        "php5-mcrypt",
        "php5-mysql",
        "php5-xdebug",
	]:
        before => Class['apache::mod::php'],
        ensure => latest
}
exec { 'enable php modules':
        command => "/usr/sbin/php5enmod mcrypt",
        before => Class['apache::mod::php'],
        require => Package['php5-mcrypt']
}

class { 'apache':
	default_vhost => false,
	mpm_module => 'prefork'
}
class { 'apache::mod::rewrite': }
class { 'apache::mod::php': }
apache::listen { '8080': }
apache::vhost { 'swapshop':
        servername => 'swapshop.local',
        port => 8080,
        docroot => "/vagrant/public",
        override => ['All'],
}

file { '/etc/php5/apache2/conf.d/swapshop.ini':
	ensure => file,
	source => 'file:///vagrant/vagrant/php.ini',
        require => Class['apache::mod::php'],
}

# Install composer
exec { 'composer::install':
	unless => 'test -f /usr/local/bin/composer',
	command => 'curl -L -o /usr/local/bin/composer https://getcomposer.org/composer.phar;chmod 755 /usr/local/bin/composer',
	path => [ '/usr/bin/', '/bin/' ],
} ->
exec { 'swapshop::packages':
	require => [
		Package['php5-cli'],
	],
	command => 'composer install',
	cwd => '/vagrant',
	environment => 'COMPOSER_HOME=/vagrant',
	path => [ '/usr/local/bin', '/usr/bin' ]
} ->
exec { 'swapshop::db::migrate':
	require => [
		Mysql_grant['swapshop@%/*.*']
	],
	command => 'php artisan migrate --seed',
	cwd => '/vagrant',
	path => '/usr/bin'
}
