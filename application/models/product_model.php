<?php
/**
 * Created by Steven(Steven@staff.zylinkus.com).
 * User: Steven
 * Date: 13-1-20
 * Time: 下午10:25
 * File: product_model.php
 * @Author Shanghai ZhiYan Technology Co., Ltd.
 * @Version: 1.0
 * @See http://www.zylinkus.com/project/zyshop
 */
class product_model extends CI_Model
{
    private $_table = "";
    public function __construct(){
        $this->load->library("search_lucnene",array(), "search");
        $this->_table = table("product");
    }

    public function add($data) {
        $this->db->insert($this->_table, $data);
        $needFields['pid'] = "keywords";
        $needFields["name"] = "text";
        $needFields["url"] = "text";
        $needFields["desc"] = "text";
        $needFields["keywords"] = "text";
        $data["url"] = "product/".$this->db->insert_id."/".$data["name"];
        $this->search->add($needFields, $data);
        return $this->db->insert_id();
    }

    public function edit($id, $data) {
        $this->db->where('pid', $id);
        $this->db->update($this->_table, $data);
        $needFields['pid'] = "keywords";
        $needFields["name"] = "text";
        $needFields["url"] = "text";
        $needFields["desc"] = "text";
        $needFields["keywords"] = "text";
        $data["url"] = "product/".$id."/".$data["name"];
        $this->search->edit($needFields, $data);
        if($this->db->affected_rows() > 0)
            return TRUE;
        else
            return FALSE;
    }

    public function del($id) {
        $query = $this->db->get_where($this->_table, array('pid' => $id));
        if ($query->num_rows() > 0) {
            $this->db->where('pro_id', $id);
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
        $this->db->like("name", $keyword);
        $this->db->or_like("sn", $keyword);
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
        $this->db->order_by("pid", "DESC");
        $this->db->like("name", $keyword);
        $this->db->or_like("sn", $keyword);
        $this->db->limit($limit, $offset);
        $q = $this->db->get($this->_table);
        $rows = $q->result_array();
        return $rows;
    }

}
