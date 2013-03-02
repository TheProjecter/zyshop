<?php
/**
 * Created by Steven(Steven@staff.zylinkus.com).
 * User: Steven
 * Date: 13-2-26
 * Time: 下午9:43
 * File: topic.php
 * @Author Shanghai ZhiYan Technology Co., Ltd.
 * @Version: 1.0
 * @See http://www.zylinkus.com/project/zyshop
 */
class topic extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model("topic_model");
    }

    public function index() {
        $data["keywords"] = "";
        $data["start"] = "";
        $data["end"] = "";
        $this->load->library("pagination");
        $total = $this->topic_model->getAllCount();
        $config = buildpage("admin/category/index/", $total, 20, 4);
        $this->pagination->initialize($config);
        $data['results'] = $this->topic_model->getAll($config['per_page'], $this->uri->segment(4));
        $this->load->view("admin/topic/index", $data);
    }

    /**
     * @param int $id
     * 添加编辑专题
     */
    public function info($id=0) {

    }

    public function search() {

    }

    public function del($id=0) {

    }
}
