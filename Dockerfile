FROM php:7.4-fpm-alpine

WORKDIR /var/www

RUN apk add --no-cache zip libzip-dev
RUN docker-php-ext-configure zip

RUN docker-php-ext-install pdo pdo_mysql zip
# RUN apt-get update && apt-get install -y \
#         libfreetype6-dev \
#         libjpeg62-turbo-dev \
#         libpng-dev \
#     && docker-php-ext-configure gd --with-freetype --with-jpeg \
#     && docker-php-ext-install -j$(nproc) gd



RUN apk --no-cache add pcre-dev ${PHPIZE_DEPS}
RUN pecl install redis \
    && docker-php-ext-enable redis

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN echo 'memory_limit = 1024M' >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini;

# RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
# RUN mv "$PHP_INI_DIR/php.ini-development " "$PHP_INI_DIR/php.ini"

RUN chown -R www-data:www-data /var/www
RUN chmod 755 /var/www

EXPOSE 9000/tcp
EXPOSE 9000/udp
