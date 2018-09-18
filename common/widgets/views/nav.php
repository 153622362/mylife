<nav aria-label="Page navigation" class="text-center">
	<ul class="pagination">
		<li class="<?php if (Yii::$app->request->get('page') == 1){echo 'disabled';}?>">
			<a href="?<?php $params = Yii::$app->request->get();
			if (!empty($params))
			{
				foreach ($params as $k=>$v)
				{
					if ($k != 'page')
					{
						echo $k.'=',$v.'&';
					}
				}
			}
			?>page=<?php  if (Yii::$app->request->get('page') > 1){echo Yii::$app->request->get('page') - 1; }else{$page = 1;echo $page;}?>" aria-label="Previous" >
				<span aria-hidden="true">&laquo;</span>
			</a>
		</li>
		<?php $count_page = ceil($count / $pageSize);
		for ($i = 1 ; $i<= $count_page; $i++){
			?>
			<li class="<?php if (Yii::$app->request->get('page')== $i){echo 'active';}?>"><a href="?<?php $params = Yii::$app->request->get();
				if (!empty($params))
				{
					foreach ($params as $k=>$v)
					{
						if ($k != 'page')
						{
							echo $k.'=',$v.'&';
						}
					}
				}
				?>page=<?=$i?>"><?=$i?></a></li>
		<?php }?>
		<li class="<?php if (Yii::$app->request->get('page') == $count_page){echo 'disabled';}?>">
			<a href="?<?php $params = Yii::$app->request->get();
			if (!empty($params))
			{
				foreach ($params as $k=>$v)
				{
					if ($k != 'page')
					{
						echo $k.'=',$v.'&';
					}
				}
			}
			?>page=<?php
			if (Yii::$app->request->get('page') < $count_page ){
				if (Yii::$app->request->get('page') > 0){
					echo Yii::$app->request->get('page') + 1;
				}else{
					echo 2;
				}
			}else{echo $count_page;}?>" aria-label="Next">
				<span aria-hidden="true">&raquo;</span>
			</a>
		</li>
	</ul>
</nav>