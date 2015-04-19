<?php
// You could also do some check before logging, if you only wanted to log your events.

/**
 *  1. Before you start with this create a file in your logs folder (eg : 'query.log') and grant laravel write access to it.
 *    2. Place the snippet in your '/app/start/local.php' file. (or routes.php or anywhere...)
 *    3. Access artisan from your console and type this -
 *    $php artisan tail --path="app/storage/logs/query.log" (better use full path)
 */
Event::listen('illuminate.query', function ($sql, $bindings, $time) {
	$time_now = (new DateTime)->format('Y-m-d H:i:s');;
	$log = $time_now . ' | ' . $sql . ' | ' . $time . 'ms' . PHP_EOL;
	if (Config::get('config.logs.path', '') != '') {
		File::append(Config::get('config.logs.path') . 'query.log', $log);
	}
	else {
		File::append(storage_path() . '/logs/query.log', $log);
	}
});
