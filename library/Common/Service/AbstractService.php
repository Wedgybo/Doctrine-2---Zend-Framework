<?php

namespace Common\Service;

abstract class AbstractService
{
	protected $_dm;
	
	public function __construct() 
	{
		$this->_dm = \Zend_Registry::get('dm');
	}
}