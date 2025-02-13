# Dockerfile
FROM php:8.1-apache

# Ρύθμιση του ServerName για να αποφύγουμε τις προειδοποιήσεις
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Εγκατάσταση extensions για MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Ενεργοποίηση του mod_rewrite για το Apache (αν χρειάζεται)
RUN a2enmod rewrite

# Αντιγραφή του κώδικα της εφαρμογής στο Apache directory
COPY . /var/www/html/

# Ρυθμίσεις δικαιωμάτων
RUN chown -R www-data:www-data /var/www/html

# Άνοιγμα θύρας 80 για HTTP
EXPOSE 80

# Εκκίνηση του Apache σε λειτουργία "foreground"
CMD ["apache2-foreground"]
