Fin de projet[Remain]

[]Nouveau repository github Todolist3

Traits OK
[X]- LoginAsAdmin()
[X]- LoginAsUser()
[OK tous changer] Correction Traits -> public static function()

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
[] tooogle en simple url de la

---

4- FORMS (KerneltestCase)

a) TaskTypeTest
[X].testTaskType()

b) UserTypeTest
[X].testSubmitValidData()

[]BlackFire - Analyse de performance.
