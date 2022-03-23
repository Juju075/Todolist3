## P9_TodoList

Project 9 du "parcours développeur d'application PHP/Symfony" d'Openclassrooms.<br/>
Ce projet consite à la création

Vous pouvez les retrouver ici<br/>

====================

====================<br/>
<b>MANUEL TECHNIQUE</b>

Veuillez telecharger le fichier cidessous la racine du projet:<br/>
api_bilemo.pdf

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

ETAPE Creation de la BDD en locale.

-Configurer votre espace .env.local et .env.test
eg:
DATABASE_URL=mysql://userName:@127.0.0.1:3306/databaseName?serverVersion=5.7

eg:

- Base de données : `toplist`
  php bin/console doctrine:database:create

- Crée le schema de la database.
  php bin/console doctrine:migrations:migrate

Vous devez egalement creer la base de donnée de test
qui sera completer d'un jeu de données via la fixture.

ETAPE
Copy paste dans le terminal une foi

symfony console doctrine:database:drop --force --env=test
symfony console d:d:c --env=test
symfony console d:s:u --force --env=test
symfony console d:f:l --env=test --no-interaction

-<b>Methode 1</b> - Charger le script sql dans phpmyadmin (creation de la base de données et du jeux de donees.)

Pour la BDD principale:

- Lien de saisie: http://localhost/phpmyadmin/server_sql.php
- Fichier à charger: todolist.sql (à la racine du projet)

Pour la BDD de test:

- Fichier à charger: todolisttest.sql

OU

-<b>Methode 2</b> - Creation d'un jeux de donees via une fixture<br/>

Apres avoir installe entierement le projet et installe les dependences.<br/>
lancer le Terminal et saisiser la commande suivante:<br/>

php bin/console doctrine:fixtures:load --no-interaction<br/>
php bin/console doctrine:fixtures:load --env=test --no-interaction<br/>

=====================<br/>
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

- doctrine-fixtures-bundle (Géneration de jeux de données) - <br/>
- jm serializer bundle (serialization and deserialisation)- https://github.com/schmittjoh/JMSSerializerBundle<br/>
- lexik/jwt-authentication-bundle - https://github.com/lexik/LexikJWTAuthenticationBundle<br/>
- BabDev/Pagerfanta(pagination for symfony) - https://github.com/BabDev/Pagerfanta<br/>
- Hateoas (autodecouvrable api) - https://github.com/willdurand/Hateoas<br/>

### Auteur

- **Bempime KHEVE** (https://github.com/Juju075)<br/>
