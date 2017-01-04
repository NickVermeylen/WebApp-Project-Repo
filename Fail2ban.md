#Project Webapplications
======
##Fail2Ban
------
###Omschrijving
Om ongeoorloofde accessen te kunnen bannen van de server

De guide is [hier](https://www.digitalocean.com/community/tutorials/how-to-protect-an-apache-server-with-fail2ban-on-ubuntu-14-04 "Fail2ban")
###Installeren
Paketten binnenhalen
```
sudo apt-get install fail2ban
```

Kopie van configuratie file zodat deze behouden blijft na updates

```
sudo cp /etc/fail2ban/jail.conf /etc/fail2ban/jail.local
```

Hierna gaan we uiteraard configureren
```
sudo nano /etc/fail2ban/jail.local
```

In de config file passen we vanalles aan
1. eigen thuis ip toevoegen bij ignoreip
```
ignoreip = 127.0.0.1/8 [your_home_IP]
```
2. Ban times en find times zijn ok
3. Eigen mailadres ingeven voor destmail
4. Ban action veranderen naar action_mwl voor een duidelijkere mail
5. Juiste jails kiezen om op true te zetten:

* apache 
* apache-overflows 
* php-url-fopen


service herstarten
```
sudo service fail2ban restart
```
Status bekijken om te zien of alles runt
```
sudo fail2ban-client status
```
