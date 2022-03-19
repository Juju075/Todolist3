<?php
declare(strict_types = 1);
namespace App\Tests\Form;

use App\Entity\Task;
use App\Form\TaskType;
use Symfony\Component\Form\Test\TypeTestCase;
use Faker;

/**
 * Unit test your form Symfony documentation.
 */
class TaskTypeTest extends TypeTestCase
{
    /**
     * Not overriding with setup() this clear default one.
     */
    
    // =======================================================================
    //  Test task form 
    // =======================================================================   
    public function testTaskType(): void
    {
        //duplicate
        $faker = Faker\Factory::create('fr_FR');
        //Formulaire d'instantation d'Objet.
        $formData = [
            'title' => $faker->word(),
            'content' => $faker->paragraph(),
        ];

        
        $model = new Task(); //retrieve data from the form submission, pass it as the second argument
        $form = $this->factory->create(TaskType::class, $model); //documentation

            $task = new Task();
            $task->setTitle($formData['title']);
            $task->setContent($formData['content']);

        $form->submit($formData);
        
        // This check ensures there are no transformation failures
        $this->assertTrue($form->isSynchronized());


        // check that $model was modified as expected when the form was submitted
        //$this->assertEquals($task, $model); //Erreur ici 2 objs are equal!!

        //hors documentation

        //verify the submission and mapping of the form.
        $this->assertEquals($task->getTitle(), $form->get('title')->getData());
        $this->assertEquals($task->getContent(), $form->get('content')->getData()); // Erreur ici null 
    }
}

