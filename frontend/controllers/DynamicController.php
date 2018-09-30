<?php
namespace frontend\controllers;


use frontend\models\Category;
use frontend\models\Comment;
use frontend\models\Favorite;
use frontend\models\form\CommentForm;
use frontend\models\form\DynamicForm;
use frontend\models\form\PostForm;
use frontend\models\Post;
use frontend\models\Tag;

class DynamicController extends BaseController
{
	public function behaviors()
	{
		return [
			[
				'class' => 'yii\filters\PageCache', //页面缓存
				'only' => ['index'],
				'duration' => 60, //过期时间
				'variations' => [ //变化
					\Yii::$app->request->get('page'), //根据页面变化而变化
					\Yii::$app->request->get('tag'), //根据页面变化而变化
					\Yii::$app->request->get('category'), //根据页面变化而变化
//					\Yii::$app->language,
				],
				'dependency' => [ //缓存依赖
					'class' => 'yii\caching\DbDependency',
					'sql' => 'SELECT COUNT(*) FROM post', //当文章数量变多或减少都会更新
				],

			],

		];
	}

   public function actionIndex()
   {
	   $page = \Yii::$app->request->get('page', '1') - 1; //请求的页面
	   $tag  = \Yii::$app->request->get('tag'); //请求的标签
	   $category = \Yii::$app->request->get('category'); //请求的分类
	   $limit = 20; //每页显示文章数
	   //获取 标签 文章
	   if (!empty($tag)){
			$data = DynamicForm::tagPost($tag, $page, $limit);
	   }
	   //获取 分类 文章
	   if (!empty($category)){
		   $data = DynamicForm::tagPost($category, $page, $limit);
	   }
	   //默认文章
	   if (empty($category) && empty($tag)){
	   	   $data['dy'] = Post::getTheNewestDynamic($page, DynamicForm::$fileds, $limit);
		   $query = Post::find()->where(['status'=> 10]);
		   $data['count'] = $query->count();
	   }
	   if (!empty($data['dy'])){
	   	//处理文章数据
		   $data = DynamicForm::dealPost($data);
	   }
	   //标签
		$tag_arr = Tag::find()->asArray()->all();//标签
	    $hot_dy = PostForm::hotestDynamic();//热门动态
	    $newest_comment = CommentForm::NewestComment();
	   return $this->render('index',[
	   	'dy' => $data['dy'],
		'newest_comment' => $newest_comment,
		'tag_arr' => $tag_arr,
		'count'=>$data['count'],
		'limit'=> $limit,
		'hot_dy' => $hot_dy
	   ]);
   }
}
