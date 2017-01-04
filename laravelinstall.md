#Project Webapplications
======
##Laravel project op de pi
###Laravel & composer
Composer binnenhalen en pipen naar php
```
sudo curl -sS https://getcomposer.org/installer | php
```
Composer moven naar andere directory en rechten geven om te kunnen uitvoeren
```
sudo mv composer.phar /usr/local/bin/composer
sudo chmod +x /usr/local/bin/composer
```

Laravel installeren met composer
```
composer global require laravel/installer
```

Nieuw laravel project aanmaken
```
cd ~
composer create-project laravel/laravel slideshow
```

De project files kunnen hierin dus allemaal geplaatst worden.

###webserver default directory veranderen
Default user rechten geven 
```
sudo chown -R www-data:www-data /var/www
```

Directory veranderen naar project dir in de file
```
sudo nano /etc/apache2/sites-available/000-default.conf
```
zoek naar DocumentRoot en verander naar /var/www/slideshow/public

Permissies van de storage en vendor directory aanpassen
```
sudo chown www-data:www-data /var/www/slideshow/storage
sudo chown www-data:www-data /var/www/slideshow/vendor
```

Rewrite mode aanzetten voor apache
```
sudo a2enmod rewrite
```

De AllowOverride werd reeds aangepast in een vorige tutorial.