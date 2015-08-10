<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Employee;

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
				//Employee
				'Employee\Model\EmployeeTable' => function($sm) {
					$tableGateway = $sm->get('EmployeeTableGateway');
					$table = new \Employee\Model\EmployeeTable($tableGateway);
					return $table;
				},
				'EmployeeTableGateway' => function ($sm) {
					$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
					$resultSetPrototype = new ResultSet();
					$resultSetPrototype->setArrayObjectPrototype(new \Employee\Model\Employee());
					return new TableGateway('companies', $dbAdapter, null, $resultSetPrototype);
				},
				
				//EmployeeEducation
				'Employee\Model\EmployeeEducationTable' => function($sm) {
					$tableGateway = $sm->get('EmployeeEducationTableGateway');
					$table = new \Employee\Model\EmployeeEducationTable($tableGateway);
					return $table;
				},
				'EmployeeEducationTableGateway' => function ($sm) {
					$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
					$resultSetPrototype = new ResultSet();
					$resultSetPrototype->setArrayObjectPrototype(new \Employee\Model\EmployeeEducation());
					return new TableGateway('branches', $dbAdapter, null, $resultSetPrototype);
				},
				
				//EmployeeExperience
				'Employee\Model\EmployeeExperienceTable' => function($sm) {
					$tableGateway = $sm->get('EmployeeExperienceTableGateway');
					$table = new \Employee\Model\EmployeeExperienceTable($tableGateway);
					return $table;
				},
				'EmployeeExperienceTableGateway' => function ($sm) {
					$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
					$resultSetPrototype = new ResultSet();
					$resultSetPrototype->setArrayObjectPrototype(new \Employee\Model\EmployeeExperience());
					return new TableGateway('branches', $dbAdapter, null, $resultSetPrototype);
				},
			) 
        );
	}
}
