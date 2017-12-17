<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title><?php echo ($title); ?></title>
    <script src="/Style/js/jquery.js"></script>
    <script>
        $(document).ready(function () {
            $("dd a").click(function () {
                $('.active').removeClass("active");
                $(this).addClass("active");
            });
        });
    </script>
    <link rel="stylesheet" href="/Style/css/index.css">
</head>
<body>
<div class="header">
    <a href=""><img src="/Style/images/logo.png" class="nav-img" /></a>
    <ul>
        <li><a href="/"><?php echo $_SESSION['name'] ?></a></li>
        <li><a href="<?php echo U('Login/logout');?>">退出</a></li>
    </ul>
</div>
<div class="leftsidebar_box">
    <?php if($_SESSION['quanxian'] == 0 && isset($_SESSION['quanxian'])){ ?>
    <dl>
        <dt>管理成员<img src="/Style/images/arrow_right.png"></dt>
        <dd><a href="<?php echo U('User/index');?>"><span>查看成员</span></a></dd>
        <dd><a href="<?php echo U('User/useradd');?>"><span>新增成员</span></a></dd>
    </dl>
    <?php } ?>
    <dl >
        <dt>留言详细<img src="/Style/images/arrow_right.png"></dt>
        <?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dd><a href="<?php echo U('Message/index?id='.$vo[id]);?>"><span><?php echo ($vo["content"]); ?></span></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>


    </dl>
</div>

<div class="container">
    <a class="breadcrumbs" href="/">首页</a>
    
<!--表单-->
<form action="<?php echo U('edit?id='.$info[id]);?>" method="post">
    <div class="form-group">
        <label class="form-title">帐号：</label>
        <div class="checkbox-inline"><?php echo ($info["username"]); ?></div>
    </div>
    <div class="form-group">
        <label class="form-title">姓名：</label>
        <input class="form-control" name="name" type="text" value="<?php echo ($info["name"]); ?>"/>
    </div>
    <div class="form-group">
        <label class="form-title">代号：</label>
        <input class="form-control" name="daihao" type="text" value="<?php echo ($info["daihao"]); ?>"/>
    </div>
    <div class="form-group">
        <label class="form-title">权限：</label>
        <select  class="form-control" name="quanxian">
            <option value="1" <?php if($info[quanxian] == 1): ?>selected="selected"<?php endif; ?> >组长</option>
            <option value="2" <?php if($info[quanxian] == 2): ?>selected="selected"<?php endif; ?> >组员</option>
        </select>
    </div>
    <div class="form-group">
        <label class="form-title">所属上级id：</label>
        <input class="form-control" name="pid" type="text" value="<?php echo ($info["pid"]); ?>"/>
    </div>
    <div class="form-group form-submit">
        <button class="btn-groups btn-submit" type="submit">立即提交</button>
        <button class="btn-groups btn-reset" type="reset">重置</button>
    </div>
</form>
</div>

<script type="text/javascript">
    $(".leftsidebar_box dt").css({"background-color":"#FAFAFA"});
    $(".leftsidebar_box dt img").attr("src", "/Style/images/arrow_right.png");
    $(function(){
        $(".leftsidebar_box dd").hide();
        $(".leftsidebar_box dt").click(function(){
            $(".leftsidebar_box dt").css({"background-color":"#FAFAFA"})
            $(this).css({"background-color": "#FAFAFA"});
            $(this).parent().find('dd').removeClass("menu_chioce");
            $(".leftsidebar_box dt img").attr("src","/Style/images/arrow_right.png");
            $(this).parent().find('img').attr("src","/Style/images/arrow_top.png");
            $(".menu_chioce").slideUp();
            $(this).parent().find('dd').slideToggle();
            $(this).parent().find('dd').addClass("menu_chioce");
        });
    })
    //erp crm 购物流程
</script>

</body>
</html>