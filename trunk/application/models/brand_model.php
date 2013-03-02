<?php
/**
 * Created by Steven(Steven@staff.zylinkus.com).
 * User: Steven
 * Time: ����10:43:07
 * File: brand_model.php
 * @Author Shanghai ZhiYan Technology Co., Ltd.
 * @Version: 1.0
 * @See http://www.zylinkus.com/project/zyshop
 */
final class brand_model extends CI_Model {
	private $_table = "brand";
	
	public function __construct(){
	
	}
	
	public function add($data) {
		$this->db->insert($this->_table, $data);
		return $this->db->insert_id();
	}
	
	public function edit($id, $data) {
		$this->db->where('cat_id', $id);
		$this->db->update($this->_table, $data);
		if($this->db->affected_rows() > 0)
			return TRUE;
		else
			return FALSE;
	}
	
	public function del($id) {
		$query = $this->db->get_where($this->_table, array('id' => $id));
		if ($query->num_rows() > 0) {
			$this->db->where('id', $id);
			$this->db->delete($this->_table);
			return true;
		}
		return false;
	}
	
	public function getOne($arr) {
		$query = $this->db->get_where($this->_table, $arr);
		return $query->row();
	}
	
}