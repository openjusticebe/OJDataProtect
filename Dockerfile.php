FROM php:7.4-fpm

# install system dependencies
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
    libmcrypt-dev \
    mysql-client \
    libmagickwand-dev \
    openssl \
    zip unzip \
    git

# install php dependencies
RUN pecl install imagick \
    && docker-php-ext-enable imagick \
    && docker-php-ext-install mcrypt pdo_mysql \
    && docker-php-ext-install gd

    RUN usermod -u 1000 www-data
    RUN groupmod -g 1000 www-data

    RUN chown -R www-data:www-data /var/www/
    RUN chmod -R 755 /var/www/
