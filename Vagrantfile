VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
	config.vm.box = "precise64"
	
	config.vm.box_url = "http://vps.allmyit.com.au/precise64.box"

	config.vm.network :private_network, 
	{
		ip: "10.10.10.10",
	} 
	
	config.vm.provision :shell, :path => "vagrant/provision.sh"
	
	config.vm.synced_folder ".", "/vagrant", :mount_options => ["dmode=777", "fmode=666"]
	
end
