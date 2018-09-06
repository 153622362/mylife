<?php
namespace frontend\controllers;


use frontend\models\Comment;
use frontend\models\Favorite;
use frontend\models\form\PostForm;
use frontend\models\Post;
use yii\data\Pagination;

class DynamicController extends BaseController
{
   public function actionIndex()
   {
	   $page = \Yii::$app->request->get('page', '1') - 1;
	   $dy = Post::getTheNewestDynamic($page,['p.id','p.title','p.created_at','p.updated_at','u.username','u.avatar']);
	   if (!empty($dy)){
		   foreach ($dy as $k=>$v)
		   {
				$dy[$k]['comment'] = Comment::find()->where(['post_id'=>$v['id']])->count(); //评论
				$dy[$k]['favorite'] = Favorite::find()->where(['post_id'=>$v['id']])->count(); //收藏

		   }
	   }
	   $query = Post::find()->where(['status'=> 10]);
	   $count = $query->count();
	   $pages = new Pagination(['totalCount' => $count]);
	   $pages->defaultPageSize =10;
	   $hot_dy = PostForm::hotestDynamic();

	   return $this->render('index',[
	   	'dy' => $dy,
		'count'=>$count,
		'pages'=> $pages,
		'hot_dy' => $hot_dy
	   ]);
   }
}
