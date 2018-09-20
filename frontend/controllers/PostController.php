<?php
namespace frontend\controllers;


use common\models\Post;
use common\models\User;
use frontend\models\Category;
use frontend\models\Comment;
use frontend\models\Fans;
use frontend\models\Favorite;
use frontend\models\form\PostForm;
use frontend\models\form\UserForm;
use frontend\models\Like;
use frontend\models\Notice;
use Yii;
use yii\db\Expression;
use yii\filters\AccessControl;



class PostController extends BaseController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['fav','zan','create'],
                'rules' => [
                    [
                        'actions' => ['fav','zan','create'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
	{
		//发表评论
		$user_id = Yii::$app->user->id;
		if (Yii::$app->request->isPost)
		{
			$res = false;
			$post = Yii::$app->request->post();
			$post_id = strip_tags($post['post_id']);
			$content = strip_tags($post['content']);
			//添加评论
			if (!empty($user_id) && !empty($post_id) && !empty($content)){
				$res = UserForm::addComment($user_id,$post_id,$content); //添加评论
			}
			if (!empty($res)){
				return $this->redirect(['/post/index','id'=>$post_id]);
			}else{
				return $this->redirect(['/site/login']);
			}
		}

		//信息页加载
		$post_id = Yii::$app->request->get('id',0);
		$data['article_info'] = PostForm::PostInfoById($post_id, $user_id); //文章信息
		$data['userinfo'] = PostForm::UserInfo($data['article_info'], $user_id); //作者信息
		$data['tag'] = PostForm::postTag($post_id); //文章标签
		$data['hotdy'] = PostForm::hotestDynamic(); //热门动态
		$data['hotdy'] = PostForm::hotestDynamic(); //热门动态
		if (!empty($data['article_info']['cominfo'])){
				foreach ($data['article_info']['cominfo'] as $k => $v)
				{
					//此评论是否已赞
					$clike = PostForm::isCLike($user_id, $v['id']);
					$cunlike = PostForm::isCUnlike($user_id, $v['id']);
					$data['article_info']['cominfo'][$k]['ulike'] = $clike > 0 ?1:0;
					$data['article_info']['cominfo'][$k]['uunlike'] = $cunlike > 0 ? 1: 0;
					//查询评论子评论
					$data['article_info']['cominfo'][$k]['child_comment'] = PostForm::childChild($v['id'],$post_id);
					if (is_array($data['article_info']['cominfo'][$k]['child_comment']))
					{
						foreach ($data['article_info']['cominfo'][$k]['child_comment'] as $kk=>$vv)
						{
							$arr = explode('@ngyhd@', $vv['content']);
							if (!empty($arr[1]) && !empty(intval($arr[1])))
							{
								$user_obj = User::findOne($arr[1]);
								$data['article_info']['cominfo'][$k]['child_comment'][$kk]['content'] = "<a href='/user/center?id={$user_obj->id}'>@".$user_obj->username .'</a>'.'&nbsp;&nbsp;'.$arr['2'];
							}
								$data['article_info']['cominfo'][$k]['child_comment'][$kk]['ulike'] = PostForm::isCLike($vv['uid'], $vv['id']); //子评论赞
								$data['article_info']['cominfo'][$k]['child_comment'][$kk]['uunlike'] = PostForm::isCUnlike($vv['uid'], $vv['id']); //子评论踩
						}
					}
				}
			}

		return $this->render('index',[
			'data'=>$data
		]);
	}

	//文章点赞API
	public function actionZan()
	{
		$post_id = Yii::$app->request->get('post_id');
		$user_id = Yii::$app->user->id;
		if (empty($user_id))
		{
			return $this->redirect(['/site/login']);
		}
		$count = PostForm::isLike($user_id, $post_id);
		$res = false;
		if (empty($count) && $user_id)
		{
			$obj = new Like();
			$obj->user_id = $user_id;
			$obj->channel = 1;
			$obj->content_id = $post_id;
			$res = $obj->save();
		}
		return json_encode(['status'=>200,'data'=>$res,'msg'=>'','timestamp'=>time()]);
	}

	//文章收藏API
	public function actionFav()
	{
		$post_id = Yii::$app->request->get('post_id');
		$user_id = Yii::$app->user->id;

		$count = PostForm::isFav($user_id, $post_id);
		$res = false;
		if (empty($count) && !empty($user_id))
		{
			$obj = new Favorite();
			$obj->user_id = $user_id;
			$obj->post_id = $post_id;
			$res = $obj->save();
		}
		
		return json_encode(['status'=>200,'data'=>$res,'msg'=>'','timestamp'=>time()]);

	}

	//评论点赞API
	public function actionCLike()
	{
		$comment_id = Yii::$app->request->get('comment_id');
		$user_id = Yii::$app->user->id;
		if (empty($user_id))
		{
			return $this->redirect(['/site/login']);
		}
		$count = PostForm::isCLike($user_id, $comment_id);
		$res = false;
		if (empty($count))
		{
			$obj = new Like();
			$obj->user_id = $user_id;
			$obj->channel = 3;
			$obj->content_id = $comment_id;
			$res = $obj->save();
			if (!empty($res))
			{
				$comment_obj =Comment::findOne($comment_id);
				$comment_obj->like += 1;
				$res = $comment_obj->save();
			}
		}

		return json_encode(['status'=>200,'data'=>$res,'msg'=>'','timestamp'=>time()]);

	}
	//评论踩API
	public function actionCUnLike()
	{
		$comment_id = Yii::$app->request->get('comment_id');
		$user_id = Yii::$app->user->id;
		$count = PostForm::isCUnlike($user_id, $comment_id);
		$res = false;
		if (empty($count))
		{
			$obj = new Like();
			$obj->user_id = $user_id;
			$obj->channel = 4;
			$obj->content_id = $comment_id;
			$res = $obj->save();
			if (!empty($res))
			{
				$comment_obj =Comment::findOne($comment_id);
				$comment_obj->unlike += 1;
				$res = $comment_obj->save();
			}
		}

		return json_encode(['status'=>200,'data'=>$res,'msg'=>'','timestamp'=>time()]);
	}

	//回复评论
	public function actionReplyComment()
	{
		//回复评论
		//回复子评论
		$reply_comment = Yii::$app->request->post('reply_comment'); //评论ID
		$replyed_user_id = Yii::$app->request->post('replyed_user'); //被回复评论作者id
		$post_id = Yii::$app->request->post('post_id'); //文章ID
		$ccid = Yii::$app->request->post('child_cid'); //子评论id
		$param_arr = explode( '&', $reply_comment);
		if (is_array($param_arr))
		{
			foreach ($param_arr as $v)
			{
				$tmp_arr = explode('=', $v);
				$arr[$tmp_arr[0]] = $tmp_arr[1];
			}
		}
//		---------------------
		$res =  false;
		$user_id = Yii::$app->user->id;
		if (!empty($user_id)){
			$message = '不能回复自己的评论';
			if ($replyed_user_id != Yii::$app->user->id){
				$message = '';
			$arr['content'] = trim($arr['content']);
			$arr['content'] = strip_tags($arr['content']);
			$arr['content'] = urldecode(urldecode($arr['content']));
			if (!empty($arr['content']) && !empty($post_id)){ //内容不为空和文章idb不为空
				$prefix = $replyed_user_id?"@ngyhd@".$replyed_user_id.'@ngyhd@':'';
				$arr['content'] = $prefix.$arr['content'];
				$obj = new Comment();
				$obj->content = $arr['content'];
				$obj->user_id = $user_id;
				$obj->post_id = $post_id;
				$obj->pid = $arr['pid'];
				$res = $obj->save();
				//通知被@用户或文章作者 //TODO
				if (!empty($replyed_user_id))
				{
					$user_id = $replyed_user_id;
					$category = 1;
					$content_id = $ccid;
				}else{
					$user_id = Post::findOne($post_id)['author']; //文章作者
					$category = 0;
					$content_id = $post_id;
				}
				$notice_obj = new Notice();
				$notice_obj->receiver = $user_id;
				$notice_obj->sender = $user_id;
				$notice_obj->category = $category;
				$notice_obj->read_status = 0;
				$notice_obj->content_id = $content_id;
				$notice_obj->status = 10;
				$res = $notice_obj->save();
				}
			}
			return json_encode(['status'=>200,'data'=>$res,'msg'=>$message,'timestamp'=>time()]);
		}else{
			return $this->redirect(['/site/login']);
		}
	}

	//文章举报
	public function actionReport()
	{
		var_dump(Yii::$app->request->post());
		var_dump(urldecode(Yii::$app->request->post('form')));
	}

	public function actionCreate()
	{
		if (Yii::$app->request->isPost)
		{
			$user_id = Yii::$app->user->id;
			if (!empty($user_id)){
				$post_obj = new Post();
				$post_obj->title = Yii::$app->request->post('title');
				$post_obj->content = Yii::$app->request->post('content');
				$post_obj->status = 10;
				$post_obj->descript = substr(strip_tags(Yii::$app->request->post('content')), 0,60).'...';
				$post_obj->author = $user_id;
				$post_obj->post_category = Yii::$app->request->post('category');
				$res = $post_obj->save();
				if (!empty($res))
				{
					return $this->redirect('/post/index?id='.$post_obj->id);
				}
			}else{
				return $this->redirect(['/site/login']);
			}

		}
		$category = Category::find()->asArray()->all();
		return $this->render('create',[
			'category' => $category
		]);
	}



}
