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
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            'apis-member' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    //'route'    => '/city[/:stateId][/:cityId][/]',
                    'route'    => '/apis/member',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Ajax',
                        'action'     => 'member',
                    ),
                ),
            ),
            'apis-plans-details' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    //'route'    => '/city[/:stateId][/:cityId][/]',
                    'route'    => '/apis/plan-details',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Ajax',
                        'action'     => 'planDetails',
                    ),
                ),
            ),
            'apis-plans-durations' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/apis/plan-durations',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Ajax',
                        'action'     => 'planDuration',
                    ),
                ),
            ),
            'apis-plans-installments' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/apis/plan-installments',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Ajax',
                        'action'     => 'planInstallment',
                    ),
                ),
            ),
            'apis-plans-ammounts' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/apis/plan-ammounts',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Ajax',
                        'action'     => 'planAmmount',
                    ),
                ),
            ),
            'apis-plans-ammounts-details' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/apis/plan-ammounts-details',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Ajax',
                        'action'     => 'planAmmountDetails',
                    ),
                ),
            ),
            'apis-fd-calculation' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/apis/fd-calculation',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Ajax',
                        'action'     => 'fdCalculation',
                    ),
                ),
            ),
            'apis-paln-calculation' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/apis/paln-calculation',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Ajax',
                        'action'     => 'palnCalculation',
                    ),
                ),
            ),
            'apis-investment-details' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/apis/investment-details',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Ajax',
                        'action'     => 'investmentDetails',
                    ),
                ),
            ),
            'city' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    //'route'    => '/city[/:stateId][/:cityId][/]',
                    'route'    => '/city',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Ajax',
                        'action'     => 'city',
                    ),
                ),
            ),
            'state' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/state',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Ajax',
                        'action'     => 'state',
                    ),
                ),
            ),
            'states' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/states',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Ajax',
                        'action'     => 'states',
                    ),
                ),
            ),
            'branch' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/branch[/]',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Ajax',
                        'action' => 'branch',
                    ),
                ),
            ),
			'apis-introducers' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/apis/introducers[/]',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Ajax',
                        'action' => 'introducers',
                    ),
                ),
            ),
			'apis-members' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/apis/members[/]',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Ajax',
                        'action' => 'members',
                    ),
                ),
            ),
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'application' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/application',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Index' => 'Application\Controller\IndexController',
            'Application\Controller\Member' => 'Application\Controller\MemberController',
            'Application\Controller\Policy' => 'Application\Controller\PolicyController',
            'Application\Controller\Ajax' => 'Application\Controller\AjaxController',
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);
