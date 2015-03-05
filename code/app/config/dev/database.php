<?php

return array(
	'debug'       => true,
	'connections' => array(
		'mysql'  => array(
			'read'      => array(
				'host' => '192.168.1.99'
			),
			'write'     => array(
				'host' => '192.168.1.99'
			),
			'driver'    => 'mysql',
			'database'  => 'amicarcotizante',
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
