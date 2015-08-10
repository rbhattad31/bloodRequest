<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Blood Donation Application',
	// preloading 'log' component
	'preload'=>array('log'),
	'theme'=>'bradsol',
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
			'application.extentions.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'rohibhat',
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
			'sms' => array(
					'class'=>'ext.ClickatellSms.ClickatellSms',
					'clickatell_username'=>'abhibhattad',
					'clickatell_password'=>'BRAD',
					'clickatell_apikey'=>'http://reseller.bulksmshyderabad.co.in/api/smsapi.aspx',
			),
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
			// REST patterns
					
			array('api/modelList', 'pattern'=>'api/<model:\w+>', 'verb'=>'GET'),
			array('api/modelId', 'pattern'=>'api/<model:\w+>/<id:\d+>', 'verb'=>'GET'),
			array('api/lookupIdList', 'pattern'=>'lookupId/<name:\w+>/<id:\d+>', 'verb'=>'GET'),
			array('api/lookupValueList', 'pattern'=>'lookupValue/<value:\w+>', 'verb'=>'GET'),
			array('api/lookupTypeList', 'pattern'=>'lookupType/<id:\w+>', 'verb'=>'GET'),
			array('api/searchApi', 'pattern'=>'search/<type:\w+>', 'verb'=>'POST'),
			array('api/validateApi', 'pattern'=>'validate/<validate:\w+>', 'verb'=>'POST'),
			array('api/userDetails', 'pattern'=>'user/<property:\w+>/<id:\d+>', 'verb'=>'GET'),
			array('api/updateUser', 'pattern'=>'user/<property:\w+>/<id:\d+>', 'verb'=>'POST'),
			array('api/sendOTP', 'pattern'=>'sendOTP/<number:\d+>', 'verb'=>'POST'),
			array('api/sendPASSWORD', 'pattern'=>'sendPASSWORD/<mobilenumber:\d+>', 'verb'=>'POST'),
			array('api/delete', 'pattern'=>'api/<model:\w+>/<id:\d+>', 'verb'=>'DELETE'),
			array('api/create', 'pattern'=>'create/<model:\w+>', 'verb'=>'POST'),
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=bdonate',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		
		/*'db'=>array(
				'connectionString' => 'mysql:host=localhost;dbname=bradsol_bdapp',
				'emulatePrepare' => true,
				'username' => 'bradsol_bdapp',
				'password' => 'bdadmin',
				'charset' => 'utf8',
		),
		*/
		
		
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
		'adminEmail'=>'webmaster@example.com',
	),
);