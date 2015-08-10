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
            'company-list' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/company-list[/]',
                    'defaults' => array(
                        'controller' => 'Company\Controller\Index',
                        'action' => 'index',
                    ),
                ),
            ),
			'new-company' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/new-company[/:companyid][/]',
                    'defaults' => array(
                        'controller' => 'Company\Controller\Index',
                        'action' => 'add',
                    ),
                ),
            ),
			'delete-company' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/delete-company[/:companyid][/]',
                    'defaults' => array(
                        'controller' => 'Company\Controller\Index',
                        'action' => 'delete',
                    ),
                ),
            ),
			'branch-list' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/branch-list[/]',
                    'defaults' => array(
                        'controller' => 'Company\Controller\Branch',
                        'action' => 'index',
                    ),
                ),
            ),
			'new-branch' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/new-branch[/:branchid][/]',
                    'defaults' => array(
                        'controller' => 'Company\Controller\Branch',
                        'action' => 'add',
                    ),
                ),
            ),
			'delete-branch' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/delete-branch[/:branchid][/]',
                    'defaults' => array(
                        'controller' => 'Company\Controller\Branch',
                        'action' => 'delete',
                    ),
                ),
            ),
        ),
    ),
	
    'controllers' => array(
        'invokables' => array(
            'Company\Controller\Index' 		=> 'Company\Controller\IndexController',
            'Company\Controller\Branch' 	=> 'Company\Controller\BranchController',
        ),
    ),
	'view_manager' => array(
        'template_map' => array(
            'company/index/index' => __DIR__ . '/../view/company/index/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
