<?php
/**
 * Created by Steven(Steven@staff.zylinkus.com).
 * User: Steven
 * Date: 13-1-30
 * Time: 下午2:14
 * File: store_config_model.php
 * @Author Shanghai ZhiYan Technology Co., Ltd.
 * @Version: 1.0
 * @See http://www.zylinkus.com/project/zyshop
 */
class store_config_model extends CI_Model
{
    private $_table = "store_config";
    public function __construct(){
    }

    public function add($data) {

    }
	
	public function edit($code, $value) {
		$this->db->where("code", $code);
        $this->db->update($this->_table, $value);
        if($this->db->affected_rows() > 0)
            return TRUE;
        else
            return FALSE;
	}


}
