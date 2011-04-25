<?php

namespace Common\Model;

/** @Document */
class Employee extends User
{
	/** @ReferenceOne(targetDocument="Manager") */
	private $manager;

	
	public function setManager($manager) {
		//var_dump($manager);exit;
		if (is_array($manager)) {
			$manager = new Manager($manager);
		}
		$this->manager = $manager;
	}

	/**
	 * @return the $manager
	 */
	public function getManager() {
		return $this->manager;
	}
}