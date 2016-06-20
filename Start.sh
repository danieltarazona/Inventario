/Applications/MAMP/Library/bin/mysql --host=localhost -uroot -proot --execute="DROP DATABASE inventory; CREATE DATABASE inventory;"
php artisan migrate:install
php artisan migrate
php artisan db:seed
php artisan tinker
