<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="<?php echo U('useradd');?>" method="post">
    用户名：<input type="text" name="username">
    密码：<input type="text" name="password">
    姓名：<input type="text" name="name">
    代号：<input type="text" name="daihao">
    权限：<input type="text" name="quanxian">
    <input type="submit">
</form>

</body>
</html>