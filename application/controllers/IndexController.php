<?php


use Common\Model\Address;
use Common\Model\Manager;
use Common\Model\Employee;
use Common\Model\Project;
use Common\Model;


class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        /*$dm = $this->getFrontController()->getParam('bootstrap')->getResource('mongo');
        $this->view->mongo = "WTF";
		
        $employee = new Employee();
        $employee->setName('Jamie');
        $employee->setAge(28);
        
        $address = new Address();
        $address->setAddress('My House');
        $address->setCity('Edinburgh');
        $address->setCounty('West Lothian');
        $address->setPostcode('EHXX XXX');
        
        $employee->setAddress($address);
        
        $manager = new Manager();
        $manager->setName('Manager');
        $manager->setAge(99);
        
        $employee->setManager($manager);
        
        $project = new Project('Doctine Testing');
        $project1 = new Project('Doctine 2');
        $project2 = new Project('Rocks!!');
        
        $manager->addProject($project);
        $manager->addProject($project1);
        $manager->addProject($project2);
        
        
        $dm->persist($manager);
        $dm->persist($project);
        $dm->persist($project1);
        $dm->persist($project2);
        $dm->persist($employee);
        $dm->persist($address);
        
        $dm->flush();*/
        
    }


}

