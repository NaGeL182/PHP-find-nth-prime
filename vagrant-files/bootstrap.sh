#!/usr/bin/env bash

sudo add-apt-repository -y ppa:ondrej/php
sudo add-apt-repository -y ppa:ondrej/apache2
sudo apt-get update
sudo apt-get install -y apache2 php5.6
sudo a2enmod rewrite
sudo /bin/cp -rf /vagrant/vagrant-files/000-default.conf /etc/apache2/sites-available/000-default.conf
sudo service apache2 restart
if ! [ -L /var/www/html ]; then
    sudo rm -rf /var/www/html
    sudo ln -fs /vagrant/src /var/www/html
fi