<?php
/**
 * Created by Steven(Steven@staff.zylinkus.com).
 * User: Steven
 * Date: 13-1-20
 * Time: 下午5:08
 * File: index.php
 * @Author Shanghai ZhiYan Technology Co., Ltd.
 * @Version: 1.0
 * @See http://www.zylinkus.com/project/zyshop
 */
class index extends CI_Controller
{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        //$this->output->cache($this->config->item('cache_time'));
        $data = array();
        $this->load->view(themes("index/index"), $data);
    }
}
