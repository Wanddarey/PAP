# Use official PHP Apache image
FROM php:7.4-apache

# Enable mod_rewrite
RUN a2enmod rewrite

# Copy website files to container
COPY C:/xampp/htdocs/dashboard/PAP /var/www/html

# Expose port 80
EXPOSE 80
