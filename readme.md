
NTI Umeås Bokningssytem för makerspace
==

Bokningssystemet som används internt för NTI-gymnasiet i umeå för makerspace.

Teknologier
--
Projektet använder sig av dessa teknologier:
* Laravel
* PHP
* SQL (MySQL)
* javascript
* Jquery

Användning
---

### Nödvändigt
För att kunna använda denna sida på din skola så krävs en del olika saker som listas här.
* En server som kör apache eller nginx eller liknande
* En google developer oauth api nyckel registrerad inom domänen. [Skapa det här](https://console.developers.google.com/apis/)
* En Mysql eller Mariadb sql server.
* Composer är installerat
* PHP
### Frivilligt
* En mailserver

### Installation
Detta är installations guiden för att clona och sätta up projektet på en server. En del förkunskaper om hur apache eller nginx fungerar krävs.

```
$ cd /var/www/ // För apache
$ git clone https://github.com/Eliasr123/Makerspace_booking.git // klona projektet
$ cd Makerspace_booking/ //går in i mappen.
$ cp .env.example .env
$ composer install 
$ php artisan key:generate
```
Vid det här steget i processen så behöver endast .env filen redigeras. detta kan göras på en del olika sätt. Såhär öppnas filen med nano.
```
$ sudo nano .env
```
Se till att APP_DEBUG är lika med `false`
Skriv in uppgifterna till din databas.
```
DB_HOST= //Databas ipaddress
DB_DATABASE= //Databas namn
DB_USERNAME= //Databas användarnamn
DB_PASSWORD= //Databas lösenord
```
För att inloggningssytemet ska fungera med google så behövs api uppgifterna.
```
GOOGLE_CLIENT_ID= //Google id
GOOGLE_CLIENT_SECRET= //Google secret
GOOGLE_CLIENT_REDIRECT= //Din url callback, borde vara "Minurl.se/callback"
```
Efter denna information är insrkiven tryck ctrl + c, y för att spara och enter för att spara som samma filnamn.
Endast några steg kvar för att få projektet att fungera
```
$ php artisan migrate
```
För att skapa en sida i apache så krävs en configurationsfil, denna skapas i 
```
cd /etc/apache2/sites-available
```
I den mappen skapa en fil some heter exempelvis makerspace.conf. För att redigera den så går det använda nano
```
sudo nano makerspace.conf
```
Redigera filen och lägg till det som står nedan
```
<VirtualHost *:80>
   ServerName localhost/makerspace
   ServerAdmin example@example.com
   DocumentRoot /var/www/makerspace/public_html

   <Directory /var/www/makerspace/public_html>
       AllowOverride All
   </Directory>
   ErrorLog ${APACHE_LOG_DIR}/error.log
   CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
```
Efter filen är redigerad så måste hemsidan startas i apache detta görs genom att skriva, sedan måste apache startas om.
```
sudo a2dissite 000-default
sudo a2ensite makerspace
sudo service apache2 restart
```

Nu så borde hemsidan fungera. Den går att komma åt på localhost/makerspace För att göra adminsystemet säkert så går en administratör till /admin och loggar in med
```
email: admin@delete.later
password: HJ42ke28o6zTrSCTJYfmsdIOW3svagtC8jpR6k3pOQzS7EHgdCtHXjrERNpIBAclUuaxcs4y478
```
Efter det så klicka på skapa en ny användare. skapa en ny användare, logga ut. logga in på den nya användaren. ta bort det ordinare kontot.
Nu behövs det bara läggas till utrustning som ska gå att boka. det görs under adminpanelen.

Roadmap
---

* ~~Utveckla bokningsidan~~
* ~~Google Oauth inloggningssytem~~
* ~~Login and logout system~~
* ~~Rest api för att hämta alla relevanta bokningar~~
* ~~Rest api för att hämta specifika bokningar~~
* ~~Admin panelsidan (front-end)~~
* ~~Första användartest för att reda ut front-end och identifiera buggar / missade feature~~
* ~~Åtgärda buggar / missade features~~
* ~~Admin loginsida~~
* ~~Admin loginsystem~~
* ~~Admin panelsida (funktionalitet, back-end)~~    
* ~~Användartest~~
* ~~Live deploy~~

