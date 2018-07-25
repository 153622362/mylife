<?php

namespace frontend\models\form;

use Chumper\Zipper\Zipper;
use frontend\models\Chat;
use frontend\models\Post;
use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ChatForm extends Model
{
		public static function getThenewestChat()
		{
			$arr = Chat::getThenewestChat();
			if (!empty($arr))
			{
				return $arr;
			}
		}
}
