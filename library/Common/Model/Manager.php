<?php

namespace Common\Model;

/** @Document */
class Manager extends User
{
	/** @ReferenceMany(targetDocument="Project") */
	private $projects = array();

	public function addProject(Project $project) 
	{
		$this->projects[] = $project;
		return $this;
	}
}