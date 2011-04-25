<?php

use Common\Service\ProjectService;

class ProjectController extends Zend_Controller_Action
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
    	
    	$projectService = new ProjectService();
	    $form = new Common_Form_Project();

    	// Request is not a post, setup the view form.
    	if (!$request->isPost()) {
	    	$this->view->form = $form;
    	} else {
    		$data = $request->getParams();
    		if ($form->isValid($data)) {
    			$projectService->createProject($form->getValues());
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
    	$service = new ProjectService();

    	if (empty($params['id'])) {
    		$this->view->projects = $service->getAllProjects();
    	} else {
    		$user = $service->getUser($params['id']);
    	}
    }

    public function updateAction()
    {
    	
    }
    
    public function deleteAction()
    {
    	
    }
}

