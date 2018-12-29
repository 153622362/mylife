<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use yii\console\ExitCode;
use common\models\Crontab;

/**
 *

 统一crontab -e 入口 * * * * * cd /server/webroot/yii-project/ && php yii crontab/index
 数据库表
 CREATE TABLE `tb_crontab` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(50) NOT NULL COMMENT '定时任务名称',
`route` varchar(50) NOT NULL COMMENT '任务路由 e.g test/test',
`crontab_str` varchar(50) NOT NULL COMMENT 'crontab格式',
`switch` tinyint(1) NOT NULL DEFAULT '0' COMMENT '任务开关 0关闭 1开启',
`status` tinyint(1) DEFAULT '0' COMMENT '任务运行状态 0正常 1任务报错',
`last_rundate` datetime DEFAULT NULL COMMENT '任务上次运行时间',
`next_rundate` datetime DEFAULT NULL COMMENT '任务下次运行时间',
`execmemory` decimal(9,2) NOT NULL DEFAULT '0.00' COMMENT '任务执行消耗内存(单位/byte)',
`exectime` decimal(9,2) NOT NULL DEFAULT '0.00' COMMENT '任务执行消耗时间',
PRIMARY KEY (`id`)
)
INSERT INTO `mylife`.`crontab` (`id`, `name`, `route`, `crontab_str`, `switch`, `status`, `last_rundate`, `next_rundate`, `execmemory`, `exectime`) VALUES ('1', '测试每天十一点运行', 'test/index', '* * * * *', '1', '0', '2018-12-29 15:39:00', '2018-12-29 15:40:00', '0.00', '2.65');
 * 定时任务调度控制器
 * @author jlb
 */
class CrontabController extends Controller
{

	/**
	 * 定时任务入口
	 * @return int Exit code
	 */
	public function actionIndex()
	{
		$crontab = Crontab::findAll(['switch' => 1]);
		$tasks = [];

		foreach ($crontab as $task) {
			// 第一次运行,先计算下次运行时间
			if (!$task->next_rundate) {
				$task->next_rundate = $task->getNextRunDate();
				$task->save(false);
				continue;
			}

			// 判断运行时间到了没
			if ($task->next_rundate <= date('Y-m-d H:i:s')) {
				$tasks[] = $task;
			}
		}
		$this->executeTask($tasks);

		return ExitCode::OK;
	}

	/**
	 * @param  array $tasks 任务列表
	 * @author jlb
	 */
	public function executeTask(array $tasks)
	{

		$pool = [];
		$startExectime = $this->getCurrentTime();

		foreach ($tasks as $task) {

			$pool[] = proc_open("php yii $task->route", [], $pipe);
		}

		// 回收子进程
		while (count($pool)) {
			foreach ($pool as $i => $result) {
				$etat = proc_get_status($result);
				if($etat['running'] == FALSE) {
					proc_close($result);
					unset($pool[$i]);
					# 记录任务状态
					$tasks[$i]->exectime     = round($this->getCurrentTime() - $startExectime, 2);
					$tasks[$i]->last_rundate = date('Y-m-d H:i');
					$tasks[$i]->next_rundate = $tasks[$i]->getNextRunDate();
					$tasks[$i]->status       = 0;
					// 任务出错
					if ($etat['exitcode'] !== ExitCode::OK) {
						$tasks[$i]->status = 1;
					}

					$tasks[$i]->save(false);
				}
			}
		}
	}

	private function getCurrentTime ()  {
		list ($msec, $sec) = explode(" ", microtime());
		return (float)$msec + (float)$sec;
	}

}