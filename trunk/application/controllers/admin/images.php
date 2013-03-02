<?php
/**
 * Created by Steven(Steven@staff.zylinkus.com).
 * User: Steven
 * Date: 13-2-9
 * Time: 下午7:42
 * File: images.php
 * @Author Shanghai ZhiYan Technology Co., Ltd.
 * @Version: 1.0
 * @See http://www.zylinkus.com/project/zyshop
 */
class images extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->lang->load("image");
        $this->config->load('image_lib');
    }

    public function index() {
        $this->load->view("admin/images/index");
    }
}
