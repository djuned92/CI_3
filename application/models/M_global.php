<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_global extends CI_Model {

	/**
	 *
	 * create data 
	 * change true for get last id
	 * ex : $this->m_global->store('table', $data, true)
	 */
	public function store($table, $data, $last_id = FALSE) 
	{
		$this->db->insert($table, $data);
		if($last_id)
			return $this->db->insert_id();
	}

	/**
	 *
	 * update specified data
	 * @param int $id
	 */
	public function update($table, $data, $id)
	{
		$this->db->update($table, $data, $id);
	}

	/**
	 *
	 * delete specified data
	 * @param int $id
	 */
	public function destroy($table, $id)
	{
		$this->db->delete($table, $id);
	}

	/**
	 *
	 * get data
	 * @param
	 */
	public function get($table, $where = NULL, $order_by = NULL, $join = NULL, $cond = NULL)
	{
		if($where !== NULL)
			$this->db->where($where);

		if($order_by !== NULL)
			$this->db->order_by($order_by);

		if($join !== NULL AND $cond !== NULL)
			$this->db->join($join, $cond);

		return $this->db->get($table);
	}
	

}

/* End of file M_global.php */
/* Location: ./application/models/M_global.php */