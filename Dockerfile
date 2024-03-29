FROM php:fpm
RUN docker-php-ext-install pdo pdo_mysql
RUN apt-get update && apt-get install -y git p7zip-full libmagickwand-dev --no-install-recommends
RUN pecl install xdebug && docker-php-ext-enable xdebug
RUN pecl install imagick && docker-php-ext-enable imagick
COPY --from=composer/composer:latest-bin /composer /usr/bin/composer

WORKDIR /root

# Dependencies
RUN composer require phpunit/phpunit && \
    composer require json-mapper/json-mapper && \
    composer require intervention/image && \
    composer require monolog/monolog && \
    composer require Monolog/Monolog && \
    composer require twbs/bootstrap:5.3.0-alpha1 && \
    # TODO: probably not this???
    chmod -R og+rx /root