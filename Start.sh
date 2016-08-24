/Applications/MAMP/Library/bin/mysql --host=localhost -uroot -proot --execute="DROP DATABASE inventory; CREATE DATABASE inventory;"
php artisan migrate:install
composer dump-autoload
php artisan migrate
php artisan db:seed
vendor/bin/phpunit
php artisan tinker
