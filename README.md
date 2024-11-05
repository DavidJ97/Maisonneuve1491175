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

## Liste des commandes utilisées
```bash
composer create-project --prefer-dist laravel/laravel Maisonneuve1491175
php artisan make:model Etudiant -m
php artisan make:model Ville -m
php artisan migrate
php artisan make:factory VilleFactory
php artisan make:factory EtudiantFactory
php artisan make:controller EtudiantController --resource
php artisan make:controller VilleController --resource

