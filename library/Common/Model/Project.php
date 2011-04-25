<?php

namespace Common\Model;

/** 
 * 	@Document(collection="projects", repositoryClass="Common\Repository\ProjectRepository")
 */
class Project extends DomainModel 
{
	
	/** @Id */
	private $id;
	
	/** @String */
	private $name;
	
	public function __construct($name)
	{
		$this->name = $name;
	}
	/**
	 * @return the $id
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return the $name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param field_type $id
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * @param field_type $name
	 */
	public function setName($name) {
		$this->name = $name;
	}

}