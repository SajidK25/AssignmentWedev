FROM php:7.3-apache
RUN bash -c "apt update && apt install nano -y"
RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
WORKDIR /var/www/html/
COPY . .
RUN composer dump-autoload