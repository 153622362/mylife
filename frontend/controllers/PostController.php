<?php
namespace frontend\controllers;


use common\models\Post;
use common\models\User;
use frontend\models\Comment;
use frontend\models\Fans;
use frontend\models\Favorite;
use frontend\models\form\PostForm;
use frontend\models\Like;
use Yii;
use yii\filters\VerbFilter;
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
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
	{
		$post_id = Yii::$app->request->get('id',0);
		$post_obj = Post::findOne($post_id);
		$post_obj->visitor += 1;
		$post_obj->save();
		if (Yii::$app->request->isPost)
		{
			$post = Yii::$app->request->post();
			$content = strip_tags($post['content']);
			if (!empty($content) && !empty($post_id)){
				$comment_obj = new Comment();
				$comment_obj->content = strip_tags($post['content']);
				$comment_obj->user_id = Yii::$app->user->id;
				$comment_obj->post_id = $post_id;
				$res = $comment_obj->save();
				if (!empty($res)){
					return $this->redirect(['post/index','id'=>$post_id]);
				}
			}
			return $this->redirect(['post/index','id'=>$post_id]);

		}
		$data['article_info'] = PostForm::PostInfoById($post_id); //文章信息
		$data['clike'] = PostForm::PostLikeByID($post_id); //点赞数
		$data['cfav'] = PostForm::PostFavByID($post_id); //收藏数
		$data['ccom'] = PostForm::PostComByID($post_id); //评论数
		$data['likeinfo'] = PostForm::PostLikeInfoById($post_id); //点赞信息
		$data['cominfo'] = PostForm::PostComInfoById($post_id); //评论信息
		$data['hotdy'] = PostForm::hotestDynamic(); //热门动态
		$data['userinfo'] = PostForm::UserInfo($data['article_info']); //作者信息
		$data['cfan'] = PostForm::FanCount($data['article_info']['author']); //用户粉丝数
		$user_id = Yii::$app->user->id;
		$data['isfan'] = Fans::findOne(['user_id'=>$data['article_info']['author'], 'fans_user_id'=>$user_id]); //是否关注文章作者
		if (!empty($user_id)){
			if (!empty($data['cominfo'])){
				foreach ($data['cominfo'] as $k => $v)
				{
					//此评论是否已赞
					$clike = PostForm::isCLike($user_id, $v['id']);
					$cunlike = PostForm::isCUnlike($user_id, $v['id']);
					if ($clike > 0 )
					{
						$data['cominfo'][$k]['ulike'] = 1; //评论点赞
					}else{
						$data['cominfo'][$k]['ulike'] = 0;
					}
					if ($cunlike > 0 )
					{
						$data['cominfo'][$k]['uunlike'] = 1; //评论踩
					}else{
						$data['cominfo'][$k]['uunlike'] = 0;
					}

					//查询评论子评论
					$data['cominfo'][$k]['child_comment'] = PostForm::childChild($v['id'],$post_id);
//					var_dump($data['cominfo'][$k]['child_comment']);exit;
					if (is_array($data['cominfo'][$k]['child_comment']))
					{
						foreach ($data['cominfo'][$k]['child_comment'] as $kk=>$vv)
						{
								$data['cominfo'][$k]['child_comment'][$kk]['ulike'] = PostForm::isCLike($vv['uid'], $vv['id']); //子评论赞
								$data['cominfo'][$k]['child_comment'][$kk]['uunlike'] = PostForm::isCUnlike($vv['uid'], $vv['id']); //子评论踩
						}
					}
				}
			}


			$fav = PostForm::isFav($user_id, $post_id);
			$like = PostForm::isLike($user_id, $post_id);
			if ($like > 0)
			{
				$data['ulike'] = 1; //用户已点赞文章
			}else{
				$data['ulike'] = 0;
			}

			if ($fav > 0)
			{
				$data['ufav'] = 1; //用户已收藏文章
			}else{
				$data['ufav'] = 0;
			}
		}
//		var_dump($data);exit;
		return $this->render('index',[
			'data'=>$data
		]);
	}

	//文章点赞API
	public function actionZan()
	{
		$post_id = Yii::$app->request->get('post_id');
		$user_id = Yii::$app->user->id;

		$count = PostForm::isLike($user_id, $post_id);
		$res = false;
		if (empty($count))
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
		if (empty($count))
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
		$reply_comment = Yii::$app->request->post('reply_comment'); //评论ID
		$replyed_user_id = Yii::$app->request->post('replyed_user'); //子评论被回复ID
//		$child_cid = Yii::$app->request->post('child_cid'); //子评论ID
		$post_id = Yii::$app->request->post('post_id'); //文章ID
		$param_arr = explode( '&', $reply_comment);
		if (is_array($param_arr))
		{
			foreach ($param_arr as $v)
			{
				$tmp_arr = explode('=', $v);
				$arr[$tmp_arr[0]] = $tmp_arr[1];
			}
		}

		$arr['content'] = trim($arr['content']);
		$arr['content'] = strip_tags($arr['content']);
		$arr['content'] = urldecode($arr['content']);
		$res =  false;
		if (!empty($arr['content']) && !empty($post_id)){
			//如果回复的是子评论
			if (!empty($replyed_user_id))
			{
				$user_obj = User::findOne($replyed_user_id);
				if (!empty($user_obj))
				{
					$username = $user_obj->username;
				}
				$a_tag_content = "<a href='/user/center?id=$replyed_user_id'>@$username</a>&nbsp;&nbsp;";
				//通知被@用户 //TODO

			}
			$arr['content'] = $a_tag_content.$arr['content'];
			$obj = new Comment();
			$obj->content = $arr['content'];
			$obj->user_id = Yii::$app->user->id;
			$obj->post_id = $post_id;
			$obj->pid = $arr['pid'];
			$res = $obj->save();
		}
		return json_encode(['status'=>200,'data'=>$res,'msg'=>'','timestamp'=>time()]);
	}

	//文章举报
	public function actionReport()
	{
		var_dump(Yii::$app->request->post());
		var_dump(urldecode(Yii::$app->request->post('form')));
	}



}
