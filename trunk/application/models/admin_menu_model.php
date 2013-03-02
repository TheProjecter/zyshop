<?php
/**
 * Created by Steven(Steven@staff.zylinkus.com).
 * User: Steven
 * Date: 12-12-14
 * Time: 下午11:09
 * File: admin_menu_model.php
 * @Author Shanghai ZhiYan Technology Co., Ltd.
 * @Version: 1.0
 * @See http://www.zylinkus.com/project/zyshop
 */
class admin_menu_model extends CI_Model
{

    private $_table = "";
    public function __construct(){
        $this->_table = table("admin_menu");
    }

    public function add($data) {
        $this->db->insert($this->_table, $data);
        return $this->db->insert_id();
    }

    public function edit($id, $data) {
        $this->db->where('men_id', $id);
        $this->db->update($this->_table, $data);
        if($this->db->affected_rows() > 0)
            return TRUE;
        else
            return FALSE;
    }

    public function del($id) {
        $query = $this->db->get_where($this->_table, array('men_id' => $id));
        if ($query->num_rows() > 0) {
            $this->db->where('men_id', $id);
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


    public function getcusmenu($val,$cur='', $private) {
        $this->db->select("men_name,men_id,men_link,section_id");
        $this->db->order_by("men_rank", "DESC");
        $this->db->where('section_id', $val);
        $q = $this->db->get($this->_table);
        $rows = $q->result();

        $search_res = array();
        foreach ($rows as $key=>$row)
        {
            $mark = false;
            foreach($private as $k => $val){
                if(in_array($row->men_id, $val)) $mark = true;
            }
            if($mark==false) continue;
            $search_res[$row->men_id]["men_name"] = $row->men_name;
            $search_res[$row->men_id]["men_link"] = $row->men_link;
            $search_res[$row->men_id]["men_id"] = $row->men_id;
            $search_res[$row->men_id]["section_id"] = $row->section_id;
        }
        //var_dump($private);
        //var_dump($search_res);
        //var_dump($search_res);
        return $search_res;
    }
	
	public function search_count($keywords){
		if(empty($keywords)) 0;
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->like("men_name", $keywords);
        return $this->db->count_all_results();
	}
	
	public function search_all($keywords,$limit, $offset) {
        $keywords = trim($keywords);
        if(empty($keywords)) return false;
        $this->db->select('*');
        $this->db->order_by("men_id", "DESC");
        //$this->db->from($this->_table);
        $this->db->like("men_name", $keywords);
        $this->db->limit($limit, $offset);
        $q = $this->db->get($this->_table);
        $rows = $q->result_array();
        return $rows;	
	}

}
