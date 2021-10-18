<?php defined('BASEPATH') or exit('No direct script access allowed');

class Item_model extends CI_Model
{
	public function insert_data($data, $id = 0)
	{
		if ($id != 0) {
			$this->db->where('id_item', $id);
			$this->db->update('item', $data);
			return true;
		} else {
			$this->db->insert('item', $data);
			return true;
		}
	}

	public function get_item($id = null)
	{
		$this->db->select('*');
		$this->db->from('item');
		if ($id != null) {
			$this->db->where('id_item', $id);
			$query = $this->db->get();
			return $query->row_array();
		} else {
			$query = $this->db->get();
			return $query->result_array();
		}
	}

	public function delete_item($id)
	{
		$this->db->where('id_item', $id);
		$this->db->delete('item');
		return true;
	}
}
