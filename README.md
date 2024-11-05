# Git Hub
https://github.com/DavidJ97/Maisonneuve1491175.git

# Projet Web - Gestion des étudiants du Collège Maisonneuve

## Description
Application Web permettant la gestion des étudiants et de leurs informations.

## Installation
1. Cloner le projet
2. Installer les dépendances : `composer install`
3. Copier .env.example vers .env
4. Configurer la base de données dans .env
5. Générer la clé d'application : `php artisan key:generate`
6. Exécuter les migrations : `php artisan migrate`
7. Alimenter la base de données : `php artisan db:seed`

# Création du projet et configuration
composer create-project --prefer-dist laravel/laravel Maisonneuve1491175
cd Maisonneuve1491175

# Création des modèles et migrations
php artisan make:model Etudiant -m
php artisan make:model Ville -m

# Création des factories
php artisan make:factory VilleFactory
php artisan make:factory EtudiantFactory

# Création des contrôleurs
php artisan make:controller EtudiantController --resource
php artisan make:controller VilleController --resource

# Commandes de base de données
php artisan migrate
php artisan db:seed
php artisan migrate:fresh --seed

# Commandes utilitaires
php artisan serve
php artisan route:list
php artisan cache:clear
php artisan view:clear
php artisan config:clear

# Commandes Git
git init
git add .
git commit -m "Initial commit - Projet Maisonneuve1491175"
git branch -M main
git remote add origin https://github.com/DavidJ97/Maisonneuve1491175.git
git push -u origin main

Auteur : David Jules
