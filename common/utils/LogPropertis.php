<?php 
namespace common\utils;
use common\utils\DateUtils;
/**
 * 配置日志的一些公用属性
 * @author winadsLedian
 *
 */
class LogPropertis{
	/**
	 * 默认保存的系统路径
	 * @var string
	 */
	
	 public static $logPath='/data/html/adp/logs/';
	/**
	 * 
	 * @param unknown $msg			消息内容，可以是数组
	 * @param unknown $logFileName	保存的文件名
	 */	
	public static function DEBUG($msg,$logFileName){
		//如果是数组
		if(is_array($msg) ){
			$msg=json_encode($msg);
		}
		$format=DateUtils::getInstance()->reqTimeFormat();
		$nowformat=DateUtils::getInstance()->nowTimeFormat();
		//把换行符换掉
		$msg = str_replace(PHP_EOL, '', $msg);
		error_log("{$format},{$nowformat},{$msg}\n",3,self::$logPath.$logFileName);
	}
}
