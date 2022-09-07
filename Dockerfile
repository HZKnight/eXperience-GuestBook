FROM php:latest
COPY . /
WORKDIR /
CMD [ "php", "./index.php" ]