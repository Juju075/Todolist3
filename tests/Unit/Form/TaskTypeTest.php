<?php
declare(strict_types = 1);
namespace App\Tests\Form;

use App\Entity\Task;
use App\Form\TaskType;
use Symfony\Component\Form\Test\TypeTestCase;

class TaskTypeTest extends TypeTestCase
{
    public function testTaskType(): void
    {
        // $formData = array(
        //     'title' => 'ceci est le titre de test.',
        //     'content' => 'ceci est le contenu de test.',
        // );

        $formData = [
            'title' => 'ceci est le titre de test.',
            'content' => 'ceci est le contenu de test.',
        ];
        
        $model = new Task(); //Expected
        $form = $this->factory->create(TaskType::class, $model);

        $task = new Task();
        $task->setTitle($formData['title']);
        $task->setContent($formData['content']);

        $form->submit($formData);

        // This check ensures there are no transformation failures
        $this->assertTrue($form->isSynchronized());
        $this->assertEquals($task, $model);

        //verify the submission and mapping of the form.
        //Assertions    comparaison avec saisie formulaire.
        $this->assertEquals($task->getTitle(), $form->get('title')->getData());
        $this->assertEquals($task->getContent(), $form->get('content')->getData());
    }
    
    public function testCustomFormView()
    {
        //$formData = new Task();
        $formData = array(
            'title' => 'super titre de tache',
            'content' => 'blablabla',
        );

        $view = $this->factory->create(TaskType::class, $formData)->createView();
        $children = $view->children;

        //Documentation -         
        //$this->assertArrayHasKey('custom_var', $view->vars);
        //$this->assertSame('expected value', $view->vars['custom_var']);

        foreach (array_keys($formData) as $key) {
            $this->assertArrayHasKey($key, $children);
        }
    }

}
