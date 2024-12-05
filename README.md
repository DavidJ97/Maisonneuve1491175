<<<<<<< HEAD
TP2 Laravel - Gestionnaire de tâches
Description
Application web Laravel de gestion des tâches avec multi-langues, authentification, catégorisation et génération de PDF développée dans le cadre du cours de Laravel au Collège Maisonneuve.
Installation

git clone https://github.com/DavidJ97/Maisonneuve1491175.git
cd Maisonneuve1491175TP2
composer install
Copier .env.example vers .env
Configurer base de données MySQL dans .env :
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_todo
DB_USERNAME=root
DB_PASSWORD=
php artisan key:generate
php artisan migrate
php artisan db:seed

Fonctionnalités

Authentification (login, register, reset password)
CRUD complet des tâches
Catégories de tâches
Interface français/anglais
Export PDF des tâches avec QR code
Rôles et permissions (admin/employé)

Technologies

Laravel
MySQL (InnoDB)
Bootstrap 5
DomPDF
Spatie Laravel Permission
Simple QR Code

Structure BD

Table tasks (id, title, description, completed, due_date, user_id, category_id)
Table categories (id, category)
Table users (id, name, email, password, role_id)

Auteur
David Jules

=======
# Maisonneuve1491175
>>>>>>> 3a0277f24b77ab9756b561ba23ba8e68d1086e81
