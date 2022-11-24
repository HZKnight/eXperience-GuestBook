# eXperience GuestBook - Dockerfile ver.1.0

# 1 - base image
FROM php:8.1-apache

# 2 - environmente setting
# System configuration
RUN apt update && \
    apt full-upgrade -y

# MariaDB configuration
RUN apt install mariadb-client* mariadb-server* -y
COPY Docker/hzsystem.sql /root
RUN /etc/init.d/mariadb start && \
    mysql < /root/hzsystem.sql

# Apache configuration
COPY Docker/000-default.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite
RUN docker-php-ext-install pdo_mysql
RUN echo "pdo_mysql.default_socket = /run/mysqld/mysqld.sock" >> /usr/local/etc/php/conf.d/docker-php-ext-pdo_mysql.ini
COPY Docker/start-apache.sh /root

# 3 - Install application
COPY src /var/www/html
COPY Docker/config.json /var/www/html
RUN chown -R www-data:www-data /var/www/html

CMD ["/root/start-apache.sh"]