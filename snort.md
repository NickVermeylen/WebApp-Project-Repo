#Project Webapplications
======
##Snort
------
###Omschrijving
tool om intrusion detection te doen
###Installeren
#### Snort paketten
paketten binnenhalen op de RPI
```
sudo apt-get install snort
```
In de conf file de juiste instellingen gaan maken
```
sudo nano /etc/snort/snort.conf
```

####Account op snort
aanmelden om een oinkcode te krijgen zodat je maandelijks de rules kan downloaden zonder subscription.

rules downloaden
```
wget https://www.snort.org/rules/snortrules-snapshot-2976.tar.gz?oinkcode=c745527d3ca25ecbb9d1733eafd954e703bf1dcb -O snort.tar.gz
tar -xzvf snort.tar.gz
```

De nieuwe rules in de snort dir gaan steken
```
sudo mv ./preproc_rules/ /etc/snort/
sudo mv ./so_rules/ /etc/snort/

sudo mv ./rules/ /etc/snort/
```
Omdat de rules map in de snort directory niet leeg is moet dit met een ander commando
```
sudo rsync -a ./rules/ /etc/snort/
```

Snort verwacht nog twee extra files
```
sudo touch /etc/snort/rules/white_list.rules
sudo touch /etc/snort/rules/black_list.rules
```

oke Snort versie checken en zien of er nog foutjes zijn
```
sudo snort -–version
```

Eigen rule maken zodat we kunnen testen of snort functioneert
```
sudo nano /etc/snort/rules/local.rules
alert icmp any any -> $HOME_NET any (msg:"ICMP test"; sid:10000001;)
```
Eerst checken of de config juist is 
```
sudo snort -T -c /etc/snort/snortconf
```
Alles perfect volgende output
![alt text][version]

[version]: https://github.com/NickVermeylen/WebApp-Project-Repo/blob/master/SnortValidationSucces.png "Snort Version check"

Nu kunnen we snort als console app runnen en kijken of pings van een ander toestel naar de Pi worden opgevangen als alert
```
$ sudo snort -A console -q -u snort -g snort -c /etc/snort/snort.conf -i eth0
```

Die worden dus duidelijk gespot
![alt text][ping]

[ping]: https://github.com/NickVermeylen/WebApp-Project-Repo/blob/master/SnortPingTest.png "Snort Ping Test"

Aangezien dit allemaal perfecto werkt kunnen we snort als daemon lanceren
```
$ sudo snort -A console -q -u snort -g snort -c /etc/snort/snort.conf -i eth0 -D
```
Doe opnieuw pings vanuit cmd van je pc
Bekijk de inhoud van de snort log file
```
sudo tcpdump -r /var/log/snort/snort.log.1483555047
```
![alt text][daemon]

[daemon]: https://github.com/NickVermeylen/WebApp-Project-Repo/blob/master/SnortRunningDeamon.PNG "Snort running"

Ziezo snort runt perfect, comment in de conf file je eigen rule even uit en doe: 
```
sudo vi /etc/snort/rules/local.rules
```
```
sudo service restart snort
```
Dat was het dan!