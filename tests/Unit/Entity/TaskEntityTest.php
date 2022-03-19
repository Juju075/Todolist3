<?php
declare(strict_types = 1); 
namespace App\Tests\Unit;

use App\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Validator\Constraint;


/**
 * Refactoriser.(découper le code plus claire donc + de tests.)
 */
class TaskEntityTest extends KernelTestCase
{

    private Task $task;

    public function getEntity(): Task
    {
        return $task = new Task();
        $task->setTitle('Ici titre');
        $task->setContent('Ici contenu');
    }

    //Assertion personnalisé. (Service validator)
    public function assertHasErrors(Task $task, int $number = 0)
    {
        //Demarre le kernel
        self::bootKernel();
        $error = self::$container->get('validator')->validate($task);

        //Assertion Validate()
        $this->assertCount($number, $error);
    }



    //On test les validateurs de l'entité. (Attributs constraints)
    public function testValidEntity(){
        $this->assertHasErrors($this->getEntity(), 0);
    }

    public function testInvalidEntity(){
        //Reafectation
        //$task = $this->getEntity()->setTitle('ti');

        //Test number
        $this->assertHasErrors($this->getEntity()->setTitle('ti'), 1);
        $this->assertHasErrors($this->getEntity()->setContent('co'), 1);

        //Test Blank
        $this->assertHasErrors($this->getEntity()->setTitle(''), 1);
        $this->assertHasErrors($this->getEntity()->setContent(''), 1);

        //Test d'unicité (besoin de fixture).
    }



    public function testSetters(){
        if (!$this->task) {
            // setCreatedAt / setTitle / setContent /
    
            //Instansation
            //Params func
            //Assertion
        }else{
            $this->assertContaints(0, $task, 'Run testValidEntity() First');
        }
    }

    public function testGetters(){

        //Si il ya une tache
        if (!$this->task) {
            //Params function return
            $get1 = $this->task->getId(); 
            $get2 = $this->task->getTitle(); 
            $get3 = $this->task->getContent(); 
            $get4 = $this->task->getCreatedAt(); 
            
            //Assertions
            $this->assertNotEmpty($get1); //expected not null & int 
            $this->assertContains($get2); //expected not null & string
            $this->assertContains($get3); //expected not null & string
            $this->assertContains($get4); //expected not null & datetime
        }else{
            $this->assertContaints(0, $task, 'Run testValidEntity() First');
            
        }
    }
}
