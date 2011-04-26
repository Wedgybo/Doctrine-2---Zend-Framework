<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	protected function _initView()
	{
		// Initalise the view
		$view = new Zend_View();
		$view->doctype('HTML5');
		$view->headTitle('Doctrine 2 + MongoDB + Zend Framework Example');
		
		// Required so that we can pass our doctrine models to the partials without
		// having to set the object key to object constantly.
		$view->partial()->setObjectKey('object');
		$view->partialLoop()->setObjectKey('object');
		
		$viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('ViewRenderer');
		$viewRenderer->setView($view);
		
		return $view;
	}

}

