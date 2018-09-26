<?php

namespace frontend\models\form;

use yii\base\Model;


class SearchForm extends Model
{
   public $title;


	public function rules()
	{
		return [
			[['title'], 'string', 'max' => 255],
		];
	}
}
