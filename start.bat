%systemDrive%\xampp\mysql\bin\mysql -uroot -e "CREATE DATABASE IF NOT EXISTS laravel;"

php -r "copy('.env.example', '.env');"

call composer install

call php artisan migrate

call php artisan db:seed

call php artisan key:generate

call php artisan storage:link

code .
