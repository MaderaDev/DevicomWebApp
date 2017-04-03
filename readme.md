# Madera Application Web
Madera est une application web permettant la gestion des devis de maisons modulaire.
Elle intégre une API Rest pour la connexion à une tablette Android

## Installation 
Pour installer l'application :
```bash
composer install
php artisan key:generate
cp .env.example .env #Configurer les variables 
php artisan migrate
php artisan db:seend #Population de la base de donnée
```
L'application est disponible sur http://localhost:8000