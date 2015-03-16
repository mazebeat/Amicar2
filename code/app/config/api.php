<?php

/*
 | ------------------------------------------------------
 | Api Configurator
 | ------------------------------------------------------
 | Use this file to declare all api values to call later
 |
 */
return array(
	// ApiKey
	'apiKey'       => '',
	// MCrypt Class
	'mcrypt'       => array(
		'key' => 'amicarCotizantes',
		'iv'  => 'a1m2i3c4a5r6C7o8',
	),
	// Landing Setup
	'title'        => 'Amicar 2.0',
	'profiles'     => array(
		'administrator' => 'ADM',
		'public'        => 'PUB',
	),
	'testUsername' => 'Test User',
	'company'      => array(
		'name' => 'amicar',
		'url'  => 'http://www.amicar.cl'
	),
	'demo'         => true,
	'curlError'    => false,
	// Text Global
	'text'         => array(
		'cliente'    => 'cliente',
		'ejecutivo'  => 'ejecutivo',
		'cotizacion' => 'cotizacion'
	)
);