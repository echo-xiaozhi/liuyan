<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <title>LOGIN</title>
    <!-- Custom Theme files -->
    <link href="/Style/css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- Custom Theme files -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="后台登录" />
</head>
<body>
<!--header start here-->
<div class="login-form">
    <div class="top-login">
        <span><img src="/Style/images/logo1.png" alt=""/></span>
    </div>
    <h1>Login</h1>
    <div class="login-top">
        <form method="post" action="<?php echo U('Login/login');?>">
            <div class="login-ic">
                <i ></i>
                <input type="text" name="username" value="用户名" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'User name';}"/>
                <div class="clear"> </div>
            </div>
            <div class="login-ic">
                <i class="icon"></i>
                <input type="password" name="password" value="password" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'password';}"/>
                <div class="clear"> </div>
            </div>

            <div class="log-bwn">
                <input type="submit"  value="登录" >
            </div>
        </form>
    </div>
    <p class="copy">版权所有：XZEC 小智ec</p>
</div>
<!--header start here-->
</body>
</html>