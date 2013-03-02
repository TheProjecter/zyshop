<?php
/**
 * Created by Steven(Steven@staff.zylinkus.com).
 * User: Steven
 * Date: 12-12-14
 * Time: 下午10:48
 * File: User.php
 * @Author Shanghai ZhiYan Technology Co., Ltd.
 * @Version: 1.0
 * @See http://www.zylinkus.com/project/zyshop
 */
class admin_user extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model("admin_user_model");
    }
    /**
     * admin user
     */
    public function index() {
        $data["keywords"] = "";
        $this->load->library("pagination");
        $total = $this->admin_user_model->getAllCount();
        $data['keywords'] = "";
        $config = buildpage("admin/admin_user/index/", $total, 20, 4);
        $this->pagination->initialize($config);
        $data['results'] = $this->admin_user_model->getAll($config['per_page'], $this->uri->segment(4));
        $this->load->view("admin/admin_user/index", $data);
    }


    public function info($id=0){
        $act = 'edit_admin_user';
        $data = "";
        if(empty($id)) $id = $this->input->post('id');
        if(empty($id)) $act = "add_admin_user";
        if($act=='edit_admin_user') {
            $ar['user_id'] = $id;
            $data['res'] = $this->admin_user_model->getOne($ar);
        }
        $data['act'] = $act;
        $data['id'] = $id;
        $this->load->model("admin_group_model");
        $data['groups'] = $this->admin_group_model->getValidGroup();
        //var_dump($act,$this->form_validation->run($act));
        if ($this->form_validation->run($act) == TRUE){
            if($this->input->post('act')=='edit_admin_user' || $this->input->post('act')=='add_admin_user') {
                $post['user_name'] = $this->input->post('user_name');
                $post['email'] = $this->input->post("email");
                if($this->input->post('password')!=""){
                    $post['password'] = $this->input->post('password');
                    if($this->input->post('re_password')!=$post['password']) {
                        $data['error'] = $this->lang->line("error_same_password");
                        $this->load->view(themes("admin/admin_user/info"), $data);
                        return;
                    }
                    $post['password'] = md5($post['password']);
                }
                $post['user_state'] = $this->input->post("user_state");
                $post['role_id'] = $this->input->post('role_id');
                $post['add_time'] = time();


                if($id > 0) {
                    $this->admin_user_model->edit($id, $post);
                }else{
                    $this->admin_user_model->add($post);
                }
                redirect("admin/admin_user/index");
            }else{

            }
        }
        $this->load->view("admin/admin_user/info", $data);
    }

    public function search() {
        $uri = $this->uri->segment_array();
        $keywords = isset($uri[4]) ? strip_tags($uri[4]) : strip_tags($this->input->get("keywords"));
        $keywords = urldecode($keywords);
        if(empty($keywords)) redirect("admin/admin_user/index");
        $this->load->library("pagination");
        $total =$this->admin_user_model->search_count($keywords);
        $config = buildpage("admin/admin_user/search/".$keywords.'/', $total, 20, 5);
        $this->pagination->initialize($config);
        $data["keywords"] = $keywords;
        $data["results"] = $this->admin_user_model->search_all($keywords,$config['per_page'], $this->uri->segment(5));

        $this->load->view("admin/admin_user/index", $data);
    }

    public function del($id) {
        if($this->admin_user_model->del($id)==true) {
            redirect("admin/admin_user/index");
        }
    }

    //callback
    public function email_check($email) {
        $ar['email'] = $email;
        $res = $this->admin_user_model->getOne($ar);
        if($res==false) {
            return TRUE;
        }else{
            $this->form_validation->set_message('email_check', 'The %s field can not be the word '.$email);
            return FALSE;
        }
    }

    public function user_name_check($user_name) {
        $ar['user_name'] = $user_name;
        $res = $this->admin_user_model->getOne($ar);
        if($res==false) {
            return TRUE;
        }else{
            $this->form_validation->set_message('user_name_check', 'The %s field can not be the word '.$user_name);
            return FALSE;
        }
    }

}

//END
