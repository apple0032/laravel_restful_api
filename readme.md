# RESTful API + single page application with laravel

## API Specification 
<p align="center">
  <img src="https://i.ibb.co/wKtKr5C/screencapture-localhost-laravel-restful-swagger-html-2019-04-30-01-19-09.png">
</p>

## Data source
https://opendata.clp.com.hk/GetChargingSectionXML.aspx?lang=EN
https://opendata.clp.com.hk/GetChargingSectionXML.aspx?lang=TC
* These files are both XML format.

<p align="center">
    <img src="https://i.ibb.co/X73Fch0/1234.png">
</p>

* Please read swagger.html for more information.

## Database
* Basically, just ONE table need to be created in the database - users. 
* Others tables are created when running API <b>host://convert<b>
* SQL statement : <br><br>
``CREATE TABLE `users` (
                      `id` int(10) UNSIGNED NOT NULL,
                      `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                      `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                      `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
                      `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
                      `created_at` timestamp NULL DEFAULT NULL,
                      `updated_at` timestamp NULL DEFAULT NULL
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
                    ALTER TABLE `users`
                      ADD PRIMARY KEY (`id`),
                      ADD UNIQUE KEY `users_email_unique` (`email`);
                    ``

<p align="center">
  <img src="https://i.ibb.co/0sf96gz/db.jpg">
</p>

### Technique Support
* Google API
* opendata.clp.com.hk
* Laravel
* Jquery
* Bootstrap


### Initialization
1. Unzip or git clone the repository
2. Put the project into an Apache server with PHP installed (v5.6 or above would be better)
3. Install composer on server
4. Run composer init/composer update
5. Create `users` table
6. Copy .env.example to .env then config the file with your db connection
7. Done and enjoy!

### Demo screenshots
* Main page
<img src="https://i.ibb.co/FDdHXWj/1.png">

* Create/Update Box with Google API
<img src="https://i.ibb.co/c8KsxNG/2.png">

* Point all stations in Google Map
<img src="https://i.ibb.co/Z6rGrFB/3.png">

### Contact

I am KEN, a software developer in Hong Kong. If you have any question for me, please email me by waihongip@gmail.com