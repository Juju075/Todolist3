

1-l’implémentation de nouvelles fonctionnalités ;
2-la correction de quelques anomalies ;
3-et l’implémentation de tests automatisés.

User < > Task
[X] Ajouter relation 1 0*
[X]Diagrame de class

Modifications

[] en entre déjà connecté defaultcontroller  index
[X] Logout 
[X] Login | 
[X] Create User (identique) - na pas enregistre le role par default
[X] Edit user - Anomalie twig corrige - Route method Post - get hass password

[X] Create Task (lié user).
[X] Toogle Task
[X] check all terminated tasks

[] Corriger les erreurs d'Annotations Assert
[] Pb annotation timestampable


[X] task delete |ne peuvent être supprimées que par les utilisateurs ayant créé cette tâche.
[] task delete (qui est anonyme?) | Les tâches li" a user “anonyme” seront supprimées uniquement par (ROLE_ADMIN).
[X] user create (choice type) | ROLE_USER - ROLE_ADMIN 
[90%] user edit | Lors de la modification d’un utilisateur, il est également possible de changer le rôle d’un utilisateur.
[X] (ou sont les pages de  gestion utilisateurs. )| Seuls (ROLE_ADMIN) pouront accéder aux pages de gestion des utilisateurs.
[90%] Fixtures users account and tasks (server test)

[] Form - fixe issue form checkbox
[X] Crud user ds Admin (reecriture name)
[X] Ajouter des titres de pages. <h1>
[90%] deleteTaskAction() CRUD de task ajouter un voter (author) event Redirection si false
[check] Ajouter eventsubscriber pour gerer les exeptions 403 Forbidden
Pages Admin
[X] /admin mettre template Index et List user Edit

[X]PhpmyAdmin latest
[]Xdebug

======================================
Tests:
[90%] UsersFixture.php | Pb addReference (pas de dump pour corriger)
[90%] TaskFixture.php | Pb getReference (pas de dump pour corriger)
[X]Load fixture environement test et update schema 
[] load test sur env=test ?

[compris] Entite - Model Assertion (Response)  
[compris] Controller - Model Assertion (Response) List -
[compris] Controller - Model Assertion (Form) Login - Create - Edit
======================================
[] Documentation Audit
[] Documentation technique concernant l’implémentation de l’authentification (fichier au format PDF)

:competences
Produire un rapport de l’exécution des tests
Analyser la qualité de code et la performance d’une application
Fournir des patchs correctifs lorsque les tests le suggèrent