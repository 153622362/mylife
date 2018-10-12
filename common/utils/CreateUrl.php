<?php
namespace common\utils;

use yii\helpers\Url;

class CreateUrl
{

	public static function createUrl($url,$param=[])
	{
		$url_arr = [$url];
		if (!empty($param) && is_array($param))
		{
			foreach ($param as $k=>$v){
				$url_arr[$k] = $v;
			}
		}
		return Url::to($url_arr);
	}
}