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
    
    <div class="select-main">
    <form method="post" action="<?php echo U('search');?>">
        <div class="form-select">
            <label class="form-select-title" >姓名：</label>
            <input type="text" name="name" class="form-control" placeholder="请输入名称" >
        </div>
        <div class="form-select">
            <label class="form-select-title">代号：</label>
            <input type="text" name="daihao" class="form-control"  placeholder="请输入名称">
        </div>
        <div class="form-select">
            <button class="btn btn-large btn-update" type="submit" >提交</button>
        </div>
        <div class="form-select">
            <button class="btn btn-large btn-default" type="reset">重置</button>
        </div>
    </form>
    </div>
    <div class="table-main">
        <table class="table" >
            <thead>
            <tr class="th">
                <th>ID</th>
                <th>帐号</th>
                <th>代号</th>
                <th>姓名</th>
                <th>所属上级id</th>
                <th>权限</th>
                <th>留言总数量</th>
                <th>最后登录时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($vo["id"]); ?></td>
                    <td><?php echo ($vo["username"]); ?></td>
                    <td><?php echo ($vo["daihao"]); ?></td>
                    <td><?php echo ($vo["name"]); ?></td>
                    <td><?php echo ($vo["pid"]); ?></td>
                    <td><?php
 switch($vo['quanxian']){ case 0 : echo '主管'; break; case 1 : echo '组长'; break; default : echo '组员'; } ?>
                    </td>
                    <td>
                        <?php
 $model = M('user'); $data['a.daihao'] = $vo['daihao']; $shu = $model->alias('a')->join('message b ON a.daihao= b.user_daihao')->where($data)->count(); echo $shu; ?>
                    </td>
                    <td><?php echo (date('Y-m-d H:m:s',$vo["last_login_time"])); ?></td>
                    <td>
                        <a href="<?php echo U('edit?id='.$vo[id]);?>" class="btn btn-small btn-update">修改详细</a>
                        <a href="<?php echo U('editpsd?id='.$vo[id]);?>" class="btn btn-small btn-edit">修改密码</a>
                        <a href="<?php echo U('del?id='.$vo[id]);?>" class="btn btn-small btn-delete" onclick="return confirm('确定将此记录删除?')">删除</a>
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