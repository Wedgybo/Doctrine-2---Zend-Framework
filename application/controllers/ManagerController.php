<?php

use Common\Service\UserService;
use Common\Service\ProjectService;

class ManagerController extends Zend_Controller_Action
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
    	$userService = new UserService();
    	$projectService = new ProjectService();
    	$form = new Common_Form_Manager();
    	$projects = $projectService->getAllProjectsNames();
    	$form->projects->addMultiOptions($projects);
    	$this->view->form = $form;
    	
    	$request = $this->getRequest();
    	
    	$projectService = new ProjectService();
	    $form = new Common_Form_Manager();
	    $projects = $projectService->getAllProjectsNames();
    	$form->projects->addMultiOptions($projects);
    	// Request is not a post, setup the view form.
    	if (!$request->isPost()) {
	    	$this->view->form = $form;
    	} else {
    		$data = $request->getParams();
    		if ($form->isValid($data)) {
    			$userService->createManager($form->getValues());
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

