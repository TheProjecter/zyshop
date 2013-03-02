<?php
/**
 * Created by Steven(Steven@staff.zylinkus.com).
 * User: Steven
 * Date: 12-12-15
 * Time: 下午1:11
 * File: admin_menu.php
 * @Author Shanghai ZhiYan Technology Co., Ltd.
 * @Version: 1.0
 * @See http://www.zylinkus.com/project/zyshop
 */
class admin_menu extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model("admin_menu_model");
    }

    public function index(){
        $data["keywords"] = "";
        $this->load->library("pagination");
        $total = $this->admin_menu_model->getAllCount();
        $data['keywords'] = "";
        $config = buildpage("admin/admin_menu/index/", $total, 20, 4);
        $this->pagination->initialize($config);
        $data['results'] = $this->admin_menu_model->getAll($config['per_page'], $this->uri->segment(4));
        $this->load->view("admin/admin_menu/index", $data);
    }

    public function info($id=0) {
        $act = 'edit_admin_menu';
        $data = "";
        if(empty($id)) $id = $this->input->post('id');
        if(empty($id)) $act = "add_admin_menu";
        if($id > 0) {
            $ar['men_id'] = $id;
            $data['res'] = $this->admin_menu_model->getOne($ar);
        }
        $data['act'] = $act;
        $data['id'] = $id;
        $data['sections'] = $this->config->item('sections');
		if ($this->form_validation->run($act) == TRUE){
			
			$post['men_name'] = $this->input->post('men_name');
			$post['men_link'] = $this->input->post('men_link');
			$post['section_id'] = $this->input->post('section_id');
			$post['men_tag'] = $this->input->post('men_tag');
			$post['men_rank'] = $this->input->post('men_rank');
            $post['admin_uid'] = $this->session->userdata("admin_uid");


			if($id > 0) {
				$this->admin_menu_model->edit($id, $post);
			}else{
				$this->admin_menu_model->add($post);
			}
			redirect("admin/admin_menu/index");
		}

        $this->load->view("admin/admin_menu/info", $data);
    }
	
	public function search(){
		$uri = $this->uri->segment_array();
        $keywords = isset($uri[4]) ? strip_tags($uri[4]) : strip_tags($this->input->get("keywords"));
        $keywords = urldecode($keywords);
        if(empty($keywords)) redirect("admin/admin_menu/index");
        $this->load->library("pagination");
        $total =$this->admin_menu_model->search_count($keywords);
        $config = buildpage("admin/admin_menu/index/".$keywords.'/', $total, 20, 5);
        $this->pagination->initialize($config);
        $data["keywords"] = $keywords;
        $data["results"] = $this->admin_menu_model->search_all($keywords,$config['per_page'], $this->uri->segment(5));

        $this->load->view("admin/admin_menu/index", $data);
	}
}
