# Dockerfile
FROM php:8.1-apache

# Ρύθμιση του ServerName για να αποφύγουμε τις προειδοποιήσεις
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Ενεργοποίηση των απαραίτητων modules (αν δεν το έχεις ήδη κάνει)
RUN docker-php-ext-install mysqli pdo pdo_mysql && a2enmod rewrite

# Αντιγραφή του κώδικα της εφαρμογής σου
COPY . /var/www/html/

# Ρυθμίσεις δικαιωμάτων (προαιρετικό)
RUN chown -R www-data:www-data /var/www/html

# Ανοιχτή θύρα για HTTP
EXPOSE 80
