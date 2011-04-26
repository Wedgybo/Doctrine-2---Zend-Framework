<?php

namespace Common\Service;

use Common\Model\Project;

class ProjectService extends AbstractService {
	
	public function getProject($id) 
	{
		return $this->_dm->find('Common\Model\Project', $id);
	}
	
	public function getAllProjects() {
		return $this->_dm->getRepository('Common\Model\Project')->findAll();
	}
	
	public function getAllProjectsNames() {
		$results = array();
		$projects = $this->_dm->getRepository('Common\Model\Project')
							  ->findAll(array(), array('id', 'name'));
		foreach ($projects as $project) {
			$results[$project->getId()] = $project->getName();
		}
		return $results;
	}
	
	public function createProject($data) {
		$project = new Project($data);
		$this->_dm->persist($project);
		$this->_dm->flush();
	}
}