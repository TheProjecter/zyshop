<?php
/**
 * Created by Steven(Steven@staff.zylinkus.com).
 * User: Steven
 * Date: 13-2-3
 * Time: 上午1:08
 * File: search.php
 * @Author Shanghai ZhiYan Technology Co., Ltd.
 * @Version: 1.0
 * @See http://www.zylinkus.com/project/zyshop
 */
class search extends CI_Controller{

    public function __construct(){
        parent::__construct();
        if($this->config->item("lucenene")==true) {
            $this->load->library("search_lucnene",array(), "search");
        }
    }
    public function index() {
        $keywords = $this->input->get("q");
        $search_res = $this->search->search($keywords);
        foreach ($search_res as $hit) {
            echo $hit->id."<br />";
			echo $hit->pid."<br />";
            echo $hit->score."<br />";
            echo $hit->name."<br />";
            echo $hit->url."<br />";
        }
        //var_dump($search_res->name);
    }
}