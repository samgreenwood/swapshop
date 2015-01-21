#!/usr/bin/env bash

UBUNTU_RELEASE=`lsb_release -c -s`

FORGE_MODULES="
puppetlabs/apache
puppetlabs/mysql
"

function module_install { puppet module install $1 &> /dev/null ;}

echo "--- Configuring Puppet Sources ---"
wget -q https://apt.puppetlabs.com/puppetlabs-release-${UBUNTU_RELEASE}.deb
dpkg -i puppetlabs-release-${UBUNTU_RELEASE}.deb
apt-get update -q

echo "--- Installing Puppet ---"
apt-get install -q -y --force-yes puppet

echo "--- Installing Puppet Modules ---"
for module in $FORGE_MODULES; do
	module_install $module
done
