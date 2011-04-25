<?php

use Common\Model\User;
use Common\Service\UserService;
use Common\Service;

class EmployeeController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function createAction()
    {
    	
    	$request = $this->getRequest();
    	
    	$userService = new UserService();
	    $form = new Common_Form_Employee();
	    $managers = $userService->getAllManagersNames();
	    $form->manager->addMultiOptions($managers);
    	// Request is not a post, setup the view form.
    	if (!$request->isPost()) {
	    	$this->view->form = $form;
    	} else {
    		$data = $request->getParams();
    		if ($form->isValid($data)) {
    			$userService->createEmployee($form->getValues());
    			return $this->_helper->redirector('index', 'index');
    		} else {
    			$this->view->form = $form;
    			return $this->render('create');
    		}
    	}
    }
    
    public function readAction()
    {
    	
    }

    public function updateAction()
    {
    	
    }
    
    public function deleteAction()
    {
    	
    }
}

