

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
[check] user edit | Lors de la modification d’un utilisateur, il est également possible de changer le rôle d’un utilisateur.
[a voir] (ou sont les pages de  gestion utilisateurs. )| Seuls (ROLE_ADMIN) pouront accéder aux pages de gestion des utilisateurs.