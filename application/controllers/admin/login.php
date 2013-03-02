<?php
/**
 * Created by Steven(Steven@staff.zylinkus.com).
 * User: Steven
 * Date: 12-12-13
 * Time: 下午1:42
 * File: login.php
 * @Author Shanghai ZhiYan Technology Co., Ltd.
 * @Version: 1.0
 * @See http://www.zylinkus.com/project/zyshop
 */
class login extends CI_Controller
{
    public function __construct() {
        parent::__construct();
    }

    public function index() {
		$data['info'] = true;
        if($this->input->post('act')=='login') {
            $this->load->model("admin_user_model");
            $username = $this->input->post("username");
            $password = $this->input->post("password");
            $password = md5($password);
            $login_res = $this->admin_user_model->login($username, $password);

            if($login_res['user_id'] > 0) {
                $userSession = array("admin_uid"=>$login_res['user_id'],'admin_role_id'=>$login_res['role_id'],'admin_user_name'=>$login_res['user_name'],'admin_email'=>$login_res['email']);
                $this->session->set_userdata($userSession);
                redirect("admin/dashboard/index");
            }
			$data['info'] = false;
			$data['error'] = $this->lang->line("error_admin_login");
        }
        $this->load->view("admin/login/index", $data);
    }

    public function logout() {
        $this->session->all_userdata();
        redirect("admin/login");
    }
}
