<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pelaporan_model extends CI_Model
{

	public function get_pelaporan($id = null)
	{
		$this->db->select('internal.*, users.nama');
		$this->db->from('internal');
		$this->db->join('users', 'users.id_user = internal.disposisi_teknisi');

		if ($id != null) {
			$this->db->where('id_internal', $id);
			$query = $this->db->get();
			return $query->row_array();
		} else {
			$query = $this->db->get();
			return $query->result_array();
		}
	}
}
