# README
Backend application for Zonar Systems.

## Installation
1. Clone it to a folder ```git clone https://github.com/sarabjot294/zonar.git```
2. Install XAMPP (on windows), [Install composer](https://getcomposer.org/download/)
3. Install PHP Laravel through composer using the command ```composer global require "laravel/installer=~1.1"```
4. Run ```php artisan serve``` on the common line
5. Open [PhpMyAdmin](http://localhost/phpmyadmin) on the browser. Import ```zonar_db``` file found in db folder.
6. Change db credentials in ```.env``` file
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=zonar_db
DB_USERNAME=root
DB_PASSWORD=
```

## Running Tests
Run command ```php artisan test``` in the folder root

## API
```
GET:    /wishlist/{user_id}
POST:   /wishlist
PUT:    /wishlist/{wishlist_id}
DELETE: /wishlist/{wishlist_id}
```

Payload for add and update APIs:
```
{
"user_id" : user_id,
"book_id" : book_id
}
```

## Contact

Sarabjot Singh - singh.sarabjot@outlook.com
