composer install
php artisan migrate:install
composer dump-autoload
php artisan migrate
php artisan db:seed
php artisan key:generate
