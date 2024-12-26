# CRUD PHP 

Cette application est un exemple de CRUD (Create, Read, Update, Delete) en PHP. Elle permet de gérer une liste d'utilisateurs avec les fonctionnalités suivantes :

- **Créer** un nouvel utilisateur
- **Lire** la liste des utilisateurs ou le détail d'un seul utilisateur
- **Mettre à jour** les informations d'un utilisateur existant
- **Supprimer** un utilisateur

## Prérequis

- PHP 7.0 ou supérieur
- Serveur web (Apache, Nginx, etc.)
- Base de données MySQL

## Installation

1. Clonez le dépôt :
    ```bash
    git clone https://github.com/AlexHamon74/crud_php.git
    cd crud_php
    ```

2. Configurez la base de données :
    - Créez une base de données MySQL.
    - Modifiez le fichier `db.ini.template` avec vos informations et renommez le `db.ini`.

## Structure du projet

- [config](http://_vscodecontentref_/2) : Fichiers de configuration
- [vue](http://_vscodecontentref_/3) : Fichiers de vue (HTML, formulaires)
- [traitement](http://_vscodecontentref_/4) : Fichiers de traitement (logique métier)
- [db.sql](http://_vscodecontentref_/4) : Fonction permettant de se connecter à sa base de données