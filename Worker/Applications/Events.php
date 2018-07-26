<?php
use \GatewayWorker\Lib\Gateway;
use \GatewayWorker\Lib\Db;
/**
 * 主逻辑
 * 主要是处理 onConnect onMessage onClose 三个方法
 * onConnect 和 onClose 如果不需要可以不用实现并删除
 */
class Events
{

	public static $db;
	public static $timer_id;

	public static $users;
	public static $cli_uid;

	public static function onConnect($client)
	{
		var_dump('come on');
		$message = json_encode(['message_type'=>'connect','client_id'=>$client]);
		Gateway::sendToClient($client, $message);
	}
   /**
    * 当客户端发来消息时触发
    * @param int $client_id 连接id
    * @param mixed $message 具体消息
    */
   public static function onMessage($client_id, $data) {
	   // 将当前链接与uid绑定
	   $message = json_decode($data,true);
	   if (!empty($message['uid'])){
	   	Gateway::bindUid($client_id, $message['uid']);
		   self::$cli_uid[$client_id] = $message['uid'];
	   }
	   var_dump($message);
	   switch ($message['message_type'])
	   {
		   case 'init':
		   		$people = Gateway::getAllClientIdCount();
				$vip = Gateway::getAllUidList();
				if (!empty($vip) && is_array($vip)){
					$user_info = [];
					foreach ($vip as $uid)
					{
						$arr = self::getUserInfoByUid($uid);
						if (!empty($arr)){
							$user_info[$arr[0]['id']] = $arr[0]['avatar'];
						}

					}
				}
		   		$content = json_encode(['message'=>['people'=>$people,'vip'=>$user_info],'message_type'=>'init'],JSON_UNESCAPED_UNICODE);
				Gateway::sendToAll($content);
			   break;
		   case 'onopen':
		   		if (!empty($message['uid'])){
						$message = json_encode(['message'=>"用户{$message['uid']}进入了聊天室",'message_type'=>'onopen'],JSON_UNESCAPED_UNICODE);
			   	Gateway::sendToAll($message);
				}else{
					$message = json_encode(['message'=>"匿名用户".substr($client_id, -5)."进入了聊天室",'message_type'=>'onopen'],JSON_UNESCAPED_UNICODE);
					Gateway::sendToAll($message);
				}
		   		break;
		   case 'publish':
			   if (!empty($message['uid'])){
				   $filter_content = strip_tags($message["message"]);
				   $inster_id = self::insertChat($message['uid'], $filter_content);
				   $user_info = self::getChatById($inster_id);
				   $content = ['uid'=>$user_info[0]['username'],'content'=> $user_info[0]['content'],'created_at'=>$user_info[0]['created_at'],'avatar'=>$user_info[0]['avatar'],'chat_id'=>$inster_id];
				   $message = json_encode(['message'=>$content,'message_type'=>'publish'],JSON_UNESCAPED_UNICODE);
				   Gateway::sendToAll($message);
			   }
		   	break;
		   case 'zan':
		   		$chat_id = $message['chat_id'];
				$user_id = $message['user_id'];
				$arr = self::outByChatId($user_id, $chat_id);
				if (empty($arr)){
					self::inLikeByChatId($user_id, $chat_id);
					$message = json_encode(['chat_id'=>$chat_id,'message_type'=>'zan'],JSON_UNESCAPED_UNICODE);
					Gateway::sendToAll($message);
				}
		   	break;
		   default:
		   	break;
	   }

   }

   public static function outByChatId($user_id,$chat_id)
   {
	   $db = self::getDbInstance();
	   $like_info = $db
		   ->select('id')
		   ->from('like')
		   ->where('user_id = :user_id AND content_id = :chat_id')
		   ->bindValues(array('user_id'=> $user_id, 'chat_id' => $chat_id))
		   ->query();
	   var_dump($like_info);
	   return $like_info;
   }
   public static function inLikeByChatId($user_id,$chat_id)
   {
	   $db = self::getDbInstance();
	   $time = date('Y-m-d H:i:s',time());
	   $insert_id = $db->insert('like')->cols([
		   'user_id' => $user_id,
		   'content_id' => $chat_id,
		   'channel' => 2,
		   'created_at' => $time,
		   'updated_at' => $time,
	   ])->query();
	   return $insert_id;
   }
   public static function onClose($client_id)
   {
   		$id = 0;
   		if (!empty(self::$cli_uid[$client_id]))
		{
			$id = self::$cli_uid[$client_id];
			unset(self::$cli_uid[$client_id]);
		}

		$cli_usr = $id ==0?substr($client_id, -5):$id;
	   $count = Gateway::getAllClientCount();
	   $to_client = json_encode(['message_type'=>'onclose','message'=> "用户".$cli_usr."离开了聊天室",'people'=> $count,'uid'=>$id],JSON_UNESCAPED_UNICODE);
	   Gateway::sendToAll($to_client);
   		var_dump('关闭连接客户端:'.$client_id);

   }

   public static function getUserInfoByUid($uid)
   {
	   $db = self::getDbInstance();
	   $user_info = $db
		   ->select('id,avatar')
		   ->from('user')
		   ->where('id = :uid')
		   ->bindValues(array('uid'=> $uid))
		   ->query();
	   return $user_info;

   }

	public static function getDbInstance()
	{
		if (empty(self::$db)){
			self::$db = Db::instance('db1');
			return self::$db;
		}else{
			return self::$db;
		}
	}

	public static function insertChat($uid,$content)
	{
		$db = self::getDbInstance();
		$time = date('Y-m-d H:i:s',time());
		$insert_id = $db->insert('chat')->cols([
			'user_id' => $uid,
			'content' => $content,
			'created_at' => $time,
			'updated_at' => $time,
		])->query();
		return $insert_id;
	}

	public static function getChatById($id)
	{
		$db = self::getDbInstance();
		$arr = $db
			->select('user.avatar,user.username,chat.content,chat.created_at')
			->from('chat')
			->innerJoin('user','chat.user_id = user.id')
			->where(['chat.id = :id'])
			->bindValues(['id'=>$id])
			->query();
		var_dump($arr);
		return $arr;
	}






   

}