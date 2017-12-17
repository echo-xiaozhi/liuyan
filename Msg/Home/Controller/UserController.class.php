<?php
namespace Home\Controller;
use Think\Controller;

class UserController extends Controller{
    //查看成员
    public function index(){
        if ($_SESSION){
            $model = M('project');
            $menu = $model->select();
            $User = M('User'); // 实例化User对象
            $count = $User->count();// 查询满足要求的总记录数
            $Page = new \Think\Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数(25)
            $show = $Page->show();// 分页显示输出
            // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $list = $User->order('create_time')->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('list',$list);// 赋值数据集
            $this->assign('page',$show);// 赋值分页输出
            $this->assign('menu',$menu);
            $this->assign('title','管理成员');
            $this->display();
        }else{
            $this->redirect('Login/login');
        }
    }
    //新增成员
    public function useradd(){
        if ($_SESSION){
            if ($_POST){
                $model = D('User');
                if ($model->create($_POST)){
                    $model->add();
                    $this->success('添加成功','index');
                }else{
                    $this->error($model->getError());
                }
            }else{
                $model = M('project');
                $menu = $model->select();
                $this->assign('menu',$menu);
                $this->assign('title','新增成员');
                $this->display();
            }
        }else{
            $this->redirect('Login/login');
        }
    }
    //修改成员
    public function edit(){
        if ($_SESSION) {
            $data['id'] = $_GET['id'];
            if ($_POST) {
                $rules = array(
                    array('daihao', '', '该代号已经存在！', 0, 'unique', 1), // 在编辑的时候验证name字段是否唯一
                );
                $model = M('user');
                $info = $model->where($data)->find();
                if ($info['daihao'] == $_POST['daihao']) {
                    $model->where($data)->save($_POST);
                    $this->success('更新成功', '/index.php/Home/User/index');
                } elseif ($model->validate($rules)->create($_POST)) {
                    $model->where($data)->save($_POST);
                    $this->success('更新成功', '/index.php/Home/User/index');
                } else {
                    $this->error($model->getError());
                }
            } else {
                $model = M('user');
                $info = $model->where($data)->find();
                $prj = M('project');
                $menu = $prj->select();
                $this->assign('menu', $menu);
                $this->assign('info', $info);
                $this->assign('title', '修改成员信息');
                $this->display();
            }
        }else{
            $this->redirect('Login/login');
        }
    }
    //修改密码
    public function editpsd(){
        if ($_SESSION) {
            $data['id'] = $_GET['id'];
            $model = M('user');
            if ($_POST) {
                $rules = array(
                    array('password', 'md5', 3, 'function'), // 对password字段在新增和编辑的时候使md5函数处理
                );
                $model->auto($rules)->create();
                $model->where($data)->save();
                $this->success('修改成功', '/index.php/Home/User/index');
            } else {
                $info = $model->where($data)->find();
                $prj = M('project');
                $menu = $prj->select();
                $this->assign('menu', $menu);
                $this->assign('info', $info);
                $this->assign('title', '修改密码');
                $this->display();
            }
        }else{
            $this->redirect('Login/login');
        }
    }
    //删除数据
    public function del(){
        if ($_SESSION) {
            $model = M('user');
            $data['id'] = $_GET['id'];
            $model->where($data)->delete();
            $this->success('删除成功', '/index.php/Home/User/index');
        }else{
            $this->redirect('Login/login');
        }
    }
    //搜索数据
    public function search(){
        if ($_SESSION) {
            if ($_POST) {
                $model = M('user');
                $name = $_POST['name'];
                $daihao = $_POST['daihao'];
                $list = $model->where('name=' . "'$name'" . ' OR daihao=' . "'$daihao'")->select();
                $this->assign('list', $list);
            }
            $prj = M('project');
            $menu = $prj->select();
            $this->assign('menu', $menu);
            $this->assign('title', '搜索');
            $this->display();
        }else{
            $this->redirect('Login/login');
        }
    }
}