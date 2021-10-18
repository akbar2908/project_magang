<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pelaporan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pelaporan_model', 'pelaporan_model');

		if (!$this->session->userdata('is_user_login')) {
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data['title'] = 'pelaporan';

		$data['pelaporan'] = $this->pelaporan_model->get_pelaporan();
		$data['layout'] = 'pelaporan/list_pelaporan';
		$this->load->view('layout', $data);
	}

	public function input_diagnosa($id)
	{
		$data['title'] = 'estimasi';

		// $data['pelaporan'] = $this->pelaporan_model->get_pelaporan();
		$data['layout'] = 'pengaduan/estimasibiaya';
		$this->load->view('layout', $data);
	}

	public function terima_pengaduan($id)
	{
		$result = $this->pengaduan_model->proses_pengaduan($id);

		if ($result) {
			$this->session->set_flashdata('message', 'pengaduan sudah berhasil!');
		} else {
			$this->session->set_flashdata('abort', 'pengaduan gagal!');
		}

		redirect(base_url('pengaduan'), 'refresh');
	}

	public function tolak_pengaduan($id)
	{
		$result = $this->pengaduan_model->proses_pengaduan($id);

		if ($result) {
			$this->session->set_flashdata('message', 'pengaduan sudah berhasil!');
		} else {
			$this->session->set_flashdata('abort', 'pengaduan gagal!');
		}

		redirect(base_url('pengaduan'), 'refresh');
	}
}
