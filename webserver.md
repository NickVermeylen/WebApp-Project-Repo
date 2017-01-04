#Project Webapplications
======
##Pi webserver opzetten
###apache2
Installatie afgeleid uit deze [tutorial](https://www.raspberrypi.org/documentation/remote-access/web-server/apache.md "Apache Tutorial")

Eerst doen we
```
sudo apt-get update
sudo apt-get upgrade
```
Vervolgens het apache2 pakket binnenhalen
```
sudo apt-get install apache2
```
###Php
php5 paketten voor apache binnenhalen
```
sudo apt-get install php5 libapache2-mod-php5
```
testen door de index.html te verwijderen en te vervangen door de phpinfo page
```
sudo rm index.html
sudo nano index.php
<?php phpinfo(); ?>
```
###MYSQL
MySQL server pakket binnenhalen
```
sudo apt-get install mysql-server
```
root user password ingeven en daarna 2x maal MySQL password ingeven (niet leeg laten!)

MySQL runnen met root user en wachtwoord ingeven
```
mysql -u root -p
```
nieuwe user aanmaken
```
CREATE USER 'newuser'@'localhost' IDENTIFIED BY 'password';
```
Nieuwe user de nodige permissies geven
```
GRANT ALL PRIVILEGES ON * . * TO 'newuser'@'localhost';
```
Permissies herladen zodat ze effect nemen
```
FLUSH PRIVILEGES;
```
###Link stappen
```
sudo apt-get install apache2-utils libapache2-mod-php5 php5-mysql php5-gd php5-mcrypt 
```
rewrite voor apache aanzetten
```
sudo a2enmod rewrite
```

Parameter aanpassen in de apache config file
```
sudo nano /etc/apache2/apache2.conf
```
zoeken voor de <Directory /var/www/> lijn en aanpassen naar
```
<Directory /var/www/>
Options Indexes FollowSymLinks
AllowOverride All
Require all granted
</Directory>
```

###PhpMyAdmin
Eerst het pakket binnenhalen
```
sudo apt-get install phpmyadmin
```
(Kiezen voor apache2 wanneer er gevraagd wordt wa voor webserver gebruikt wordt.)

Om de interface te gebruiken voegen we volgende lijn toe in de configuratie files van apache:
```
 nano /etc/apache2/apache2.conf
 Include /etc/phpmyadmin/apache.conf
 ```
 Daarna apache herstarten
 ```
 sudo service apache2 restart
 ```
 Nu is de PhpMyAdmin log in te krijgen op http://localhost/phpmyadmin op de pi zelf
