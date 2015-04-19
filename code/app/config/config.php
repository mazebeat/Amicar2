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

if (!File::exists(array_get($ini, 'logs.path'))) {
	File::makeDirectory($path = array_get($ini, 'logs.path'), (int)$mode = 777, (bool)$recursive = true, (bool)$force = true);
}

return $ini;