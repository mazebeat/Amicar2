<?php namespace App\Util;

use Monolog\Formatter\LineFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class MessageLog
{
	private $log;
	private $name;

	public function __construct($name)
	{
		$this->name = $name;

		$logRoot   = storage_path() . '/logs/' . $this->name . '.log';
		$format    = array(
			'date'    => "Y-m-d H:i:s",
			'message' => "[%datetime%] [%channel%] [%level_name%] : %message%\n",
		);
		$formatter = new LineFormatter($format['message'], $format['date']);
		$stream    = new StreamHandler($logRoot, Logger::INFO);
		$stream->setFormatter($formatter);

		$this->log = new Logger($this->name);
		$this->log->pushHandler($stream);
	}

	public function emergency($message, array $context = array())
	{
		$this->log->addEmergency($message, $context);
	}

	public function alert($message, array $context = array())
	{
		$this->log->addAlert($message, $context);
	}

	public function notice($message, array $context = array())
	{
		$this->log->addNotice($message, $context);
	}

	public function debug($message, array $context = array())
	{
		$this->log->addDebug($message, $context);
	}

	public function info($message, array $context = array())
	{
		$this->log->addInfo($message, $context);
	}

	public function warning($message, array $context = array())
	{
		$this->log->addWarning($message, $context);
	}

	public function error($message, array $context = array())
	{
		$this->log->addError($message, $context);
	}

	public function critical($message)
	{
		$this->log->addCritical($message);
	}
}