<?php
namespace frontend\controllers;


use frontend\models\Category;
use frontend\models\Comment;
use frontend\models\Favorite;
use frontend\models\form\PostForm;
use frontend\models\Post;
use frontend\models\Tag;

class DynamicController extends BaseController
{
   public function actionIndex()
   {
	   $page = \Yii::$app->request->get('page', '1') - 1; //请求的页面
	   $tag  = \Yii::$app->request->get('tag'); //请求的标签
	   $category = \Yii::$app->request->get('category'); //请求的分类
	   $limit = 20; //每页显示文章数
	   $fileds = ['p.id','p.title','p.created_at','p.updated_at','p.post_category','p.visitor','u.username','u.avatar','u.id uid'];
	   //获取标签文章
	   if (!empty($tag)){
			$tag_arr = Tag::find()
				->alias('t')
				->innerJoinWith('tagunion tu', false)
				->select(['tu.content_id'])
				->where(['t.id'=>$tag])
				->asArray()
				->all();
		   $tag_content_id_arr = [];
		   if (!empty($tag_arr)){
		   		foreach ($tag_arr as $v)
				{
					$tag_content_id_arr[] = $v['content_id'];
				}
		   }
		   $dy = Post::find()
			   ->alias('p')
			   ->innerJoinWith('user u', false)
			   ->select($fileds)
			   ->where(['in','p.id',$tag_content_id_arr])
			   ->offset($page * $limit)
			   ->asArray()
			   ->limit($limit)
			   ->all();
		   $count = Post::find()
			   ->alias('p')
			   ->where(['in','p.id',$tag_content_id_arr])
			   ->count();
	   }
	   if (!empty($category)){ //分类文章
		   $category_arr = Category::find()
			   ->alias('c')
			   ->innerJoinWith('categoryunion cu', false)
			   ->select(['cu.content_id'])
			   ->where(['c.id'=>$category])
			   ->asArray()
			   ->all();
		   $category_content_id_arr = [];
		   if (!empty($category_arr)){
			   foreach ($category_arr as $v)
			   {
				   $category_content_id_arr[] = $v['content_id'];
			   }
		   }
		   $dy = Post::find()
			   ->alias('p')
			   ->innerJoinWith('user u', false)
			   ->select($fileds)
			   ->where(['in','p.id',$category_content_id_arr])
			   ->offset($page * $limit)
			   ->asArray()
			   ->limit($limit)
			   ->all();
		   $count = Post::find()
			   ->alias('p')
			   ->where(['in','p.id',$category_content_id_arr])
			   ->count();
	   }

	   if (empty($category) && empty($tag)){
	   		$dy = Post::getTheNewestDynamic($page, $fileds, $limit);
		   $query = Post::find()->where(['status'=> 10]);
		   $count = $query->count();
	   }

	   if (!empty($dy)){
	   	//文章分类
		   $arr = [];
		   $category_arr = Category::find()->asArray()->all();
		   if (!empty($category_arr)){
		   		foreach ($category_arr as $v)
				{
					$arr[$v['id']] = $v['name'];
				}
		   }
		   foreach ($dy as $k=>$v)
		   {
				$dy[$k]['comment'] = Comment::find()->where(['post_id'=>$v['id']])->count(); //评论
				$dy[$k]['favorite'] = Favorite::find()->where(['post_id'=>$v['id']])->count(); //收藏
				$dy[$k]['post_category'] = $arr[$v['post_category']]; //分类
		   }
	   }
	   //标签
		$tag_arr = Tag::find()->asArray()->all();
	    $hot_dy = PostForm::hotestDynamic();

	   return $this->render('index',[
	   	'dy' => $dy,
		'tag_arr' => $tag_arr,
		'count'=>$count,
		'limit'=> $limit,
		'hot_dy' => $hot_dy
	   ]);
   }
}
