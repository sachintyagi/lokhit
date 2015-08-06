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
