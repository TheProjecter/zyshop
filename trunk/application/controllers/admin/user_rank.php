<?php
/**
 * Created by Steven(Steven@staff.zylinkus.com).
 * User: Steven
 * Date: 12-12-15
 * Time: ÏÂÎç1:11
 * File: user_rank.php
 * @Author Shanghai ZhiYan Technology Co., Ltd.
 * @Version: 1.0
 * @See http://www.zylinkus.com/project/zyshop
 */
 class user_rank extends CI_Controller {
		
	public function __construct() {
		parent::__construct();
		$this->load->model("user_rank_model");
	}
	
	  public function index(){
        $this->load->library("pagination");
        $config['base_url'] = $this->config->base_url().'index.php/user_rank/index/';

        $config['total_rows'] = $this->user_rank_model->getAllCount();
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
        $data['results'] = $this->user_rank_model->getAll($config['per_page'], $this->uri->segment(4));
        $this->load->view("admin/user_rank/index",$data);
    }

    public function info($id=0) {
        $act = "add_user_rank";
        if($id==0) $id = $this->input->post('id');
        if($id > 0) $act="edit_user_rank";
        $data['act'] = $act;
        $data['id'] = $id;
		if($id > 0) $data['res'] = $this->user_rank_model->getOne(array('rank_id'=>$id));
        if ($this->form_validation->run($act) == TRUE){
            $post['rank_name'] = $this->input->post('rank_name');
            $post['min_points'] = $this->input->post('min_points');
            $post['max_points'] = $this->input->post('max_points');
            $post['discount'] = $this->input->post('discount');
            $post['show_price'] = $this->input->post('show_price');
            $post['special_rank'] = $this->input->post('special_rank');
			
            if($id > 0) {
                $this->user_rank_model->edit($id,$post);
            }else{
                $this->user_rank_model->add($post);
            }
			redirect("admin/user_rank/index");
        }
        $this->load->view("admin/user_rank/info", $data);
    }

    public function del() {
        redirect("admin/admin_group/index");
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
        $config['base_url'] = site_url("admin/user_rank/search/".$keywords."/");


        $config['total_rows'] =$this->user_rank_model->search_count($keywords);
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
        $data["results"] = $this->user_rank_model->search_all($keywords,$config['per_page'], $this->uri->segment(5));
        $this->load->view("admin/user_rank/index", $data);
    }
 }