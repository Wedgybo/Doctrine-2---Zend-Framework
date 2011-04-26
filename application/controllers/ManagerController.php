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
    	
    	$request = $this->getRequest();

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
    	$params = $this->getRequest()->getParams();
    	$service = new UserService();

    	if (empty($params['id'])) {
    		$this->view->managers = $service->getAllManagers();
    	} else {
    		$this->view->manager = $service->getUser($params['id']);
    	}
    }

    public function updateAction()
    {
    	
    }
    
    public function deleteAction()
    {
    	
    }
}

