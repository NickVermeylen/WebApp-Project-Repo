#Project Webapplications
======
##No-ip
###Installeren
####RPI static ip
Omdat de pi aan een telenet verbinding komt te hangen moet de RPI een static ip krijgen in de 192.168.0.0-100 range. Zo kan hij steeds met een gekend ip ge-accessed worden.
```
sudo nano /etc/dhcpcd.conf
```
Volgende lijnen toevoegen
```
 interface eth0

static ip_address=192.168.0.55/24
static routers=192.168.0.1
static domain_name_servers=192.168.0.1
```
Herstarten om effect te nemen
```
sudo reboot now
```
Nu kan de Pi aan de telenet verbinding gehangen worden

####Telenet poorten
Op de gebruikers pagina van telenet zet je voor 192.168.0.55
..* poort 80
..* poort 22
..* poort 443
allemaal actief

####No-ip account
hiervoor kan je gratis terecht op [](www.noip.com), maak daar een account aan en volg de nodige stappen om je domein te registreren.

####Installeren No-ip op RPI
Hiervoor inspiratie gezocht in volgende [tutorial](http://www.noip.com/support/knowledgebase/install-ip-duc-onto-raspberry-pi/ "noip tutorial")

Directory maken voor de tool
```
mkdir /home/pi/noip
cd /home/pi/noip
```
Tool binnenhalen en uitpakken
```
wget http://www.no-ip.com/client/linux/noip-duc-linux.tar.gz
tar vzxf noip-duc-linux.tar.gz
cd noip-2.1.9-1
```
als laatste nog make doen
```
sudo make
sudo make install
```

Nu inloggen met je no-ip account en de stappen volgen.