<div class="col-lg-3">

	<div class="list-group">
		<a href="/user/setting" class="list-group-item active">账户设置</a>
		<a href="/user/notice"  class="list-group-item">我的提醒</a>
		<a href="/user/message" class="list-group-item">我的私信</a>
		<a href="/user/sign" 		 class="list-group-item">我的签到</a>
		<a href="/user/post" 		 class="list-group-item">我的帖子</a>
		<a href="/user/favorite" class="list-group-item">我的收藏</a>
		<a href="/user/score" 	 class="list-group-item">我的积分</a>
	</div>

</div>

<div class="col-lg-9 nav">
	<div>
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist" style="margin-bottom: 10px">
			<li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">个人信息</a></li>
			<li role="presentation"><a href="#passwod" aria-controls="passwod" role="tab" data-toggle="tab">修改密码</a></li>
			<li role="presentation"><a href="#email" aria-controls="email" role="tab" data-toggle="tab">修改邮箱</a></li>
			<li role="presentation"><a href="#login" aria-controls="login" role="tab" data-toggle="tab">第三方登陆</a></li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
<!--			个人信息-->
			<div role="tabpanel" class="tab-pane active" id="profile">

					<form class="form-horizontal">
						<div class="form-group">
							<label for="inputPassword3" class="col-sm-2 control-label">个人主页</label>
							<div class="col-sm-7">
								<input type="password" class="form-control" id="inputPassword3" placeholder="个人主页">
							</div>
							<label class="col-sm-3" style="padding-top:7px "></label>
						</div>
						<div class="form-group">
							<label for="tag" class="col-sm-2 control-label">个性签名</label>
							<div class="col-sm-7">
								<input type="password" class="form-control" id="tag" placeholder="个性签名">
							</div>
							<label class="col-sm-3" style="padding-top:7px "></label>
						</div>


						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-default">修改</button>
							</div>
						</div>
					</form>

			</div>
<!--			个人偏好-->
			<div role="tabpanel" class="tab-pane" id="favorite">2</div>
<!--			修改头像-->
			<div role="tabpanel" class="tab-pane" id="avatar"></div>
<!--			修改密码-->
			<div role="tabpanel" class="tab-pane" id="passwod">
				<form class="form-horizontal">

				<div class="form-group">
					<label for="inputPassword4" class="col-sm-2 control-label">新的密码</label>
					<div class="col-sm-7">
						<input type="email" class="form-control" id="inputPassword4" placeholder="请输入新的密码">
					</div>
					<label class="col-sm-3 text-metued" style="padding-top:7px "></label>
				</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-default">修改</button>
						</div>
					</div>
				</form>
			</div>
<!--			修改邮箱-->
			<div role="tabpanel" class="tab-pane" id="email">
				<form class="form-horizontal">
				<div class="form-group">
					<label for="inputEmail4" class="col-sm-2 control-label">电子邮箱</label>
					<div class="col-sm-7">
						<input type="email" class="form-control" id="inputEmail4" placeholder="请输入新的邮箱">
					</div>
					<label class="col-sm-3 text-metued" style="padding-top:7px ">此邮箱将被公开</label>
				</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-default">修改</button>
						</div>
					</div>
				</form>
			</div>
<!--			第三方登陆-->
			<div role="tabpanel" class="tab-pane" id="login">
				<div class="panel panel-default">
					<div class="panel-body">
				<svg style="width: 2rem" class="svg-inline--fa fa-qq fa-w-14 fa-fw" aria-hidden="true" data-prefix="fab" data-icon="qq" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M433.754 420.445c-11.526 1.393-44.86-52.741-44.86-52.741 0 31.345-16.136 72.247-51.051 101.786 16.842 5.192 54.843 19.167 45.803 34.421-7.316 12.343-125.51 7.881-159.632 4.037-34.122 3.844-152.316 8.306-159.632-4.037-9.045-15.25 28.918-29.214 45.783-34.415-34.92-29.539-51.059-70.445-51.059-101.792 0 0-33.334 54.134-44.859 52.741-5.37-.65-12.424-29.644 9.347-99.704 10.261-33.024 21.995-60.478 40.144-105.779C60.683 98.063 108.982.006 224 0c113.737.006 163.156 96.133 160.264 214.963 18.118 45.223 29.912 72.85 40.144 105.778 21.768 70.06 14.716 99.053 9.346 99.704z"></path></svg> 解绑绑定
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-body">
				<svg style="width: 2rem" class="svg-inline--fa fa-weibo fa-w-16 fa-fw" aria-hidden="true" data-prefix="fab" data-icon="weibo" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M407 177.6c7.6-24-13.4-46.8-37.4-41.7-22 4.8-28.8-28.1-7.1-32.8 50.1-10.9 92.3 37.1 76.5 84.8-6.8 21.2-38.8 10.8-32-10.3zM214.8 446.7C108.5 446.7 0 395.3 0 310.4c0-44.3 28-95.4 76.3-143.7C176 67 279.5 65.8 249.9 161c-4 13.1 12.3 5.7 12.3 6 79.5-33.6 140.5-16.8 114 51.4-3.7 9.4 1.1 10.9 8.3 13.1 135.7 42.3 34.8 215.2-169.7 215.2zm143.7-146.3c-5.4-55.7-78.5-94-163.4-85.7-84.8 8.6-148.8 60.3-143.4 116s78.5 94 163.4 85.7c84.8-8.6 148.8-60.3 143.4-116zM347.9 35.1c-25.9 5.6-16.8 43.7 8.3 38.3 72.3-15.2 134.8 52.8 111.7 124-7.4 24.2 29.1 37 37.4 12 31.9-99.8-55.1-195.9-157.4-174.3zm-78.5 311c-17.1 38.8-66.8 60-109.1 46.3-40.8-13.1-58-53.4-40.3-89.7 17.7-35.4 63.1-55.4 103.4-45.1 42 10.8 63.1 50.2 46 88.5zm-86.3-30c-12.9-5.4-30 .3-38 12.9-8.3 12.9-4.3 28 8.6 34 13.1 6 30.8.3 39.1-12.9 8-13.1 3.7-28.3-9.7-34zm32.6-13.4c-5.1-1.7-11.4.6-14.3 5.4-2.9 5.1-1.4 10.6 3.7 12.9 5.1 2 11.7-.3 14.6-5.4 2.8-5.2 1.1-10.9-4-12.9z"></path></svg>解绑绑定
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-body">
				<svg style="width: 2rem" class="svg-inline--fa fa-github fa-w-16 fa-fw" aria-hidden="true" data-prefix="fab" data-icon="github" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" data-fa-i2svg=""><path fill="currentColor" d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3.3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5.3-6.2 2.3zm44.2-1.7c-2.9.7-4.9 2.6-4.6 4.9.3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3.7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3.3 2.9 2.3 3.9 1.6 1 3.6.7 4.3-.7.7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3.7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3.7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z"></path></svg>解绑绑定
				</div>
			</div>
			</div>
		</div>
	</div>
</div>
