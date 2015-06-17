<?php

\Event::listen('auth.login', '\App\Util\CustomEvents@login');
\Event::listen('user.login.failed', '\App\Util\CustomEvents@loginFailed');
\Event::listen('auth.logout', '\App\Util\CustomEvents@logout');
if (\Config::get('database.debug', false)) {
	\Event::listen('illuminate.query', '\App\Util\CustomEvents@database');
}
Event::listen('illuminate.query', function ($sql, $bindings, $time) {
	$time_now = (new DateTime)->format('Y-m-d H:i:s');;
	$log = $time_now . ' | ' . $sql . ' | ' . $time . 'ms' . PHP_EOL;
	if (Config::get('config.logs.path', '') != '') {
		File::append(Config::get('config.logs.path') . 'AmicarLanding_Query.log', $log);
	}
	else {
		File::append(storage_path() . '/logs/AmicarLanding_Query.log', $log);
	}
});

