FROM php:8.2-fpm-bookworm

RUN apt-get update
&& apt-get install -y --no-install-recommends
libpng-dev
libonig-dev
libzip-dev
zip
unzip
&& docker-php-ext-install pdo pdo_mysql mysqli
&& apt-get clean
&& rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

COPY . .

RUN chown -R www-data:www-data /var/www/html

EXPOSE 9000

CMD ["php-fpm"]