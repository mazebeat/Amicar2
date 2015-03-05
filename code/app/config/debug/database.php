<?php

return array(
	'debug'       => true,
	'connections' => array(
		'mysql'  => array(
			'read'      => array(
				'host' => 'webdes@192.168.1.86:22'
			),
			'write'     => array(
				'host' => 'webdes@192.168.1.86:22'
			),
			'driver'    => 'mysql',
			'database'  => 'amicar',
			'username'  => 'root',
			'password'  => 'inteladmin',
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
		),
		'sqlite' => array(
			'driver'   => 'sqlite',
			'database' => __DIR__ . '/../../database/production.sqlite',
			'prefix'   => 'gd_',
		),
	),
);
