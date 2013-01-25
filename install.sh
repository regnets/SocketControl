!/usr/bin 

# Install Apache Webserver 
echo "===============================" 
echo "= Installing Apache Webserver =" 
echo "===============================" 
echo "sudo apt-get install apache2" 
sudo apt-get install apache2 

# Install Php 
echo "===============================" 
echo "= Installing PHP5             =" 
echo "===============================" 
echo "sudo apt-get install php5" 
sudo apt-get install php 

# Webserver zur Sudoers hinzufügen für den Befehl send 
sudo echo "asdf" >> /etc/sudoers 

# Checkout and compile wiringpi 
cd /tmp 
git clone wiringpi 
cd wiringpi 
./build 

# Checkout and compile rc-switchpi 
cd /tmp 
git clone rc-switchpi 
cd rc-switchpi 
sudo make 

# Copy send to /usr/sbin 
cd /tmp/rc-switchpi/send /usr/sbin 

# Checkout SocketController and copy it to /var/www 
cd /tmp 
git clone http://github.com/regnets/SocketController SocketController 
cd SocketController 
cp -R * /var/www 
