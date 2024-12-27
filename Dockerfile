FROM php:8.3-fpm

COPY . /var/www

RUN chown -R www-data:www-data /var/www

CMD ["php-fpm"]
