FROM richarvey/nginx-php-fpm:latest

COPY . .

ENV WEBROOT=/var/www/html/public

RUN composer install --no-dev --optimize-autoloader

CMD php artisan config:clear && php artisan route:clear && php artisan view:clear && php artisan migrate --force && /start.sh