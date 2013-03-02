<?php
/**
 * Created by Steven(Steven@staff.zylinkus.com).
 * User: Steven
 * Date: 13-1-20
 * Time: 下午4:59
 * File: order_model.php
 * @Author Shanghai ZhiYan Technology Co., Ltd.
 * @Version: 1.0
 * @See http://www.zylinkus.com/project/zyshop
 */
 class order_model extends CI_Model
 {
	private $_table = "order";
	public function __construct(){
		
	}
	
    public function add($data) {
        $this->db->insert($this->_table, $data);
        return $this->db->insert_id();
    }

    public function edit($id, $data) {
        $this->db->where('order_id', $id);
        $this->db->update($this->_table, $data);
        if($this->db->affected_rows() > 0)
            return TRUE;
        else
            return FALSE;
    }
	
	 public function del($id) {
        $query = $this->db->get_where($this->_table, array('order_id' => $id));
        if ($query->num_rows() > 0) {
            $this->db->where('order_id', $id);
            $this->db->delete($this->_table);
            return true;
        }
        return false;
    }

    public function getOne($arr) {
        $query = $this->db->get_where($this->_table, $arr);
        return $query->row();
    }

    public function getAllCount(){
        return $this->db->count_all($this->_table);
    }

    public function getAll($num, $offset) {
        $query = $this->db->get($this->_table, $num, $offset);
        return $query->result_array();
    }
 }