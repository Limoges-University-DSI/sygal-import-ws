
FROM unicaen-dev-php7.0-apache

LABEL maintainer="Bertrand GAUTHIER <bertrand.gauthier at unicaen.fr>"

# Symlink apache access and error logs to stdout/stderr so Docker logs shows them
RUN ln -sf /dev/stdout /var/log/apache2/access.log
RUN ln -sf /dev/stdout /var/log/apache2/other_vhosts_access.log
RUN ln -sf /dev/stderr /var/log/apache2/error.log

# Configuration Apache et FPM
ADD docker/apache-ports.conf    ${APACHE_CONF_DIR}/ports.conf
ADD docker/apache-site.conf     ${APACHE_CONF_DIR}/sites-available/sygal-import-ws.conf
ADD docker/apache-site-ssl.conf ${APACHE_CONF_DIR}/sites-available/sygal-import-ws-ssl.conf
ADD docker/fpm/pool.d/app.conf  ${PHP_CONF_DIR}/fpm/pool.d/sygal-import-ws.conf
ADD docker/fpm/conf.d/app.ini   ${PHP_CONF_DIR}/fpm/conf.d/

RUN a2ensite sygal-import-ws sygal-import-ws-ssl && \
    service php7.0-fpm reload
