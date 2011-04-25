<?php

class Common_Form_Project extends Zend_Form
{
	public function init() 
	{
		$name = new Zend_Form_Element_Text('name');
		$name->setLabel('Project Name')
			 ->addFilter('StringTrim')
			 ->addValidator('alnum', false, true)
			 ->setRequired(true);
		$this->addElement($name);
		
		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setIgnore(true);
		$this->addElement($submit);
	}
}