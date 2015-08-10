<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Company;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
	
	public function getServiceConfig() {
        return array(
			'factories' => array(
				//Company
				'Company\Model\CompanyTable' => function($sm) {
					$tableGateway = $sm->get('CompanyTableGateway');
					$table = new \Company\Model\CompanyTable($tableGateway);
					return $table;
				},
				'CompanyTableGateway' => function ($sm) {
					$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
					$resultSetPrototype = new ResultSet();
					$resultSetPrototype->setArrayObjectPrototype(new \Company\Model\Company());
					return new TableGateway('companies', $dbAdapter, null, $resultSetPrototype);
				},
				//Branch
				'Company\Model\BranchTable' => function($sm) {
					$tableGateway = $sm->get('BranchTableGateway');
					$table = new \Company\Model\BranchTable($tableGateway);
					return $table;
				},
				'BranchTableGateway' => function ($sm) {
					$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
					$resultSetPrototype = new ResultSet();
					$resultSetPrototype->setArrayObjectPrototype(new \Company\Model\Branch());
					return new TableGateway('branches', $dbAdapter, null, $resultSetPrototype);
				},
			)
        );
	}
}
