ENV['VAGRANT_DEFAULT_PROVIDER'] = 'docker'

VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.define "web" do |web|
    web.vm.provider "docker" do |docker|
      docker.build_dir = "."
      docker.build_args = ["-t=hpilates"]
      docker.ports = ["80:80"]
      docker.name = "hpltdev"
      docker.remains_running = true
    end
  end

  config.vm.define "data" do |data|
    data.vm.provider "docker" do |docker|
      docker.build_dir = "db_scripts/"
    end
  end

  

  config.push.define "atlas" do |push|
    push.app = "vinik/hplt"
  end

end



export ATLAS_TOKEN="WNfx0GwXQIpN8w.atlasv1.izizoEzYpHZ3uRp7mdvFzB4h1JFodKu01DlMnll3JDmF8YogPclPKcmfea90CFmk6xU"

