Fin de projet[Remain]

Traits OK
[X]- LoginAsAdmin()
[X]- LoginAsUser()

Tests validation progress:

1- AdminControllerTest (Webtastcase)

[X].testBackofficeAccessWithAdmin()
[X].testBackofficeAccessWithUser()
[50%].testCreateAction() pb:
[50%].testEditeAction() pb:

---

2- SecurityControllerTest (Webtastcase)

[X].testLoginUrlExist()
[X].testLoginWithUser()
[X].testLoginWithAdmin()
[90%].testLoginWithBadPassword()
[].testLogout()

---

3- TaskControllerTest (Webtastcase)

[X].testlistAction()
[X].testCreateActionWithAdmin()
[VOTER].testEditTaskAction() pb:
[VOTER].testDeleteTaskAction() pb:
[VOTER].testToggleTaskAction() pb:

---

4- FORMS (KerneltestCase)

a) TaskTypeTest

[90%].testTaskType()
[50%].testCustomFormView() pb:? custom_var

b) UserTypeTest

[90%].testSubmitValidData()
[50%].testCustomFormView() pb:? custom_var
