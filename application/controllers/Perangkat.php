<?php defined('BASEPATH') or exit('No direct script access allowed');

class Perangkat extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Perangkat_model', 'perangkat_model');

		if (!$this->session->userdata('is_user_login')) {
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data['title'] = 'perangkat';

		$data['perangkat'] = $this->perangkat_model->get_perangkat();
		$data['layout'] = 'perangkat/list_perangkat';
		$this->load->view('layout', $data);
	}


	public function add()
	{
		if ($this->input->post('submit')) {

			$this->validation('add');
		} else {
			$data['title'] = 'perangkat';

			$data['layout'] = 'perangkat/add_perangkat';
			$this->load->view('layout', $data);
		}
	}

	public function edit($id)
	{
		if ($this->input->post('submit')) {

			$this->validation('edit', $id);
		} else {

			$data['title'] = 'perangkat';


			$data['perangkat'] = $this->perangkat_model->get_perangkat($id);
			if ($data['perangkat']) {


				$data['layout'] = 'perangkat/edit_perangkat';
				$this->load->view('layout', $data);
			} else {
				$this->session->set_flashdata('abort', 'Data golongan yang akan diedit tidak ditemukan');
				redirect(base_url('perangkat'), 'refresh');
			}
		}
	}

	private function validation($page, $id = 0)
	{
		$is_unique = '';
		if ($page == 'add') {
			$is_unique = '|is_unique[perangkat.no_inventaris]';
		}
		$this->form_validation->set_rules(
			'no_inventaris',
			'nama no_inventaris',
			'trim|required' . $is_unique,
			array(
				'required'    => '%s harus diisi!', //edited by wahid
				'unique'    => '%s sudah ada!' //edited by wahid
			)
		);

		$this->form_validation->set_rules(
			'nama_perangkat',
			'nama perangkat',
			'trim|required',
			array(
				'required'    => '%s harus diisi!', //edited by wahid
			)
		);

		$this->form_validation->set_rules(
			'jenis_perangkat',
			'jenis perangkat',
			'trim|required',
			array(
				'required'    => '%s harus diisi!', //edited by wahid
			)
		);



		if ($this->form_validation->run() == FALSE) {

			if ($page == 'add') {
				$this->session->set_flashdata('abort', 'perangkat gagal di input!');

				$data['title'] = 'perangkat';
				$data['layout'] = 'perangkat/add_perangkat';
			} else {
				$this->session->set_flashdata('abort', 'perangkat gagal di input!');

				// $data['golongan'] = $this->golongan_model->get_golongan($id);
				$data['title'] = 'perangkat';
				$data['layout'] = 'perangkat/edit_perangkat';
			}

			$this->load->view('layout', $data);
		} else {
			$data = array(
				'no_inventaris' => $this->security->xss_clean($this->input->post('no_inventaris')),
				'nama_perangkat' => $this->security->xss_clean($this->input->post('nama_perangkat')),
				'jenis_perangkat' => $this->security->xss_clean($this->input->post('jenis_perangkat')),
				'created_at' => date('Y-m-d')

			);

			$result = $this->perangkat_model->insert_data($data, $id);

			if ($result) {
				$this->session->set_flashdata('message', 'perangkat sudah berhasil di input!');
				redirect(base_url('perangkat'), 'refresh');
			} else {
				$this->session->set_flashdata('abort', 'perangkat gagal di input!');
				redirect(base_url('perangkat/' . ($id != 0) ? "/" . $id : ''), 'refresh');
			}
		}
	}

	public function delete($id = 0)
	{
		$this->perangkat_model->delete_perangkat($id);

		$this->session->set_flashdata('message', 'perangkat berhasil dihapus!');
		redirect(base_url('perangkat'));
	}
}
