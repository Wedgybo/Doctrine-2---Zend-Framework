<?php

namespace Common\Service;

use Common\Model\Employee;
use Common\Model\Manager;

use Common\Model;

class UserService extends AbstractService {

	public function createEmployee($data)
	{
		$employee = new Employee();
		$employee->setProperties($data);
		
		if(!is_null($data['manager'])) {
			$employee->setManager($this->getManager($data['manager']));
		}

		$this->_dm->persist($employee);
		$this->_dm->flush();
	}
	
	public function createManager($data)
	{
		$manager = new Manager();
		$manager->setProperties($data);
		
		$projects = array();
		$projectService = new ProjectService();
		
		if(is_array($data['projects'])) {
			foreach ($data['projects'] as $projectId) {
				$projects[] = $projectService->getProject($projectId);
			}
			$manager->setProjects($projects);
		}

		$this->_dm->persist($manager);
		$this->_dm->flush();
	}
	
	public function getUser($id) 
	{
		return $this->_dm->find('Common\Model\User', $id);
	}
	
	public function getAllUsers() 
	{
		return $this->_dm->getRepository('Common\Model\User')->findAll();
	}

	public function getEmployee($id) 
	{
		return $this->_dm->find('Common\Model\Employee', $id);
	}
	
	public function getAllEmployees() 
	{
		return $this->_dm->getRepository('Common\Model\Employee')->findAll();
	}
	
	public function getManager($id) 
	{
		return $this->_dm->find('Common\Model\Manager', $id);
	}
	
	public function getAllManagers() {
		return $this->_dm->getRepository('Common\Model\Manager')->findAll();
	}
	
	public function getAllManagersNames() {
		$results = array();
		$managers = $this->_dm->getRepository('Common\Model\Manager')->findAll(array(), array('id', 'name'));
		foreach ($managers as $manager) {
			$results[$manager->getId()] = $manager->getName();
		}
		return $results;
	}
	
	public function getAllUsersOver($age) {
		return $this->_dm->getRepository('Common\Model\User')->findAllUsersOlderThan($age);
	}
}