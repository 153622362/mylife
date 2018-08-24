<?php

/* @var $this yii\web\View */

$this->title = 'My Life';
?>
<style>

    body{
        font-size: 14px;
    }
    .text-one-line{
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    table{
        margin-bottom: 0 !important;
    }
    .panel-body{
        padding-bottom: 2px;
    }
    .dynamic{
        padding-left: 0;
    }
    .dynamic li{
        padding-left: 0.5rem;
    }
    h3{
        margin: 0;
    }


    .panel{
        font-size: 20px;
    }

    .box-wrapper {
        width: 45px;
        background: #009688;
        position: fixed;
        top: 100px;
        left: 5px;
        bottom: 100px;
        overflow: hidden;
        border: 1px solid grey;
        border-radius: 0.25rem;
    }

    .box {
        height: 100%;
        width: calc(100% + 17px);
        overflow-y: auto;
        text-align: center;
        color: #f2f2f2;
    }

    .box .item {
        height: 40px;
        line-height: 40px;
        width: 40px;
        cursor: pointer;
        position: relative;
    }

    .box div p{
        margin: 0;
        width: 30px;
    }
    a:hover{
        text-decoration: none;
    }
    a:link{
        text-decoration: none;
    }
    a:visited{
        text-decoration: none;
    }

</style>
<link rel="stylesheet" href="/css/stie.css">
<meta name="csrf-token" content="<?= \Yii::$app->request->csrfToken ?>">
<!--    <div class="online visible-lg-block">-->
<!--            <div style="border-bottom: 1px solid darkgrey;width: inherit;word-break: break-all">-->
<!--                <p>在线</p>-->
<!--                <p>241<p>人</p></p>-->
<!--            </div>-->

<!--    </div>-->
<div style="position: fixed;top: 58px;left: 5px;width: 45px;text-align: center;border: 1px solid black;border-radius: 0.25rem" class="visible-lg-block">在线<span id="people">0</span>人</div>
<div class="box-wrapper visible-lg-block" >
    <div class="box visible-lg-block" >
<!--在线区域-->
    </div>
</div>

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
            <div class="panel-heading"><h3><span class="glyphicon glyphicon-send"></span>  最新动态</h3></div>
            <div class="panel-body">
                <?php if (is_array($dynamic) && count($dynamic) > 0){ ?>
                <div class="col-lg-6 dynamic">
					<ul class="list-unstyled ">
                        <?php for ($x = 0; $x<=4; $x++){?>
						<li style="line-height: 35px">
                            <div class="text-one-line" style="width: 20rem;display: inline-block">
                                <span class="glyphicon glyphicon-menu-right font-size " style="color: grey"></span>
                                <a href=""><?=$dynamic[$x]['title']?></a>
                            </div>
                            <span style="font-size: 1rem;float: right;color: grey" class="hidden-xs hidden-md  hidden-sm"><?php echo date('Y-m-d',strtotime($dynamic[$x]['created_at']))?></span>
                        </li>
                        <?php }}?>
					</ul>
				</div>
                <?php if (is_array($dynamic) && count($dynamic) >5 ){?>
                <div class="col-lg-6 hidden-xs hidden-md hidden-sm">
					<ul class="list-unstyled" style="line-height: 35px">
                        <?php for ($x = 5; $x<=9; $x++){ if (!empty($dynamic[$x]['title'])){?>
                            <li class="text-one-line col-lg-9"><span class="glyphicon glyphicon-menu-right font-size" style="color: grey"></span>
                                <a href=""><?=$dynamic[$x]['title']?></a>
                            </li>
                            <span style="font-size: 1rem;float: right;color: grey"><?php echo date('Y-m-d',strtotime($dynamic[$x]['created_at']))?></span>
                        <?php }}}?>
					</ul>
				</div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading"><h3><span class="glyphicon glyphicon-question-sign"></span>  最新问答</h3></div>
            <div class="panel-body">
                <table class="table table-hover">
                    <tr>
                        <th style="width: 20rem">问题</th>
                        <th class="hidden-xs hidden-sm hidden-md">版本</th>
                        <th class="hidden-xs hidden-sm hidden-md">提问者</th>
                        <th class="hidden-xs hidden-sm hidden-md">时间</th>
                        <th class="hidden-xs hidden-sm hidden-md">回答</th></tr>
                    <?php if (is_array($question)){ foreach ($question as $v_question){ ?>
                    <tr><td >
                            <div class="col-lg-9 text-one-line" style="padding-left: 0px;width: 20rem">
                            <?php if ($v_question['post_status'] == 1){ echo '<span class="glyphicon glyphicon-question-sign text-danger"></span>';}else{ echo '<span class="glyphicon glyphicon-ok-sign text-success"></span>';}?>
                            <a href="" class=""><?=$v_question['title']?></a>
                            </div>
                        </td>
                        <td class="hidden-xs hidden-sm hidden-md"><?=$v_question['post_version']?></td>
                        <td class="hidden-xs hidden-sm hidden-md"><?=$v_question['username']?></td>
                        <td class="hidden-xs hidden-sm hidden-md"><?=$v_question['created_at']?></td>
                        <td class="hidden-xs hidden-sm hidden-md"><span class="badge"><?=$v_question['count']?></span></td>
                    </tr>
                    <?php }}?>
                </table>
            </div>
        </div>
<!--		最新话题-->
        <div class="panel panel-default">
            <div class="panel-heading"><h3><span class="glyphicon glyphicon-magnet"></span>  最新话题</h3></div>
            <div class="panel-body">
                <table class="table table-hover">
                    <tr>
                        <th style="width: 20rem">话题</th>
                        <th class="hidden-xs hidden-sm hidden-md">版块</th>
                        <th class="hidden-xs hidden-sm hidden-md">发布者</th>
                        <th class="hidden-xs hidden-sm hidden-md">时间</th>
                        <th class="hidden-xs hidden-sm hidden-md">留言</th></tr>
                    <?php if (is_array($topic)){ foreach ($topic as $v_topic){ ?>
                        <tr>
                            <td>
                                <div class="col-lg-9 text-one-line" style="padding-left: 0px;width: 20rem">
                                <a><?=$v_topic['title']?></a>
                                </div>
                            </td>
                            <td class="hidden-xs hidden-sm hidden-md"><?=$v_topic['post_category']?></td>
                            <td class="hidden-xs hidden-sm hidden-md"><?=$v_topic['username']?></td>
                            <td class="hidden-xs hidden-sm hidden-md"><?=$v_topic['created_at']?></td>
                            <td class="hidden-xs hidden-sm hidden-md"><span class="badge"><?=$v_topic['count']?></span></td>
                        </tr>
                    <?php }}?>

                </table>
            </div>
        </div>
    </div>

<!--	右侧-->
    <div class="col-lg-3">
        <div class="panel panel-default">
            <div class="panel-heading">大家都在说<a style="float: right;cursor:pointer">更多</a></div>
            <div class="panel-body">
                <div class="input-group">
                    <textarea  class="form-control" placeholder="文明上网,理性发言" style="resize:none;height: 54px" id="message"></textarea>
                    <span class="input-group-btn"><button class="btn btn-success btn-lg" type="button" style="height: 54px" id="publish">发布</button></span>
                </div>
<!--                留言板-->
                <div id="message-board" style="overflow-y: scroll;overflow-x: hidden;max-height: 700px">
<!--                    一条留言的开始-->
                    <?php if (is_array($chat) && count($chat) > 0){
                            foreach ($chat as $v_chat){
                        ?>
                        <div>
                            <hr style="margin: 10px 0px;border: 0.5px solid lightgrey">
                            <div class="col-lg-3 col-sm-3 col-md-3" ><img src="<?=$v_chat['avatar']?>" style="width: 40px" alt=""></div>
                            <div class="col-lg-9 col-sm-9 col-md-9">
        <!--                        名字-->
                                <a href=""><?=$v_chat['username']?></a>:
        <!--                        内容-->
                                <span style="word-break: break-all;font-size: 16px"><?=$v_chat['content']?></span>
        <!--                        留言底部-->
                                <div style="margin: 1rem 0;font-size: 16px" class="text-muted" >
                                    <span  class="" style="font-size: 14px"><?=$v_chat['created_at']?></span>
                                    <span style="float: right;">
                                        <a href="#" class="text-muted" message-id="<?=$v_chat['id']?>"><span class="glyphicon glyphicon-comment" title="回复"></span> <span><?=$v_chat['pid']?></span></a>
                                        <a href="#" class="text-muted" chat-id="<?=$v_chat['id']?>"><span class="glyphicon glyphicon-thumbs-up <?php echo $v_chat['zan']? 'text-success':'' ?>" title="顶"  ></span> <span><?=$v_chat['like']?></span></a>
                                    </span>
                                </div>
                            </div>
                                <div class=" col-lg-offset-2 col-sm-offset-2 col-md-offset-2 col-xs-offset-2 col-lg-10" style="width:92%;max-height: 500px;overflow-y: scroll;display: none" message="<?=$v_chat['id']?>">
<!--                                    一条回复的开始-->
<!--                                    <div >-->
<!--                                        <img src="/static/img/logo.png" style="width: 30px" alt="">-->
<!--                                        <a>xxxx:</a>-->
<!--                                        <span style="word-break: break-all;font-size: 16px">--><?//=$v_chat['content']?><!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</span>-->
<!--                                        <p><span  class="text-muted" style="font-size: 14px">--><?//=$v_chat['created_at']?><!--</span></p>-->
<!--                                    </div>-->
                                </div>
                        </div>
                            <?php }}?>

                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">最新教程<a style="float: right;cursor:pointer">更多</a></div>
            <div class="panel-body">
                <?php if(is_array($course)){foreach ($course as $v_course){?>
                    <p class="text-one-line"><a href=""><?=$v_course['title']?></a></p>
                <?php }}?>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">最新扩展<a style="float: right;cursor:pointer">更多</a></div>
            <div class="panel-body">
                <?php if(is_array($extension)){foreach ($extension as $v_extension){?>
                    <p class="text-one-line"><a href=""><?=$v_extension['title']?></a></p>
                <?php }}?>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">最新源码<a style="float: right;cursor:pointer">更多</a></div>
            <div class="panel-body">
                <?php if(is_array($origin_code)){foreach ($origin_code as $v_origin_code){?>
                    <p class="text-one-line"><a href=""><?=$v_origin_code['title']?></a></p>
                <?php }}?>
            </div>
        </div>
    </div>
</div>

<script>
    var uid = '<?=$uid?>';
    var ws = new WebSocket("ws://192.168.199.102:3123");
    ws.onopen = function() {
        $('#message-board').prepend('<h6 style="color: grey">系统消息:连接成功</h6>');
        console.log("连接成功");
        var str = '';

        if ( uid != '' ){
             str = '{ "uid": "' + uid + '","message_type":"onopen" }';
            ws.send(str);
        }else {
             str = '{ "message_type":"onopen" }';
            ws.send(str);
        }
        str = '{ "message_type":"init" }';
        ws.send(str);
    };
    ws.onmessage = function(e) {
        console.log("收到服务端的消息：" + e.data);
        var data = JSON.parse(e.data);
        if (data.message_type != undefined){
            switch (data.message_type)
            {
                case 'init':
                    $('#people').html(data.message.people); //修改在线人数
                    if ( data.message.vip != ''){
                        for (var user_info in data.message.vip)
                        {
                            var res = $('#'+ user_info).attr('src');
                            if ( res == undefined){
                                $('.box').prepend(
                                    '<div class="item"><img  src="'+ data.message.vip[user_info] +'" style="width: 30px" alt="" id="' + user_info + '"></div>'
                                )
                            }
                        }
                    }
                    break;
                case 'connect':
                    break;
                case 'onopen':
                    $('#message-board').prepend("<h6 style='color: grey'>系统消息:" + data.message +"</h6>");
                    break;
                case 'publish':
//                    var myDate = new Date();
//                    var seconds = myDate.getSeconds();
//                    var message_time = parseInt(data.message.created_at.substr(-2));
//                    console.log(parseInt(data.message.created_at.substr(-2)));
//                    console.log(seconds);
                    var html = '<div><hr style="margin: 10px 0px;border: 0.5px solid lightgrey"> <div class="col-lg-3 col-sm-3 col-md-3" ><img src="'+ data.message.avatar +'" style="width: 3rem" alt=""></div> <div class="col-lg-9 col-sm-9 col-md-9"> <a href="">'+ data.message.uid + '</a>:<span style="word-break: break-all;font-size: 16px">' + data.message.content +'</span> <div style="margin: 1rem 0;font-size: 16px" class="text-muted">  <span style="float: right"> <a href="" class="text-muted"  title="回复"><span class="glyphicon glyphicon-comment" ></span> <span>0</span></a> <a href="#" class="text-muted" chat-id="'+ data.message.chat_id +'"><span class="glyphicon glyphicon-thumbs-up" title="顶" ></span> <span>0</span></a> </span> </div> </div></div>'
                    $('#message-board').prepend(html);
                    $('#message').val(''); //重置留言区

                    break;
                case 'onclose':
                    $('#people').html(data.people); //修改在线人数
                    //修改头像
                    var mylogo = $('#' + data.uid).attr('src');
                    if ( mylogo != undefined )
                    {
//                        $('#' + data.uid).remove();
                        $('#' + data.uid).parent().attr('id','delete');
                        $('#delete').remove();
                    }
                    $('#message-board').prepend("<h6 style='color: grey'>系统消息:" + data.message +"</h6>");
                    break;
                case 'zan':
                    if ( data.chat_id != ''){
                        var  zans = parseInt($('a[chat-id='+ data.chat_id +']').children().eq(1).html());
                        zans += 1;
                        $('a[chat-id='+ data.chat_id +']').children().eq(1).html(zans);
                    }
                    break;
                default:
                    break;
            }
        }
    };

    ws.onerror = function () {
        $('#message-board').prepend('<h6 style="color: grey">系统消息:连接失败</h6>');
    };

    ws.onclose = function () {
        $('#message-board').prepend('<h6 style="color: grey">系统消息:连接已关闭</h6>');
    };

    $('#publish').on('click',function () {
        var content  = $.trim($('#message').val());

        if ( uid == '')
        {
            window.location.href = '/site/login';
            return ;
        }
        if ( content == '' || content == undefined)
        {
            alert('留言不能为空');
        }else {
            var str = '{ "uid": "' + uid + '","message": "'+ content +'","message_type":"publish" }';
            ws.send(str)
        }


    });

    $('a[chat-id]').each(function (i) {
        this.addEventListener('click',function (e) {
            e.stopPropagation();
            e.preventDefault();
            this.firstChild.classList.add('text-success'); //修改颜色
            var chat_id = this.getAttribute('chat-id');
            var str = '{ "uid": "' + uid + '","message_type":"zan" ,"chat_id":"' + chat_id + '" ,"user_id":"' + uid + '"}';
            ws.send(str);
        })
    });

    $('a[message-id]').each(function (i) {
        this.addEventListener('click',function (e) {
            e.stopPropagation();
            e.preventDefault();
            var message_id = this.getAttribute('message-id');
            var url = '<?=\yii\helpers\Url::to(['chat/index'])?>';
            Gajax(message_id,url);
            setTimeout(function () {
                $('[message='+ message_id +']').slideToggle();
            },200)
        })
    })


    function Gajax(pid,url) {
//        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        var res = $('[message='+ pid +']').children().length;
        if (res != 0 )
        {
                return ;
        }
        $.ajax({
            type: "Get",
            url: url,
            data: {
                pid:pid,
            },
            dataType: "json",
            success: function(msg){
                var html = '';
                for(v_msg in msg)
                {
                     html +='<div child-msg='+ msg[v_msg].id +' ><img src="'+ msg[v_msg].avatar +'" style="width: 40px" alt=""> <a>'+ msg[v_msg].username +'</a>:<span style="word-break: break-all;font-size: 16px">'+ msg[v_msg].content +'</span> <p><span  class="text-muted" style="font-size: 14px">' + msg[v_msg].created_at +'</span></p> </div>';
                }
                $('[message='+ pid+']').prepend(html);


            }
        });
    }




</script>
