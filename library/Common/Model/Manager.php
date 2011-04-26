<?php

namespace Common\Model;

/** @Document */
class Manager extends User
{
	/** @ReferenceMany(targetDocument="Project") */
	private $projects = array();
	/**
	 * @return the $projects
	 */
	public function getProjects() {
		return $this->projects;
	}

	/**
	 * @param field_type $projects
	 */
	public function setProjects($projects) {
		$this->projects = $projects;
		return $this;
	}


}