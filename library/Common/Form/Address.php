<?php

class Common_Form_Address extends Zend_Form_SubForm
{
	public function init()
	{
		$address = new Zend_Form_Element_Text('address');
		$address->setLabel('Address')
			    ->addValidator('alnum', false, true);
			    
		$city = new Zend_Form_Element_Text('city');
		$city->setLabel('City')
			 ->addValidator('alnum', false, true);
		
		$county = new Zend_Form_Element_Text('county');
		$county->setLabel('County')
			   ->addValidator('alnum', false, true);
			    
	    $postcode = new Zend_Form_Element_Text('postcode');
		$postcode->setLabel('Post Code')
			     ->addValidator('alnum', false, true);
			     
		$elements = array($address, $city, $county, $postcode);
		$this->addElements($elements);
	}
}