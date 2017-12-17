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
    
<layout name="Public:header" />
<div class="form-group">
    <ul style="text-align: center">
        <li>版本信息：<?php echo ($banben); ?></li>
        <li>开发人员：<?php echo ($kaifa); ?></li>
        <li>资助支付宝:<?php echo ($zhifubao); ?></li>
        <li>就这么些吧！哈哈哈！</li>
    </ul>
    <div style="color: red;">所有项目总留言数：<?php echo ($count); ?></div>
    <div>
        <table class="table" >
            <thead>
            <tr class="th">
                <th>项目名</th>
                <th>未查看新增留言条数</th>
                <th>本日新增留言条数</th>
                <th>本周新增留言条数</th>
                <th>本月新增留言条数</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($vo["content"]); ?></td>
                    <td>
                        <a href="<?php echo U('Message/index?id='.$vo[id].'&user_daihao='.$daihao);?>" class="btn btn-small btn-delete">
                            <?php
 $status = M('status'); if($quanxian == 0){ $count = $status->where('project_id='.$vo[id].' and status=0')->count(); }else{ $count = $status->where('project_id='.$vo[id].' and user_daihao='.$daihao.' and yg_status=0')->count(); } echo $count; ?>
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-small btn-update">
                            <?php
 $model = M('message'); if($quanxian == 0){ $day = $model->where('project_id='.$vo[id].' and '.$beginToday.' < create_time and create_time < '.$endToday)->count(); }else{ $day = $model->where('project_id='.$vo[id].' and '.$beginToday.' < create_time and create_time < '.$endToday.' and user_daihao='.$daihao)->count(); } echo $day; ?>
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-small btn-update">
                            <?php
 if($quanxian == 0){ $week = $model->where('project_id='.$vo[id].' and '.$beginTheweek.' < create_time and create_time < '.$endTheweek)->count(); }else{ $week = $model->where('project_id='.$vo[id].' and '.$beginTheweek.' < create_time and create_time < '.$endTheweek.' and user_daihao='.$daihao)->count(); } echo $week; ?>
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-small btn-update">
                            <?php
 if($quanxian == 0){ $month = $model->where('project_id='.$vo[id].' and '.$beginThismonth.' < create_time and create_time < '.$endThismonth)->count(); }else{ $month = $model->where('project_id='.$vo[id].' and '.$beginThismonth.' < create_time and create_time < '.$endThismonth.' and user_daihao='.$daihao)->count(); } echo $month; ?>
                        </a>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    </div>
</div>
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