<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

ini_set('memory_limit', '1024M');
ini_set('max_execution_time', '0');
ini_set('set_time_limit', '0');

if (PHP_VERSION_ID < 50600) {
	iconv_set_encoding('input_encoding', 'UTF-8');
	iconv_set_encoding('output_encoding', 'UTF-8');
	iconv_set_encoding('internal_encoding', 'UTF-8');
}
else {
	ini_set('default_charset', 'UTF-8');
}

if (Config::get('app.debug')) {
	ini_set('xdebug.collect_vars', 'on');
	ini_set('xdebug.collect_params', '4');
	ini_set('xdebug.dump_globals', 'on');
	ini_set('xdebug.dump.SERVER', 'REQUEST_URI');

	error_reporting(E_ALL);
	ini_set('display_errors', true);
	ini_set('display_startup_errors', true);
}

Route::when('*', 'csrf', array('post', 'put', 'delete'));
Route::get('/', function () {
	//	dd(Proceso::find(1)->ejecutivo->local->nombreLocal);
	echo '<h3>Amicar Cotizante 2015 ' . Config::get('config.app.url') . '</h3>';
});
Route::group(array('after' => 'process'), function () {
	Route::get('thanks', function () {
		return View::make('landings.thanks');
	});
	Route::get('bye', function () {
		return View::make('landings.bye');
	});
	Route::resource('clientes', 'ClienteController');
	Route::resource('ejecutivos', 'EjecutivoController');
});
Route::group(array('before' => 'process'), function () {
	Route::get('Lectura', 'ServletController@readAmicar');
	Route::get('Amicar', 'ServletController@clickAmicar');
});