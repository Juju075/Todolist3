vendor/bin/phpunit --coverage-html web/test-coverage --colors -v –testdox

Fin de projet[Remain]

[X]Nouveau https://github.com/Juju075/Todolist3

---

Traits OK
[X]- LoginAsAdmin()
[X]- LoginAsUser()

Class static functions
[X] Correction Traits -> public static function()

Tests validation progress:

1- AdminControllerTest (Webtastcase)

[X].testBackofficeAccessWithAdmin()
[X].testBackofficeAccessWithUser()
[X].testCreateAction() pb:
[X].testEditeAction() pb:

---

2- SecurityControllerTest (Webtastcase)

[X].testLoginUrlExist()
[X].testLoginWithUser()  
[X].testLoginWithAdmin()
[X].testLoginWithBadPassword()
[90%].testLogout() en Failure rapport ....

---

3- TaskControllerTest (Webtastcase)

[X].testlistAction()
[X].testCreateActionWithAdmin() en Failure rapport ....
[].testEditTaskAction() pb: en Failure rapport .... voter fonctionne
[].testDeleteTaskAction() pb: en Failure rapport .... voter fonctionne
[X].testToggleTaskAction() pb: en Failure rapport .... voter fonctionne
[20%] tooogle en simple url de la

---

4- FORMS (KerneltestCase)

a) TaskTypeTest
[X].testTaskType()

b) UserTypeTest
[X].testSubmitValidData()

---

Livrable standard +

============
1-L’ensemble des fichiers HTML générés par PHPUnit indiquant le niveau de code coverage de l’application (un minimum de 70 %)

PHP Unit Coverage
https://www.lambdatest.com/blog/phpunit-code-coverage-report-html/
vendor\bin\phpunit --coverage-html <directory> indicates that ‘code coverage driver is available’.
Xdebug (Debugger for PHP)
PCOV (code coverage driver for PHP)

Generer le rapport de couverture de code:
vendor/bin/phpunit --coverage-html web/test-coverage

# php bin/phpunit --coverage-html var/log/test/test-coverage

# 2-Document expliquant comment contribuer au projet (fichier markdown “.md”)

# 3-Le rapport d’audit de qualité de code et de performance (fichier au format PDF)

---

[]BlackFire - Analyse de performance.

To start using Blackfire, we are going to install the following:

-A language extension;
-An agent to communicate with Blackfire's servers;
-A profiling client (a browser extension or a CLI tool).

https://curl.se/download.html

---

Documentation technique.
produire une documentation expliquant comment l’implémentation de l'authentification a été faite.

Cette documentation se destine aux prochains développeurs juniors qui rejoindront l’équipe dans quelques semaines.

-comprendre quel(s) fichier(s) il faut modifier et pourquoi ;
-comment s’opère l’authentification ;
-où sont stockés les utilisateurs.

---

Concernant l’audit de performance, l’usage de Blackfire est obligatoire
Audit de qualité/performance de l'app:

produire un audit de code sur les deux axes suivants :
la qualité de code et la performance.
