<?php
namespace Home\Controller;
use Think\Controller;

class MessageController extends Controller{
    //留言列表
    public function index(){
        if ($_SESSION) {
            $prj = M('project');
            $menu = $prj->select();
            $this->assign('menu', $menu);
            $user_id['id'] = $_SESSION['id'];
            $User = M('user');
            $users = $User->where($user_id)->find();
            $datas['id'] = $_GET['id'];
            $model = M('message');
            $info = $prj->where($datas)->find();
            // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
//            $list = $model->where($data)->order('create_time')->limit($Page->firstRow . ',' . $Page->listRows)->select();
            //判断权限
            if ($users['quanxian'] != 0){
                $condition = new \stdClass();
                $condition->user_daihao = $users['daihao'];
                $condition->project_id= $_GET['id'];
                $count = $model->where($condition)->count();// 查询满足要求的总记录数
                $Page = new \Think\Page($count, 20);// 实例化分页类 传入总记录数和每页显示的记录数(25)
                $show = $Page->show();// 分页显示输出
                $list = $model->where($condition)->order('create_time desc')->limit($Page->firstRow . ',' . $Page->listRows)->select();
            }else{
                $data['project_id'] = $_GET['id'];
                $count = $model->where($data)->count();// 查询满足要求的总记录数
                $Page = new \Think\Page($count, 20);// 实例化分页类 传入总记录数和每页显示的记录数(25)
                $show = $Page->show();// 分页显示输出
                $list = $model->where($data)->order('create_time desc')->limit($Page->firstRow . ',' . $Page->listRows)->select();
            }
            //更改留言阅读状态
            $status = M('status');
            if ($_GET['user_daihao']){
                if ($users['daihao'] == '01'){
                    $shuzhi['status'] = 1;
                    $status->where('project_id='.$_GET["id"])->save($shuzhi);
                }else{
                    $shuzhi['yg_status'] = 1;
                    $status->where('project_id='.$_GET['id'].' and user_daihao='.$users['daihao'])->save($shuzhi);
                }
            }
            $this->assign('list', $list);
            $this->assign('page', $show);// 赋值分页输出
            $this->assign('info', $info);
            $this->assign('title', '留言详情');
            $this->display();
        }else{
            $this->redirect('Login/login');
        }
    }
    //添加数据
    public function add(){
        $model = D('Message');
        if ($model->create($_POST)){
            $model->add();
            $status = M('status');
            $status->add($_POST);
            $this->success('留言成功');
        }else{
            $this->error($model->getError());
        }
    }
    //查看数据
    public function show(){
        if ($_SESSION){
            $prj = M('project');
            $menu = $prj->select();
            $this->assign('menu', $menu);
            $model = M('message');
            $data['id'] = $_GET['id'];
            $info = $model->where($data)->find();
            $this->assign('info',$info);
            $this->display();
        }else{
            $this->redirect('Login/login');
        }
    }
    //删除数据
    public function del(){
        if ($_SESSION) {
            $model = M('message');
            $data['id'] = $_GET['id'];
            $model->where($data)->delete();
            $this->success('删除成功', '/index.php/Home/Message/index/id/'.$_GET["project_id"]);
        }else{
            $this->redirect('Login/login');
        }
    }
}