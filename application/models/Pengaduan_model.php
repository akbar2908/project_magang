<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduan_model extends CI_Model
{

	public function get_pengaduan($id = null)
	{
		$this->db->select('pengaduan.*, internal.disposisi_teknisi, internal.tindakan');
		$this->db->from('pengaduan');
		$this->db->join('internal', 'internal.pengaduan_id = pengaduan.id_pengaduan', 'left');
		if ($id != null) {
			$this->db->where('id_pengaduan', $id);
			$query = $this->db->get();
			return $query->row_array();
		} else {
			$query = $this->db->get();
			return $query->result_array();
		}
	}

	public function proses_diagnosa($id, $id_pengaduan, $data1, $data2)
	{
		$this->db->trans_begin();

		$this->db->where('id_internal', $id);
		$this->db->update('internal', $data2);

		$this->db->where('id_pengaduan', $id_pengaduan);
		$this->db->update('pengaduan', ['keterangan' => 'ie']);

		$this->db->where('pelaporan_id', $id);
		$this->db->delete('biaya');

		$this->db->insert_batch('biaya', $data1);

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return false;
		} else {
			$this->db->trans_commit();
			return true;
		}
	}

	public function get_diagnosa($id)
	{
		$this->db->select('diagnosa_masalah, id_internal');
		$this->db->from('internal');
		$this->db->where('pengaduan_id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function detail_biaya($id)
	{
		$this->db->select('biaya.*, item.nama_item');
		$this->db->from('biaya');
		$this->db->join('item', 'item.id_item = biaya.item_id', 'left');
		$this->db->where('pelaporan_id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_teknisi()
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('role', 'T');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_item()
	{
		$this->db->select('*');
		$this->db->from('item');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function proses_tindakan($id, $internal)
	{
		$data = [
			'status' => 'progress',
			'keterangan' => 'it'
		];

		$this->db->trans_begin();

		$this->db->where('id_pengaduan', $id);
		$this->db->update('pengaduan', $data);

		$this->db->select('*');
		$this->db->from('internal');
		$this->db->where('pengaduan_id', $id);
		$query = $this->db->get();
		$get = $query->num_rows();
		if ($get) {
			$this->db->where('pengaduan_id', $id);
			$this->db->update('internal', $internal);
		} else {
			$this->db->insert('internal', $internal);
		}
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return false;
		} else {
			$this->db->trans_commit();
			return true;
		}
	}



	public function proses_pengaduan($id, $internal)
	{
		$data = [
			'status' => 'progress',
			'keterangan' => 'l'
		];

		$this->db->trans_begin();

		$this->db->where('id_pengaduan', $id);
		$this->db->update('pengaduan', $data);

		$this->db->select('tgl_masuk');
		$this->db->from('pengaduan');
		$this->db->where('id_pengaduan', $id);
		$query = $this->db->get();
		$tgl_pengaduan = $query->row_array();

		$internal['tgl_pengaduan'] = $tgl_pengaduan['tgl_masuk'];

		$this->db->select('*');
		$this->db->from('internal');
		$this->db->where('pengaduan_id', $id);
		$query = $this->db->get();
		$get = $query->num_rows();
		if ($get) {
			$this->db->where('pengaduan_id', $id);
			$this->db->update('internal', $internal);
		} else {
			$this->db->insert('internal', $internal);
		}
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return false;
		} else {
			$this->db->trans_commit();
			return true;
		}
	}

	public function proses_cancel($id, $catatan = '')
	{
		$data = [
			'keterangan' => 'tl',
			'status' => 'close',
			'note' => $catatan
		];

		$this->db->where('id_pengaduan', $id);
		$this->db->update('pengaduan', $data);
		return true;
	}

	public function proses_selesai($id)
	{
		$data = [
			'keterangan' => 's',
			'status' => 'done',
		];
		$data2 = [
			'tgl_selesai' => date('Y-m-d H:i:s')
		];

		$this->db->where('id_pengaduan', $id);
		$this->db->update('pengaduan', $data);

		$this->db->where('pengaduan_id', $id);
		$this->db->update('internal', $data2);
		return true;
	}

	public function proses_closing($id, $penerima)
	{
		$data = [
			'keterangan' => 'c',
			'status' => 'closing',
			'penerima_pengembalian' => $penerima
		];

		$this->db->where('id_pengaduan', $id);
		$this->db->update('pengaduan', $data);
		return true;
	}


	public function proses_acc($id)
	{
		$this->db->select('keterangan');
		$this->db->from('pengaduan');
		$this->db->where('id_pengaduan', $id);
		$query = $this->db->get();
		$keterangan = $query->row_array();

		if ($keterangan['keterangan'] == 'p') {
			$data = [
				'keterangan' => 'tp'
			];
		} elseif ($keterangan['keterangan'] == 'l' || $keterangan['keterangan'] == 'rr') {
			$data = [
				'keterangan' => 'tr'
			];
		} elseif ($keterangan['keterangan'] == 'ie' || $keterangan['keterangan'] == 'ri') {
			$data = [
				'keterangan' => 'ti'
			];
		}
		$this->db->where('id_pengaduan', $id);
		$this->db->update('pengaduan', $data);
		return true;
	}

	public function proses_revisi($id, $catatan = '')
	{
		$this->db->select('keterangan');
		$this->db->from('pengaduan');
		$this->db->where('id_pengaduan', $id);
		$query = $this->db->get();
		$keterangan = $query->row_array();

		if ($keterangan['keterangan'] == 'l') {
			$data = [
				'keterangan' => 'rr',
				'note' => $catatan
			];
		} elseif ($keterangan['keterangan'] == 'ie') {
			$data = [
				'keterangan' => 'ri',
				'note' => $catatan
			];
		}
		$this->db->where('id_pengaduan', $id);
		$this->db->update('pengaduan', $data);
		return true;
	}

	public function get_pelaporan($id = null)
	{
		$this->db->select('internal.*, users.nama');
		$this->db->from('internal');
		$this->db->join('users', 'users.id_user = internal.disposisi_teknisi');

		if ($id != null) {
			$this->db->where('pengaduan_id', $id);
			$query = $this->db->get();
			return $query->row_array();
		} else {
			$query = $this->db->get();
			return $query->result_array();
		}
	}
}
