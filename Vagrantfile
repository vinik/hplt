ENV['VAGRANT_DEFAULT_PROVIDER'] = 'docker'

VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.define "vm1" do |vm1|
    vm1.provider "docker" do |docker|
      docker.image = "vinik/web:latest"
      docker.build_dir = "."
      docker.build_args = ["-t=anyweb"]
      docker.ports = ["80:80"]
      docker.name = "anydev"
      docker.remains_running = true
    end
    
  end
end
