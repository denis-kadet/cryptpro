FROM php:8.3-fpm

LABEL maintainer="Vykhodtcev Denis"

RUN apt-get update \
  && apt-get install -y \
             vim \
             libfreetype6-dev \
             libjpeg62-turbo-dev \
             libmcrypt-dev \
             libpng-dev \
             zlib1g-dev \
             libxml2-dev \
             libzip-dev \
             libonig-dev \
             graphviz \
             libcurl4-openssl-dev \
             pkg-config \
             libpq-dev \
             libboost-dev \
             gzip \
             git

# Скопируем архив с КриптоПро CSP в контейнер
ADD /linux-amd64_deb.tgz /opt/

RUN /bin/sh /opt/linux-amd64_deb/install.sh lsb-cprocsp-devel cprocsp-pki-cades

WORKDIR /opt/cprocsp/src

#ADD https://github.com/CryptoPro/phpcades.git /opt/cprocsp/src/phpcades
RUN git clone https://github.com/CryptoPro/phpcades.git

WORKDIR /opt/cprocsp/src/phpcades

RUN sed -i "s|PHPDIR=.*|PHPDIR=/usr/local/include/php|" ./Makefile.unix

RUN patch -p0 < ./php8_support.patch

RUN eval `/opt/cprocsp/src/doxygen/CSP/../setenv.sh --64`  \
    && make -f Makefile.unix \
    && ln -s /opt/cprocsp/src/phpcades/libphpcades.so /usr/local/lib/php/extensions/no-debug-non-zts-20230831/libphpcades.so \
    && /opt/cprocsp/sbin/amd64/cpconfig -ini '\cryptography\apppath' -add string 'libcurl.so' '/usr/lib/x86_64-linux-gnu/libcurl.so' \
    && cd / \
    && rm -r opt/linux-amd64_deb

RUN docker-php-ext-install pgsql \
  && docker-php-ext-install pdo_pgsql \
  && docker-php-ext-install intl \
  && docker-php-ext-install zip \
  && docker-php-ext-install exif \
  && docker-php-ext-install opcache \
  && docker-php-ext-install gd \
  && docker-php-ext-configure gd --with-freetype --with-jpeg \
  && docker-php-source delete 
 
RUN chown -R www-data:www-data /var/www/html

COPY php.ini /usr/local/etc/php/php.ini
