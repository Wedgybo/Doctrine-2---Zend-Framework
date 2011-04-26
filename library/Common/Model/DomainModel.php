<?php

namespace Common\Model;

/**
 * 
 * Base level for all models so we can supply a common set
 * of functionality to all models we create.
 * 
 * @author jsutherland
 *
 */
abstract class DomainModel
{
	const INVALID_PROPERTY = 'Invalid property';
	const INVALID_VALUE = 'Invalid value for property';
	
	public function __construct($data = array())
	{
		if(!empty($data)) {
			$this->setProperties($data);
		}
	}
	
	/**
	 * 
	 * Takes an array of data and attempts to set all the properties
	 * of this model with the data supplied.
	 * 
	 * @param array $properties
	 */
	public function setProperties(array $properties) 
	{
		if (is_array($properties)) {
			foreach ($properties as $property => $value) {
				$this->__set($property, $value);
			}
		}
	}
	
	/**
	 * 
	 * Gets the properties of this model
	 * @param string $name
	 * @throws Zend_Exception
	 */
	public function __get($name) 
	{
		
		$method = 'get' . ucfirst(trim($name, '_'));
		
		if (method_exists($this, $method)) {
			return $this->$method();
		} else {
			throw new \Exception(self::INVALID_PROPERTY);
		}
	}
	
	/**
	 * 
	 * Sets the properties of this model
	 * @param string $name
	 * @param mixed $value
	 */
	public function __set($name, $value) 
	{
		$method = 'set' . ucfirst(trim($name, '_'));
		
		if(method_exists($this, $method)) {
			return $this->$method($value);
		} else {
			throw new \Exception(self::INVALID_PROPERTY);
		}
	}
}