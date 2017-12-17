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
    
<div style="font-size: 20px; color: red;"><?php echo ($info["content"]); ?></div>
<div class="table-main">
    <table class="table" >
        <thead>
        <tr class="th">
            <th>选择</th>
            <th>ID</th>
            <th>姓名</th>
            <th>手机号</th>
            <th>留言时间</th>
            <th>所属人</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td><input type="checkbox" name="id[]" value="<?php echo ($vo["id"]); ?>" /> </td>
                <td><?php echo ($vo["id"]); ?></td>
                <td><?php echo ($vo["kh_name"]); ?></td>
                <td><?php echo ($vo["phone"]); ?></td>
                <td><?php echo (date('Y-m-d H:i:s',$vo["create_time"])); ?></td>
                <td>
                    <?php
 $model = M('user'); $data['daihao'] = $vo['user_daihao']; $find = $model->where($data)->find(); print_r($find['name']); ?></td>
                <td>
                    <a href="<?php echo U('show?id='.$vo[id]);?>" class="btn btn-small btn-update">查看</a>
                    <a href="<?php echo U('del?id='.$vo[id].'&project_id='.$_GET[id]);?>" class="btn btn-small  btn-check" onclick="return confirm('确定将此记录删除?')">删除</a>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>
<div class="paging" >
    <div class="page">
        <?php echo ($page); ?>
    </div>
</div>
<div>
    <div><input type="checkbox" onclick="swapCheck()"/>全选</div>
</div>
<script type="text/javascript">
    //checkbox 全选/取消全选
    var isCheckAll = false;
    function swapCheck() {
        if (isCheckAll) {
            $("input[type='checkbox']").each(function() {
                this.checked = false;
            });
            isCheckAll = false;
        } else {
            $("input[type='checkbox']").each(function() {
                this.checked = true;
            });
            isCheckAll = true;
        }
    }
</script>  
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