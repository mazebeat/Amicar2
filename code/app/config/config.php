<?php

/*
 | ------------------------------------------------------
 | App Configurator
 | ------------------------------------------------------
 | Use this file to declare all api values to call later
 |
 */

$configFile = 'C:/apps/Amicar/config/cotizanteAmicar.ini';
$ini        = parse_ini_file($configFile, true);

if (array_get($ini, 'app.debug') === '1') {
	array_set($ini, 'app.debug', (bool)true);
	Config::set('app.debug', (bool)true);
}
else {
	array_set($ini, 'app.debug', (bool)false);
	Config::set('app.debug', (bool)false);
}

Config::set('app.url', array_get($ini, 'app.url'));

if (!File::exists(array_get($ini, 'logs.path'))) {
	File::makeDirectory($path = array_get($ini, 'logs.path'), (int)$mode = 777, (bool)$recursive = true, (bool)$force = true);
}

return $ini;