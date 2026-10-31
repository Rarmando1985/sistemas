FROM php:8.2-fpm

RUN apt-get update && apt-get install -y --no-install-recommends \
    $PHPIZE_DEPS \
    build-essential \
    libpng-dev \
    libonig-dev \
    zip \
    unzip \
    && pecl install redis \
    && docker-php-ext-enable redis \
    && docker-php-ext-install pdo pdo_mysql mysqli \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

COPY . .

EXPOSE 9000

CMD ["php-fpm"]