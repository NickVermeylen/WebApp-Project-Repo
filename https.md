#Project Webapplications
======
##Let's encrypt
------
###Omschrijving
Let's encrypt een CA (certificate authority) die volledig gratis en anatoom te installeren is op je server.
###Installeren
Certbot installeren afgeleid uit deze [tutorial](https://certbot.eff.org/#debianjessie-apache "Certbot tutorial")

Een lijn toevoegen om Jessie-backports toe te voegen om "unstable" programs te kunnen draaien

```
sudo nano /etc/apt/sources.list
deb http://ftp.debian.org/debian jessie-backports main
```
```
sudo apt-get update
```
Certbot paktten binnenhalen
```
sudo apt-get install python-certbot-apache -t jessie-backports
```
En de stappen van de installer volgen.
Kies hier best voor de "secure" optie.