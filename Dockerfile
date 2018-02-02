#
# Use this dockerfile to run apigility.
#
# Start the server using docker-compose:
#
#   docker-compose build
#   docker-compose up
#
# You can install dependencies via the container:
#
#   docker-compose run apigility composer install
#
# You can manipulate dev mode from the container:
#
#   docker-compose run apigility composer development-enable
#   docker-compose run apigility composer development-disable
#   docker-compose run apigility composer development-status
#
# OR use plain old docker 
#
#   docker build -f Dockerfile -t apigility .
#   docker run -d -p "8080:8080" -v $PWD:/var/www apigility
#
FROM adrianharabula/php7-with-oci8

RUN apt-get update \
 && apt-get install -y git zlib1g-dev \
 && docker-php-ext-install zip \
 && a2enmod rewrite \
 && sed -i 's!/var/www/html!/var/www/public!g' /etc/apache2/sites-available/000-default.conf \
 && mv /var/www/html /var/www/public \
 && curl -sS https://getcomposer.org/installer \
  | php -- --install-dir=/usr/local/bin --filename=composer \
 && echo "AllowEncodedSlashes On" >> /etc/apache2/apache2.conf

WORKDIR /var/www

EXPOSE 8080
CMD ["php", "-S",  "0.0.0.0:8080",  "-ddisplay_errors=0", "-t", "/var/www/public", "/var/www/public/index.php"]
