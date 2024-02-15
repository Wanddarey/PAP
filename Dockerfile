# Use official PHP Apache image
FROM php:7.4-apache

# Enable mod_rewrite
RUN a2enmod rewrite

# Install OpenSSL
RUN apt-get update && \
    apt-get install -y openssl && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Create SSL directory
RUN mkdir /etc/apache2/ssl

# Generate SSL certificate and key
RUN openssl req -x509 -sha256 -nodes -newkey rsa:2048 -days 365 -keyout localhost.key -out localhost.crt


# Copy website files to container
COPY C:/xampp/htdocs/dashboard/PAP /var/www/html

# Expose port 80
EXPOSE 80