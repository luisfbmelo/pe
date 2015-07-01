<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'P.E - Projetos de Engenharia',

    'theme'=>'pe_temp',
    'language' => 'pt',
    'defaultController' => 'inicio',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'giiadmin',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
        'management' => array(
            'defaultController' => 'inicio',
        ),

	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
            'loginUrl'=>array('management/inicio/login'),
			'allowAutoLogin'=>true,
            'autoUpdateFlash' => false,
		),

        'cache'=>array(
            'class'=>'system.caching.CFileCache',
        ),
		// uncomment the following to enable URLs in path-format

		'urlManager'=>array(
			'urlFormat'=>'path',
            'showScriptName'=>false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database

		'db'=>array(
            		//ENTER DB CONFIG HERE
		),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'inicio/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'p.e@mail.telepac.pt',
        'hashSalt'=>'123',

        'pageIMG'=>'/images/logo_face.png',
        'globalIMG'=>'/images/logo_face.png',

        'pageTitle'=>'',

        'pageType'=>'global'

	),
);
