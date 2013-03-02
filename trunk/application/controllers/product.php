<?php
/**
 * Created by Steven(Steven@staff.zylinkus.com).
 * User: Steven
 * Date: 13-1-20
 * Time: 下午10:02
 * File: product.php
 * @Author Shanghai ZhiYan Technology Co., Ltd.
 * @Version: 1.0
 * @See http://www.zylinkus.com/project/zyshop
 */
class product extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model("product_model");
    }

    /**
     * @param void $name
     * @author Steven
     */
    public function index($id, $name){
        $product_info = $this->_info("id", $id);
        if($product_info==FALSE) redirect("/");
		$data['product'] = $product_info;
        $data['title'] = $product_info->name;
        $data['keywords'] = $product_info->keywords;
        $data["description"] = $product_info->brief;
        if(!empty($product_info->template)) {
            $this->load->view(themes("product/".$product_info->template), $data);
        }else
            $this->load->view(themes("product/index"), $data);
    }

    /**
     * 获得商品信息
     * @param int $id
     */
    public function product_id($id) {
        $product_info = $this->_info("id", $id);
        if($product_info==FALSE) redirect("/");
        $data['info'] = $product_info;

        $this->load->view(themes("product/index"), $data);
    }

    /**
     * @param strng type name|id
     * @parsm string $checkInfo
     * @return boolean|object
     */
    private function _info($type, $checkInfo) {
        if(empty($checkInfo) || empty($type)) return FALSE;
        if($type=='name') {
            $arr=array("name"=>$checkInfo);
        }elseif($type=='id') {
            $arr = array("pid"=>$checkInfo);
        }elseif($type=='sku') {
            $arr = array("sku"=>$checkInfo);
        }
        $Product_have = $this->product_model->getOne($arr);
        if(empty($Product_have)) return FALSE;
        return $Product_have;
    }
}
