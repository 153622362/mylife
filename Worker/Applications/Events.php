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
	   }
	   var_dump($message);
	   switch ($message['message_type'])
	   {
		   case 'init':
		   		$people = Gateway::getAllClientIdCount();
				$vip = Gateway::getAllUidList();
				if (!empty($vip) && is_array($vip)){
					foreach ($vip as $uid)
					{

					}
				}
		   		$content = json_encode(['message'=>['people'=>$people,'vip'=>['id'=>'/static/img/logo.png']],'message_type'=>'init'],JSON_UNESCAPED_UNICODE);
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
			   		$content = ['uid'=>$message['uid'],'content'=>$message["message"]];
				   $message = json_encode(['message'=>$content,'message_type'=>'publish'],JSON_UNESCAPED_UNICODE);
				   Gateway::sendToAll($message);
			   }
		   	break;
		   default:
		   	break;
	   }

   }

   public static function onClose($client_id)
   {
   	var_dump('关闭连接客户端:'.$client_id);
	   $count = Gateway::getAllClientCount();
	   $to_client = json_encode(['message_type'=>'onclose','message'=> "用户".substr($client_id, -5)."离开了聊天室",'people'=> $count],JSON_UNESCAPED_UNICODE);
		Gateway::sendToAll($to_client);




   }




   

}