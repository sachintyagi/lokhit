<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module
{
	protected $whitelist = array(
		'login',
		'logout',
    );
	
    public function onBootstrap(MvcEvent $e)
    {
		$app = $e->getApplication();
		$eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);		
		$app->getEventManager()->attach(\Zend\Mvc\MvcEvent::EVENT_ROUTE, array($this, 'isLogedIn'));
    }
	
	public function isLogedIn($e) {
		$app = $e->getApplication();
        $sm  = $app->getServiceManager();
        $allowedRoutes = $this->whitelist;
        $auth = $sm->get('AuthService');
        $routeMatch = $e->getRouteMatch();
		$routeName = $routeMatch->getMatchedRouteName();
		$sm->get('ViewHelperManager')->get('HeadTitle')->set('Lokhit: '.$routeName);
		if (!$auth->hasIdentity() && !in_array($routeName,$allowedRoutes))
		{
			$response = $e->getResponse();
			$response->getHeaders()->addHeaderLine(
					'Location',
					$e->getRouter()->assemble(
							array(),
							array('name' => 'login')
					)
			);
			$response->setStatusCode(302);
			return $response;
		}
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
    
    public function getViewHelperConfig()
    {
        return array(
            'factories' => array(
                'ageinyears' => function($sm) {
                    $helper = new View\Helper\AgeInYears();
                    return $helper;
                }
            )
        );   
   }
	
	public function getServiceConfig() {
        return array(
            'factories' => array(
                'Application\Model\CompanyTable' => function($sm) {
                    $tableGateway = $sm->get('ApplicationTableGateway');
                    $table = new \Application\Model\CompanyTable($tableGateway);
                    return $table;
                },
                'ApplicationTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new \Application\Model\Company());
                    return new TableGateway('companies', $dbAdapter, null, $resultSetPrototype);
                },
                //Branch
                'Application\Model\BranchsTable' => function($sm) {
                    $tableGateway = $sm->get('BranchsTableGateway');
                    $table = new \Application\Model\BranchsTable($tableGateway);
                    return $table;
                },
                'BranchsTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new \Application\Model\Branchs());
                    return new TableGateway('branches', $dbAdapter, null, $resultSetPrototype);
                },
				
				//Members
                'Application\Model\MemberTable' => function($sm) {
                    $tableGateway = $sm->get('MemberTableGateway');
                    $table = new \Application\Model\MemberTable($tableGateway);
                    return $table;
                },
                'MemberTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new \Application\Model\Member());
                    return new TableGateway('members', $dbAdapter, null, $resultSetPrototype);
                },
				'Application\Model\MemberInvestmentsTable' => function($sm) {
                    $tableGateway = $sm->get('MemberInvestmentsTableGateway');
                    $table = new \Application\Model\MemberInvestmentsTable($tableGateway);
                    return $table;
                },
                'MemberInvestmentsTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new \Application\Model\MemberInvestments());
                    return new TableGateway('member_investments', $dbAdapter, null, $resultSetPrototype);
                },
				'Application\Model\MemberInstallmentsTable' => function($sm) {
                    $tableGateway = $sm->get('MemberInstallmentsTableGateway');
                    $table = new \Application\Model\MemberInstallmentsTable($tableGateway);
                    return $table;
                },
                'MemberInstallmentsTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new \Application\Model\MemberInstallments());
                    return new TableGateway('member_installments', $dbAdapter, null, $resultSetPrototype);
                },
				
				//Address
				'Application\Model\CityTable' => function($sm) {
                    $tableGateway = $sm->get('CityTableGateway');
                    $table = new \Application\Model\CityTable($tableGateway);
                    return $table;
                },
                'CityTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new \Application\Model\City());
                    return new TableGateway('cities', $dbAdapter, null, $resultSetPrototype);
                },
				
				'Application\Model\StateTable' => function($sm) {
                    $tableGateway = $sm->get('StateTableGateway');
                    $table = new \Application\Model\StateTable($tableGateway);
                    return $table;
                },
                'StateTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new \Application\Model\State());
                    return new TableGateway('states', $dbAdapter, null, $resultSetPrototype);
                },
				'Application\Model\CountryTable' => function($sm) {
                    $tableGateway = $sm->get('CountryTableGateway');
                    $table = new \Application\Model\CountryTable($tableGateway);
                    return $table;
                },
                'CountryTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new \Application\Model\Country());
                    return new TableGateway('countries', $dbAdapter, null, $resultSetPrototype);
                },
				
				//Palns
				'Application\Model\PlansTable' => function($sm) {
                    $tableGateway = $sm->get('PlansTableGateway');
                    $table = new \Application\Model\PlansTable($tableGateway);
                    return $table;
                },
                'PlansTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new \Application\Model\Plans());
                    return new TableGateway('plans', $dbAdapter, null, $resultSetPrototype);
                },	
				'Application\Model\PlansDetailsTable' => function($sm) {
                    $tableGateway = $sm->get('PlansDetailsTableGateway');
                    $table = new \Application\Model\PlansDetailsTable($tableGateway);
                    return $table;
                },
                'PlansDetailsTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new \Application\Model\PlansDetails());
                    return new TableGateway('plans_details', $dbAdapter, null, $resultSetPrototype);
                },	
				'Application\Model\PlanFormulaTestTable' => function($sm) {
                    $tableGateway = $sm->get('PlanFormulaTestTableGateway');
                    $table = new \Application\Model\PlanFormulaTestTable($tableGateway);
                    return $table;
                },
                'PlanFormulaTestTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new \Application\Model\PlanFormulaTest());
                    return new TableGateway('plan_formula_test', $dbAdapter, null, $resultSetPrototype);
                },	
				'Application\Model\PlanInstallmentsTable' => function($sm) {
                    $tableGateway = $sm->get('PlanInstallmentsTableGateway');
                    $table = new \Application\Model\PlanInstallmentsTable($tableGateway);
                    return $table;
                },
                'PlanInstallmentsTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new \Application\Model\PlanInstallments());
                    return new TableGateway('plan_installments', $dbAdapter, null, $resultSetPrototype);
                },
				//Temp Tables
				
				
				'Application\Model\TempRdPlanTable' => function($sm) {
                    $tableGateway = $sm->get('TempRdPlanTableGateway');
                    $table = new \Application\Model\TempRdPlanTable($tableGateway);
                    return $table;
                },
                'TempRdPlanTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new \Application\Model\TempRdPlan());
                    return new TableGateway('temp_rd_plan', $dbAdapter, null, $resultSetPrototype);
                },
				
				'Application\Model\TempDdsPlanTable' => function($sm) {
                    $tableGateway = $sm->get('TempDdsPlanTableGateway');
                    $table = new \Application\Model\TempDdsPlanTable($tableGateway);
                    return $table;
                },
                'TempDdsPlanTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new \Application\Model\TempDdsPlan());
                    return new TableGateway('temp_dds_plan', $dbAdapter, null, $resultSetPrototype);
                },
				
				'Application\Model\TempMisPlanTable' => function($sm) {
                    $tableGateway = $sm->get('TempMisPlanTableGateway');
                    $table = new \Application\Model\TempMisPlanTable($tableGateway);
                    return $table;
                },
                'TempMisPlanTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new \Application\Model\TempMisPlan());
                    return new TableGateway('temp_mis_plan', $dbAdapter, null, $resultSetPrototype);
                },
				
				'Application\Model\TempFdPlanTable' => function($sm) {
                    $tableGateway = $sm->get('TempFdPlanTableGateway');
                    $table = new \Application\Model\TempFdPlanTable($tableGateway);
                    return $table;
                },
                'TempFdPlanTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new \Application\Model\TempFdPlan());
                    return new TableGateway('temp_fd_plan', $dbAdapter, null, $resultSetPrototype);
                },
				
				/// Role TableGateway
				'Application\Model\RoleTable' => function($sm) {
                    $tableGateway = $sm->get('RoleTableGateway');
                    $table = new \Application\Model\RoleTable($tableGateway);
                    return $table;
                },
                'RoleTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new \Application\Model\Role());
                    return new TableGateway('roles', $dbAdapter, null, $resultSetPrototype);
                },
				
				//Employee
				'Application\Model\EmployeeTable' => function($sm) {
					$tableGateway = $sm->get('EmployeeTableGateway');
					$table = new \Application\Model\EmployeeTable($tableGateway);
					return $table;
				},
				'EmployeeTableGateway' => function ($sm) {
					$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
					$resultSetPrototype = new ResultSet();
					$resultSetPrototype->setArrayObjectPrototype(new \Application\Model\Employee());
					return new TableGateway('employees', $dbAdapter, null, $resultSetPrototype);
				},
				
				//EmployeeEducation
				'Application\Model\EmployeeEducationTable' => function($sm) {
					$tableGateway = $sm->get('EmployeeEducationTableGateway');
					$table = new \Application\Model\EmployeeEducationTable($tableGateway);
					return $table;
				},
				'EmployeeEducationTableGateway' => function ($sm) {
					$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
					$resultSetPrototype = new ResultSet();
					$resultSetPrototype->setArrayObjectPrototype(new \Application\Model\EmployeeEducation());
					return new TableGateway('employee_educations', $dbAdapter, null, $resultSetPrototype);
				},
				
				//EmployeeExperience
				'Application\Model\EmployeeExperienceTable' => function($sm) {
					$tableGateway = $sm->get('EmployeeExperienceTableGateway');
					$table = new \Application\Model\EmployeeExperienceTable($tableGateway);
					return $table;
				},
				'EmployeeExperienceTableGateway' => function ($sm) {
					$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
					$resultSetPrototype = new ResultSet();
					$resultSetPrototype->setArrayObjectPrototype(new \Application\Model\EmployeeExperience());
					return new TableGateway('employee_experiences', $dbAdapter, null, $resultSetPrototype);
				},
				
			)
		);
	}
}
