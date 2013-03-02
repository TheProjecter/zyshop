<?php
/**
 * Created by Steven(Steven@staff.zylinkus.com).
 * User: Steven
 * Date: 13-1-26
 * Time: 下午7:43
 * File: Feed.php
 * @Author Shanghai ZhiYan Technology Co., Ltd.
 * @Version: 1.0
 * @See http://www.zylinkus.com/project/zyshop
 */
class Feed extends CI_Controller
{
    public function __construct(){
        parent::__construct();
    }

    public function index() {

    }

    private function _FeedCan() {
        return array("product",'brand','category','comment');
    }

}
