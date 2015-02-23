<?php
//Memory
ini_set('memory_limit', '3500M');
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
//XDebug
ini_set('xdebug.collect_vars', 'on');
ini_set('xdebug.collect_params', '4');
ini_set('xdebug.dump_globals', 'on');
ini_set('xdebug.dump.SERVER', 'REQUEST_URI');
//Errors
error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('display_startup_errors', true);

/**
 * |--------------------------------------------------------------------------
 * | Application Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register all of the routes for an application.
 * | It's a breeze. Simply tell Laravel the URIs it should respond to
 * | and give it the Closure to execute when that URI is requested.
 * |
 */
//Route::when('*', 'csrf', array(
//	'post',
//	'put',
//	'delete'
//));

//Route::group(array('after' => 'auth'), function () {
Route::get('/', 'HomeController@index');
Route::post('login', 'HomeController@login');
//});

//Route::group(array('before' => 'auth'), function () {
Route::get('logout', 'HomeController@logout');
Route::group(array('prefix' => 'dashboard'), function () {
	//	Consolidados
	Route::get('/', 'ConsolidadoController@index');
	Route::group(array('prefix' => 'consolidado'), function () {
		//  Individual
		Route::get('individual', 'ConsolidadoController@consolidadoIndividual');
	});
	//	Consultas
	Route::group(array('prefix' => 'consulta'), function () {
		//	Individual
		Route::get('individual', 'ConsultaController@individual');
	});
	//	Informes
	Route::get('informes', 'InformeController@index');
	//	Administración
	Route::group(array('prefix' => 'admin'), function () {
		//	Usuarios
		Route::get('usuarios', 'AdminController@adminUsuarios');
		//	Carga de planes
		Route::get('carga/planes', 'AdminController@adminCargaPlanes');
	});
});
//});