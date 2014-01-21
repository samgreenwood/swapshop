#!/usr/bin/env bash
 
echo "--- Let's get to work. Installing now. ---"
 
echo "--- Updating packages list ---"
sudo apt-get update
 
echo "--- MySQL time ---"
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password password root'
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password root'

echo "--- Switch to the Air-Stream Ubuntu Mirrors ---"
 
echo "--- Installing base packages ---"
sudo apt-get install -y vim curl python-software-properties screen
 
echo "--- Updating packages list ---"
sudo apt-get update
 
echo "--- We want the bleeding edge of PHP ---"
sudo add-apt-repository -y ppa:ondrej/php5

echo "--- Updating packages list ---"
sudo apt-get update
 
echo "--- Installing PHP-specific packages ---"
sudo apt-get install -y php5 apache2 libapache2-mod-php5 php5-curl php5-gd php5-mcrypt mysql-server-5.5 php5-mysql git-core php5-ldap
 
echo "--- Installing and configuring Xdebug ---"
sudo apt-get install -y php5-xdebug
 
cat << EOF | sudo tee -a /etc/php5/mods-available/xdebug.ini
xdebug.scream=1
xdebug.cli_color=1
xdebug.show_local_vars=1
EOF

echo "--- Allow Remote MySQL ---"
sudo sed -i "s/bind-address = 127.0.0.1/#bind-address = 0.0.0.0"
mysql -u root -proot -e "GRANT ALL PRIVILEGES ON *.* TO  'root'@'%'  IDENTIFIED  BY  'root'; FLUSH PRIVILEGES;"

echo "--- Enabling mod-rewrite ---"
sudo a2enmod rewrite
 
echo "--- Setting document root ---"
sudo rm -rf /var/www
sudo ln -fs /vagrant/public /var/www
 
echo "--- Turn on errors ---"
sed -i "s/error_reporting = .*/error_reporting = E_ALL/" /etc/php5/apache2/php.ini
sed -i "s/display_errors = .*/display_errors = On/" /etc/php5/apache2/php.ini
 
sed -i 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf
 
echo "--- Restarting Apache ---"
sudo service apache2 restart
 
echo "--- Install Composer (PHP package manager) ---"
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
 
echo "--- Install Project Dependies using Composer ---"
cd /vagrant
composer install

echo "--- Create database for project and run migrations ---"
mysqladmin -u root -proot create swapshop
php artisan migrate --seed

echo "--- Time to make LDAP Authentication Work ---"
sudo cp vagrant/ldap.conf /etc/ldap/ldap.conf
sudo cp vagrant/airstream.crt /etc/ssl/certs/airstream.crt

cat << EOF | sudo tee -a /etc/hosts
10.114.2.25	mail.air-stream.org
EOF
 
echo "--- All done, enjoy! :) ---"