# Use an official PHP image with Apache
FROM php:8.2-apache

# Set the working directory in the container
WORKDIR /var/www/html

# Copy your application files into the container
COPY . /var/www/html

# Enable Apache rewrite module for clean URLs (used by router.php)
RUN a2enmod rewrite

# Expose port 80 for the web server
EXPOSE 80
