FROM php:8.0.30-fpm

# 1. Instalar dependencias del sistema y herramientas de compilación
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

# 2. Copiar el código fuente de la aplicación
COPY src/ /var/www/html/

# 3. Asignar permisos al usuario de Nginx / PHP-FPM
RUN chown -R www-data:www-data /var/www/html