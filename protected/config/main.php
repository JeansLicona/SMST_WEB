<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'SMST',

        'language'=>'es',
        'theme'=>'blackboot',
        'defaultController' => 'Site/login',

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
			'password'=>'1234',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				array('api/loginTaxista', 'pattern'=>'api/login', 'verb'=>'POST'),
				array('api/requestTaxi', 'pattern'=>'api/requestTaxi', 'verb'=>'POST'),
				array('api/requestTaxiFromCompany', 'pattern'=>'api/requestTaxiFromCompany', 'verb'=>'POST'),
				array('api/acceptTaxi', 'pattern'=>'api/acceptTaxi', 'verb'=>'POST'),
				array('api/cancelTaxi', 'pattern'=>'api/cancelTaxi', 'verb'=>'POST'),
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>'
			),
		),

		// Uncomment to use as local
		// 'db'=>array(
		// 	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		// ),
		// uncomment the following to use a MySQL database
             // *
             // */

		'db'=>array(
			// Uncomment to use as local
			// 'connectionString' => 'mysql:host=localhost;dbname=smst',
			// 'emulatePrepare' => true,
			// 'username' => 'root',
			// 'password' => '',
			// 'charset' => 'utf8',

			// Comment before local use
			'connectionString' => 'mysql:host=localhost;dbname=cgc_odus',
			'emulatePrepare' => true,
			'username' => 'cgc_odus',
			'password' => '!@#odus',
			'charset' => 'utf8',
		),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				array(
			        'class'=>'CFileLogRoute',
			        'levels'=>'trace,log',
			        'categories' => 'system.db.CDbCommand',
			        'logFile' => 'db.log',
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
		'adminEmail'=>'andreeVela@gmail.com',
		'pdf_bin'=>'C:\Program Files\wkhtmltopdf\bin\wkhtmltopdf.exe',
	),
);