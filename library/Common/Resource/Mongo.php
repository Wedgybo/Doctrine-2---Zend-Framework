<?php

/**
 * 
 * Common resource for connecting to he Mongo Database
 * @author jsutherland
 *
 */

namespace Common\Resource;

use Doctrine\Common\ClassLoader,
    Doctrine\Common\Annotations\AnnotationReader,
    Doctrine\ODM\MongoDB\DocumentManager,
    Doctrine\MongoDB\Connection,
    Doctrine\ODM\MongoDB\Configuration,
    Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;
    
class Mongo 
    extends \Zend_Application_Resource_ResourceAbstract
{   
    /**
     * Initalizes a Doctrine ODM DocumentManager instance.
     *
     * @return \Doctrine\ODM\MongoDB\DocumentManager
     */
    public function init()
    {
		$config = new Configuration();
		$config->setProxyDir(__DIR__ . '/Cache');
		$config->setProxyNamespace('Proxies');
		
		$config->setHydratorDir(__DIR__ . '/Cache');
		$config->setHydratorNamespace('Hydrators');
		
		$reader = new AnnotationReader();
		$reader->setDefaultAnnotationNamespace('Doctrine\ODM\MongoDB\Mapping\\');
		$config->setMetadataDriverImpl(new AnnotationDriver($reader, __DIR__ . '/Documents'));
		
		$dm = DocumentManager::create(new Connection(), $config);
		\Zend_Registry::set('dm', $dm);
		return $dm;
    }
}