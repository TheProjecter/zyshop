<?php
/**
 * Created by Steven(lizhi.liu@foxmail.com).
 * User: Steven
 * Date: 12-12-13
 * Time: 下午1:29
 * @Author Steven(lizhi.liu@foxmail.com)
 * @Version: 1.0
 */
class dashboard extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        if($this->session->userdata("admin_uid") <=0) {
            redirect("admin/login");
        }
    }

    public function index(){
        $data = array();
        $this->load->view("admin/dashboard/index", $data);
    }

}
