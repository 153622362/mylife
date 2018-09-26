<?php
namespace frontend\controllers;


use common\models\User;
use frontend\models\Chat;
use frontend\models\form\ChatForm;
use Yii;
use yii\filters\AccessControl;


class ChatController extends BaseController
{
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'only' => ['replycht'],
				'rules' => [
					[
						'actions' => ['replychat'],
						'allow' => true,
						'roles' => ['@'],
					],
				],
			],
		];
	}

   public function actionIndex()
   {
   		$chat_id = Yii::$app->request->get('pid');
   		$arr = Chat::getChatByPid($chat_id);
	    return json_encode($arr);


   }

   public function actionDetail()
   {
	   $user_id = Yii::$app->user->id;
	   if (Yii::$app->request->isPost)
	   {
		   //添加Chat
		   if (!empty($user_id) && !empty($post = Yii::$app->request->post())){
			   $chat_id = $post['chat_id'];
			   $content = $post['content'];
			   if (!empty($content) && !empty($chat_id)){
				   $chat_obj = new Chat();
				   $chat_obj->content = $content;
				   $chat_obj->user_id = $user_id;
				   $chat_obj->pid = $chat_id;
				   $chat_obj->save();
			   }
			   return $this->redirect(['/chat/detail','id'=>$chat_id]);
		   }else{
		   		return $this->redirect(['/site/login']);
		   }
	   }
	   $chat_id = Yii::$app->request->get('id',0);
	   do{
	   	//若不是父评论
	   		$chat_obj = Chat::findOne($chat_id);
		   	if ($chat_obj->pid != 0)
			{
				$chat_id = $chat_obj->pid;
			}
	   }while($chat_obj->pid != 0);
	   $data['chat_info'] = ChatForm::ChatInfoById($chat_id); //评论信息
	   $data['clike'] = ChatForm::ChatLikeByID($chat_id); //点赞数
	   $data['ccom'] = ChatForm::ChatComByID($chat_id); //评论数
	   $data['likeinfo'] = ChatForm::ChatLikeInfoById($chat_id); //点赞信息
	   $data['cominfo'] = ChatForm::ChatComInfoById($chat_id); //评论信息
		if (!empty($data['cominfo'])){
			   foreach ($data['cominfo'] as $k => $v)
			   {
				   //查询评论子评论
				   $data['cominfo'][$k]['child_comment'] = ChatForm::childChild($v['id']);
				   foreach ($data['cominfo'][$k]['child_comment'] as $kk=>$vv)
				   {
				   		$arr = explode('@ngyhd@', $vv['content']);
					   	if (!empty($arr[1]) && !empty(intval($arr[1])))
						{
							$user_obj = User::findOne($arr[1]);
							$data['cominfo'][$k]['child_comment'][$kk]['content'] = "<a href='/user/center?id={$user_obj->id}'>@".$user_obj->username .'</a>'.'&nbsp;&nbsp;'.$arr['2'];
						}
				   }
			   }
		   }
			return $this->render('detail', ['data' => $data]);

   }

   public function actionReplyChat()
   {
			$post = Yii::$app->request->post();
			$reply_chat = $post['reply_chat'];
			$chat_id = $post['chat_id'];
			$c_chat_id = $post['c_chat_id']; //子评论被回复才有
			if (!empty($c_chat_id))
			{
				$chat_obj = Chat::findOne($c_chat_id);
				$prefix = "@ngyhd@".$chat_obj->user_id.'@ngyhd@';
			}
			$param_arr = explode( '&', $reply_chat);
			if (is_array($param_arr))
			{
				foreach ($param_arr as $v)
				{
					$tmp_arr = explode('=', $v);
					$arr[$tmp_arr[0]] = $tmp_arr[1];
				}
			}
			$user_id = Yii::$app->user->id;
			//添加评论
			if (empty($user_id)){
				return $this->redirect(['/site/login']);
			}
			if (!empty($user_id) && !empty($arr)){
				$content = strip_tags($arr['content']);
				$pid = strip_tags($arr['pid']);
				if (!empty($content) && !empty($chat_id)){
					$chat_obj = new Chat();
					$chat_obj->content = $prefix.$content;
					$chat_obj->user_id = $user_id;
					$chat_obj->pid = $pid;
					$res = $chat_obj->save();
					if (!empty($res)){
						return $this->redirect(['/chat/detail','id'=>$chat_id]);
					}
				}
			}
			return $this->redirect(['/chat/detail','id'=>$chat_id]);
   }
}
