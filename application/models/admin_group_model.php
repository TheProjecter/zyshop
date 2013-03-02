<?php
/**
 * Created by Steven(Steven@staff.zylinkus.com).
 * User: Steven
 * Date: 12-12-14
 * Time: 下午11:10
 * File: admin_group_model.php
 * @Author Shanghai ZhiYan Technology Co., Ltd.
 * @Version: 1.0
 * @See http://www.zylinkus.com/project/zyshop
 */
class admin_group_model extends CI_Model
{
    private $_table = "admin_group";
    public function __construct(){
        //$this->_table = table("admin_group");
    }
	
	  /**
     * add data
     */
    public function add($postData) {
        unset($postData['act']);
        $postData['gro_date'] = time();
        $postData['ope_id'] = $this->session->userdata('uid');
        $this->db->insert($this->_table, $postData);
        return $this->db->insert_id();
    }

    /**
     * edit data
     */
    public function edit($id, $data) {
        $this->db->where('gro_id', $id);
        $data['gro_date'] = time();
        $data['ope_id'] = $this->session->userdata('uid');
        $this->db->update($this->_table, $data);
        if($this->db->affected_rows() > 0)
            return TRUE;
        else
            return FALSE;
    }

    /**
     * del data
     */
    public function del() {
        $query = $this->db->get_where($this->_table, array('gro_id' => $id));
        if ($query->num_rows() > 0) {
            $this->db->where('gro_id', $id);
            $this->db->delete($this->_table);
            return true;
        }
        return false;
    }

    public function getOne($arr = array()) {
        $query = $this->db->get_where($this->_table, $arr);
        return $query->row();
    }

    /**
     * get one group by id
     * @param int id
     * @return array
     * @access public
     */
    public function getgroup($id) {
        $query = $this->db->get_where($this->_table, array('gro_id'=>$id));
        $row = $query->row();
        if($row==false) return false;
        $arr = array();;

            $arr['gro_name'] = $row->gro_name;
            $arr['gro_id'] = $row->gro_id;
            $arr['gro_data'] = json_decode($row->gro_data, TRUE);
            $arr['gro_status'] = $row->gro_status;
        return $arr;
    }

    /**
     * get group
     */
    public function getgroupsForbulletion() {
        $query = $this->db->get_where($this->_table, array('gro_status' => 1));
        $rows = $query->result_array();
        $arr = array();
        foreach($rows as $key => $row) {
            $arr[$row['gro_id']] = $row['gro_name'];
        }
        return $arr;
    }

    public function getgroupsCouts() {
        return $this->db->count_all($this->_table);
    }

    public function getgroups($num, $offset) {
        $query = $this->db->get($this->_table, $num, $offset);
        $arr = array();
        $i = 0;
        foreach ($query->result() as $row)
        {
            $arr[$i]['gro_name'] = $row->gro_name;
            $arr[$i]['gro_data'] = json_encode($row->gro_data, TRUE);
            $arr[$i]['gro_id'] = $row->gro_id;
            $arr[$i]['gro_date'] = date('Y-m-d', $row->gro_date);
            $i++;
        }
        return $arr;
    }

    public function getmenus($section_id) {
        $_table = "admin_menu";
        $this->db->select('men_name,men_id,men_link,section_id');
        $this->db->where('section_id', $section_id);
        $q = $this->db->get(table($_table));
        return $rows = $q->result();
        $arr = array();
        foreach($rows as $key => $row) {
            $arr[$key]["men_name"] = $row->men_name;
            $arr[$key]["men_id"] = $row->men_id;
        }
        return $arr;
    }

    public function search_by_name_count($keyword) {
        $keyword = trim($keyword);
        if(empty($keyword)) 0;

        $this->db->select('gro_id');
        $this->db->from($this->_table);
        $this->db->like("gro_name", $keyword);
        return $this->db->count_all_results();
    }

    /**
     * search by by keywords
     * @param string $keyword
     * @return array $res
     * @author Steven(lizhi.liu@foxmail.com)
     */
    public function search_by_name($keyword, $limit, $offset) {
        $keyword = trim($keyword);
        if(empty($keyword)) return false;
        $this->db->select('gro_name,gro_id,gro_data,gro_date');
        //$this->db->from($this->_table);
        $this->db->like("gro_name", $keyword);
        $this->db->limit($limit, $offset);
        $q = $this->db->get($this->_table);
        $rows = $q->result();

        $search_res = array();
        foreach ($rows as $key=>$row)
        {
            $search_res[$row->men_id]["gro_name"] = $row->gro_name;
            $search_res[$row->men_id]["gro_id"] = $row->gro_id;
            $search_res[$row->men_id]["gro_data"] = json_decode($row->gro_data,true);
            $search_res[$row->men_id]["gro_date"] = date('Y-m-d',$row->gro_date);
        }
        //var_dump($search_res);
        return $search_res;
    }


    /**
     * @access public
     * @return arr $arr
     */
    public function getValidGroup() {
        $query = $this->db->get_where($this->_table, array('gro_status' => 1));
        $rows = $query->result_array();
        $arr = array();
        foreach($rows as $key => $row) {
            $arr[$row['gro_id']] = $row['gro_name'];
        }
        return $arr;
    }

}
