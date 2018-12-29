<?php

namespace common\models;

use common\utils\CronParser;
use Yii;

/**
 * This is the model class for table "{{%crontab}}".
 *
 * @property int $id
 * @property string $name 定时任务名称
 * @property string $route 任务路由
 * @property string $crontab_str crontab格式
 * @property int $switch 任务开关 0关闭 1开启
 * @property int $status 任务运行状态 0正常 1任务报错
 * @property string $last_rundate 任务上次运行时间
 * @property string $next_rundate 任务下次运行时间
 * @property string $execmemory 任务执行消耗内存(单位/byte)
 * @property string $exectime 任务执行消耗时间
 */
class Crontab extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%crontab}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'route', 'crontab_str'], 'required'],
            [['switch', 'status'], 'integer'],
            [['last_rundate', 'next_rundate'], 'safe'],
            [['execmemory', 'exectime'], 'number'],
            [['name', 'route', 'crontab_str'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', '定时任务名称'),
            'route' => Yii::t('app', '任务路由'),
            'crontab_str' => Yii::t('app', 'crontab格式'),
            'switch' => Yii::t('app', '任务开关 0关闭 1开启'),
            'status' => Yii::t('app', '任务运行状态 0正常 1任务报错'),
            'last_rundate' => Yii::t('app', '任务上次运行时间'),
            'next_rundate' => Yii::t('app', '任务下次运行时间'),
            'execmemory' => Yii::t('app', '任务执行消耗内存(单位/byte)'),
            'exectime' => Yii::t('app', '任务执行消耗时间'),
        ];
    }

	/**
	 * switch字段的文字映射
	 * @var array
	 */
	private $switchTextMap = [
		0 => '关闭',
		1 => '开启',
	];

	/**
	 * status字段的文字映射
	 * @var array
	 */
	private $statusTextMap = [
		0 => '正常',
		1 => '任务保存',
	];

	public static function getDb()
	{
		#注意!!!替换成自己的数据库配置组件名称
		return Yii::$app->db;
	}
	/**
	 * 获取switch字段对应的文字
	 * @author jlb
	 * @return ''|string
	 */
	public function getSwitchText()
	{
		if(!isset($this->switchTextMap[$this->switch])) {
			return '';
		}
		return $this->switchTextMap[$this->switch];
	}

	/**
	 * 获取status字段对应的文字
	 * @author jlb
	 * @return ''|string
	 */
	public function getStatusText()
	{
		if(!isset($this->statusTextMap[$this->status])) {
			return '';
		}
		return $this->statusTextMap[$this->status];
	}

	/**
	 * 计算下次运行时间
	 * @author jlb
	 */
	public function getNextRunDate()
	{
		if (!CronParser::check($this->crontab_str)) {
			throw new \Exception("格式校验失败: {$this->crontab_str}", 1);
		}
		return CronParser::formatToDate($this->crontab_str, 1)[0];
	}
}
