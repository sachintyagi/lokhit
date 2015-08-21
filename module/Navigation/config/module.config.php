<?php

return array(
    'router' => array(
        'routes' => array(
            'menu-list' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/menus/menu-list[/]',
                    'defaults' => array(
                        'controller' => 'Navigation\Controller\Menu',
                        'action' => 'index',
                    ),
                ),
            ),
			'new-menu' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/menus/new-menu[/:id][/]',
                    'defaults' => array(
                        'controller' => 'Navigation\Controller\Menu',
                        'action' => 'add',
                    ),
                ),
            ),
        ),
    ),
	
    'controllers' => array(
        'invokables' => array(
            'Navigation\Controller\Menu'	=> 'Navigation\Controller\MenuController'
        ),
    ),
	
	'view_manager' => array(
        'template_map' => array(
            'navigation/menu/index' => __DIR__ . '/../view/navigation/menu/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
