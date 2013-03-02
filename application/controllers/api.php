<?php
/**
 * Created by Steven(Steven@staff.zylinkus.com).
 * User: Steven
 * Date: 13-1-20
 * Time: 下午11:12
 * File: api.php
 * @Author Shanghai ZhiYan Technology Co., Ltd.
 * @Version: 1.0
 * @See http://www.zylinkus.com/project/zyshop
 */
class api extends CI_Controller
{
    public function __construct(){
        parent::__construct();
    }

    public function index() {
        $this->load->library('xmlrpc');
        $this->load->library('xmlrpcs');

        $config['functions']['Greetings'] = array('function' => 'api.process');
        $config['functions']['getProductList'] = array('function' => 'api.getProductList');

        $this->xmlrpcs->initialize($config);
        $this->xmlrpcs->serve();
    }

    public function process() {

    }

    public function getProductList($request) {

    }
}
