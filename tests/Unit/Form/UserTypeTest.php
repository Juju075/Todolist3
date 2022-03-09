<?php
declare(strict_types = 1);
namespace App\Tests\Unit\Form;

use App\Entity\User;
use App\Form\UserType;

use Symfony\Component\Form\Test\TypeTestCase;


class UserTypeTest extends TypeTestCase
{
    public function testSubmitValidData(): void
    {
        //Custom variable
        $formData = array(
            'username' => 'username',
            'password' => ['first' => 'root', 'second' => 'root'],
            'email' => 'email ici',
            'roles' => 'NON' // choice 'NON' =>false for ['ROLE_USER']
        );

        $model = new User();
        $form = $this->factory->create(UserType::class, $model);

        //...populate $object properties with the data stored in $formData
        $user = new User();
        $user->setUsername($formData['username']);
        $user->setPassword($formData['password']); //['password']['first']
        $user->setEmail($formData['email']);
        $user->setRoles($formData['roles']);

        $form->submit($formData);

        //This check ensures there are no transformation failures
        $this->assertTrue($form->isSynchronized());
        $this->assertEquals($user, $model);

        // check that $model was modified as expected when the form was submitted
        //checks if all the fields are correctly specified:

        //Assertions aditionnel.
        $this->assertSame($user->getUsername(), $form->get('username')->getData());
        $this->assertSame($user->getPassword(), $form->get('password')->getData());
        $this->assertSame($user->getEmail(), $form->get('email')->getData());
        $this->assertSame($user->getRoles(), $form->get('roles')->getData());
    }


   public function testCustomFormView(){
    //$formData = new User();

        // $formData = array(
        //     'username' => 'bob',
        //     'password' => ['first' => 'root', 'second' => 'root'],
        //     'email' => 'email@email.fr',
        //     'roles' =>  'NON' // ['ROLE_USER']
        // );

        $formData = [
            'username' => 'bob',
            'password' => ['first' => 'root', 'second' => 'root'],
            'email' => 'email@email.fr',
            'roles' =>  'NON' // ['ROLE_USER']            
        ];

       // The initial data may be used to compute custom view variables
       // $view = $this->factory->create(TestedType::class, $formData)
       // ->createView();


       //$view->vars    
       $view = $this->factory->create(UserType::class, $formData)->createView(); //$form ? $this->factory->create(TestedType::class, $formData)
       $children = $view->children; //Symfony\Component\Form\FormView::$children

       //check that a custom variable exists and will be available in your form themes:
       // dans la view $view    
       // $this->assertArrayHasKey('custom_var', $view->vars);

       foreach (array_keys($formData) as $key) {
           $this->assertArrayHasKey($key, $children);
       }

       // $this->assertSame('expected value', $view->vars['custom_var']);
   }
}

