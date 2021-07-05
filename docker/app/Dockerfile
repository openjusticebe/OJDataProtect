FROM php:7.2-apache-stretch

ENV PHP_MAX_EXECUTION_TIME=30
ENV PHP_MEMORY_LIMIT=128M
ENV PHP_DISPLAY_ERRORS=Off
ENV PHP_POST_MAX_SIZE=8M
ENV PHP_UPLOAD_MAX_FILESIZE=2M
ENV PHP_MAX_FILE_UPLOADS=20

# Copy the app itself
COPY . /var/www/html

# Add the PHP configuration files
COPY docker/app/php.ini /usr/local/etc/php/
COPY docker/app/opcache.ini /usr/local/etc/php/conf.d/opcache.ini

# Add the STARTUP SCRIPT & FIX PERMS
#COPY docker/app/start.sh /usr/local/bin/start
#RUN chmod u+x /usr/local/bin/start

# Add the certificates generated with mkcert
COPY docker/app/certs/localhost.pem /etc/apache2/ssl/server.crt
COPY docker/app/certs/localhost-key.pem /etc/apache2/ssl/server.key

# Install PHP extensions
RUN apt-get update -yqq \
    # Install libs for building PHP exts
    # `apt-utils` to solve "debconf: delaying package configuration, since apt-utils is not installed"
    && apt-get install -yqq --no-install-recommends \
        apt-utils \
        libicu-dev \
        libpq-dev \
        libmcrypt-dev \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        unzip \
        nano \
        mysql-client \
    # Install PHP Exts
    && docker-php-ext-install \
        pdo_mysql \
        pdo_pgsql \
        pgsql \
        zip \
        exif \
       # mbstring \
        opcache \
        ctype \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    # Remove dev packages
    && apt-get remove --purge -yyq libicu-dev \
        libpq-dev \
        libmcrypt-dev \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev

RUN rm -r /var/lib/apt/lists/*

# Add apache config
COPY docker/app/vhost.conf /etc/apache2/sites-available/site.conf

# Disable default site
RUN a2dissite 000-default.conf

# Enable default site
RUN a2ensite site.conf

# Activating Mod
RUN a2enmod rewrite
RUN a2enmod ssl

# Restart
RUN service apache2 restart

# Change uid and gid of apache to docker user uid/gid
# (needed to solve some permissions issues when using volumes)
RUN usermod -u 1000 www-data
RUN groupmod -g 1000 www-data

RUN chown -R www-data:www-data /var/www/html/
RUN chmod -R 755 /var/www/html/
RUN chmod -R o+w /var/www/html/storage

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# RUN php /var/www/html/artisan route:cache
# RUN php /var/www/html/artisan config:cache
# RUN php /var/www/html/artisan optimize

EXPOSE 80
EXPOSE 443

WORKDIR /var/www/html

# Replace CMD ["apache2-foreground"] and add custom method for queue and job
#CMD ["/usr/local/bin/start"]
