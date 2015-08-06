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
            'members' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/members[/]',
                    'defaults' => array(
                        'controller' => 'Members\Controller\Member',
                        'action'     => 'list',
                    ),
                ),
            ),
			'members-new' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/members/new[/:id][/]',
                    'defaults' => array(
                        'controller' => 'Members\Controller\Member',
                        'action'     => 'new',
                    ),
                ),
            ),
			'members-delete' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/members/delete[/:id][/]',
                    'defaults' => array(
                        'controller' => 'Members\Controller\Member',
                        'action'     => 'delete',
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
            'Members\Controller\Member' => 'Members\Controller\MemberController',
        ),
    ),
    'view_manager' => array(
        'template_map' => array(
            'members/member/list' => __DIR__ . '/../view/members/member/list.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
