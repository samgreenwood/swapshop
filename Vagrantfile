VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
	config.vm.box = "ubuntu/trusty64"

	config.vm.network "forwarded_port", guest: 8080, host: 8080
    config.vm.network :private_network, ip: "10.10.10.10"

	config.vm.provision "shell", path: "vagrant/provision.sh"
	config.vm.provision "puppet" do |puppet|
		puppet.manifests_path = "vagrant"
		puppet.manifest_file  = "manifest.pp"
	end

	config.vm.synced_folder ".", "/vagrant", :mount_options => ["dmode=777", "fmode=666"]
end
