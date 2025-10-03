# Utilise une image PHP avec Apache
FROM php:8.2-apache

# Installe les extensions nécessaires (PHPMailer n'a pas besoin de beaucoup)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Active mod_rewrite d'Apache (utile si besoin)
RUN a2enmod rewrite

# Copie le contenu de ton projet dans le dossier web du conteneur
COPY . /var/www/html/

# Assure les bons droits
RUN chown -R www-data:www-data /var/www/html

# Expose le port 80 pour HTTP
EXPOSE 80

# Commande par défaut pour lancer Apache en premier plan
CMD ["apache2-foreground"]
