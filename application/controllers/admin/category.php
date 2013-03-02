<?php
/**
 * Created by Steven(Steven@staff.zylinkus.com).
 * User: Steven
 * Date: 13-1-21
 * Time: 下午8:13
 * File: category.php
 * @Author Shanghai ZhiYan Technology Co., Ltd.
 * @Version: 1.0
 * @See http://www.zylinkus.com/project/zyshop
 */
class category extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model("category_model");
        $this->lang->load("category");
    }

    public function index(){
        $this->load->library("pagination");
        $total = $this->category_model->getAllCount();
        $data['keywords'] = "";
        $config = buildpage("admin/category/index/", $total, 20, 4);
        $this->pagination->initialize($config);
        $data['results'] = $this->category_model->getAll($config['per_page'], $this->uri->segment(4));
        $this->load->view("admin/category/index",$data);
    }

    public function info($id=0) {
        $act = "add_category";
        if($id==0) $id = $this->input->post('id');
        if($id > 0) $act="edit_category";
        $data['act'] = $act;
        $data['id'] = $id;
        $data['catlist'] = $this->category_model->getCatList($id);
        //var_dump($data);
        if ($id > 0)  $data['res'] = $this->category_model->getOne(array('cat_id'=>$id));
        if ($this->form_validation->run($act) == TRUE){
            $post['cat_name'] = $this->input->post("cat_name");
            $post['cat_keywords'] = $this->input->post("cat_keywords");
            $post['cat_desc'] = $this->input->post("cat_desc");
            $post['cat_parent_id'] = $this->input->post("cat_parent_id");
            $post['cat_sort_order'] = $this->input->post("cat_sort_order");
            $post['cat_template_file'] = $this->input->post("cat_template_file");
            $post['cat_style'] = $this->input->post("cat_style");
            $post['cat_is_show'] = $this->input->post("cat_is_show");
            $post['cat_grade'] = $this->input->post("cat_grade");

            if($id > 0) {
                $this->category_model->edit($id,$post);
            }else{
                $this->category_model->add($post);
            }
            redirect("admin/category/index");
        }
        $this->load->view("admin/category/info", $data);
    }

    public function del($id) {
        $this->category_model->del($id);
        redirect("admin/category/index");
        //$this->load->view("admin/group/index");
    }

    public function search() {
        $uri=$this->uri->segment_array();
        $keywords = isset($uri[4]) ? strip_tags($uri[4]) : strip_tags($this->input->get("keywords"));
        $keywords = urldecode($keywords);
        if(empty($keywords)) redirect("admin/category/index");
        //var_dump($keywords);
        $this->load->library("pagination");
        $total =$this->category_model->search_count($keywords);
        $config = buildpage("admin/category/search/".$keywords.'/', $total, 20, 5);
        $this->pagination->initialize($config);
        $data["keywords"] = $keywords;
        $data["results"] = $this->category_model->search_all($keywords,$config['per_page'], $this->uri->segment(5));
        $this->load->view("admin/category/index", $data);
    }
}
//END
