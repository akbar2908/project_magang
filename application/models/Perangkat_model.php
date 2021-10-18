<?php defined('BASEPATH') or exit('No direct script access allowed');

class Perangkat_model extends CI_Model
{
	public function insert_data($data, $id = 0)
	{
		if ($id != 0) {
			$this->db->where('id_perangkat', $id);
			$this->db->update('perangkat', $data);
			return true;
		} else {
			$this->db->insert('perangkat', $data);
			return true;
		}
	}

	public function get_perangkat($id = null)
	{
		$this->db->select('*');
		$this->db->from('perangkat');
		if ($id != null) {
			$this->db->where('id_perangkat', $id);
			$query = $this->db->get();
			return $query->row_array();
		} else {
			$query = $this->db->get();
			return $query->result_array();
		}
	}

	public function delete_perangkat($id)
	{
		$this->db->where('id_perangkat', $id);
		$this->db->delete('perangkat');
		return true;
	}
}
