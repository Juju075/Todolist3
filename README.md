## P8_TodoList

Project 8 du parcours développeur d'application PHP/Symfony d'Openclassrooms.<br/><br/>
Ce projet consite à l'amelioration d'une application déjà existante'<br/>
mettre àh jour la version symfony corrigé les bugs et implementer de nouvelle fonctionnalités.

====================

<b>MANUEL TECHNIQUE</b>

Veuillez telecharger le fichier cidessous la racine du projet:<br/>
.pdf

====================

## Table des matières.

1. [Pre required](#Pré-requis)
2. [Installation](#Instalation)
3. [Affichage de l'App](#use).
4. [Fait avec](#Fait-avec)
5. [Auteur](#Auteur)

## Pré requis

Environnement

- _PHP_ (7.4.12)
- _Apache_ (2.4.46)
- _MySQL_ (8.0.22)
- _Composer_ (2.0.9)

## Installation

- Get sources files / Cloner le repository du projet. [Here](https://github.com/Juju075/Todolist3)
  > Make sure the `www` repository, is at the root of your server, you can also create a virtual host that redirect the visitors to the `www` directory.

_Go with a console to the repository and do thoses commands_

- `composer install`
- `composer update`

---

# ETAPE 1 - Création de la BDD en locale.

- Base de données : `toplist`
  php bin/console doctrine:database:create

- Crée le schema de la database.
  php bin/console doctrine:migrations:migrate
  Vous devez egalement creer la base de donnée de test
  qui sera completer d'un jeu de données via la fixture.

---

# ETAPE 2 - Création d'un jeux de données.

-<b>Methode 1 (Fichier à télecharger)</b>

- Charger le script sql dans phpmyadmin (creation de la base de données et du jeux de donees.)

Pour la BDD principale:

- Lien de saisie: http://localhost/phpmyadmin/server_sql.php
- Fichier à charger: todolist.sql (à la racine du projet)

Pour la BDD de test:

- Fichier à charger: todolisttest.sql

---

-<b>Methode 2 (Lancer un script)</b>

- Creation d'un jeux de donees via une fixture<br/>

Apres avoir installe entierement le projet et installe les dependences.<br/>
lancer le Terminal et saisiser la commande suivante:<br/>

php bin/console doctrine:fixtures:load --no-interaction<br/>
php bin/console doctrine:fixtures:load --env=test --no-interaction<br/>

---

Connexion à la Bdd.<br/>

{<br/>
"host": "localhost",<br/>
"dbname": "todolist",<br/>
"user": "vos identifiant personnel",<br/>
"pass": "votre mot de passe personnel"<br/>
}<br/>

======================

## use

Avant toute chose vous devez initialise votre Serveur PHP local.

- Ouvrir Wamp
- symfony server:start -d
- symfony open:local

- <b>AUTHENTIFICATION</b> <br/>

Pour se connecter avec le
["ROLE_ADMIN"]
username:
password: identique

["ROLE_USER"]
username:
password: identique

TESTER LAPPLICATION
Pour lancer la documentation (tests sur la BDD de test).

- cette commande vas lister et tester tous les methods
- avec cette commande vous pouvez egalement editer un rapport html avec un taux de couverture.

## Bundle utilisé

- Faker - https://github.com/FakerPHP/fakerphp.github.io<br/>
- Phpunit - https://github.com/symfony/phpunit-bridge<br/>
- Damatestbundle - https://github.com/dmaicher/doctrine-test-bundle/blob/master/src/DAMA/DoctrineTestBundle/DAMADoctrineTestBundle.php<br/>

### Auteur

- **Bempime KHEVE** (https://github.com/Juju075)<br/>
