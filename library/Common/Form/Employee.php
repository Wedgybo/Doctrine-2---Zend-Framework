<?php

class Common_Form_Employee extends Zend_Form
{
	public function init() 
	{
		$name = new Zend_Form_Element_Text('name');
		$name->setLabel('Employee Name')
			 ->addFilter('StringTrim')
			 ->addValidator('alnum', false, true)
			 ->setRequired(true);
		$this->addElement($name);
			 
		$age = new Zend_Form_Element_Text('age');
		$age->setLabel('Employee Age')
			->addFilter('StringTrim')
			->addValidator('int');
		$this->addElement($age);
		
		$address = new Common_Form_Address();
		$this->addSubForm($address, 'address');
		
		$manager = new Zend_Form_Element_Select('manager');
		$manager->setLabel('Managed By');
		$this->addElement($manager);
		
		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setLabel('Create Employee')
			   ->setIgnore(true);
		$this->addElement($submit);	
	}
}