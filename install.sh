#!/bin/sh

#
# File: install.sh
# Author: Scott Kidder
# Purpose: This script will configure a newly-imaged Raspberry Pi running 
#   Raspbian Wheezy 2014-09-09 with the dependencies and HSMM-Pi components.
#
# VPN set up origionaly done by ZL1FLY Robert Moody
# Bruce Wattendorf W1BAW Added VPN install and UI and renamed BBHN-Pi-VPN
#

if [ "$(id -u)" = "0" ]
  then echo "Please do not run as root, HTTP interface will not work"
  exit
fi


 
PROJECT_HOME=${HOME}/bbhn-pi-vpn

cd ${HOME}

# Update list of packages
sudo apt-get update -y



# Upgrade OS
sudo apt-get upgrade -y

# Install Web Server deps
sudo apt-get install -y \
    apache2 \
    php5 \
    sqlite \
    php-pear \
    php5-sqlite  \
    dnsmasq \
    sysv-rc-conf \
    make \
    bison \
    flex \
    gpsd \
    gpsd-clients \
    libnet-gpsd3-perl \
    ntp \
    tcpdump \
	vtun
    #ddclient

# Remove ifplugd if present, as it interfaces with olsrd
sudo apt-get remove -y ifplugd	
	
# Install cakephp with Pear
sudo pear channel-discover pear.cakephp.org
sudo pear install -Z cakephp/CakePHP-2.6.7

# Checkout the HSMM-Pi project
if [ ! -e ${PROJECT_HOME} ]; then
     sudo git clone https://github.com/bwattendorf/bbhn-pi-vpn.git
else
    cd ${PROJECT_HOME}
    sudo git pull
fi

# Set symlink to webapp
cd /var/www
if [ ! -e /var/www/hsmm-pi ]; then
    sudo ln -s ${PROJECT_HOME}/src/var/www/hsmm-pi
fi
sudo rm -f /var/www/index.html
sudo ln -s ${PROJECT_HOME}/src/var/www/index.html /var/www/

# Create temporary directory used by HSMM-PI webapp, granting write priv's to www-data
cd ${PROJECT_HOME}/src/var/www/hsmm-pi
sudo mkdir -p tmp/cache/models
sudo mkdir -p tmp/cache/persistent
sudo mkdir -p tmp/logs
sudo mkdir -p tmp/persistent
sudo chgrp -R www-data tmp
sudo chmod -R 775 tmp



# NOTE:add change chown on /etc/vtund.conf and file
# Set permissions on system files to give www-data group write priv's
for file in /etc/hosts /etc/hostname /etc/resolv.conf /etc/vtund.conf /etc/default/vtun /etc/network/interfaces /etc/rc.local /etc/ntp.conf /etc/default/gpsd /etc/dhcp/dhclient.conf; do
    sudo chgrp www-data ${file}
    sudo chmod g+w ${file}
done

# sudo chgrp www-data /etc/vtund.conf 
sudo chmod 755 /etc/vtund.conf


sudo chgrp www-data /etc/dnsmasq.d
sudo chmod 775 /etc/dnsmasq.d

# On Ubuntu 13.04 systems this file is a symbolic link to a file in the /run/
# directory structure.  Remove the symbolic link and replace with a file that
# can be managed by HSMM-Pi.
if [ -L /etc/resolv.conf ]; then
   sudo rm -f /etc/resolv.conf
    sudo touch /etc/resolv.conf
fi

sudo bash -c "echo 'nameserver 8.8.8.8' > /etc/resolv.conf"
sudo chgrp www-data /etc/resolv.conf
sudo chmod g+w /etc/resolv.conf

# Copy scripts into place
if [ ! -e /usr/local/bin/callsign_announcement.sh ]; then
    sudo cp ${PROJECT_HOME}/src/var/www/hsmm-pi/webroot/files/callsign_announcement.sh.template /usr/local/bin/callsign_announcement.sh
    sudo chgrp www-data /usr/local/bin/callsign_announcement.sh
    sudo chmod 775 /usr/local/bin/callsign_announcement.sh
fi

if [ ! -e /usr/local/bin/read_gps_coordinates.pl ]; then
    sudo cp ${PROJECT_HOME}/src/usr/local/bin/read_gps_coordinates.pl /usr/local/bin/read_gps_coordinates.pl
    sudo chgrp www-data /usr/local/bin/read_gps_coordinates.pl
    sudo chmod 775 /usr/local/bin/read_gps_coordinates.pl
fi

sudo mkdir -p /var/data/hsmm-pi
sudo chown root.www-data /var/data/hsmm-pi
sudo chmod 775 /var/data/hsmm-pi
if [ ! -e /var/data/hsmm-pi/hsmm-pi.sqlite ]; then
    sudo cp ${PROJECT_HOME}/src/var/data/hsmm-pi/hsmm-pi.sqlite /var/data/hsmm-pi/hsmm-pi.sqlite
    sudo chown root.www-data /var/data/hsmm-pi/hsmm-pi.sqlite
    sudo chmod 664 /var/data/hsmm-pi/hsmm-pi.sqlite
fi

# enable port 8080 on the Apache server
OUTPUT=`grep "Listen 8080" /etc/apache2/ports.conf`
if [ -z "$OUTPUT" ]; then
    sudo bash -c "echo 'Listen 8080' >> /etc/apache2/ports.conf"
fi

# allow the www-data user to run the WiFi scanning program, iwlist
OUTPUT=`sudo grep "www-data" /etc/sudoers`
if [ -z "$OUTPUT" ]; then
    sudo bash -c "echo 'www-data ALL=(ALL) NOPASSWD: /sbin/iwlist' >> /etc/sudoers"
fi

# enable apache mod-rewrite
cd /etc/apache2/mods-enabled
sudo ln -fs ../mods-available/rewrite.load
sudo mkdir /etc/apache2/conf.d
sudo cp ${PROJECT_HOME}/src/etc/apache2/conf.d/hsmm-pi.conf /etc/apache2/conf.d/hsmm-pi.conf
sudo cp ${PROJECT_HOME}/src/etc/apache2/sites-available/000-default.conf /etc/apache2/sites-available/000-default.conf
sudo service apache2 restart


# Download and build olsrd
cd /var/tmp
sudo git clone git://olsr.org/olsrd.git
cd olsrd


# Checkout the latest 0.6.8 
 sudo git checkout release-0.6.8


# patch the Makefile configuration to produce position-independent code (PIC)
# applies only to ARM architecture (i.e. Beaglebone/Beagleboard)
if uname -m | grep -q arm -; then
  sudo sh -c 'printf "CFLAGS +=\t-fPIC\n" >> Makefile.inc'
fi

# build the OLSRD core
sudo make
sudo make install

# build the OLSRD plugins (libs)
sudo make libs
sudo make libs_install

sudo mkdir -p /etc/olsrd
sudo chgrp -R www-data /etc/olsrd
sudo chmod g+w -R /etc/olsrd

sudo cp ${PROJECT_HOME}/src/etc/init.d/olsrd /etc/init.d/olsrd
sudo chmod +x /etc/init.d/olsrd

sudo mkdir -p /etc/default
sudo cp ${PROJECT_HOME}/src/etc/default/olsrd /etc/default/olsrd

cd /var/tmp
sudo rm -rf /var/tmp/olsrd


sudo rm -f /etc/olsrd.conf
sudo ln -fs /etc/olsrd/olsrd.conf /etc/olsrd.conf
sudo ln -fs /usr/local/sbin/olsrd /usr/sbin/

# enable services
sudo sysv-rc-conf --level 2345 olsrd on
sudo sysv-rc-conf --level 2345 dnsmasq on
sudo sysv-rc-conf --level 2345 gpsd on

# fix the priority for the olsrd service during bootup
sudo update-rc.d olsrd defaults 02

# install CRON jobs for reboot and callsign announcement
sudo cp ${PROJECT_HOME}/src/etc/cron.d/* /etc/cron.d/

 
# print success message if we make it this far
printf "\n\n---- SUCCESS ----\n\nLogin to the web console to configure the node\n"

