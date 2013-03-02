<?php
/**
 * Created by Steven(Steven@staff.zylinkus.com).
 * User: Steven
 * Date: 13-3-1
 * Time: 下午11:02
 * File: ad.php
 * @Author Shanghai ZhiYan Technology Co., Ltd.
 * @Version: 1.0
 * @See http://www.zylinkus.com/project/zyshop
 */
class ad extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model("ad_model");
    }

    public function index(){
        $this->load->library("pagination");
        $total = $this->ad_model->getAllCount();
        $data['keywords'] = "";
        $config = buildpage("admin/ad/index/", $total, 20, 4);
        $this->pagination->initialize($config);
        $data['results'] = $this->ad_model->getAll($config['per_page'], $this->uri->segment(4));
        $this->load->view("admin/ad/index", $data);
    }

    /**
     * @param int id;
     * @return void
     */
    public function info($id=0) {
        $act = "add_ad";
        if($id==0) $id = $this->input->post('id');
        if($id > 0) $act="edit_ad";
        $data['act'] = $act;
        $data['id'] = $id;
        if ($id > 0)  $data['res'] = $this->ad_model->getOne(array('ad_id'=>$id));

        $this->load->view("admin/ad/info", $data);
    }
}
