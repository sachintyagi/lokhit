<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array(
        'routes' => array(
            'employee-list' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/employee-list[/]',
                    'defaults' => array(
                        'controller' => 'Employee\Controller\Index',
                        'action' => 'index',
                    ),
                ),
            ),
			'new-employee' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/new-employee[/]',
                    'defaults' => array(
                        'controller' => 'Employee\Controller\Index',
                        'action' => 'add',
                    ),
                ),
            ),
			'roles' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/employee/roles[/]',
                    'defaults' => array(
                        'controller' => 'Employee\Controller\Role',
                        'action' => 'index',
                    ),
                ),
            ),
			'new-role' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/employee/new-role[/]',
                    'defaults' => array(
                        'controller' => 'Employee\Controller\Role',
                        'action' => 'add',
                    ),
                ),
            ),
        ),
    ),
	
    'controllers' => array(
        'invokables' => array(
            'Employee\Controller\Index' 	=> 'Employee\Controller\IndexController',
            'Employee\Controller\Role' 		=> 'Employee\Controller\RoleController',
        ),
    ),
	'view_manager' => array(
        'template_map' => array(
            'employee/index/index' => __DIR__ . '/../view/employee/index/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
