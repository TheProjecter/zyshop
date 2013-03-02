<?php
/**
 * Created by Steven(Steven@staff.zylinkus.com).
 * User: Steven
 * Date: 13-1-21
 * Time: 下午8:21
 * File: category_model.php
 * @Author Shanghai ZhiYan Technology Co., Ltd.
 * @Version: 1.0
 * @See http://www.zylinkus.com/project/zyshop
 */
class category_model extends CI_Model
{
    private $_table = "category";
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
        $query = $this->db->get_where($this->_table, array('cat_id' => $id));
        if ($query->num_rows() > 0) {
            $this->db->where('cat_id', $id);
            $this->db->delete($this->_table);
            return true;
        }
        return false;
    }

    public function getOne($arr) {
        $query = $this->db->get_where($this->_table, $arr);
        return $query->row();
    }

    /**
     * @param int cat_id
     * @return string;
     */
    public function getcatnameByid($cat_id) {
        if($cat_id==0) return $this->lang->line("top_selected");
        $this->db->select("cat_name");
        $this->db->where("cat_id", $cat_id);
        $q = $this->db->get($this->_table);
        $row = $q->row_array();
        return $row['cat_name'];
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
        $this->db->like("cat_name", $keyword);
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
        $this->db->order_by("cat_id", "DESC");
        //$this->db->from($this->_table);
        $this->db->like("cat_name", $keyword);
        $this->db->limit($limit, $offset);
        $q = $this->db->get($this->_table);
        $rows = $q->result_array();
        return $rows;
    }

    /**
     * 获得所有的分类信息
     * @param int $id
     * @return array
     */
    public function getCatList($id) {
        //$this->db->start_cache();
        $this->db->select("cat_id,cat_name");
        //$this->db->stop_cache();

        $q = $this->db->get($this->_table);
        $rows = $q->result_array();
        $top_cate[0]['cat_id'] = 0;
        $top_cate[0]['cat_name'] = $this->lang->line("select_0");
        $re_rows = array_merge($top_cate, $rows);
        $re = array();
        foreach($re_rows as $key=>$val) {
            if($val['cat_id']==$id && $id !=0) continue;
            $re[$val['cat_id']] = $val['cat_name'];
        }
        return $re;
    }

}
