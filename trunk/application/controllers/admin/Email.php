<?php
/**
 * Created by Steven(Steven@staff.zylinkus.com).
 * User: Steven
 * Date: 13-1-30
 * Time: 下午12:36
 * File: Email.php
 * @Author Shanghai ZhiYan Technology Co., Ltd.
 * @Version: 1.0
 * @See http://www.zylinkus.com/project/zyshop
 */
class Email extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->lang->load("email");
		$this->config->load('email');
    }

    public function index() {
		
        $this->load->view("admin/Email/index");
    }

    public function save() {
		$email_config = $this->input->post();
		$this->load->helper('file');
		$this->load->model("store_config_model");
		$str = "<?php \r\n";
		foreach($email_config as $key => $email) {
			$str.="\$config['".$key."']='".$email."';\r\n";
			$post['value'] = $email;
			$this->store_config_model->edit($key, $post);
		}
		$str.="//END";
		write_file(ZY_ROOT.'/application/config/email.php', $str, 'w');
		redirect("admin/Email/index");
    }
}
