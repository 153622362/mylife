<?php

namespace frontend\models\form;

use Chumper\Zipper\Zipper;
use common\models\Sign;
use frontend\models\Post;
use frontend\models\Score;
use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class SignForm extends Model
{
	//查询当天是否已经签到
	public static function QuerySign()
	{
		$first_day = date('Y-m-d', time()). ' 00:00:00';
		$now = date('Y-m-d H:i:s', time());
		return Sign::find()
			->andWhere(['>=','created_at', $first_day])
			->andWhere(['<=','created_at', $now])
			->andWhere(['user_id'=>\Yii::$app->user->id])
			->asArray()
			->one();
	}

	//我的签到-签到数据统计
	public static function StatisticsSign($user_id, $first_day , $last_day)
	{
		//总签到天数
		$data['count'] = Sign::find()->where(['user_id'=>$user_id])->count();
		//月签到数
		$data['m_count'] = Sign::find()
			->andWhere(['>=','created_at', $first_day])
			->andWhere(['<=','created_at', $last_day])
			->andWhere(['user_id'=>$user_id])
			->orderBy('created_at desc')
			->count();
		//月连续签到天数-数据源
		$data['m_data'] = Sign::find()
			->andWhere(['>=','created_at', $first_day])
			->andWhere(['<=','created_at', $last_day])
			->andWhere(['user_id'=>$user_id])
			->orderBy('created_at desc')
			->asArray()
			->all();
		//进行计算
		if (!empty($data['m_data'])){
			$data['m_sign'] = 1; //月连续签到天数
			if (count($data['m_data']) > 1)
			{
				foreach ($data['m_data'] as $k=>$v)
				{
					$time_timestamp = strtotime($v['created_at']);
					$time_timestamp = date('Y-m-d 00:00:00', $time_timestamp); //第一个签到时间
					//下一天时间
					if (!empty($data['m_data'][$k + 1]))
					{
						$next_time_timestamp = strtotime($data['m_data'][$k + 1]['created_at']);
						$next_time_timestamp = date('Y-m-d 00:00:00', $next_time_timestamp); //上一次签到时间
						$time_timestamp_int = strtotime($time_timestamp);
						$next_time_timestamp_int = strtotime($next_time_timestamp);
						if ($time_timestamp_int - $next_time_timestamp_int == 86400)
						{
							$data['m_sign'] += 1;
						}else{
							if ($data['m_sign'] > $data['tmp_sign']){
								$data['tmp_sign'] = $data['m_sign'];
							}
							$data['m_sign'] = 1;
						}
					}
				}
				if ($data['m_sign'] < $data['tmp_sign']){
					$data['m_sign'] = $data['tmp_sign'];
				}

			}else{
				$data['m_sign'] = 1;
			}
		}else{
			$data['m_sign'] = 0;
		}

		//最多连续签到天数
		$data['all_data'] = Sign::find()
			->andWhere(['user_id'=>$user_id])
			->orderBy('created_at desc')
			->asArray()
			->all();

		//进行计算
		if (!empty($data['all_data'])){
			$data['t_sign'] = 1; //连续签到最多天数
			$data['tmp_sign'] = 0; //连续签到最多天数中间变量
			foreach ($data['all_data'] as $k=>$v)
			{
				if (count($data['all_data']) > 1)
				{
					$time_timestamp = strtotime($v['created_at']);
					$time_timestamp = date('Y-m-d 00:00:00', $time_timestamp); //第一个签到时间
					//下一天时间
					if (!empty($data['all_data'][$k + 1]))
					{
						$next_time_timestamp = strtotime($data['all_data'][$k + 1]['created_at']);
						$next_time_timestamp = date('Y-m-d 00:00:00', $next_time_timestamp); //上一次签到时间
						$time_timestamp_int = strtotime($time_timestamp);
						$next_time_timestamp_int = strtotime($next_time_timestamp);
						if ($time_timestamp_int - $next_time_timestamp_int == 86400)
						{
							$data['t_sign'] += 1;
						}else{
							if ($data['t_sign'] > $data['tmp_sign']){
								$data['tmp_sign'] = $data['t_sign'];
							}
							$data['t_sign'] = 1;
						}
					}
				}else{
					$data['t_sign'] = 1;
				}
			}
			if ($data['t_sign'] < $data['tmp_sign']){
				$data['t_sign'] = $data['tmp_sign'];
			}
		}else{
			$data['t_sign'] = 0;
			 }

		return $data;
	}

	public static function addScore($user_id, $date= '')
	{
		if (!empty($date))
		{
			$remark = date('Y-m-d H:i:s', $date) . '补签';
		}else{
			$remark = date('Y-m-d H:i:s', time()). '签到';
		}
		$score_obj = new Score();
		$score_obj->score = 10;
		$score_obj->remark = $remark;
		$score_obj->user_id = $user_id;
		$score_obj->category = 3;
		$score_obj->save();
		return $score_obj->id;
	}
}
