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
            'certificate' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/reports/certificate[/:id][/]',
                    'defaults' => array(
                        'controller' => 'Report\Controller\Print',
                        'action' => 'certificate',
                    ),
                ),
            ),
			'print-certificate' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/reports/print-certificate[/:id][/]',
                    'defaults' => array(
                        'controller' => 'Report\Controller\Print',
                        'action' => 'printCertificate',
                    ),
                ),
            ),
			'receipt' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/reports/receipt[/:id][/]',
                    'defaults' => array(
                        'controller' => 'Report\Controller\Print',
                        'action' => 'receipt',
                    ),
                ),
            ),
			'print-receipt' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/reports/print-receipt[/:id][/]',
                    'defaults' => array(
                        'controller' => 'Report\Controller\Print',
                        'action' => 'printReceipt',
                    ),
                ),
            ),
        ),
    ),
	
    'controllers' => array(
        'invokables' => array(
            'Report\Controller\Print' 		=> 'Report\Controller\PrintController'
        ),
    ),
	'view_manager' => array(
        'template_map' => array(
            'report/index/index' => __DIR__ . '/../view/report/index/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
