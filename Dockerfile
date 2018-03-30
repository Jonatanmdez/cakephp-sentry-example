FROM optimizaclick/apache-php7.1-prod


RUN apt-get update && apt-get install -y libbz2-dev
RUN docker-php-ext-install bz2

ENV HTTPD__DocumentRoot='/var/www/html/'
ENV HTTPD_a2enmod='rewrite expires deflate'


RUN sed -ri -e 's!/var/www/html!${HTTPD__DocumentRoot}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${HTTPD__DocumentRoot}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf


WORKDIR /var/www/html/
COPY cakephp .
RUN composer update
COPY docker-entrypoint.sh /entrypoint.sh

COPY cakephp/config/app_docker.php config/app.php

RUN chown -R www-data:www-data /var/www/html/

ENTRYPOINT ["/entrypoint.sh"]
