<?php
namespace Home\Model;
use Think\Model;

class MessageModel extends Model{
    protected $_validate = array(
//        array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]),
//        array('phone','require','请输入您的手机号'), //验证手机号是否填写
        array('kh_name','require','请输入您的姓名'), //验证姓名是否填写
    );
    protected $_auto = array(
      array('create_time','time',1,'function') //新增数据自动添加时间
    );
}