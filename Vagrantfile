# -*- mode: ruby -*-

# Cross-platform way of finding an executable in the $PATH.
#
#   which('ruby') #=> /usr/bin/ruby
# 
# Credit: http://stackoverflow.com/a/5471032
def which(cmd)
    exts = ENV['PATHEXT'] ? ENV['PATHEXT'].split(';') : ['']
    ENV['PATH'].split(File::PATH_SEPARATOR).each do |path|
        exts.each { |ext|
            exe = File.join(path, "#{cmd}#{ext}")
            return exe if File.executable? exe
        }
    end
    return nil
end


Vagrant.configure("2") do |config|

    config.vm.box = 'trusty64'
    config.vm.box_url = 'https://vagrantcloud.com/ubuntu/boxes/trusty64/versions/14.04/providers/virtualbox.box'

    config.vm.network :private_network, ip: '10.0.13.37'
    config.vm.synced_folder './', '/vagrant', id: 'vagrant-root', :nfs => true

    config.ssh.forward_agent = true

    # VirtualBox
    config.vm.provider :virtualbox do |v|
        v.customize [ 'modifyvm', :id, '--cpus', 1]
        v.customize [ 'modifyvm', :id, '--memory', 512]
    end

    # Ansible
    if which('ansible-playbook')
        config.vm.provision 'ansible' do |ansible|
            # ansible.verbose = 'vvvv'
            ansible.sudo = true
            ansible.playbook = 'ansible/provision.yml'
            ansible.limit = 'all'
            ansible.groups = {
                'local' => [ 'default' ],
                'webservers:children' => [ 'local' ]
            }
        end
    else
        config.vm.provision :shell, path: 'ansible/runner.sh'
    end

end