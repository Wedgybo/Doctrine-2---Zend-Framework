<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	protected function _initView()
	{
		// Initalise the view
		$view = new Zend_View();
		$view->doctype('HTML5');
		$view->headTitle('Doctrine 2 + MongoDB + Zend Framework Example');
		
		$viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('ViewRenderer');
		$viewRenderer->setView($view);
		
		return $view;
	}

}

