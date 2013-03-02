<?php
/**
 * Created by Steven(Steven@staff.zylinkus.com).
 * User: Steven
 * Date: 12-12-15
 * Time: 下午1:11
 * File: user_ext.php
 * @Author Shanghai ZhiYan Technology Co., Ltd.
 * @Version: 1.0
 * @See http://www.zylinkus.com/project/zyshop
 */
 class user_ext extends CI_Controller
 {
	public function __construct() {
		parent::__construct();
		$this->load->model("user_ext_model");
	}
	
    public function index(){
        $this->load->library("pagination");
        $config['base_url'] = $this->config->base_url().'index.php/user_ext/index/';

        $config['total_rows'] = $this->user_ext_model->getAllCount();
        $config['per_page'] = 10;
        $config['full_tag_open'] = '<div class="pagination">';
        $config['full_tag_close'] = '</div>';
        $config['first_link'] = $this->lang->line('first');
        $config['last_link'] = $this->lang->line('last');
        $config['next_link'] = $this->lang->line('next');
        $config['prev_link'] = $this->lang->line('prev');
        $config['cur_tag_open'] = ' <a class="current">';
        $config['cur_tag_close'] = '</a>';
        $config['uri_segment'] = 4;
        $data['keywords'] = "";

        $this->pagination->initialize($config);
        $data['results'] = $this->user_ext_model->getAll($config['per_page'], $this->uri->segment(4));
        $this->load->view("admin/user_ext/index",$data);
    }

    public function info($id=0) {
        $act = "add_user_ext";
        if($id==0) $id = $this->input->post('id');
        if($id > 0) $act="edit_user_ext";
        $data['act'] = $act;
        $data['id'] = $id;
		if ($id > 0)  $data['res'] = $this->users_model->getOne(array('user_id'=>$id));
        if ($this->form_validation->run($act) == TRUE){
			$post['user_name'] = $this->input->post("user_name");
			$post['email'] = $this->input->post("email");
			$post['is_validated'] = $this->input->post("is_validated");
			$post['sex'] = $this->input->post("sex");
			$post['password'] = md5($this->input->post("password"));
			
            if($id > 0) {
                $this->users_model->edit($id,$post);
            }else{
				$post['reg_time'] = time();
				
                $this->users_model->add($post);
            }
			redirect("admin/user_ext/index");
        }
        $this->load->view("admin/user_ext/info", $data);
    }

    public function del() {
        redirect("admin/user_ext/index");
        //$this->load->view("admin/group/index");
    }

    public function search() {
        $uri=$this->uri->segment_array();
        if(isset($uri[4]))
        {
            $keywords=strip_tags($uri[4]);
        }
        else
        {
            $keywords=strip_tags($this->input->get("keywords"));
        }
        $keywords = urldecode($keywords);
        //var_dump($keywords);
        $this->load->library("pagination");
        $config['base_url'] = site_url("admin/user_ext/search/".$keywords."/");


        $config['total_rows'] =$this->users_model->search_count($keywords);
        $config['per_page'] = 10;
        $config['full_tag_open'] = '<div class="pagination">';
        $config['full_tag_close'] = '</div>';
        $config['first_link'] = $this->lang->line('first');
        $config['last_link'] = $this->lang->line('last');
        $config['next_link'] = $this->lang->line('next');
        $config['prev_link'] = $this->lang->line('prev');
        $config['cur_tag_open'] = ' <a class="current">';
        $config['cur_tag_close'] = '</a>';
        $config['uri_segment'] = 5;

        $this->pagination->initialize($config);
        $data["keywords"] = $keywords;
        $data["results"] = $this->users_model->search_all($keywords,$config['per_page'], $this->uri->segment(5));
        $this->load->view("admin/user_ext/index", $data);
    }
 }
 //END