<?php
namespace Home\Controller;
use Think\Controller;

class LoginController extends Controller{
    //登录
    public function login(){
        if ($_POST){
            $User = M('User');
            //自动验证 创建数据集
                // 组合查询条件
                $where = array();
                $where['username'] = $_POST['username'];
                $psd = md5($_POST['password']);
                $result = $User->where($where)->find();
                // 验证用户名 对比 密码
                if ($result && $result['password'] == $psd) {
                    // 存储session
                    session('id', $result['id']);          // 当前用户id
                    session('pid', $result['pid']);          // 当前用户父id
                    session('username', $result['username']);   // 当前用户名
                    session('daihao', $result['daihao']);   // 当前用户代号
                    session('name', $result['name']);   // 当前用户姓名
                    session('quanxian', $result['quanxian']);   // 当前用户姓名
                    session('last_login_time', $result['last_login_time']);   // 上一次登录时间

                    // 更新用户登录信息
                    $where['id'] = session('id');
                    $data['last_login_time'] = time();
                    M('user')->where($where)->save($data);   // 更新登录时间
                    $this->success('登录成功,正跳转至系统首页...', U('Index/index'));
                } else {
                    $this->error('登录失败,用户名或密码不正确!');
                }
            }else{
            $this->display();
        }
    }
    //注销
    public function logout(){
        // 清楚所有session
        session(null);
        $this->success('注销成功,正在退出...', U('Index/index'));
    }
}