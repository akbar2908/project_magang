<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_model', 'dashboard_model');

		if (!$this->session->userdata('is_user_login')) {
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data['title'] = 'dashboard';

		$data['total_tolak'] = $this->dashboard_model->total('pengaduan', 'tl');
		$data['total_selesai'] = $this->dashboard_model->total('pengaduan', 'c');
		$data['total_pengguna'] = $this->dashboard_model->total('pengaduan');
		// $data['total_teknisi'] = $this->dashboard_model->total('users', 'T');

		$data['layout'] = 'dashboard';
		$this->load->view('layout', $data);
	}
}
