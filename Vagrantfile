base_box = ENV['VAGRANT_BOX'] || 'debian7-64'
base_box_url = ENV['VAGRANT_BOX_URL'] || 'http://www.seaton2.wan/vagrant/debian7-64.box'

home_path = ENV['HOME']

Vagrant::Config.run do |config|
    config.vm.box = base_box
    config.vm.box_url = base_box_url
    config.vm.network :hostonly, "10.10.10.10"
    config.vm.share_folder("vagrant-root", "/vagrant", ".", :extra => 'dmode=777,fmode=777')    
end