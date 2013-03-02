<?php
/**
 * Created by Steven(Steven@staff.zylinkus.com).
 * User: Steven
 * Date: 12-12-13
 * Time: 下午8:45
 * File: admin_user_model.php
 * @Author Shanghai ZhiYan Technology Co., Ltd.
 * @Version: 1.0
 * @See http://www.zylinkus.com/project/zyshop
 */
class admin_user_model extends CI_Model
{
    private $_table = "admin_user";
    public function __construct(){
        
    }

    /**
     * @param string username
     * @param string password
     * @return object|array;
     */
    public function login($username, $password) {
        $this->db->where('email', $username);
        //$this->db->or_where("username", $username);
        $this->db->where("password", $password);
        $this->db->where("user_state", 1);
        $q = $this->db->get($this->_table);
        $row = $q->row_array();
        if($row->user_id > 0) {
            $data['last_ip'] = $this->input->ip_address();
            $data['last_login'] = time();
            $this->edit($row->user_id, $data);
        }
        return $row;
    }

    public function add($data) {
        $this->db->insert($this->_table, $data);
        return $this->db->insert_id();
    }

    public function edit($id, $data) {
        $this->db->where('user_id', $id);
        $this->db->update($this->_table, $data);
        if($this->db->affected_rows() > 0)
            return TRUE;
        else
            return FALSE;
    }

    public function del($id) {
        $query = $this->db->get_where($this->_table, array('user_id' => $id));
        if ($query->num_rows() > 0) {
            $this->db->where('user_id', $id);
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
     * 权限的修改
    */
    public function editAct($id) {

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
        $this->db->order_by("user_id", "DESC");
        //$this->db->from($this->_table);
        $this->db->like("email", $keyword);
        $this->db->or_like("user_name", $keyword);
        $this->db->limit($limit, $offset);
        $q = $this->db->get($this->_table);
        $rows = $q->result_array();
        return $rows;
    }
}
