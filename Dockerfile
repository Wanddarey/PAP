# Use official PHP Apache image
FROM php:7.4-apache

# Enable mod_rewrite
RUN a2enmod rewrite

# Install OpenSSL
RUN apt-get update && \
    apt-get install -y openssl && \
    apt-get install -y vim && \
    apt-get clean && \
    rm -fr /var/lib/apt/lists/*

# Create SSL directory
RUN mkdir /etc/apache2/ssl

# Generate SSL certificate and key
RUN openssl req -x509 -sha256 -nodes -newkey rsa:2048 -days 365 \
    -subj "/CN=localhost" \
    -keyout localhost.key -out localhost.crt


# Copy website files to container
COPY ./ /var/www/html

# Expose port 80
EXPOSE 80