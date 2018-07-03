<?php
namespace SendGridTransport;

use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'controllers' => [
        'factories' => [
            Controller\SendEmailController::class => Controller\Factory\SendEmailControllerFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'send-grid-transport' => [
                'type'    => 'Literal',
                'options' => [
                    'route'    => '/send-grid-email',
                    'defaults' => [
                        'controller'    => Controller\SendEmailController::class,
                        'action'        => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                ],
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'SendGridTransport' => __DIR__ . '/../view',
        ],
    ],
    'service_manager' => [
        'factories' => [
            Mail\Transport\SendGridTransport::class => Mail\Transport\Factory\SendGridFactory::class
        ],
    ],

];
