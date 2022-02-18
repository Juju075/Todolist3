

1- l’implémentation de nouvelles fonctionnalités ; > NEWS FUNCTIONNALITIES
2- la correction de quelques anomalies ; > BUGS
3- et l’implémentation de tests automatisés. >TEST

Symfony insigh
Analyser le projet grâce à des outilsensemble de la qualité du code 
et des différents axes de performance de l’application.
>>> Pas demandé de corriger  l’audit de qualité de code. <<< 
version Symfony:3.1

================================
https://symfony.com/doc/current/setup/upgrade_major.html

==
composer install rapport: (Installing dependencies)

[is not required in your composer.json] Remove - Package doctrine/doctrine-cache-bundle is abandoned, you should avoid using it. 
No replacement was suggested.

[is not required in your composer.json] Remove - Package doctrine/reflection is abandoned, you should avoid using it. 
>Use roave/better-reflection instead.

[ok] Remove - Package sensio/distribution-bundle is abandoned, you should avoid using it. 
No replacement was suggested.

[is not required in your composer.json] Remove - Package sensiolabs/security-checker is abandoned, you should avoid using it. 
>Use https://github.com/fabpot/local-php-security-checker instead.

[not required in your composer.json] Remove - Package swiftmailer/swiftmailer is abandoned, you should avoid using it. 
>Use symfony/mailer instead.

[ok] Remove - Package symfony/swiftmailer-bundle is abandoned, you should avoid using it. 
>Use symfony/mailer instead.

[ok] Remove - Package sensio/generator-bundle is abandoned, you should avoid using it. 
>Use symfony/maker-bundle instead.

==
composer.json (update bundle)  <<<<<< pour composer update. https://packagist.org/ verification version 
   "require": {
        "php": ">=5.5.9",                               <<<<<< 8.0.2
        "symfony/symfony": "3.1.*",                     <<<<<< 6.0.4
        "doctrine/orm": "^2.5",                         <<<<<< 2.11.1
        "doctrine/doctrine-bundle": "^1.6",             <<<<<< 2.5.6
        "doctrine/doctrine-cache-bundle": "^1.2",       <<<<<< Supprimer ok No replacement
        "symfony/swiftmailer-bundle": "^2.3",           <<<<<< Supprimer ok <<<< []Use symfony/mailer 
       add dependencies requiere 
       [ok]event-dispatcher + []egulias/email-validator + []symfony/mime +  []symfony/service-contracts
        "symfony/monolog-bundle": "^2.8",               <<<<<< 3.7.1
        "symfony/polyfill-apcu": "^1.0",                <<<<<< 1.24.0
        "sensio/distribution-bundle": "^5.0",           <<<<<< Supprimer ok <<<< No replacement 
        "sensio/framework-extra-bundle": "^3.0.2",      <<<<<< 6.2.6
        "incenteev/composer-parameter-handler": "^2.0"  <<<<<< 2.1.4
    "require-dev": {
        "sensio/generator-bundle": "^3.0",              <<<<<< Supprimer ok <<<< [ok]Use symfony/maker-bundle
        "symfony/phpunit-bridge": "^3.0"                <<<<<< 6.0.3

==
composer update:

- symfony/symfony v6.0.4 requires php >=8.0.2 -> your php version (7.4.12) does not satisfy that requirement.
    info:PHP 8 requires Apache 2.4.x https://sourceforge.net/ (Install php 8.1.2 apache 2.4.52)
    + Wampserver 3.2.7 5.7Mo https://wampserver.aviatechno.net/#updates_versions
        (supprimer) Windows PATH environnement variable: (C:\wamp64\bin\mysql\mysql8.0.22\bin\)
    + Addons/Php/wampserver3_x64_addon_php8.1.2.exe

    Modifier la ver PHP du serveur de Symfony (The Web server is using PHP CGI 7.4.12)
    The current PHP version is selected from default version in $PATH
    ENV Systme > C:\wamp64\bin\php\php7.4.12 pour php8.1.2


- symfony/yaml v4.4.8 > v6.0.3 compatible php 8    
 Problem 5
    - Root composer.json requires symfony/yaml ^6.0, found symfony/yaml[v6.0.0, v6.0.1, v6.0.2, v6.0.3] but these were not loaded, likely because it conflicts with another require.
==





  Problem 1
  
  Problem 2
    [ ] - symfony/config[v6.0.0, ..., v6.0.3] require php >=8.0.2 -> your php version (7.4.12) does not satisfy that requirement.
    [ ] - symfony/symfony v6.0.4 require php >=8.0.2 -> your php version (7.4.12) does not satisfy that requirement.
    [ ] - Root composer.json requires symfony/monolog-bundle ^2.8 -> satisfiable by symfony/monolog-bundle[v2.8.0, ..., v2.12.1].
    [ ] - Root composer.json requires sensio/framework-extra-bundle ^6.2.6 -> satisfiable by sensio/framework-extra-bundle[v6.2.6].
    
    Conclusion: don't install > cdi

    [ ] - cdi  symfony/config[v3.3.6]           | install one of symfony/config[v5.0.11, ..., v5.4.3] (conflict analysis result)
    [ ] - cdi  symfony/config[v3.3.0]           | install one of symfony/config[v5.0.8, ..., v5.4.3] (conflict analysis result)
    [ ] - cdi  symfony/config[v3.3.18]          | install one of symfony/config[v5.2.11, ..., v5.4.3] (conflict analysis result)
    [ ] - cdi  symfony/config[v3.4.47]          | install symfony/config[v5.4.3] (conflict analysis result)
    [ ] - cdi  symfony/config[v3.4.9]           | install one of symfony/config[v5.2.12, v5.3.3, v5.3.14, v5.4.3] (conflict analysis result)
    
    one of symfony/config > oos/c    symfony/monolog-bundle > s/mb
    
    [ ] - cdi  oos/c [v5.2.8],  s/mb [v2.12.1] | install oos/c [v3.3.18, v3.4.9, v3.4.47] (conflict analysis result) 
    [ ] - cdi  oos/c [v5.0.11], s/mb [v2.12.1] | install oos/c [v3.3.18, v3.4.9, v3.4.47] (conflict analysis result)    - cdi  oos/c [v5.0.8], s/mb [v2.12.1] | install oos/c [v3.3.18, v3.4.9, v3.4.47] (conflict analysis result) 
    
    [ ] - cdi  oos/c [v5.3.3],  s/mb [v2.12.1] | install symfony/config[v3.4.47] (conflict analysis result)
    [ ] - cdi  oos/c [v5.3.14], s/mb [v2.12.1] | install symfony/config[v3.4.47] (conflict analysis result)
    [ ] - cdi  oos/c [v5.2.11], s/mb [v2.12.1] | install symfony/config[v3.4.47] (conflict analysis result)
    [ ] - cdi  oos/c [v5.2.12], s/mb [v2.12.1] | install symfony/config[v3.4.47] (conflict analysis result)

    [ ] - cdi  oos/c [v4.4.37], s/mb [v2.12.1] | install oos/c [v3.3.2, v3.3.18, v3.4.9, v3.4.47] (conflict analysis result)
    [ ] - cdi  oos/c [v4.4.23], s/mb [v2.12.1] | install oos/c [v3.3.2, v3.3.18, v3.4.9, v3.4.47] (conflict analysis result)
    [ ] - cdi  oos/c [v4.4.26], s/mb [v2.12.1] | install oos/c [v3.3.2, v3.3.18, v3.4.9, v3.4.47] (conflict analysis result)
    
    [ ] - cdi  oos/c [v5.4.3],  s/mb [v2.12.1]   (conflict analysis result)
    
    [ ] - Conclusion: install symfony/monolog-bundle v2.12.1 (conflict analysis result)
    [ ] - symfony/monolog-bundle[2.11.1, ..., v2.12.1] require symfony/config ~2.3|~3.0 -> satisfiable by symfony/config[v2.3.0, ..., v2.8.52, v3.0.0, ..., v3.4.47].
    [ ] - Only one of these can be installed: symfony/config[v2.3.0, ..., v2.8.52, v3.0.0, ..., v3.4.47, v4.0.0, ..., v4.4.37, v5.0.0, ..., v5.4.3, v6.0.0, v6.0.2, v6.0.3], symfony/symfony[v6.0.4]. symfony/symfony replaces symfony/config and thus cannot coexist with it.
    [ ] - sensio/framework-extra-bundle v6.2.6 requires symfony/config ^4.4|^5.0|^6.0 -> satisfiable by symfony/symfony[v6.0.4], symfony/config[v4.4.0, ..., v4.4.37, v5.0.0, ..., v5.4.3, v6.0.0, v6.0.2, v6.0.3].
    
    
    [ ]  - cdi  symfony/config[v3.3.2] | install one of symfony/config[v5.0.11, ..., v5.4.3] (conflict analysis result)


==
composer self-update:
PS C:\wamp64\www\clone> composer self-update
Upgrading to version 2.2.6 (stable channel).
Use composer self-update --rollback to return to version 2.0.9

==
[ok]Composer.json modified symfony 6 to 5.4.4 (Long term support )
that elimeted issues
remain (modifie le fichier composer.lock last version).
  Problem 1
    - doctrine/doctrine-bundle 
      is locked to version 1.10.3 and an update of this package was not requested.
    - doctrine/doctrine-bundle 1.10.3 requires php ^5.5.9|^7.0 -> your php version (8.1.2) does not satisfy that requirement.
  
  Problem 2
    - doctrine/orm 
      is locked to version 2.7.5 and an update of this package was not requested.
    - doctrine/orm 2.7.5 
      requires php ^7.1 -> your php version (8.1.2) does not satisfy that requirement.



///
Symfony Insigh 33/100  2.8days correction.

================================
[ok]Charger les dependencies.  composer install

- / - - / - - / - - / - - / - - / -
Problem: Mauvaise configuration de parametres parameters.yml

Incenteev\ParameterHandler\ScriptHandler::buildParameters
Updating the "app/config/parameters.yml" file
Script Incenteev\ParameterHandler\ScriptHandler::buildParameters handling the symfony-scripts event terminated with an exception


  [Symfony\Component\Yaml\Exception\ParseException]
  Unable to parse at line 1 (near "comp# This file is auto-generated during the composer install").  

[]Some parameters are missing. Please provide them.
    https://symfony.com/doc/4.1/service_container/parameters.html

    toujours d'actualite?
    >>> You are browsing the documentation for Symfony 4.1, which is no longer maintained.
    https://symfony.com/doc/current/configuration.html Symfony 6.0.4


Missing parameters: parameters.yml

database_host (127.0.0.1):
database_port (null): 
database_name (symfony): 
database_user (root): 
database_password (null): 
mailer_transport (smtp): 
mailer_host (127.0.0.1): 
mailer_user (null): 
mailer_password (null): 
secret (ThisTokenIsNotSoSecretChangeIt): 

- / - - / - - / - - / - - / - - / -
[]Faire un uptodate des bundles.

- / - - / - - / - - / - - / - - / -
[]Faire un test end to end manuel.

- / - - / - - / - - / - - / - - / -
[]Test du controller  DefaultControllerTest.php

- / - - / - - / - - / - - / - - / -
[]Mettre a jour Symfony et les bundles

- / - - / - - / - - / - - / - - / -
[]Lister et corriger les services depreciated.

================================
Versioning
Vérifiez la qualité ainsi que les performances de votre code à chaque commit.

================================
Réalisation du projet.

1- Implémentation de nouvelles fonctionnalités
    A/ Autorisation
    - Seuls les utilisateurs ayant le rôle administrateur (ROLE_ADMIN) doivent pouvoir accéder aux pages de gestion des utilisateurs.
    - Les tâches ne peuvent être supprimées que par les utilisateurs ayant créé les tâches en question.
    - Les tâches rattachées à l’utilisateur “anonyme” peuvent être supprimées uniquement par les utilisateurs ayant le rôle administrateur (ROLE_ADMIN).  
    
    B/ Tests automatisés avec PHPUnit
    - implémenter les tests automatisés (tests unitaires et fonctionnels) nécessaires 
        pour assurer que le fonctionnement de l’application est bien en adéquation 
        avec les demandes. 
    - Vous prévoirez des données de tests afin de pouvoir prouver le fonctionnement dans les cas explicités dans ce document.  

Il vous est demandé de fournir un rapport de couverture de code au terme du projet. Il faut que le taux de couverture soit supérieur à 70 %.


Audit de performance (Blackfire est obligatoire) https://www.blackfire.io/