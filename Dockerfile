FROM richarvey/nginx-php-fpm:latest

COPY . .

ENV WEBROOT=/var/www/html/public

RUN composer install --no-dev --optimize-autoloader

RUN php artisan config:clear
RUN php artisan route:clear
RUN php artisan view:clear

CMD php artisan migrate --force && /start.sh