<?php

/**
 * 
 */
class FrontModel extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function getall($table, $select = '', $where= '', $order_by =  '', $join = '',$limit='', $start='', $group_by='')  
	{  
		$this->db->select($select)->order_by($order_by, 'DESC');
		if (is_array($join)) {
			foreach ($join as $i => $t) {
            	$this->db->join($t, $t.'.id = u.'.$i);
        	}
		}
		if ($where != '') {
			$this->db->where($where);	
		}

		if ($limit != '') {
			$this->db->limit($limit, $start);
		}

		if ($group_by != '') {
			$this->db->group_by($group_by);
		}
	    return $this->db->get($table)->result_array();
	}

	public function get($table, $select, $where, $join = '')
	{
		$this->db->select($select);
		
		if (is_array($join)) {
			foreach ($join as $i => $t) {
            	$this->db->join($t, $t.'.id = u.'.$i);
        	}
		}
		
		$return = $this->db->where($where)->from($table)->get()->row_array();
		
		if ($return) {
			return $return; 	
		}else{
			return FALSE;
		}
	}

	public function check($table, $where, $select)
	{
		$check = $this->db->select($select)->where($where)->from($table)->get()->row_array();

		if ($check) {
			return $check[$select];
		}else{
			return FALSE;
		}
	}

	public function add($post, $table)
	{
		$this->db->insert($table, $post);
		return $this->db->insert_id();
	}

	public function update($id, $post, $table)
	{
		return $this->db->where($id)->update($table, $post);
	}

	public function delete($where, $table)
	{
		return $this->db->delete($table, $where);
	}
}