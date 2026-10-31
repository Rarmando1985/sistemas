FROM php:8.0.30-fpm

# Actualizar índices e instalar dependencias
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        libpng-dev \
        libonig-dev \
        zip \
        unzip \
    && pecl install redis \
    && docker-php-ext-enable redis \
    && docker-php-ext-install pdo pdo_mysql mysqli \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Copiar código de la aplicación
COPY src/ /var/www/html/

# Permisos
RUN chown -R www-data:www-data /var/www/html