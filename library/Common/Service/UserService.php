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
		
		//var_dump($employee);exit;
		$this->_dm->persist($employee);
		$this->_dm->flush();
	}
	
	public function createManager($data)
	{
		$manager = new Manager();
		$manager->setProperties($data);
		if(!is_null($data['project'])) {
			$manager->setProject($this->getProject($data['project']));
		}
		
		//var_dump($employee);exit;
		$this->_dm->persist($manager);
		$this->_dm->flush();
	}
	
	public function getManager($id) 
	{
		return $this->_dm->getRepository('Common\Model\Manager')->find(array('id' => $id));
	}
	
	public function getAllEmployees() {
		return $this->_dm->getRepository('Common\Model\Employee')->findAll();
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
	public function getUser($id) {
		
	}
}