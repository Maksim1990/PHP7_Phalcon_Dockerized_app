FROM php:5.6.36-fpm
MAINTAINER narushevich.maksim@gmail.com

ARG PHALCON_VERSION=3.4.1

ENV PHALCON_VERSION=${PHALCON_VERSION}


RUN apt-get update && apt-get install -y git

# Install Phalcon Extension
RUN apt-get install -y libmagickwand-dev --no-install-recommends && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
        locales \
        libxslt-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install mbstring iconv pdo_mysql zip mysqli exif xsl \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install gd \
    && echo 'ru_RU.UTF-8 UTF-8' >> /etc/locale.gen \
    && locale-gen

# Compile Phalcon
RUN set -xe \
    && curl -LO https://github.com/phalcon/cphalcon/archive/v${PHALCON_VERSION}.tar.gz \
    && tar xzf v${PHALCON_VERSION}.tar.gz && cd cphalcon-${PHALCON_VERSION}/build && ./install \
    && docker-php-ext-enable phalcon \
    && cd ../.. && rm -rf v${PHALCON_VERSION}.tar.gz cphalcon-${PHALCON_VERSION} \

# Insall Phalcon Devtools, see https://github.com/phalcon/phalcon-devtools/
    && curl -LO https://github.com/phalcon/phalcon-devtools/archive/v${PHALCON_VERSION}.tar.gz \
    && tar xzf v${PHALCON_VERSION}.tar.gz \
    && mv phalcon-devtools-${PHALCON_VERSION} /usr/local/phalcon-devtools \
    && ln -s /usr/local/phalcon-devtools/phalcon.php /usr/local/bin/phalcon


# Set Phalcon working directory
WORKDIR /var/www

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#CMD ["php", "-S", "0.0.0.0:80", "-t", "projects/"]
