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
        background: rgba(245, 245, 255, 0);
        position: fixed;
        top: 100px;
        left: 5px;
        bottom: 100px;
        overflow: hidden;
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
    a{
        font-size: 16px;
        color: #555555;
    }
    .panel a:hover{
        text-decoration: underline !important;
        color: #35b558;
    }
    a:link{
        text-decoration: none;
    }
    a:visited{
        text-decoration: none;
    }

    html, body {
        position: relative;
        height: 100%;
    }
    body {
        background: #eee;
        font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
        font-size: 14px;
        color:#000;
        margin: 0;
        padding: 0;
    }

    .swiper-container {
        width: 100%;
        height: 100%;
        border-radius: 0.25rem;
        box-shadow: 0px 0px 3px 2px #888;
        margin-bottom: 10px !important;
    }
    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;
        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
    }
    .col-lg-6 li:hover{
        background-color: #eae1e1;
    }

</style>
<link rel="stylesheet" href="/css/stie.css">
<link rel="stylesheet" href="/static/swiper/css/swiper.min.css">
<meta name="csrf-token" content="<?= \Yii::$app->request->csrfToken ?>">



<div class="container">
    <div class="col-lg-9">
        <?php if (!empty($banner) && count($banner) > 0){?>
        <!-- Swiper -->
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php foreach ($banner as $v) {?>
                <a href="<?=$v['href']?>" class="swiper-slide" alt="<?=$v['descript']?>" style="height: 300px;background-image:url('<?=$v['url']?>');background-repeat: no-repeat;cursor: pointer">

                </a>
                <?php }?>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        <?php }?>

        <div class="panel panel-default">
            <div class="panel-body">
                <?php if (is_array($dynamic) && count($dynamic) > 0){ ?>
                <div class="col-lg-6 ">
					<ul class="list-unstyled">
                        <?php for ($x = 0; $x<=4; $x++){?>
						<li>
                            <div class="text-one-line">
                                <a href="/post/index?id=<?=$dynamic[$x]['id']?>" class="pull-left" title="文章标题"><?=$dynamic[$x]['title']?></a>
                                <small  class="hidden-xs hidden-md  hidden-sm text-muted pull-right" title="日期"><?php echo date('Y-m-d',strtotime($dynamic[$x]['created_at']))?></small>
                            </div>
                        </li>
                        <?php }?>
					</ul>
				</div>
                <?php }?>

                <?php if (is_array($dynamic) && count($dynamic) > 0){ ?>
                <div class="col-lg-6 ">
					<ul class="list-unstyled">
                        <?php for ($x = 5; $x<=9; $x++){?>
						<li>
                            <div class="text-one-line">
                                <a href="/post/index?id=<?=$dynamic[$x]['id']?>" class="pull-left" title="文章标题"><?=$dynamic[$x]['title']?></a>
                                <small  class="hidden-xs hidden-md  hidden-sm text-muted pull-right" title="日期"><?php echo date('Y-m-d',strtotime($dynamic[$x]['created_at']))?></small>
                            </div>
                        </li>
                        <?php }?>
					</ul>
				</div>
                <?php }?>


                <?php if (is_array($dynamic) && count($dynamic) >5 ){?>
                <div class="col-lg-6 hidden-xs hidden-md hidden-sm">

				</div>
                <?php }?>
            </div>
        </div>
        <?php if (!empty($data)){
            foreach ($data as $k=>$v){
            ?>
        <div class="panel panel-default">
            <div class="panel-heading"></span>  <?=$k?></h3></div>
            <div class="panel-body">
                <table class="table table-hover">
                    <?php foreach ($v as $vv){
                        ?>
                    <tr><td >
                            <div class="col-lg-9 text-one-line" style="padding-left: 0px;width: 20rem">
<!--                            --><?php //if ($v_question['post_status'] == 1){ echo '<span class="glyphicon glyphicon-question-sign text-danger"></span>';}else{ echo '<span class="glyphicon glyphicon-ok-sign text-success"></span>';}?>
                            <a href="/post/index?id=<?=$vv['id']?>" class="" title="文章标题"><?=$vv['title']?></a>
                            </div>
                        </td>
<!--                        <td class="hidden-xs hidden-sm hidden-md">--><?//=$vv['post_version']?><!--</td>-->
                        <td class="hidden-xs hidden-sm hidden-md"><a href="/user/center?id=<?=$vv['uid']?>" title="作者"><?=$vv['username']?></a></td>
                        <td class="hidden-xs hidden-sm hidden-md"><small class="text-muted" title="发布时间"><?=$vv['created_at']?></small></td>
                        <td class="hidden-xs hidden-sm hidden-md">
                            <small>
                                <span data-toggle="tooltip" data-placement="bottom" title="评论数"><?=$vv['count']?></span>/
                                <span data-toggle="tooltip" data-placement="bottom" title="收藏数"><?=$vv['cfav']?></span>/
                                <span data-toggle="tooltip" data-placement="bottom" title="浏览数"><?=$vv['visitor']?></span>
                            </small>
                        </td>
                    </tr>
                    <?php }?>
                </table>
            </div>
        </div>
        <?php }}?>
<!--		最新话题-->
    </div>

<!--	右侧-->
    <div class="col-lg-3">
        <div>
            <span  class="btn btn-success btn-lg " style="width: 100%;border-radius:6px 6px 6px 6px;font-size: 10px" onclick="sign()" <?php if (!empty($sign_data)){ echo 'disabled';}?>><?php if (!empty($sign_data)){ echo '已经签到<br>明天再来';}else{ echo '点击签到<br>获取积分';}?></span>
<!--            <span  class="btn btn-primary btn-lg pull-right" style="width: 50%;border-radius:0 6px 6px 0;font-size: 10px">--><?//=date('Y-m-d', time())?><!--<br>签到统计</span>-->
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">大家都在说<small class="text-muted text-sm">(在线<span id="people">0</span>人)</small></div>
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
                                <a href="/user/center?id=<?=$v_chat['id']?>"><?=$v_chat['username']?></a>:
        <!--                        内容-->
                                <span style="word-break: break-all;font-size: 16px"><?=$v_chat['content']?></span>
        <!--                        留言底部-->
                                <div style="margin: 1rem 0;font-size: 16px" class="text-muted" >
                                    <span  class="" style="font-size: 14px"><?=$v_chat['created_at']?></span>
                                    <span style="float: right;">
                                        <a href="/chat/detail?id=<?=$v_chat['id']?>" class="text-muted" message-id="<?=$v_chat['id']?>"><span class="glyphicon glyphicon-comment" title="回复"></span> <span><?=$v_chat['pid']?></span></a>
                                        <a href="#" class="text-muted" chat-id="<?=$v_chat['id']?>"><span class="glyphicon glyphicon-thumbs-up <?php echo $v_chat['zan']? 'text-success':'' ?>" title="顶"  ></span> <span><?=$v_chat['like']?></span></a>
                                    </span>
                                </div>
                            </div>
                                <div class=" col-lg-offset-2 col-sm-offset-2 col-md-offset-2 col-xs-offset-2 col-lg-10" style="width:92%;max-height: 500px;overflow-y: scroll;display: none" message="<?=$v_chat['id']?>">
                                </div>
                        </div>
                            <?php }}?>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="/static/swiper/js/swiper.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper('.swiper-container', {
        preventClicks : false,//默认true
        loop:true,
        pagination: {
            el: '.swiper-pagination',
            type: 'progressbar',
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        autoplay:{
            delay:2000,
        }
    });
</script>
<script>
    //bootstrap提示
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });

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
                html += '<a href="/chat/detail?id=' + pid + '" class="glyphicon glyphicon-share-alt blue pointer text-danger">回复</a>';
                for(v_msg in msg)
                {
                     html +='<div child-msg='+ msg[v_msg].id +' ><img src="'+ msg[v_msg].avatar +'" style="width: 40px" alt=""> <a href="/user/center?id= '+ msg[v_msg].uid + '">'+ msg[v_msg].username +'</a>:<a href="/chat/detail?id='+ pid +'#comment-'+ msg[v_msg].id +'" style="word-break: break-all;font-size: 16px">'+ msg[v_msg].content +'</a> <p><span  class="text-muted" style="font-size: 14px">' + msg[v_msg].created_at +'</span></p> </div>';
                }
                $('[message='+ pid+']').prepend(html);


            }
        });
    }

    //签到
    function sign()
    {
        var url ='/user/sign-api';
        $.ajax({
            type: "Get",
            url: url,

            dataType: "json",
            success: function(msg){
                if(msg.data == true)
                {
                    location.reload();
                }
            }
        });
    }




</script>
