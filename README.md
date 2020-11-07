## Todo tasks platform

### Installation

**1. Install project dependencies** \
Run this command in root folder in terminal: 
```sh
composer install 
```

**2. Config Database connection** \
Set the environment variables for Database connection. 

You can find them in  **`.env`** file in root folder.

```ini
# Example
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=8889     # standard port is 3306
DB_DATABASE=td_v1_pro
DB_USERNAME=td_v1_pro
DB_PASSWORD=Bf(3G6sT&7HXBuR:
```

**3. Create database tables** \
Run this command in root folder in terminal: 
```sh
php artisan migrate
```


### Create demo data for local testing


The following command creates seeds in database:
```sh
composer migrate
```
Demo Users:
```ini
Email: test1@test.com
Password: test1

Email: test2@test.com
Password: test2
```

### Create demo data for local testing

If you want to configure the local server for Laravel, this link can be helpful: 
[Web Server Configuration](https://laravel.com/docs/5.8/installation)

### Test
Run this command in root folder in terminal:
```sh
vendor/bin/phpunit
```