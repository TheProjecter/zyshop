<?php
/**
 * Created by Steven(Steven@staff.zylinkus.com).
 * User: Steven
 * Date: 13-1-26
 * Time: 下午5:18
 * File: brand.php
 * @Author Shanghai ZhiYan Technology Co., Ltd.
 * @Version: 1.0
 * @See http://www.zylinkus.com/project/zyshop
 */
class brand extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model("brand_model");
    }

    /**
     * @return void
     */
    public function index() {
        $data = array();
        $this->load->view(themes("brand/index"), $data);
    }

    /**
     * @param int brand_id
     * @return void
     */
    public function brand_id($brand_id) {
        $data['$id'] = $brand_id;
        $brand = $this->brand_model->getOne(array('id'=>$brand_id));//获得brand信息
        if(empty($brand)) redirect("/");
        $this->load->view(themes("brand/info"), $data);
    }
    
    
    
    
}
