<?php

return array(
	'debug'       => true,
	'default'     => 'mysql2',
	'connections' => array(
		'mysql'  => array(
			'read'      => array(
				'host' => '192.168.1.99'
			),
			'write'     => array(
				'host' => '192.168.1.99'
			),
			'driver'    => 'mysql',
			'database'  => 'amicarcotizante2',
			'username'  => 'root',
			'password'  => 'inteladmin',
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
		),

		'mysql2' => array(
			'read'      => array(
				'host' => '127.0.0.1'
			),
			'write'     => array(
				'host' => '127.0.0.1'
			),
			'driver'    => 'mysql',
			'database'  => 'amicarcotizante2',
			'username'  => 'test',
			'password'  => 'test',
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
