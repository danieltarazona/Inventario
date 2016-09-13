/Applications/MAMP/Library/bin/mysql --host=localhost -uroot -proot --execute="DROP DATABASE inventario; CREATE DATABASE inventario;"
php artisan migrate:install
composer dump-autoload
php artisan migrate
php artisan db:seed
php artisan key:generate
vendor/bin/phpunit
php artisan tinker
