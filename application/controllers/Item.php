<?php defined('BASEPATH') or exit('No direct script access allowed');

class Item extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Item_model', 'item_model');

		if (!$this->session->userdata('is_user_login')) {
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data['title'] = 'item';

		$data['item'] = $this->item_model->get_item();
		$data['layout'] = 'item/list_item';
		$this->load->view('layout', $data);
	}


	public function add()
	{
		if ($this->input->post('submit')) {

			$this->validation('add');
		} else {
			$data['title'] = 'item';

			$data['layout'] = 'item/add_item';
			$this->load->view('layout', $data);
		}
	}

	public function edit($id)
	{
		if ($this->input->post('submit')) {

			$this->validation('edit', $id);
		} else {

			$data['title'] = 'item';


			$data['item'] = $this->item_model->get_item($id);
			if ($data['item']) {


				$data['layout'] = 'item/edit_item';
				$this->load->view('layout', $data);
			} else {
				$this->session->set_flashdata('abort', 'Data golongan yang akan diedit tidak ditemukan');
				redirect(base_url('item'), 'refresh');
			}
		}
	}

	private function validation($page, $id = 0)
	{
		$is_unique = '';
		if ($page == 'add') {
			$is_unique = '|is_unique[item.nama_item]';
		}
		$this->form_validation->set_rules(
			'nama_item',
			'nama item',
			'trim|required' . $is_unique,
			array(
				'required'    => '%s harus diisi!', //edited by wahid
				'unique'    => '%s sudah ada!' //edited by wahid
			)
		);

		$this->form_validation->set_rules(
			'jenis_item',
			'jenis item',
			'trim|required',
			array(
				'required'    => '%s harus diisi!', //edited by wahid
			)
		);

		$this->form_validation->set_rules(
			'harga_item',
			'harga item',
			'trim|required',
			array(
				'required'    => '%s harus diisi!', //edited by wahid
			)
		);


		if ($this->form_validation->run() == FALSE) {

			if ($page == 'add') {
				$this->session->set_flashdata('abort', 'item gagal di input!');

				$data['title'] = 'item';
				$data['layout'] = 'item/add_item';
			} else {
				$this->session->set_flashdata('abort', 'item gagal di input!');

				// $data['golongan'] = $this->golongan_model->get_golongan($id);
				$data['title'] = 'item';
				$data['layout'] = 'item/edit_item';
			}

			$this->load->view('layout', $data);
		} else {
			$data = array(
				'jenis_item' => $this->security->xss_clean($this->input->post('jenis_item')),
				'nama_item' => $this->security->xss_clean($this->input->post('nama_item')),
				'harga_item' => $this->security->xss_clean($this->input->post('harga_item')),
				'created_at' => date('Y-m-d')

			);

			$result = $this->item_model->insert_data($data, $id);

			if ($result) {
				$this->session->set_flashdata('message', 'item sudah berhasil di input!');
				redirect(base_url('item'), 'refresh');
			} else {
				$this->session->set_flashdata('abort', 'item gagal di input!');
				redirect(base_url('item/' . ($id != 0) ? "/" . $id : ''), 'refresh');
			}
		}
	}

	public function delete($id = 0)
	{
		$this->item_model->delete_item($id);

		$this->session->set_flashdata('message', 'item berhasil dihapus!');
		redirect(base_url('item'));
	}
}
