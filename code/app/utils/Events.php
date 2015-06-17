<?php namespace App\Util;

use Carbon\Carbon;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

/**
 * Class CustomEvents
 *
 * @package App\Util
 */
class CustomEvents
{
	/**
	 * @var \Monolog\Logger
	 */
	private $monolog;
	/**
	 * @var
	 */
	private $logFile;
	/**
	 * @var
	 */
	private $logMsg;
	/**
	 * @var
	 */
	private $info_server;
	/**
	 * @var static
	 */
	private $now;

	/**
	 *
	 */
	public function __construct()
	{
		$this->monolog     = new Logger('log');
		$this->info_server = \App\Util\Functions::serverData();
		$this->now         = Carbon::now();
	}

	/**
	 * @param $user
	 */
	public function login($user)
	{
		if (\Config::get('config.logs.path') != '') {
			$this->logFile = \Config::get('config.logs.path') . 'users.log';
		}
		else {
			$this->logFile = storage_path() . '/logs/users.log';
		}
		$this->logMsg = 'LOGIN OK | USER-ID ' . $user->id . ' | IP-ADDRESS ' . array_get($this->info_server, 'IP') . ' | BROWSER ' . array_get($this->info_server, 'BROWSER') . PHP_EOL;
		$this->monolog->pushHandler(new StreamHandler($this->logFile), Logger::INFO);
		$this->monolog->info($this->logMsg, compact('bindings', 'time'));
	}

	/**
	 * @param $user
	 */
	public function loginFailed($user)
	{
		if (\Config::get('config.logs.path') != '') {
			$this->logFile = \Config::get('config.logs.path') . 'users.log';
		}
		else {
			$this->logFile = storage_path() . '/logs/users.log';
		}
		$this->logMsg = 'LOGIN FAILED | USER-ID ' . $user->id . ' | IP-ADDRESS ' . array_get($this->info_server, 'IP') . ' | BROWSER ' . array_get($this->info_server, 'BROWSER') . PHP_EOL;
		$this->monolog->pushHandler(new StreamHandler($this->logFile), Logger::WARNING);
		$this->monolog->info($this->logMsg, compact('bindings', 'time'));
	}

	/**
	 * @param $user
	 */
	public function logout($user)
	{
		if (\Config::get('config.logs.path') != '') {
			$this->logFile = \Config::get('config.logs.path') . 'users.log';
		}
		else {
			$this->logFile = storage_path() . '/logs/users.log';
		}
		$this->logFile = storage_path() . '/logs/users.log';
		$this->logMsg  = 'LOGOUT | USER-ID ' . $user->id . ' | IP-ADDRESS ' . array_get($this->info_server, 'IP') . ' | BROWSER ' . array_get($this->info_server, 'BROWSER') . PHP_EOL;
		$this->monolog->pushHandler(new StreamHandler($this->logFile), Logger::INFO);
		$this->monolog->info($this->logMsg, compact('bindings', 'time'));
	}

	/**
	 * @param $sql
	 * @param $bindings
	 * @param $time
	 */
	public function database($sql, $bindings, $time)
	{
		if (\Config::get('config.logs.path') != '') {
			$this->logFile = \Config::get('config.logs.path') . 'AmicarLanding_Database.log';
		}
		else {
			$this->logFile = storage_path() . '/logs/AmicarLanding_Database.log';
		}
		$sql          = str_replace(array('%', '?'), array('%%', '%s'), $sql);
		$sql          = vsprintf($sql, $bindings);
		$this->logMsg = 'DATE ' . Carbon::now() . ' | QUERY ' . $sql . ' | TIME ' . $time . 'ms' . PHP_EOL;
		$this->monolog->pushHandler(new StreamHandler($this->logFile), Logger::INFO);
		$this->monolog->info($this->logMsg, compact('bindings', 'time'));
	}
}