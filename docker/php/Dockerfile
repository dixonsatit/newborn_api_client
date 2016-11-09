FROM php:7-fpm-alpine

MAINTAINER Sathit Seethaphon <dixonsatit@gmail.com>

RUN apk upgrade --update && apk --no-cache add \
    git autoconf file g++ gcc binutils isl libatomic libc-dev musl-dev make re2c libstdc++ libgcc libcurl binutils-libs mpc1 mpfr3 gmp libgomp coreutils freetype-dev libjpeg-turbo-dev libltdl libmcrypt-dev libpng-dev openssl-dev libxml2-dev expat-dev icu-dev libmemcached-dev \
    && docker-php-ext-install iconv mysqli pdo pdo_mysql curl bcmath mcrypt mbstring json xml zip bz2 opcache intl \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install gd

# Install Composer && Setup the Composer installer
RUN php -r "readfile('https://getcomposer.org/installer');" | php -- --install-dir=/usr/local/bin --filename=composer \
&& composer global require --no-progress "fxp/composer-asset-plugin:~1.2"

EXPOSE 9000

CMD ["php-fpm"]
