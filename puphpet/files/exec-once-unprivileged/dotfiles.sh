#!/usr/bin/env bash

sudo add-apt-repository ppa:martin-frost/thoughtbot-rcm
sudo apt-get update
sudo apt-get -y install python-pip rbenv rcm tmux zsh

git clone http://github.com/tarjoilija/zgen.git $HOME/.zgen
sudo chsh -s $(which zsh) vagrant

git clone http://github.com/phpfu/dotfiles.git $HOME/.dotfiles && cd $_
env RCRC=$HOME/.dotfiles/rcrc rcup
