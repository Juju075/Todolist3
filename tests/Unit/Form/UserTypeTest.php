<?php
declare(strict_types = 1);
namespace App\Tests\Unit\Form;

use App\Entity\User;
use App\Form\UserType;

use Symfony\Component\Form\Test\TypeTestCase;
use Faker;


class UserTypeTest extends TypeTestCase
{
    private $faker;
    
    public function setUp(): void
    {
        parent::setUp();
        $this->faker = Faker\Factory::create('fr_FR');
    }


    // =======================================================================
    // Tests Home Page + variations. Validé
    // =======================================================================
    // 1 - Expected: 200     
    public function testSubmitValidData(): void
    {
        //Rempli le formulaire.
        $formData = array(
            'username' => $this->faker->name(),
            'password' => ['first' => 'identique', 'second' => 'identique'],
            'email' => $this->faker->freeEmail(),
            'roles' => ['ROLE_USER']
        );

        $model = new User();
        $form = $this->factory->create(UserType::class, $model);

        //...populate the new object.
        $user = new User();
        $user->setUsername($formData['username']);
        $user->setPassword($formData['password']['first']);
        $user->setEmail($formData['email']);

        $user->setRoles($formData['roles']);

        $form->submit($formData); //Persist flush.

        //This check ensures there are no transformation failures
        $this->assertTrue($form->isSynchronized());
        //$this->assertEquals($user, $model);

        // check that $model was modified as expected when the form was submitted
        //checks if all the fields are correctly specified:

        //Assertions aditionnel. on espere que les getters correspondent aux données envoye.
        $this->assertSame($user->getUsername(), $form->get('username')->getData());
        $this->assertSame($user->getPassword(), $form->get('password')->getData());
        $this->assertSame($user->getEmail(), $form->get('email')->getData());

        // 'roles' => ['ROLE_USER']
        //$this->assertSame($user->getRoles(), $form->get('roles')->getData());
    }

}


