<?php

use App\Util\Functions;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

Functions::setProperties();

//Memory
ini_set('memory_limit', '1024M');
ini_set('max_execution_time', '0');
ini_set('set_time_limit', '0');

//Iconv
if (PHP_VERSION_ID < 50600) {
	iconv_set_encoding('input_encoding', 'UTF-8');
	iconv_set_encoding('output_encoding', 'UTF-8');
	iconv_set_encoding('internal_encoding', 'UTF-8');
}
else {
	ini_set('default_charset', 'UTF-8');
}

if (Config::get('app.debug', false)) {
	//XDebug
	ini_set('xdebug.collect_vars', 'on');
	ini_set('xdebug.collect_params', '4');
	ini_set('xdebug.dump_globals', 'on');
	ini_set('xdebug.dump.SERVER', 'REQUEST_URI');

	//Errors
	error_reporting(E_ALL);
	ini_set('display_errors', true);
	ini_set('display_startup_errors', true);
}

Route::when('*', 'csrf', array(
	'post',
	'put',
	'delete'
));

Route::get('/', function () {

	var_dump(Config::get('config.app.debug'));
	var_dump(Config::get('config.app.url'));
	var_dump(Config::get('config.database.host'));
	var_dump(Config::get('config.database.dbname'));
	var_dump(Config::get('config.database.username'));
	var_dump(Config::get('config.database.password'));
	var_dump(Config::get('config.logs.path'));
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
