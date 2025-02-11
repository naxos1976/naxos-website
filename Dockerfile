# Χρήση του PHP 8.1 με Apache
FROM php:8.1-apache

# Εγκατάσταση MySQL και άλλων απαραίτητων επεκτάσεων
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Αντιγραφή του project στο container
COPY . /var/www/html/

# Θέσε το working directory
WORKDIR /var/www/html/

# Ανοιγμα της πόρτας 80
EXPOSE 80

# Εκκίνηση του Apache server
CMD ["apache2-foreground"]
