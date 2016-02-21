<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return [
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',

	// preloading 'log' component
	'preload'=>['log'],

	// autoloading model and component classes
	'import'=>[
		'application.models.*',
		'application.components.*',
	],

	'modules'=>[
        'api'=>[
            'resources' => [
                'Book' => [
                    'type'=>'books',
                    'methods' => ['GET', 'POST', 'PATCH'],
                    'exposedRelations' => [
                        'book_i18ns'=>'book_i18ns',
                        'authors'=>'authors',
                        'publisher'=>'publishers',
                    ],
                    'defaultRelations' => [
                        'book_i18ns'=>'book_i18ns',
                        'authors'=>'authors',
                        'publisher'=>'publishers',
                    ],
                ],
                'BookI18n' => [
                    'type'=>'book_i18ns',
                    'methods' => ['GET', 'POST', 'PATCH'],
                ],
                'Author' => [
                    'type'=>'authors',
                    'methods' => ['GET', 'POST', 'PATCH'],
                ],
                'Publisher' => [
                    'type'=>'publishers',
                    'methods' => ['GET', 'POST', 'PATCH'],
                    'exposedRelations' => ['representatives'=>'representatives'],
                    'defaultRelations' => ['representatives'=>'representatives'],
                ],
                'Representative' => [
                    'type'=>'representatives',
                    'methods' => ['GET', 'POST', 'PATCH'],
                ],
            ],
        ],
		'gii'=>[
			'class'=>'system.gii.GiiModule',
			'password'=>'password',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>['*'],//array('127.0.0.1','::1'),
		],
	],

	// application components
	'components'=>[

		'user'=>[
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		],

		// uncomment the following to enable URLs in path-format
		'urlManager'=>[
			'urlFormat'=>'path',
            'showScriptName' => false,
            'rules'=>[
                ['class'=>'application.modules.api.components.ApiUrlRule'],
                'api/<route:.*>'=>'api/default/index',

				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			],
		],

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>[
			// use 'site/error' action to display errors
			'errorAction'=>YII_DEBUG ? null : 'site/error',
		],

		'log'=>[
			'class'=>'CLogRouter',
			'routes'=>[
				[
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
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
	'params'=>[
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	],
];
