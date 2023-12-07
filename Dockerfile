# Use an official PHP with Apache image as a parent image
FROM php:7.4-apache

# Set the working directory in the container
WORKDIR /var/www/html

# Copy the contents of the local htdocs/Sistema-igreja directory to the container
COPY . .

# Set permissions on the working directory
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Install MySQL client
RUN apt-get update \
    && apt-get install -y default-mysql-client \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions and other dependencies
RUN docker-php-ext-install mysqli pdo_mysql

# Expose port 80 for Apache
EXPOSE 80

# Copy the MySQL data during container runtime
COPY init-mysql.sh /docker-entrypoint-initdb.d/

# Define the command to run the Apache server
CMD ["apache2-foreground"]
