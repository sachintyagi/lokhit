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
            'investors-list' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/investors[/]',
                    'defaults' => array(
                        'controller' => 'Investors\Controller\Investor',
                        'action'     => 'list',
                    ),
                ),
            ),
			'investors-new' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/investors/new[/:id][/]',
                    'defaults' => array(
                        'controller' => 'Investors\Controller\Investor',
                        'action'     => 'new',
                    ),
                ),
            ),
			'investors-new-installment' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/investors/new-installment[/:id][/]',
                    'defaults' => array(
                        'controller' => 'Investors\Controller\Installment',
                        'action'     => 'new',
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
            'Investors\Controller\Investor' => 'Investors\Controller\InvestorController',
            'Investors\Controller\Installment' => 'Investors\Controller\InstallmentController',
        ),
    ),
    'view_manager' => array(
        'template_map' => array(
            'investors/index/investor' => __DIR__ . '/../view/investors/investor/list.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
