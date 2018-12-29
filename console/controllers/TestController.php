<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use yii\console\ExitCode;
use common\models\Crontab;

/**
 * 定时任务调度控制器
 * @author jlb
 */
class TestController extends Controller
{

	/**
	 * 定时任务1
	 * @return int Exit code
	 */
	public function actionIndex()
	{
		sleep(1);
		echo "我是index方法\n";
		return ExitCode::OK;
	}

	/**
	 * 定时任务2
	 * @return int Exit code
	 */
	public function actionTest()
	{
		sleep(2);
		echo "我是test方法\n";
		return ExitCode::OK;
	}

}