<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{

	// registraion
	public function total($from, $where = null)
	{

		$this->db->select('*');
		$this->db->from($from);
		if ($where != null) {
			if ($from == 'pengaduan') {
				$this->db->where('keterangan', $where);
			}
		}
		$query = $this->db->get();
		return $query->num_rows();
	}
}
