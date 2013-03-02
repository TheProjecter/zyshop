<?php
/**
 * Created by Steven(Steven@staff.zylinkus.com).
 * User: Steven
 * Date: 12-12-15
 * Time: 下午1:11
 * File: user_rank_model.php
 * @Author Shanghai ZhiYan Technology Co., Ltd.
 * @Version: 1.0
 * @See http://www.zylinkus.com/project/zyshop
 */
class user_rank_model extends CI_Model
{
	private $_table = "";
    public function __construct(){
        $this->_table = table("user_rank");
    }

    public function login($email, $password) {
        $sql='SELECT user_id FROM '.table($this->_table)." WHERE email='".$email. "' AND password='".md5($password). "'";
    }

    public function add($data) {
        $this->db->insert($this->_table, $data);
        return $this->db->insert_id();
    }

    public function edit($id, $data) {
        $this->db->where('rank_id', $id);
        $this->db->update($this->_table, $data);
        if($this->db->affected_rows() > 0)
            return TRUE;
        else
            return FALSE;
    }

    public function del($id) {
        $query = $this->db->get_where($this->_table, array('rank_id' => $id));
        if ($query->num_rows() > 0) {
            $this->db->where('rank_id', $id);
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
	
	    /**
     * @author Steven
     * @param string $keyword
     * @return void
     */

    public function search_count($keyword) {
        if(empty($keyword)) 0;
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->like("email", $keyword);
        $this->db->or_like("user_name", $keyword);
        return $this->db->count_all_results();
    }

    /**
     * @author Steven
     * @param string $keyword
     * @return void
     */
    public function search_all($keyword, $limit, $offset) {
        $keyword = trim($keyword);
        if(empty($keyword)) return false;
        $this->db->select('*');
        $this->db->order_by("rank_id", "DESC");
        //$this->db->from($this->_table);
        $this->db->like("email", $keyword);
        $this->db->or_like("user_name", $keyword);
        $this->db->limit($limit, $offset);
        $q = $this->db->get($this->_table);
        $rows = $q->result_array();
        return $rows;
    }
	
	public function getAllUserRank() {
		$this->db->select("rank_id, rank_name");
		$q = $this->db->get($this->_table);
		return $q->result_array();
	}

}
