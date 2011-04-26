<?php

use Common\Model\User;
use Common\Service\UserService;
use Common\Service;

class UserController extends Zend_Controller_Action
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
    	
    }
    
    public function readAction()
    {
    	$params = $this->getRequest()->getParams();
    	$service = new UserService();

    	if (empty($params['id'])) {
    		$this->view->users = $service->getAllUsers();
    	} else {
    		$this->view->user = $service->getUser($params['id']);
    	}
    }

    public function updateAction()
    {
    	
    }
    
    public function deleteAction()
    {
    	
    }
}

