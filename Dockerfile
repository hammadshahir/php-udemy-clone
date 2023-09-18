# Use an official PHP runtime as a parent image
FROM php:8.0-apache

# Set the working directory in the container
WORKDIR /var/www/html

# Install required PHP extensions and enable Apache modules
RUN docker-php-ext-install pdo pdo_mysql \
    && a2enmod rewrite

# Copy the contents of the app directory into the container's working directory
COPY ./app /var/www/app

# Expose port 80 for Apache
EXPOSE 80

# Start Apache in the foreground when the container runs
CMD ["apache2-foreground"]