FROM php:8.2-apache

# Enable mod_rewrite for .htaccess support
RUN a2enmod rewrite

# Copy all project files
COPY . /var/www/html/

# Set permissions (optional but recommended)
RUN chown -R www-data:www-data /var/www/html

# Set working directory
WORKDIR /var/www/html

# Expose port 80 (used by Apache)
EXPOSE 80
