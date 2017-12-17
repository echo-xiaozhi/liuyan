<?php
namespace Home\Model;
use Think\Model;

class UserModel extends Model{
    protected $_validate = array(
//        array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]),
        array('username','require','请填写用户名'), //默认情况下用正则进行验证
        array('username','','帐号名称已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
        array('daihao','','代号已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
        array('password','3,32','密码长度不符，请输入3-16位',1,'length'), // 在新增的时候验证name字段是否唯一
    );
    protected $_auto = array(
        array('password','md5',1,'function') , // 对password字段在新增和编辑的时候使md5函数处理
        array('create_time','time',1,'function'), // 对update_time字段在更新的时候写入当前时间戳
        array('last_login_time','time',3,'function'), // 对update_time字段在更新的时候写入当前时间戳
    );
}