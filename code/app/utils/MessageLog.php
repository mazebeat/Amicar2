<?php namespace App\Util;

use Monolog\Formatter\LineFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class MessageLog
{
	private $logger;
	private $name;

	public function __construct($name)
	{
		$this->name = $name;

		//		$logRoot   = storage_path() . '/logs/' . $this->name . '.log';
		$logRoot = \Config::get('config.logs.path') . $this->name . '.log';
		$logRoot = \Config::get('config.logs.path') . $this->name . '.log';
		$format    = array(
			'date'    => "Y-m-d H:i:s",
			'message' => "[%datetime%] [%channel%] [%level_name%] : %message%\n",
		);
		$formatter = new LineFormatter($format['message'], $format['date']);
		$stream    = new StreamHandler($logRoot, Logger::INFO);
		$stream->setFormatter($formatter);

		$this->logger = new Logger($this->name);
		$this->logger->pushHandler($stream);
	}

	public function alert($message, array $context = array())
	{
		$this->logger->addAlert($this->parseMessage($message, $context), $context);
	}

	private function parseMessage($message, array $context = array())
	{
		$used_keys = array();
		$message   = preg_replace('/\%\((.*?)\)(.)/e', 'dsprintfMatch(\'$1\',\'$2\',\$context,$used_keys)', $message);
		$data      = array_diff_key($context, $used_keys);

		return vsprintf($message, $data);
	}

	public function critical($message)
	{
		$this->logger->addCritical($this->parseMessage($message, $context), $context);
	}

	public function debug($message, array $context = array())
	{
		$this->logger->addDebug($this->parseMessage($message, $context), $context);
	}

	public function emergency($message, array $context = array())
	{
		$this->logger->addEmergency($this->parseMessage($message, $context), $context);
	}

	public function error($message, array $context = array())
	{
		$this->logger->addError($this->parseMessage($message, $context), $context);
	}

	public function info($message, array $context = array())
	{
		$this->logger->addInfo($this->parseMessage($message, $context), $context);
	}

	public function log($level, $message, array $context = array())
	{
		$message = (string)$message;

		switch ($level) {
			case Logger::EMERGENCY:
				$this->logger->emergency($message, $context);
				break;
			case Logger::ALERT:
				$this->logger->alert($message, $context);
				break;
			case Logger::CRITICAL:
				$this->logger->critical($message, $context);
				break;
			case Logger::ERROR:
				$this->logger->error($message, $context);
				break;
			case Logger::WARNING:
				$this->logger->warning($message, $context);
				break;
			case Logger::NOTICE:
				$this->logger->notice($message, $context);
				break;
			case Logger::INFO:
				$this->logger->info($message, $context);
				break;
			case Logger::DEBUG:
				$this->logger->debug($message);
				break;
			default:
				throw new PsrLogInvalidArgumentException("Unknown severity level");
		}
	}

	public function notice($message, array $context = array())
	{
		$this->logger->addNotice($this->parseMessage($message, $context), $context);
	}

	public function warning($message, array $context = array())
	{
		$this->logger->addWarning($this->parseMessage($message, $context), $context);
	}
}