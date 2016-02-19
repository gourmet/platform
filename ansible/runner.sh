#!/usr/bin/env bash

# Install Ansible
sudo add-apt-repository -y ppa:ansible/ansible
sudo apt-get update
sudo apt-get install -y software-properties-common ansible

# Locally run Ansible
cd /vagrant && \
sudo ansible-galaxy install -r ansible/requirements.txt -p ansible/roles -f && \
sudo ansible-playbook ansible/provision.yml -i .vagrant/provisioners/ansible/inventory/vagrant_ansible_inventory --connection=local