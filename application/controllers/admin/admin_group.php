<?php
/**
 * Created by Steven(lizhi.liu@foxmail.com).
 * User: Steven
 * Date: 12-11-16
 * Time: 上午11:45
 * @Author Steven(lizhi.liu@foxmail.com)
 * @Version: 1.0
 */
class admin_group extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model("admin_group_model");
    }

    public function index(){
        $this->load->library("pagination");
        $total = $this->admin_group_model->getgroupsCouts();
        $config = buildpage("admin/admin_group/index", $total, 20, 4);
        $data['keywords'] = "";

        $this->pagination->initialize($config);
        $data['results'] = $this->admin_group_model->getgroups($config['per_page'], $this->uri->segment(4));
        $this->load->view("admin/admin_group/index",$data);
    }

    public function info($id=0) {
        $act = "add_admin_group";
        if($id==0) $id = $this->input->post('id');
        if($id > 0) $act="edit_admin_group";
        $data['act'] = $act;
        $data['id'] = $id;
        $data['res'] = $this->admin_group_model->getOne(array('gro_id'=>$id));
        $data['group'] = $this->admin_group_model->getgroup($id);
        $data["menu"] = $this->getmenus();
        if ($this->form_validation->run($act) == TRUE){
            $gro_data = $this->input->post('gro_data');
            $gro_data_read = $this->input->post('gro_data_read');
            foreach($gro_data as $key=>$val) {
                $post['gro_data'][$key]['id'] = $key;
                $gro_data_mod = !empty($gro_data_read[$key]) ? $gro_data_read[$key] : 2;
                $post['gro_data'][$key]['mod'] = $gro_data_mod;
            }
            $post['gro_data'] = json_encode($post['gro_data']);

            $post['gro_status'] = $this->input->post("gro_status");
            $post['gro_name'] = $this->input->post('gro_name');
            if($id > 0) {
                $this->admin_group_model->edit($id,$post);
            }else{
                $this->admin_group_model->add($post);
            }
			redirect("admin/admin_group/index");
        }
        $this->load->view("admin/admin_group/info", $data);
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
        $total =$this->admin_group_model->search_by_name_count($keywords);
        $config = buildpage("admin/admin_group/search/", $total, 20, 5);
        $this->pagination->initialize($config);
        $data["keywords"] = $keywords;
        $data["results"] = $this->admin_group_model->search_by_name($keywords,$config['per_page'], $this->uri->segment(5));
        $this->load->view("admin/admin_group/index", $data);
    }

    private function getmenus() {
        $sections = $this->config->item('sections');
        $menus = array();
        foreach($sections as $key=>$val) {
            $menus[$val] = $this->admin_group_model->getmenus($val);
        }
        return $menus;
    }
}
