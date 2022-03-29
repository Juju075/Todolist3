## P8_TodoList

Project 8 du parcours de développeur d'application PHP/Symfony d'Openclassrooms.<br/><br/>
Ce projet consite à l'amélioration d'une application déjà existante.<br/>
Migration de symfony 2 à symfony 6, correction des erreurs PHP et implémentation de nouvelle fonctionnalités.</br></br>

Mise en place de tests automatisés</br></br>
Audit de qualite de code et de perfomance.</br>

# QuickStart

Acceder au site depuis votre navigateur:</br>
https://127.0.0.1:8000/</br>
https://127.0.0.1:8000/login</br>
https://127.0.0.1:8000/admin</br>

Tests automatisé</br></br>
`vendor/bin/phpunit --coverage-html html --colors -v --testdox` </br>
(ATTENTION DAMABUNDLE semble deprecié, désactiver le flush() de la methode DELETE)</br>

TaskController ligne 103 //flush()</br>
pour ne pas impacter la bdd de test.</br>
ou supprimer recreer la bdd de test a chaque nouveau RUN</br>
voir les cmd terminal en fin de read me</br></br>

Désole ceci n'est pas de ma faute (DamaBundle)</br>

========= <b>DOCUMENTATIONS CONNEXE</b> ===========</br></br>
<b>Manuel technique de l'implementation de l'authentification</b>

## Veuillez télecharger les fichiers ci-dessous (à la racine du projet:)<br/>

Le manuel technique (implementation de l'authentification).<br/>
Le rapport de couveture de code & l'analyse de performance<br/>
La fiche de comment contribuer a un projet sur github?<br/>

1. [manuel_technique.pdf](#)
2. [report.pdf](#)
3. [how_to_contribute.md](#).

---

## Table des matières.

1. [Pre required](#Pré-requis)
2. [Installation](#Instalation)
3. [Utilisation de l'App](#use).
4. [Bundles utilisé](#Fait-avec)
5. [Auteur](#Auteur)

## Pré requis

Environnement

- _PHP_ (8.0.2)
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

# ETAPE 1 - Création des 2 BDD.

1 - Nom de la base de données : `todolist`<br>

<b>.env.local</b><br>

`DATABASE_URL=mysql://root:@127.0.0.1:3306/todolist?serverVersion=5.7`

php bin/console doctrine:database:create<br>
php bin/console doctrine:migrations:migrate`<br><br>

---

2 - Nom de la base de données de test: `todolist_test`<br>
Vous devez également créer la base de donnée de test.<br>

<b>.env.test</b><br>

define your env variables for the test env here

KERNEL_CLASS='App\Kernel'<br>
APP_SECRET='$ecretf0rt3st'<br>
SYMFONY_DEPRECATIONS_HELPER=999999<br>
PANTHER_APP_ENV=panther<br>
PANTHER_ERROR_SCREENSHOT_DIR=./var/error-screenshots

php bin/console doctrine:database:create --env=test<br>
php bin/console doctrine:migrations:migrate --env=test<br>

---

# ETAPE 2 - Création d'un jeux de données.

-<b>Methode 1 (Chargement directement depuis phpMyAdmin)</b>

- Charger le script sql dans phpmyadmin (creation de la base de données et du jeux de donees.)<br><br>

Pour la BDD principale:<br>

- Lien de saisie: http://localhost/phpmyadmin/server_sql.php<br>
- Fichier à charger: todolist.sql (à la racine du projet)

Pour la BDD de test:

- Fichier à charger: todolisttest.sql<br><br>

---

-<b>Methode 2 (créer vos propre datas)</b>

- Creation d'un jeux de donées via une fixture<br/>

Après avoir installe entierement le projet et installe les dependences.<br/>
lancer le Terminal et saisiser la commande suivante:<br/>

php bin/console doctrine:fixtures:load --no-interaction<br/>
php bin/console doctrine:fixtures:load --env=test --no-interaction<br/>

Vous pouvez à tout moment nettoyer à 100% votre bdd de test<br>
suivre les instructions de rafraichir la base de données de test en cas de failure.<br>

---

<b>Comment se connecter à la bdd via phpMyAdmin?</b><br/>

"user": "vos identifiant personnel"<br>
"pass": "votre mot de passe personnel"<br><br>

<b>Comment lancer un test automatisé avec une analyse de couverture de code?</b><br>
cmd terminal:<br>
`vendor/bin/phpunit --coverage-html html --colors -v --testdox`<br><br>

<b>Comment rafraichir la base de données de test en cas de failure?</b><br>
[copier coller l'ensemble en 1 bloc dans le terminal]<br><br>

symfony console doctrine:database:drop --force --env=test<br>
symfony console d:d:c --env=test<br>
symfony console d:s:u --force --env=test<br>
symfony console d:f:l --env=test --no-interaction<br>

---

## use

Avant toute chose vous devez initialiser votre Serveur PHP local.

- Ouvrir Wamp
- symfony server:start -d
- symfony open:local

- <b>AUTHENTIFICATION</b> <br/>

Pour se connecter:<br/>
ATTENTION VOUS AVEZ 2 ENVIRONNEMENTS DE TRAVAIL.<br/>
1-bdd standard<br/>
2-bdd de test<br/>

["ROLE_ADMIN"]<br/>
username: < pick your username in database > <br/>
password: identique<br/><br/>

["ROLE_USER"]<br/>
username:< pick your username in database > <br/>
password: identique<br/><br/>

## Bundle utilisé

- Faker - https://github.com/FakerPHP/fakerphp.github.io<br/>
- Phpunit - https://github.com/symfony/phpunit-bridge<br/>
- Damatestbundle - https://github.com/dmaicher/doctrine-test-bundle/blob/master/src/DAMA/DoctrineTestBundle/DAMADoctrineTestBundle.php<br/>

### Auteur

- **Bempime KHEVE** (https://github.com/Juju075)<br/>
