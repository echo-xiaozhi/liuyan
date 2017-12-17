<?php
namespace Home\Controller;
use Think\Controller;

class PublicController extends Controller{
    public function header(){
        $this->assign('menu','123');
        $this->display();
    }
    public function lists(){
        $this->display();
    }
}