
FROM php:8.2-cli AS prod

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
php composer-setup.php && \
php -r "unlink('composer-setup.php');" && \
mv composer.phar /usr/local/bin/composer

RUN apt-get update && apt-get install -y \
autoconf \
build-essential \
libpq-dev \
libssl-dev \
libtool \
pkg-config \
unzip \
&& docker-php-source extract\
&& rm -rf /var/lib/apt/lists/*

WORKDIR /app

COPY . .


RUN docker-php-ext-install pdo pdo_pgsql && composer install


EXPOSE 80

CMD [ "php","artisan","serve","--host=0.0.0.0","--port=80" ]
