
FROM php:8.2-apache-bookworm

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        libpng-dev \
        libonig-dev \
        zip \
        unzip \
    && docker-php-ext-install pdo pdo_mysql mysqli \
    && a2enmod rewrite \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

COPY . .

RUN sed -i 's/80/${PORT:-80}/' /etc/apache2/ports.conf

EXPOSE 80

CMD ["apache2-foreground"]
