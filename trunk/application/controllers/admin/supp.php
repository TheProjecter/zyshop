<?php
/**
 * Created by Steven(Steven@staff.zylinkus.com).
 * User: Steven
 * Date: 13-1-21
 * Time: 下午10:19
 * File: supp.php
 * @Author Shanghai ZhiYan Technology Co., Ltd.
 * @Version: 1.0
 * @See http://www.zylinkus.com/project/zyshop
 */
class supp extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model("supp_model"); //load supp table model
    }

    public function index() {
        $this->load->library("pagination");
        $total = $this->supp_model->getAllCount();
        $data['keywords'] = "";
        $config = buildpage("admin/supp/index/", $total, 20, 4);
        $this->pagination->initialize($config);
        $data['results'] = $this->supp_model->getAll($config['per_page'], $this->uri->segment(4));
        $this->load->view("admin/supp/index",$data);
    }

    public function info($id=0) {
        $data['act'] = 'add_supp';
        if($id==0) $id = $this->input->post('id');
        $data['id'] = $id;
        if($id > 0) {
            $data['act'] = 'edit_supp';
            $arr = array("suppliers_id"=>$id);
            $data['res']=$this->supp_model->getOne($arr);
        }
        if ($this->form_validation->run($data['act']) == TRUE){
            $post['suppliers_name'] = $this->input->post("suppliers_name");
            $post['suppliers_desc'] = $this->input->post("suppliers_desc");
            $post['suid'] = $this->input->post("suid");
            if($id > 0) {
                $this->supp_model->edit($id, $post);
            }else{
                $this->supp_model->add($post);
            }
            redirect("admin/supp/index");
        }
        $this->load->view("admin/supp/info",$data);
    }

    public function search() {
        $uri=$this->uri->segment_array();
        $keywords = isset($uri[4]) ? strip_tags($uri[4]) : strip_tags($this->input->get("keywords"));
        $keywords = urldecode($keywords);
        //var_dump($keywords);
        $this->load->library("pagination");
        $total =$this->supp_model->search_count($keywords);
        $config = buildpage("admin/supp/search/".$keywords.'/', $total, 20, 5);
        $this->pagination->initialize($config);
        $data["keywords"] = $keywords;
        $data["results"] = $this->supp_model->search_all($keywords,$config['per_page'], $this->uri->segment(5));
        $this->load->view("admin/supp/index", $data);
    }
}
