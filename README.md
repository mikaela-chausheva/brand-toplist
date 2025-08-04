# Brand Toplist Application

This is a Laravel based app for managing and displaying brand toplists based of geolocation.
the system includes a RESTful APIs and a mobile-friendly frondend built with HTML, CSS and Bootstrap.

## Features and project structure

#### RESTful APIs for - CREATE, UPDATE and DELETE 

1. Logic in Bapp/Http/Controllers/BrandController.php
2. API in /routes/api.php
3. Tested in POSTMAN

#### RESTful API and view - READ

 1. Logic in BrandController.php
 2. Route in routes/web.php
3. View resources/views/index.blade.php

#### Geolocation-based toplist using Cloudflare's 'CF-IPCountry' HTTP header


## Getting started 

1. Clone the repository
```
    git clone https://github.com/mikaela-chausheva/brand-toplist.git
    cd brand-toplist
    composer install
```

 2. Copy the environment file and configure
    
    cp .env.example .env

Update the 
```
    DB_DATABASE=brand_toplist
    DB_USERNAME=your_mysql_user
    DB_PASSWORD=your_mysql_password
```

3. Generate the application key 

```
    php artisan key:generate
```


4. Run migrations 

 ```
 php artisan migrate 
```

5. Sample Data (SQL)

**You can use the following SQL statements to insert sample brands into your database for testing**

```
INSERT INTO brands (brand_name, brand_image, rating, country_code, created_at, updated_at)
VALUES
('Alpha Casino', 'https://upload.wikimedia.org/wikipedia/commons/6/60/Skype_logo_%282019–present%29.svg', 5, 'BG', NOW(), NOW()),
('Alpha BET', 'https://cdn.iconscout.com/icon/free/png-512/slack-226533.png', 5, 'PL', NOW(), NOW()),
('Bravo Bet', 'https://upload.wikimedia.org/wikipedia/commons/5/5d/Viber_logo_2018_%28without_text%29.svg', 4, 'FR', NOW(), NOW()),
('Charlie Gaming', 'https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg, 5, 'DE', NOW(), NOW()),
('WIN BET', 'https://upload.wikimedia.org/wikipedia/commons/6/60/Skype_logo_%282019–present%29.svg', 3, 'BG', NOW(), NOW()),
('WIN THE GAME', 'https://cdn.iconscout.com/icon/free/png-512/slack-226533.png', 5, 'null', NOW(), NOW());
('JAckpot', 'https://upload.wikimedia.org/wikipedia/commons/5/5d/Viber_logo_2018_%28without_text%29.svg', 4, 'null', NOW(), NOW());
('Cresus Casiono', 'https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg', 5, 'null', NOW(), NOW());
('WILD SULTAn', 'https://upload.wikimedia.org/wikipedia/commons/6/60/Skype_logo_%282019–present%29.svg', 3, 'null', NOW(), NOW());
```

(Some of the image URLs are not valid and they could not be shown)

6. Cloudflare 
Running with cloudflare tunnel to simulate geolocation .
```
brew install cloudflared
cloudflared tunnel --url http://localhost:8000
```


