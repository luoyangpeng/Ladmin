<?php
namespace App\Lib;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\BufferHandler;

class Logs {
	/**
	 * 记录日志
	 */
	public static function debug($type, $logs, $showTime = true)
	{
// 		if (!defined('LOG_ENABLE') || LOG_ENABLE == false) {
// 			return true;
// 		}
		$filename = dirname(dirname(__FILE__)).'/../storage/logs/'.$type.'_'.date('Y-m-d').'.log';
		@file_put_contents($filename, ($showTime ? '['.date('Y-m-d H:i:s').'] ' : '').$logs."\n", FILE_APPEND);
	}

	public static function writeLog($logName, $level, $key, $data) {
		$levelArray = array(
			'warn'		=>	Logger::WARNING,
			'info'		=>	Logger::INFO,
			'alert'		=>	Logger::ALERT,
			'debug'		=>	Logger::DEBUG,
			'notice'	=>	Logger::NOTICE,
			'error'		=>	Logger::ERROR,
		);
		$logLevel = $levelArray[$level];
		$logger = new Logger($logName);
		$stream = new StreamHandler(dirname(dirname(__FILE__)).'/../storage/logs/'.$logName.'.log', $logLevel);
		$logger->pushHandler(new BufferHandler($stream, 10000, $logLevel, true, true));
		if ($level == 'warn') {
			$logger->warn($key, $data);
		} else if ($level == 'info') {
			$logger->info($key, $data);
		} else if ($level == 'alert') {
			$logger->alert($key, $data);
		} else if ($level == 'debug') {
			$logger->debug($key, $data);
		} else if ($level == 'notice') {
			$logger->notice($key, $data);
		} else if ($level == 'error') {
			$logger->error($key, $data);
		}
	}
}
