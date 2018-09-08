<?php
namespace frontend\controllers;


use common\models\User;
use frontend\models\Fans;
use frontend\models\form\UserForm;
use frontend\models\Post;

class UserController extends BaseController
{
	/**
	 * 个人中心
	 * @return string
	 */
   public function actionCenter()
   {
	   $user_id = \Yii::$app->user->identity->id;
	   $user_info= UserForm::userInfo($user_id); //获取用户基本信息
	   $user_info['favorite']= UserForm::userFavorite($user_id); //获取用户关注
	   $user_info['fans']= UserForm::userFans($user_id); //获取用户粉丝
	   $user_info['visitors']= UserForm::userVisitors($user_id); //获取用户访客
	   $user_info['dy'] = UserForm::dynamic($user_id);
//	   var_dump($user_info);exit;
   		return $this->render('center',[
   			'user' => $user_info
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
   		return $this->render('setting');
   }

   public function actionPost()
   {
   		$user_id = \Yii::$app->user->id;
	   $data = Post::find()
		   ->alias('p')
		   ->innerJoinWith('user u',false)
		   ->select(['p.title','p.id pid','p.created_at','u.username','u.avatar','u.id uid'])
		   ->where(['author'=>$user_id])->asArray()->all();
   		return $this->render('post',[
   			'data'=>$data
		]);
   }

   public function actionFavorite()
   {
   		return $this->render('favorite');
   }

   public function actionScore()
   {
   		return $this->render('score');
   }

   public function actionNotice()
   {
   		return $this->render('notice');
   }

   public function actionSign()
   {
   		return $this->render('sign');
   }

   public function actionMessage()
   {
   		return $this->render('message');
   }

   //关注用户
   public function actionUserFan()
   {
   		$uid = \Yii::$app->user->id;
   		$uided = \Yii::$app->request->get('uid');
	   	$data = Fans::findOne(['user_id'=>$uided, 'fans_user_id'=>$uid]);
	   if (empty($data))
	   {
		   $fan_obj = new Fans();
		   $fan_obj->user_id = $uided;
		   $fan_obj->fans_user_id= $uid;
		   $res = $fan_obj->save();
		   return json_encode(['status'=>200,'data'=>$res,'msg'=>'','timestamp'=>time()]);
	   }else{
		   return json_encode(['status'=>200,'data'=>false,'msg'=>'exists','timestamp'=>time()]);

	   }


   }




}
