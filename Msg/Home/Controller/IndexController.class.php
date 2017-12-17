<?php

namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
        if ($_SESSION) {
            $model = M('project');
            $menu = $model->select();
            $quanxian = $_SESSION['quanxian'];
            $daihao = $_SESSION['daihao'];
            $meg = M('message');
            $count = $meg->count();
            //php获取今日开始时间戳和结束时间戳
            $beginToday = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
            $endToday = mktime(0, 0, 0, date('m'), date('d') + 1, date('Y')) - 1;
            //php 获取本周起始时间戳和结束时间戳
            $beginTheweek = mktime(0,0,0,date('m'),date('w')+2,date('Y'));
            $endTheweek = mktime(0,0,0,date('m'),date('w')+1+7,date('Y'));
            //php获取本月起始时间戳和结束时间戳
            $beginThismonth = mktime(0, 0, 0, date('m'), 1, date('Y'));
            $endThismonth = mktime(23, 59, 59, date('m'), date('t'), date('Y'));
            $this->assign('beginToday',$beginToday);
            $this->assign('endToday',$endToday);
            $this->assign('beginTheweek',$beginTheweek);
            $this->assign('endTheweek',$endTheweek);
            $this->assign('beginThismonth',$beginThismonth);
            $this->assign('endThismonth',$endThismonth);
            $this->assign('menu', $menu);
            $this->assign('title', '留言系统');
            $this->assign('banben', '留言系统1.0');
            $this->assign('kaifa', '小智');
            $this->assign('zhifubao', '164466159@qq.com');
            $this->assign('quanxian', $quanxian);
            $this->assign('daihao', $daihao);
            $this->assign('count', $count);
            $this->display();
        } else {
            $this->redirect('Login/login');
        }
    }

    //添加用户
    public function useradd()
    {
        if ($_POST) {
            echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"> ";
            $User = D("User"); // 实例化User对象
            if (!$User->create($_POST)) {
                // 如果创建失败 表示验证没有通过 输出错误提示信息
                $this->error($User->getError());
            } else {
                // 验证通过 可以进行其他数据操作
                $User->add();
            }
        } else {
            $this->display();
        }
    }

    //查看时间
    public function shijian()
    {
        echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"> ";
        print_r(time().','.date('Y-m-d H:i:s').'，当前时间');
        echo '<br />';
        echo '<br />';


        //php获取今日开始时间戳和结束时间戳
        $beginToday = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
        $endToday = mktime(0, 0, 0, date('m'), date('d') + 1, date('Y')) - 1;
        //获取今天00:00
        $todaystart = strtotime(date('Y-m-d'.'00:00:00',time()));

        print_r($beginToday.','.date('Y-m-d H:i:s',$beginToday).'，今日开始时间');
        echo '<br />';
        print_r($endToday.','.date('Y-m-d H:i:s',$endToday).'，今日结束时间');
        echo '<br />';
        echo '<br />';



        //php获取昨日起始时间戳和结束时间戳
        $beginYesterday = mktime(0, 0, 0, date('m'), date('d') - 1, date('Y'));
        $endYesterday = mktime(0, 0, 0, date('m'), date('d'), date('Y')) - 1;
        print_r($beginYesterday.','.date('Y-m-d H:i:s',$beginToday).'，昨天开始时间');
        echo '<br />';
        print_r($endYesterday.','.date('Y-m-d H:i:s',$endYesterday).'，昨天结束时间');
        echo '<br />';
        echo '<br />';



        //php获取上周起始时间戳和结束时间戳
        $beginLastweek = mktime(0, 0, 0, date('m'), date('d') - date('w') + 1 - 7, date('Y'));
        $endLastweek = mktime(23, 59, 59, date('m'), date('d') - date('w') + 7 - 7, date('Y'));
        print_r($beginLastweek.','.date('Y-m-d H:i:s',$beginLastweek).'，上周起始时间');
        echo '<br />';
        print_r($endLastweek.','.date('Y-m-d H:i:s',$endLastweek).'，上周结束时间');
        echo '<br />';
        echo '<br />';


        //php 获取本周起始时间戳和结束时间戳
        $beginTheweek = mktime(0,0,0,date('m'),date('w')+2,date('Y'));
        $endTheweek = mktime(0,0,0,date('m'),date('w')+1+7,date('Y'));
        print_r($beginTheweek.','.date('Y-m-d H:i:s',$beginTheweek).'，本周起始时间');
        echo '<br />';
        print_r($endTheweek.','.date('Y-m-d H:i:s',$endTheweek).'，本周结束时间');
        echo '<br />';
        echo '<br />';


        //php获取本月起始时间戳和结束时间戳
        $beginThismonth = mktime(0, 0, 0, date('m'), 1, date('Y'));
        $endThismonth = mktime(23, 59, 59, date('m'), date('t'), date('Y'));
        print_r($beginThismonth.','.date('Y-m-d H:i:s',$beginThismonth).'，本月起始时间');
        echo '<br />';
        print_r($endThismonth.','.date('Y-m-d H:i:s',$endThismonth).'，本月结束时间');
        echo '<br />';
        echo '<br />';


    }
}