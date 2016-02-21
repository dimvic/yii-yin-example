<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return [
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'My Web Application',

    // preloading 'log' component
    'preload' => ['log'],

    // autoloading model and component classes
    'import' => [
        'application.models.*',
        'application.components.*',
    ],

    'modules' => [
        'yiiyin' => [
            'route' => 'api',//expose the module at /api
            'resources' => [
                'Book' => [//exposed model
                    'type' => 'books',//exposed at api/books
                    'methods' => ['GET', 'POST', 'PATCH', 'DELETE'],//API methods supported for this model
                    'exposedRelationships' => [//all relations a client may access using the API
                        'book_i18ns' => 'book_i18ns',//relation name => API type (route)
                        'authors' => 'authors',
                        'publisher' => 'publishers',
                    ],
                    'defaultRelationships' => [//all relations a client may access using the API
                        'book_i18ns' => 'book_i18ns',//relation name => API type (route)
                        'authors' => 'authors',
                        'publisher' => 'publishers',
                    ],
                ],
                'BookI18n' => [
                    'type' => 'book_i18ns',
                    'methods' => ['GET', 'POST', 'PATCH'],
                ],
                'Author' => [
                    'type' => 'authors',
                    'methods' => ['GET', 'POST', 'PATCH'],
                ],
                'Publisher' => [
                    'type' => 'publishers',
                    'methods' => ['GET', 'POST', 'PATCH'],
                    'exposedRelationships' => ['representatives' => 'representatives'],
                    'defaultRelationships' => ['representatives' => 'representatives'],
                ],
                'Representative' => [
                    'type' => 'representatives',
                    'methods' => ['GET', 'POST', 'PATCH'],
                ],
            ],
        ],
        'gii' => [
            'class' => 'system.gii.GiiModule',
            'password' => 'password',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => ['*'],//array('127.0.0.1','::1'),
        ],
    ],

    // application components
    'components' => [

        'user' => [
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ],

        // uncomment the following to enable URLs in path-format
        'urlManager' => [
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => [
                ['class' => 'dimvic\\YiiYin\\ApiUrlRule'],

                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
        ],

        // database settings are configured in database.php
        'db' => require(dirname(__FILE__) . '/database.php'),

        'errorHandler' => [
            // use 'site/error' action to display errors
            'errorAction' => YII_DEBUG ? null : 'site/error',
        ],

        'log' => [
            'class' => 'CLogRouter',
            'routes' => [
                [
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ],
                // uncomment the following to show log messages on web pages
                /*
                array(
                    'class'=>'CWebLogRoute',
                ),
                */
            ],
        ],

    ],

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => [
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
    ],
];
