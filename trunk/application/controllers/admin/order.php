<?php
/**
 * Created by Steven(Steven@staff.zylinkus.com).
 * User: Steven
 * Date: 13-1-20
 * Time: 下午4:59
 * File: order.php
 * @Author Shanghai ZhiYan Technology Co., Ltd.
 * @Version: 1.0
 * @See http://www.zylinkus.com/project/zyshop
 */
final class order extends CI_Controller
{
	
    public function __construct(){
        parent::__construct();
         $this->lang->load("order");
		$this->load->model("order_model");
    }

    public function index() {
		$data["keywords"] = "";
        $this->load->library("pagination");
        $total = $this->order_model->getAllCount();
        $config = buildpage("admin/order/index/", $total, 20, 4);
        $this->pagination->initialize($config);
        $data['results'] = $this->order_model->getAll($config['per_page'], $this->uri->segment(4));
		$this->load->view("admin/order/index", $data);
    }
	
	public function search() {
		
	}
}
