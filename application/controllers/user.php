<?php
/**
 * Created by Steven(Steven@staff.zylinkus.com).
 * User: Steven
 * Date: 13-1-26
 * Time: 下午8:30
 * File: user.php
 * @Author Shanghai ZhiYan Technology Co., Ltd.
 * @Version: 1.0
 * @See http://www.zylinkus.com/project/zyshop
 */
class user extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model("user_model");
        $this->lang->load("user");
    }
    public function index()  {
        redirect("admin/user/home");
    }
    //用户中心
    public function home() {
        $this->load->view(themes(""));
    }

    //用户注册
    public function reg() {

    }

    //用户登录
    public function login() {

    }

    //用户订单
    public function order() {

    }
    // 用户验证
    public function valid_email() {

    }
}
