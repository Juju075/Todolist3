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
[90%].testLoginWithBadPassword()
[90%].testLogout() redirection uniquement

---

3- TaskControllerTest (Webtastcase)

[X].testlistAction()
[X].testCreateActionWithAdmin()
[VOTER].testEditTaskAction() pb:
[VOTER].testDeleteTaskAction() pb:
[VOTER].testToggleTaskAction() pb:
[20%] tooogle en simple url de la

---

4- FORMS (KerneltestCase)

a) TaskTypeTest
[X].testTaskType()

b) UserTypeTest
[X].testSubmitValidData()

---

[]BlackFire - Analyse de performance.

To start using Blackfire, we are going to install the following:

-A language extension;
-An agent to communicate with Blackfire's servers;
-A profiling client (a browser extension or a CLI tool).

https://curl.se/download.html