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
	'apiKey'       => 'amicarCotizante2015',
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
	'company'      => array(
		'name' => 'Amicar',
		'url'  => 'http://www.amicar.cl'
	),
	'demo'         => false,
	'curlError'    => false,
	// Text Global
	'text'         => array(
		'cliente'    => 'Cliente',
		'ejecutivo'  => 'Ejecutivo',
		'cotizacion' => 'Cotizacion'
	)
);