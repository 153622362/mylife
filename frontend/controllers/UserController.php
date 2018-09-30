<?php
namespace frontend\controllers;


use common\models\User;
use common\models\UserExt;
use frontend\models\Category;
use frontend\models\Comment;
use frontend\models\Fans;
use frontend\models\Favorite;
use frontend\models\form\ResetPasswordForm;
use frontend\models\form\SignForm;
use frontend\models\form\UserForm;
use frontend\models\Letter;
use frontend\models\Notice;
use frontend\models\Post;
use frontend\models\Score;
use frontend\models\Sign;
use yii\filters\AccessControl;
use yii\helpers\Url;

class UserController extends BaseController
{

	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'only' => ['setting', 'profile-update','email-update','post','favorite','score','notice','sign','sign-api','message','letter','user-fan'],
				'rules' => [
					[
						'actions'=> ['setting', 'profile-update','email-update','post','favorite','score','notice','sign','sign-api','message','letter','user-fan'],
						'allow' => true,
						'roles' => ['@'],
					],
				],
			],
		];
	}
	//在当前控制器的actions中添加如下配置
	public function actions()
	{
		return [
			'crop'=>[
				'class' => 'hyii2\avatar\CropAction',
				'config'=>[
					'bigImageWidth' => '200',     //大图默认宽度
					'bigImageHeight' => '200',    //大图默认高度
					'middleImageWidth'=> '100',   //中图默认宽度
					'middleImageHeight'=> '100',  //中图图默认高度
					'smallImageWidth' => '50',    //小图默认宽度
					'smallImageHeight' => '50',   //小图默认高度
					//头像上传目录（注：目录前不能加"/"）
					'uploadPath' => 'static/img',
				]
			]
		];
	}
	/**
	 * 个人中心
	 * @return string
	 */
   public function actionCenter()
   {
	   $user_id = \Yii::$app->user->identity->id;
	   $get_user_id = \Yii::$app->request->get('id', '0');
	   $other = 1; //用来判断是否为当前登陆用户 1为是
	   if (($get_user_id) && $user_id != $get_user_id)
	   {
	   		$other = 0;
	   		$user_id = $get_user_id;
	   }
	   $user_info= UserForm::userInfo($user_id); //获取用户基本信息
	   $user_info['favorite']= UserForm::userFavorite($user_id); //获取用户关注
	   $user_info['fans']= UserForm::userFans($user_id); //获取用户粉丝
	   $user_info['visitors']= UserForm::userVisitors($user_id); //获取用户访客
	   $user_info['dy'] = UserForm::dynamic($user_id);
	   $user_info['score'] = UserForm::userScore($user_id);

   		return $this->render('center',[
   			'user' => $user_info,
			'other'=>$other
		]);
   }


   public function actionIndex()
   {
   		return $this->render('index');
   }

	/**
	 * 设置中心
	 * @return string
	 */
   public function actionSetting()
   {
   		$u_obj = User::findOne(\Yii::$app->user->id);
   		$ue_obj = UserExt::findOne(['user_id'=>\Yii::$app->user->id]);
		$model = new ResetPasswordForm();
	   if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
		   $model->resetPassword();
		   \Yii::$app->session->setFlash('success', '修改密码成功！');
		   return $this->redirect('/user/setting');
	   }
   		return $this->render('setting',[
   			'tag' => $ue_obj->descript,
			'u_obj' => $u_obj,
			'model' => $model
		]);
   }

   public function actionProfileUpdate()
   {
	   $profile = \Yii::$app->request->post('profile');
	   $param_arr = explode( '&', $profile);
	   $res = false;
	   if (is_array($param_arr))
	   {
	   		$arr = [];
		   foreach ($param_arr as $v)
		   {
			   $tmp_arr = explode('=', $v);
			   $arr[$tmp_arr[0]] = $tmp_arr[1];
		   }
		   $user_obj = User::findOne(['id'=>\Yii::$app->user->id,'status'=>User::STATUS_ACTIVE]);
		   if (!empty($user_obj))
		   {
			   $ue_obj = UserExt::findOne(['user_id'=>$user_obj->id]);
			   $ue_obj->descript = urldecode(urldecode($arr['tag']));
			   $res = $ue_obj->save();
			   if (!empty($res))
			   {
				   \Yii::$app->session->setFlash('success', '修改成功！');
			   }
		   }
	   }
	   return json_encode(['status'=>200,'data'=>$res,'msg'=>'','timestamp'=>time()]);
   }

   public function actionEmailUpdate()
   {
	   $email = \Yii::$app->request->post('email');
	   $param_arr = explode( '&', $email);
	   $res = false;
	   if (is_array($param_arr)) {
		   $arr = [];
		   foreach ($param_arr as $v) {
			   $tmp_arr = explode('=', $v);
			   $arr[$tmp_arr[0]] = $tmp_arr[1];
		   }
		   $email = urldecode(urldecode($arr['email']));
		   if (!empty($email)){
		   $email_exists = User::findOne(['email'=>$email]);
		   if (empty($email_exists)) {

		   		//添加令牌
			   $user_obj = User::findOne(['id'=>\Yii::$app->user->id,'status'=>User::STATUS_ACTIVE]);
			   $user_obj->password_reset_token = \Yii::$app->security->generateRandomString() . '_' . time();
			   $user_obj->tmp_email = $email;
			   $res = $user_obj->save();
				   if (empty($user_obj->email))
					{
					//第一次绑定
						//Send Email
						$res = UserForm::sendEmail($email,$user_obj->password_reset_token);
						if (!empty($res)) {
							\Yii::$app->session->setFlash('success', '已经发送一封邮件到'.$email.'邮箱！请按照邮箱中的指示进行下一步操作');
						}else{
							\Yii::$app->session->setFlash('danger', '邮箱修改事变,系统发送错误');
						}
					 }else{
						 //TODO 发送邮件到现在的邮箱验证
						   $res = UserForm::sendEmail($user_obj->email,$user_obj->password_reset_token);
						   if (!empty($res))
						   {
							   \Yii::$app->session->setFlash('success', '已经发送一封邮件到'.$user_obj->email.'邮箱！请按照邮箱中的指示进行下一步操作！');
						   }else{
							   \Yii::$app->session->setFlash('danger', '邮箱修改失败,系统发送错误');
						   }
					 }

		   	}else{
			   \Yii::$app->session->setFlash('danger', '邮箱已经存在，请修改邮箱！');
		   }
		   }else{
			   \Yii::$app->session->setFlash('danger', '邮箱修改失败,邮箱不能为空');
		   }

	   }
	   return json_encode(['status'=>200,'data'=>$res,'msg'=>'','timestamp'=>time()]);
   }

   public function actionResetEmail()
   {
   		$token = \Yii::$app->request->get('token');
	   $str = \Yii::$app->request->get('str');
	   $arr = explode('_', $token); //0 token 1 expire 2email
	   $expire = \Yii::$app->params['user.passwordResetTokenExpire'];
	   //PasswordResetTokenValid
	    $res = $arr[1] + $expire >= time();
	    if (!empty($res))
		{
			$user_obj = User::findOne(['password_reset_token'=>$token]);
			//是否第一次绑定邮箱
			if (empty($user_obj->email))
			{
				$user_obj->email = $user_obj->tmp_email;
				$user_obj->tmp_email = null;
				$user_obj->password_reset_token = null;
				$res = $user_obj->save();
				if (!empty($res)){
					\Yii::$app->session->setFlash('success', '邮箱绑定成功');
				}else{
					\Yii::$app->session->setFlash('danger', '修改邮箱绑定，系统错误，请稍后再尝试');
				}
			}else{
				$makr_str = md5('ngyhd'.date('m',time()));
				if (empty($str)){
					$res = UserForm::sendEmail($user_obj->tmp_email, $user_obj->password_reset_token,['str'=>$makr_str]);
					if ($res){
						\Yii::$app->session->setFlash('success', '邮箱验证成功,已发送一封邮件到'.$user_obj->tmp_email.',请按照邮件指示进行下一步操作');
					}else{
						\Yii::$app->session->setFlash('danger', '修改邮箱修改，系统错误，请稍后再尝试');
					}
				}else{
					if ($str == $makr_str)
					{
						$user_obj->email = $user_obj->tmp_email;
						$user_obj->tmp_email = null;
						$user_obj->password_reset_token = null;
						$res = $user_obj->save();
						if (!empty($res))
						{
							\Yii::$app->session->setFlash('success', '邮箱修改成功');
						}
					}else{
							\Yii::$app->session->setFlash('danger', '参数错误');
					}
				}
			}
		}
	   return $this->redirect(['/site/index']);
   }



   //我的帖子
   public function actionPost()
   {
   		$user_id = \Yii::$app->user->id;
	    $data = Post::find()
		   ->alias('p')
		   ->innerJoinWith('user u',false)
		   ->select(['p.title','p.id pid','p.created_at','p.post_category','u.username','u.avatar','u.id uid'])
		   ->where(['author'=>$user_id])
		   ->asArray()
		   ->all();
	   $category = Category::find()->asArray()->orderBy('id asc')->all();
   		return $this->render('post',[
   			'data'=>$data,
			'category' => $category
		]);
   }

   //我的收藏
   public function actionFavorite()
   {
	   $user_id = \Yii::$app->user->id;
   		$data = Favorite::find()
			->alias('f')
			->innerJoinWith('post p', false)
			->innerJoinWith('user u', false)
			->select(['p.title','p.id pid','p.created_at','p.post_category','u.username','u.avatar','u.id uid'])
			->where(['user_id'=> $user_id])
			->asArray()
			->all();
	   $category = Category::find()->asArray()->orderBy('id asc')->all();
	   return $this->render('favorite', [
   			'data' => $data,
		   	'category' => $category
		]);
   }

   public function actionScore()
   {
   		$data = Score::find()->where(['user_id'=>\Yii::$app->user->identity->getId()])->orderBy('created_at DESC')->asArray()->all();
   		return $this->render('score',[
   			'data' => $data
		]);
   }

   //我的通知
   public function actionNotice()
   {
   		$data = Notice::find()
			->alias('n')
			->innerJoinWith('user u', false)
			->select(['n.created_at','n.sender','n.category','n.content_id'])
			->where(['receiver'=>\Yii::$app->user->id])
			->orderBy('read_status ASC, created_at DESC')
			->asArray()
			->all();
	   	if (!empty($data))
		{
			foreach ($data as $k=>$v)
			{
				$user_obj = User::findOne($v['sender']);
				$data[$k]['uid'] = $user_obj->id;
				$data[$k]['avatar'] = $user_obj->avatar;
				$data[$k]['username'] = $user_obj->username;
				$text_content = '';
				switch ($v['category']){
					case 0: //评论
						$post_obj = Post::findOne($v['content_id']);
						$text_content = '用户<a href="/user/center?id='.$user_obj->id.'">'.$user_obj->username.'</a>评论了你的文章<a href="/post/index?id='.$post_obj->id.'">'.$post_obj->title.'</a>';
						break;
					case 1: //@
						$comment_obj = Comment::findOne($v['content_id']);
						$arr = explode('@ngyhd@', $comment_obj->content);
						$content = $comment_obj->content;
						if (!empty($arr[1]) && !empty(intval($arr[1])))
						{
							$user_obj = User::findOne($arr[1]);
							$content = $arr['2'];
						}
						$text_content = '用户<a href="/user/center?id='.$user_obj->id.'">'.$user_obj->username.'</a>回复了你的评论<a href="/post/index?id='.$comment_obj->post_id.'">'.$content.'</a>';
						break;
					case 2: //关注
						$text_content = '用户<a href="/user/center?id='.$user_obj->id.'">'.$user_obj->username.'</a>关注了你';
						break;
					default:
						break;
				}
				$data[$k]['text_content'] = urldecode($text_content);
			}
		}
	   $n_arr_obj = Notice::find()->where(['receiver'=> \Yii::$app->user->id])->all();
	   if (!empty($n_arr_obj))
	   {
	   		foreach ($n_arr_obj as $v)
			{
				$v->read_status = 1;
				$v->save();
			}
	   }
   		return $this->render('notice',[
   			'data' => $data
		]);
   }

   //我的签到
   public function actionSign()
   {
   		$year = \Yii::$app->request->get('year', date('Y', time())); //获取年份，默认为当年
   		$month = \Yii::$app->request->get('m', date('m', time())); //获取月份，默认为当月
	   if (strlen($month) < 2 )
	   {
	   	 $month = '0'.$month;
	   }
	   	$day = date('Ym01', strtotime($year.$month.'01')); //该月的第一天
	    $data['week_day'] = date('N', strtotime($day)); //第一天是星期几1-7
	    $data['total_days'] = date('t', strtotime($year.$month)); //该月的天数28-31
	    $data['today'] = date('d', time()); //当天
	    $data['year'] = $year;
	    $data['m'] = $month;

	   //从数据库读取本月数据
	   $first_day = date('Y-m-d H:i:s', strtotime($day. '00:00:00')); //获取第一天
	   $last_day = date('Y-m-d',strtotime($year.$month.$data['total_days'])). ' 23:59:59';//最后一天
	   $sign_data = Sign::find()
			->andWhere(['>=','created_at', $first_day])
			->andWhere(['<=','created_at', $last_day])
			->andWhere(['user_id'=>\Yii::$app->user->id])
			->asArray()
			->all();
	   $sign_days = []; //本月签到的日期
	   if (!empty($sign_data))
	   {
	   	 foreach ($sign_data as $v)
		 {
		 	$sign_days[] = substr($v['created_at'],8,2); //[0=>'1',1=>'14']
		 }
	   }
		//获取签到记录的数据
	   $sign_statistics = SignForm::StatisticsSign(\Yii::$app->user->id, $first_day, $last_day);
//		var_dump($sign_statistics);exit;
   		return $this->render('sign',[
   			'data' => $data,
			'sign_days' => $sign_days,
			'sign_statistics' => $sign_statistics
		]);
   }

   //签到和补签API
   public function actionSignApi()
   {
	   $user_id = \Yii::$app->user->id;
	   if (!empty(\Yii::$app->request->get()))
		{
			//补签
			$date = strtotime(\Yii::$app->request->get('date'));
			$before_3days = strtotime(date('Y-m-d 00:00:00', time() - 86400 * 3));
			$res = false;
			if ($date <= time() && $date >= $before_3days)
			{
				//查询当天是否已签到
				$begin = date('Y-m-d 00:00:00', $date);
				$end = date('Y-m-d 23:59:59', $date);
				$sign_data = Sign::find()
					->andWhere(['>=','created_at', $begin])
					->andWhere(['<=','created_at', $end])
					->andWhere(['user_id'=> $user_id])
					->asArray()
					->one();
				if (empty($sign_data))
				{
					$sign_obj = new Sign();
					$sign_obj->user_id =  $user_id;
					$sign_obj->created_at = date('Y-m-d H:i:s', $date);
					$res = $sign_obj->save();
					if (!empty($res))
					{
						//添加分数
						$res = SignForm::addScore($user_id, $date);
						if (!empty($res)){
							$res = true;
							\Yii::$app->session->setFlash('success', '补签成功');
						}
					}
				}else{
					$message = '你已经签到过了';
				}
				return json_encode(['status'=>200,'data'=>$res,'msg'=>"$message",'timestamp'=>time()], JSON_UNESCAPED_UNICODE);
			}
		}
	   $res = false;
	   $sign_data = SignForm::QuerySign(); //查询是否已签到
	   if (empty($sign_data)){
	   	//未签到则进行签到
		   $transaction = \Yii::$app->db->beginTransaction();
		   $sign_obj = new Sign();
		   $sign_obj->user_id =  $user_id;
		   $sign_obj->created_at = date('Y-m-d H:i:s', time());
		   $res = $sign_obj->save();
		   if (!empty($res)) {
			   $res = SignForm::addScore($user_id);
			   if (!empty($res)){
				    $transaction->commit();
			   		$res = true;
				   \Yii::$app->session->setFlash('success', '签到成功');
			   }else{
				   \Yii::$app->session->setFlash('error','积分系统出现错误');
				   $transaction->rollBack();
			   }
		   }else{
			   \Yii::$app->session->setFlash('error','积分系统出现错误');
			   $transaction->rollBack();
		   }

	   }
	   return json_encode(['status'=>200,'data'=>$res,'msg'=>'','timestamp'=>time()]);


   }

   //我的私信
   public function actionMessage()
   {
   		$data = Letter::find()
			->alias('f')
			->innerJoinWith('user u', false)
			->select(['u.id uid','u.avatar','u.username','f.created_at','f.content','f.read_status','f.sender'])
			->where(['f.receiver'=>\Yii::$app->user->id])->orderBy('f.created_at asc')->asArray()->all();
	    $data_group = '';
	    if (!empty($data)){
	    	foreach ($data as $v)
			{
				$data_group[$v['sender']]['content'] = $v['content'];
				$data_group[$v['sender']]['info']['count'] = Letter::find()->where(['sender'=>$v['sender'],'read_status'=>0])->count();
				$data_group[$v['sender']]['info']['username'] = $v['username'];
				$data_group[$v['sender']]['info']['id'] = $v['uid'];
				$data_group[$v['sender']]['info']['avatar'] = $v['avatar'];
			}
		}
   		return $this->render('message', [
   			'data' => $data_group
		]);
   }

   //私信页面
   public function actionLetter()
   {
   		if (\Yii::$app->request->isPost)
		{
			$post = \Yii::$app->request->post();
			$lettet_obj = new Letter();
			$lettet_obj->sender = \Yii::$app->user->id;
			$lettet_obj->receiver = \Yii::$app->request->get('id');
			$lettet_obj->content = $post['content'];
			$lettet_obj->status = 10;
			$lettet_obj->read_status = 0;
			$res = $lettet_obj->save();
			if (!empty($res))
			{
				\Yii::$app->session->setFlash('success', '发送成功！');
			}
			return $this->redirect('/user/letter?id='.\Yii::$app->request->get('id'));
		}
   		$receiver_id = \Yii::$app->request->get('id'); //当前窗口发送私信中的消费者
	    $sender_id = \Yii::$app->user->id; //当前窗口发送私信中的生产者
	   if ( $receiver_id == $sender_id) { echo '<script>alert("不能与自己私信");history.go(-1)</script>>'; exit;} //不能与自己私信
	    //标记当前内容已读
	   $sign_data = Letter::find()
		   ->where(['sender'=>$receiver_id, 'receiver'=>$sender_id])
		   ->orderBy('created_at desc')
		   ->all();
	   if (!empty($sign_data)){
	   		foreach ($sign_data as $v){
	   			$v->read_status = 1;
				$v->save();
			}
	    }
	    //获取当前用户与发送者私信历史内容中 对方私信给当前用户的内容
	    $sender_data = \frontend\models\Letter::find()
			->alias('l')
			->innerJoinWith('user u', false)
			->select(['l.created_at','l.content','u.avatar','u.username','u.id uid'])
			->where(['sender'=>$receiver_id, 'receiver'=>$sender_id])
			->orderBy('created_at desc')
			->asArray()
			->all();

	   //获取当前用户与发送者私信历史内容中 当前用户发送给对方的内容
	    $receiver_data = Letter::find()
			->alias('l')
			->innerJoinWith('user u', false)
			->select(['l.created_at','l.content','u.avatar','u.username','u.id uid'])
			->where(['l.sender'=>$sender_id, 'l.receiver'=>$receiver_id])
			->orderBy('l.created_at desc')
			->asArray()
			->all();
	   //获取接收者信息
	   $user_obj = User::findOne($receiver_id);



	   $data = array_merge($sender_data, $receiver_data);
	   //对数据按时间升序排序
	   if (!empty($data)){
	   	 	foreach ($data as $key=>$v)
			{
				$created_at_sort[$key] = $v['created_at'];
			}
			array_multisort($created_at_sort,SORT_ASC,$data);
	   }
	   return $this->render('letter', [
	   			'data'=>$data,
		   		'receiver' => $user_obj
	   ]);
   }

   //关注用户
   public function actionUserFan()
   {
   		$uid = \Yii::$app->user->id;
   		$uided = \Yii::$app->request->get('uid');
	   	$data = Fans::findOne(['user_id'=>$uided, 'fans_user_id'=>$uid]);
	   if (empty($data))
	   {
		   if (empty($uid))
		   {
		   		return $this->redirect(['/site/login']);
		   }
		   $fan_obj = new Fans();
		   $fan_obj->user_id = $uided;
		   $fan_obj->fans_user_id= $uid;
		   $res = $fan_obj->save();
		   if (!empty($res)){
		   $notice_obj = new Notice();
		   $notice_obj->receiver = $uided;
		   $notice_obj->sender = $uid;
		   $notice_obj->category = 2;
		   $notice_obj->read_status = 0;
		   $notice_obj->content_id = $fan_obj->id;
		   $notice_obj->status = 10;
		   $res = $notice_obj->save();
		   }
		   return json_encode(['status'=>200,'data'=>$res,'msg'=>'','timestamp'=>time()]);
	   }else{
		   return json_encode(['status'=>200,'data'=>false,'msg'=>'exists','timestamp'=>time()]);

	   }
   }




}
