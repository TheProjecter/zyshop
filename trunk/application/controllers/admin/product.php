<?php
/**
 * Created by Steven(Steven@staff.zylinkus.com).
 * User: Steven
 * Date: 12-12-23
 * Time: 下午11:30
 * File: product.php
 * @Author Shanghai ZhiYan Technology Co., Ltd.
 * @Version: 1.0
 * @See http://www.zylinkus.com/project/zyshop
 */
class product extends CI_Controller
{
    private $id = 0;
    public function __construct(){
        parent::__construct();
        $this->load->model("product_model");
        $this->lang->load("product");
    }
    public function index() {
        $data["keywords"] = "";
        $this->load->library("pagination");

        $total = $this->product_model->getAllCount();
        $config = buildpage("admin/product/index",$total, 20, 4);
        $data['keywords'] = "";

        $this->pagination->initialize($config);
        $data['results'] = $this->product_model->getAll($config['per_page'], $this->uri->segment(4));

        $this->load->view("admin/product/index", $data);
    }

    public function info($id=0) {
        $data['act'] = 'add_product';
        if($id==0) $id = $this->input->post('id');
        $data['id'] = $id;
        $this->load->library('fckeditor', array('instanceName' => 'desc'));
        $this->fckeditor->ToolbarSet = 'Default';
        $this->fckeditor->Height = "500px";
        if($id > 0) {
            $data['act'] = 'edit_product';
            $arr = array("pid"=>$id);
            $data['res']=$this->product_model->getOne($arr);
            $this->fckeditor->Value = $data['res']->desc;
        }
        $data['fckeditor']=$this->fckeditor->CreateHtml();
        if ($this->form_validation->run($data['act']) == TRUE){
            $post['name'] = $this->input->post("name");
            //$post['url'] = $this->input->post("url");
            $post['sku'] = $this->input->post("sku");
            $post["provider_name"] = $this->input->post("provider_name");
            $post["number"] = $this->input->post("number");
            $post["weight"] = $this->input->post("weight");
            $post['market_price'] = $this->input->post("market_price");
            $post["price"] = $this->input->post("price");
            $post['desc'] = $this->input->post("desc");
            $post['last_update'] = time();
            $post['suid'] = $this->session->userdata("admin_uid");
            if(!file_exists(ZY_ROOT.'/public/images/'.date("Ymd"))) {
                mkdir(ZY_ROOT.'/public/images/'.date("Ymd"));
            }
            if(!file_exists(ZY_ROOT.'/public/images/'.date("Ymd").'/original/')) {
                mkdir(ZY_ROOT.'/public/images/'.date("Ymd").'/original/');
            }
            $config['upload_path'] = realpath(ZY_ROOT.'/public/images/'.date("Ymd").'/original/');
            $config['allowed_types'] = 'jpg|png|gif|jpeg';
            $config['max_size'] = '5000';
            $config['overwrite'] = false;
            $config['encrypt_name'] = true;
            //var_dump($config);exit;
            $this->load->library('upload', $config);
            if($this->upload->do_upload('img')) {
                $upload_file = $this->upload->data();
                $original_img = '/public/images/'.date("Ymd").'/original/'.$upload_file['file_name'];
                $post['original_img'] = $original_img;
                $post['img'] = creat_img($original_img);
                $post['thumb'] = creat_thumb($original_img);
            }
            $post["keywords"] = $this->input->post("keywords");
            $post["brief"] = $this->input->post("brief");
            $post["template"] = $this->input->post("template");
            $post["suppliers_id"] = $this->input->post("suppliers_id"); //供应商
            $post["template"] = $this->input->post("template");
            $post["template"] = $this->input->post("template");

            if($id > 0) {
                $this->product_model->edit($id, $post);
            }else{
                $post['add_time'] = time();
                $this->product_model->add($post);
            }
            redirect("admin/product/index");
        }
        $this->load->view("admin/product/info", $data);
    }

    /**
     * 商品搜索功能
     * @Author Shanghai ZhiYan Technology Co., Ltd.
     */
    public function search() {
        $uri=$this->uri->segment_array();
        $keywords = isset($uri[4]) ? strip_tags($uri[4]) : strip_tags($this->input->get("keywords"));
        $keywords = urldecode($keywords);
        $data['keywords'] = $keywords;
        $total = 0;
        $total =
        //build pager
        $config = buildpage("admin/product/search",$total, 20, 4);
        $this->pagination->initialize($config);
        $this->load->view("admin/product/index", $data);
    }

    /**
     *
     */
    public function getFriendUrl() {
        $name = $this->input->post("name");
        if(empty($name)) return 0;
        $name = urldecode($name);
        $arr['url'] = $name;
        $check_url = $this->product_model->getOne($arr);
        if(!empty($check_url)) {
            $url_title = url_title($name.'-'.rand(1,1000));
        }else{
            $url_title = url_title($name);
        }
        die(json_encode($url_title));
    }

    /**
     * sku check
     * @param string sku
     */
    public function sku_check($sku) {
        $ar['sku'] = $sku;
        $res = $this->product_model->getOne($ar);
        if($res==false) {
            return TRUE;
        }else{
            $this->form_validation->set_message('sku_check', 'The %s field can not be the word '.$sku);
            return FALSE;
        }
    }

    /**
     * product url check
     * @param string url
     */
    public function url_check($url) {
        $ar['url'] = $url;
        $res = $this->product_model->getOne($ar);
        if($res==false) {
            return TRUE;
        }else{
            $this->form_validation->set_message('url', 'The %s field can not be the word '.$url);
            return FALSE;
        }
    }
}
