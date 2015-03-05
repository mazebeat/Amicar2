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

Route::when('*', 'csrf', array(
	'post',
	'put',
	'delete'
));

Route::group(array('after' => 'auth'), function () {
	Route::get('e1', function () {
		$locales = Local::lists('nombreLocal', 'idLocal');

		return View::make('landings.e1')->withLocales($locales);
	});

	Route::get('e2', function () {
		return View::make('landings.e2');
	});

	Route::resource('clientes', 'ClienteController');
	Route::resource('ejecutivos', 'EjecutivoController');

	Route::get('SvlAmicarRead/servlet/ReadAmicar', 'ServletController@readAmicar');
	Route::get('SolicitudCotizacionAmicar', 'ServletController@clickAmicar');
});

//Route::group(array('before' => 'auth'), function () {
//});
Route::get('crypto', array(
	function () {
		$mcrypt = new App\Util\MCrypt();

		$encrypted = $mcrypt->encrypt("1369");
		var_dump($encrypted);

		#Decrypt
		$decrypted = $mcrypt->decrypt("eeae04e6afb437c7e713045cc675b5ac");
		var_dump($decrypted);
	}
));