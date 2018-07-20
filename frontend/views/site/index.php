<?php

/* @var $this yii\web\View */

$this->title = 'My Life';
?>
<link rel="stylesheet" href="/css/stie.css">
<div class="container">
    <div class="col-lg-9">
        <div class="panel panel-default">
            <div class="panel-body">
                <div>
						<h1 style="float: left"><span class="text-danger">快速</span>、和<span class="text-success">安全</span>、<span class="text-primary">专业</span>的 PHP 框架</h1>
						<h3 style="clear:both;">Yii 是一个 高性能 的，适用于开发 WEB 2.0 应用的 PHP 框架。</h3>
						<h4> Yii 自带了 丰富的功能，包括 MVC，DAO/ActiveRecord，I18N/L10N，缓存，身份验证和基于角色的访问控制，脚手架，测试等，可显著缩短开发时间。</h4>
				</div>
                <div>
                    <button type="button" class="btn btn-success "><span class="glyphicon glyphicon-facetime-video"></span>  视频教程</button>
                    <button type="button" class="btn btn-primary "><span class="glyphicon glyphicon-book"></span>  中文文档</button>
                    <button type="button" class="btn btn-danger "><span class="glyphicon glyphicon glyphicon-save"></span>  下载框架</button>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-lg-4"><h1><span class="glyphicon glyphicon-flash text-danger">快速</span></h1><h5 class="text-muted">Yii 仅加载您需要的功能，具有强大的缓存支持，通过尽可能少的开销提供最大化的功能。</h5></div>
                <div class="col-lg-4"><h1><span class="glyphicon glyphicon-link text-success">安全</span></h1><h5 class="text-muted">Yii 的标准是安全的，健全的默认设置和内置工具可帮助您编写更加稳定和安全的代码。</h5></div>
                <div class="col-lg-4"><h1><span class="glyphicon glyphicon-thumbs-up text-primary">专业</span></h1><h5 class="text-muted">Yii 使用简单但功能强大的 API 和代码生成功能，让您在更短的时间内编写更多代码。</h5></div>

            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading"><span class="glyphicon glyphicon-send"></span>  最新动态</div>
            <div class="panel-body">
                <div class="col-lg-6">
					<ul class="list-unstyled">
						<li><span class="glyphicon glyphicon-menu-right font-size" style="color: grey"></span> 1</li>
						<li><span class="glyphicon glyphicon-menu-right" style="color: grey"></span> 2</li>
						<li><span class="glyphicon glyphicon-menu-right" style="color: grey"></span> 3</li>
					</ul>
				</div>
                <div class="col-lg-6">
					<ul class="list-unstyled">
						<li><span class="glyphicon glyphicon-menu-right" style="color: grey"></span> 1</li>
						<li><span class="glyphicon glyphicon-menu-right" style="color: grey"></span> 2</li>
						<li><span class="glyphicon glyphicon-menu-right" style="color: grey"></span> 3</li>
					</ul>
				</div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading"><span class="glyphicon glyphicon-question-sign"></span>  最新问答</div>
            <div class="panel-body">
                <table class="table table-hover">
                    <tr><th>问题</th><th>版本</th><th>提问者</th><th>时间</th><th>回答</th></tr>
                    <tr><td><span class="glyphicon glyphicon-question-sign text-danger"></span></td><td>2</td><td>3</td><td>3</td><td>3</td></tr>
                    <tr><td><span class="glyphicon glyphicon-question-sign text-danger"></span></td><td>2</td><td>3</td><td>3</td><td>3</td></tr>
                    <tr><td><span class="glyphicon glyphicon-question-sign text-danger"></span></td><td>2</td><td>3</td><td>3</td><td>3</td></tr>
                    <tr><td><span class="glyphicon glyphicon-question-sign text-danger"></span></td><td>2</td><td>3</td><td>3</td><td>3</td></tr>
                    <tr><td><span class="glyphicon glyphicon-ok-sign text-success"></span></td><td>2</td><td>3</td><td>3</td><td>3</td></tr>
                </table>
            </div>
        </div>
<!--		最新话题-->
        <div class="panel panel-default">
            <div class="panel-heading"><span class="glyphicon glyphicon-magnet"></span>  最新话题</div>
            <div class="panel-body">
                <table class="table table-hover">
                    <tr><th>话题</th><th>版块</th><th>发布者</th><th>时间</th><th>留言</th></tr>
                    <tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td></tr>
                    <tr><td>1</td><td>2</td><td>3</td><td>3</td><td>3</td></tr>
                    <tr><td>1</td><td>2</td><td>3</td><td>3</td><td>3</td></tr>
                    <tr><td>1</td><td>2</td><td>3</td><td>3</td><td>3</td></tr>
                    <tr><td>1</td><td>2</td><td>3</td><td>3</td><td>3</td></tr>

                </table>
            </div>
        </div>
    </div>

<!--	右侧-->
    <div class="col-lg-3">
        <div class="panel panel-default">
            <div class="panel-heading">大家都在说<a style="float: right">更多</a></div>
            <div class="panel-body">
                <div class="input-group">
                    <textarea  class="form-control" placeholder="文明上网,理性发言" style="resize:none" ></textarea>
                    <span class="input-group-btn"><button class="btn btn-success btn-lg" type="button" style="height: 4.5rem">发布</button></span>
                </div>
<!--                留言板-->
                <div>
<!--                    一条留言的开始-->
                        <hr style="margin: 10px 0px;border: 0.5px solid lightgrey">
                        <div class="col-lg-3 col-sm-3 col-md-3" ><img src="/static/img/logo.png" style="width: 3rem" alt=""></div>
                        <div class="col-lg-9 col-sm-9 col-md-9">
    <!--                        名字-->
                            <a href="">ngyhd</a>:
    <!--                        内容-->
                            <span>内容</span>
    <!--                        留言底部-->
                            <div style="margin-bottom: 1rem">
                                <span>时间</span>
                                <span style="float: right">
                                    <a href="">留言数</a>
                                    <a href="">点赞数</a>
                                </span>
                            </div>
                        </div>
<!--                    一条留言的结束-->
                    <!--                    一条留言的开始-->
                        <hr style="margin: 10px 0px;border: 0.5px solid lightgrey">
                        <div class="col-lg-3 col-sm-3 col-md-3" ><img src="/static/img/logo.png" style="width: 3rem" alt=""></div>
                        <div class="col-lg-9 col-sm-9 col-md-9">
    <!--                        名字-->
                            <a href="">ngyhd</a>:
    <!--                        内容-->
                            <span>内容</span>
    <!--                        留言底部-->
                            <div style="margin-bottom: 1rem">
                                <span>时间</span>
                                <span style="float: right">
                                    <a href="">留言数</a>
                                    <a href="">点赞数</a>
                                </span>
                            </div>
                        </div>
<!--                    一条留言的结束-->


                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">最新教程<a style="float: right">更多</a></div>
            <div class="panel-body">
                loading...
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">最新扩展<a style="float: right">更多</a></div>
            <div class="panel-body">
                loading...
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">最新源码<a style="float: right">更多</a></div>
            <div class="panel-body">
                loading...
            </div>
        </div>
    </div>
</div>
