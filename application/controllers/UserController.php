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
    	//var_dump($params);exit;
    	if (empty($params['id'])) {
    		$this->view->users = $service->getAllEmployees();
    		$this->view->managers = $service->getAllManagers();
    		$this->view->oldies = $service->getAllUsersOver(23);
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

