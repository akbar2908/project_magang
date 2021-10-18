<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pengaduan_model', 'pengaduan_model');

		if (!$this->session->userdata('is_user_login')) {
			redirect('auth/login');
		}
	}

	public function input_diagnosa($id)
	{
		if ($this->input->post('submit')) {

			$this->diagnosa('add', $id);
		} else {
			$data['title'] = 'pengaduan';
			$data['id_pengaduan'] = $id;
			$diagnosa = $this->pengaduan_model->get_diagnosa($id);
			$data['diagnosa'] = isset($diagnosa['diagnosa_masalah']) ? $diagnosa['diagnosa_masalah'] : '';
			$data['layout'] = 'pengaduan/estimasibiaya';
			$this->load->view('layout', $data);
		}
	}

	private function diagnosa($page, $id = 0)
	{
		$this->form_validation->set_rules(
			'diagnosa_masalah',
			'Diagnosa Masalah',
			'required',
			array(
				'required'    => '%s harus diisi!', //edited by wahid
			)
		);


		if ($this->form_validation->run() == FALSE) {

			if ($page == 'add') {
				$this->session->set_flashdata('abort', 'Diagnosa gagal di input!');

				$data['title'] = 'pengaduan';
				$data['id_pengaduan'] = $id;
				$diagnosa = $this->pengaduan_model->get_diagnosa($id);
				$data['diagnosa'] = isset($diagnosa) ? $diagnosa : '';
				$data['layout'] = 'pengaduan/estimasibiaya';
			}

			$this->load->view('layout', $data);
		} else {
			$pelaporan_id = $this->pengaduan_model->get_diagnosa($id)['id_internal'];
			$i = 0;
			$data = [];
			$total = 0;
			foreach ($this->input->post('item') as $item) {
				$data[$i]['item_id'] = $item;
				$data[$i]['pelaporan_id'] = $pelaporan_id;
				$data[$i]['jumlah_item'] = $this->input->post('jumlah_item')[$i];
				$data[$i]['harga_item'] = $this->input->post('harga_item')[$i];
				$total +=  ($this->input->post('jumlah_item')[$i] *  $this->input->post('harga_item')[$i]);
				$i++;
			}

			$data2['diagnosa_masalah'] = $this->input->post('diagnosa_masalah');
			$data2['total_biaya'] = $total;
			$data2['tgl_diagnosa'] = date('Y-m-d H:i:s');
			// $result = $this->perangkat_model->insert_data($data, $id);

			$result = $this->pengaduan_model->proses_diagnosa($pelaporan_id, $id, $data, $data2);

			if ($result) {
				$this->session->set_flashdata('message', 'Estimasi sudah berhasil di input!');
				redirect(base_url('pengaduan'), 'refresh');
			} else {
				$this->session->set_flashdata('abort', 'pengaduan gagal di input!');
				redirect(base_url('pengaduan/input_diagnosa/' . $id), 'refresh');
			}
		}
	}

	public function get_item()
	{
		$item = $this->pengaduan_model->get_item();

		echo json_encode($item);
	}

	public function index()
	{
		$data['title'] = 'pengaduan';

		$data['pengaduan'] = $this->pengaduan_model->get_pengaduan();
		$data['layout'] = 'pengaduan/list_pengaduan';
		$this->load->view('layout', $data);
	}

	public function detail_biaya($id)
	{
		$data['title'] = 'pengaduan';

		$data['detail_biaya'] = $this->pengaduan_model->detail_biaya($id);
		$data['layout'] = 'pengaduan/detail_biaya';
		$this->load->view('layout', $data);
	}


	public function detail($id)
	{
		$data['title'] = 'pengaduan';

		$data['pengaduan'] = $this->pengaduan_model->get_pelaporan($id);

		$data['layout'] = 'pengaduan/detail_pengaduan';
		$this->load->view('layout', $data);
	}

	public function add($id)
	{
		if ($this->input->post('submit')) {

			$this->validation('add', $id);
		} else {
			$data['title'] = 'pengaduan';

			$data['teknisi'] = $this->pengaduan_model->get_teknisi();
			$data['pengaduan'] = $this->pengaduan_model->get_pengaduan($id);
			if ($data['pengaduan']) {
				$data['layout'] = 'pengaduan/add_pengaduan';
				$this->load->view('layout', $data);
			} else {
				$this->session->set_flashdata('abort', 'Data teknisi yang akan diedit tidak ditemukan');
				redirect(base_url('pengaduan'), 'refresh');
			}
		}
	}

	private function uploadFoto($directory, $files, $id)
	{

		// $old_image = $data['user_info']['image'];
		if (!empty($files['file']['name'])) {

			$config = array(
				'upload_path' => $directory,
				'allowed_types' => "*",
				'overwrite' => TRUE,
				'max_size' => "848000" // Can be set to particular file size , here it is 0.5 MB(548 Kb)
			);

			$name =  strtotime(date('Y-m-d H:i:s')) . $_FILES["file"]["name"];
			$new_name = preg_replace('/\s+/', '', $name);
			$config['file_name'] = $new_name;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('file')) {

				$file_data = array('upload_data' => $this->upload->data());
				$dataImage =  $file_data['upload_data']['file_name'];


				// if ($old_image != 'uploads/profile/user/user.png' && $dataImage != $old_image) {

				// 	unlink(FCPATH . $old_image);
				// }

				$this->db->where('pengaduan_id', $id);
				$this->db->update('internal', ['file' => $dataImage]);

				return $new_name;
			} else {
				$data['file_error'] = array('error' => $this->upload->display_errors());

				var_dump($data['file_error']);
				exit();
				$this->session->set_flashdata('abort', 'Error! Please select a valid file formate');
				redirect(base_url('pengaduan'));
			}
		}
		// end upload user image code		
	}

	public function tindakan($id)
	{
		if ($this->input->post('submit')) {

			$this->form_validation->set_rules(
				'tindakan',
				'Tindakan',
				'required',
				array(
					'required'    => '%s harus diisi!', //edited by wahid
				)
			);

			if ($this->form_validation->run() == FALSE) {

				$this->session->set_flashdata('abort', 'Tindakan gagal di input!');

				$data['title'] = 'pengaduan';
				$data['layout'] = 'pengaduan/tindakan_pengaduan';


				$this->load->view('layout', $data);
			} else {
				$upload = null;

				if (isset($_FILES) && !empty($_FILES)) {
					if ($this->security->xss_clean($_FILES, TRUE) === FALSE) {
						// file failed the XSS test

						$this->session->set_flashdata('abort', 'Upload Error');

						redirect(base_url('pengaduan'));
					} else {

						$upload = $this->uploadFoto('./assets/tindakan/', $_FILES, $id);
					}
				}

				$internal = [
					'pengaduan_id' => $id,
					'tindakan' => $this->input->post('tindakan'),
					'file' => $upload,
					'tgl_tindakan' => date('Y-m-d H:i:s'),
				];

				// $result = $this->perangkat_model->insert_data($data, $id);

				$result = $this->pengaduan_model->proses_tindakan($id, $internal);

				if ($result) {
					$this->session->set_flashdata('message', 'pengaduan sudah berhasil di tindak!');
					redirect(base_url('pengaduan'), 'refresh');
				} else {
					$this->session->set_flashdata('abort', 'pengaduan gagal di ditindak!');
					redirect(base_url('pengaduan/tindakan/' . ($id != 0) ? "/" . $id : ''), 'refresh');
				}
			}
		} else {
			$data['title'] = 'pengaduan';

			// $data['teknisi'] = $this->pengaduan_model->get_teknisi();
			$data['pengaduan'] = $this->pengaduan_model->get_pengaduan($id);
			if ($data['pengaduan']) {
				$data['layout'] = 'pengaduan/add_tindakan';
				$this->load->view('layout', $data);
			} else {
				$this->session->set_flashdata('abort', 'Data teknisi yang akan diedit tidak ditemukan');
				redirect(base_url('pengaduan'), 'refresh');
			}
		}
	}

	private function validation($page, $id = 0)
	{
		// $is_unique = '';
		// if ($page == 'add') {
		// 	$is_unique = '|is_unique[perangkat.no_inventaris]';
		// }
		// $this->form_validation->set_rules(
		// 	'no_inventaris',
		// 	'nama no_inventaris',
		// 	'trim|required' . $is_unique,
		// 	array(
		// 		'required'    => '%s harus diisi!', //edited by wahid
		// 		'unique'    => '%s sudah ada!' //edited by wahid
		// 	)
		// );

		$this->form_validation->set_rules(
			'disposisi_teknisi',
			'Teknisi',
			'required',
			array(
				'required'    => '%s harus diisi!', //edited by wahid
			)
		);

		// $this->form_validation->set_rules(
		// 	'tindakan',
		// 	'Tindakan',
		// 	'required',
		// 	array(
		// 		'required'    => '%s harus diisi!', //edited by wahid
		// 	)
		// );


		if ($this->form_validation->run() == FALSE) {

			if ($page == 'add') {
				$this->session->set_flashdata('abort', 'pengaduan gagal di input!');

				$data['title'] = 'pengaduan';
				$data['layout'] = 'pengaduan/add_pengaduan';
			} else {
				$this->session->set_flashdata('abort', 'pengaduan gagal di input!');

				// $data['golongan'] = $this->golongan_model->get_golongan($id);
				$data['title'] = 'pengaduan';
				$data['layout'] = 'pengaduan/edit_pengaduan';
			}

			$this->load->view('layout', $data);
		} else {
			$internal = [
				'pengaduan_id' => $id,
				// 'tindakan' => $this->input->post('tindakan'),
				// 'tgl_tindakan' => date('Y-m-d H:i:s'),
				'tgl_disposisi' => date('Y-m-d H:i:s'),
				'disposisi_teknisi' => $this->input->post('disposisi_teknisi')
			];

			// $result = $this->perangkat_model->insert_data($data, $id);

			$result = $this->pengaduan_model->proses_pengaduan($id, $internal);

			if ($result) {
				$this->session->set_flashdata('message', 'pengaduan sudah berhasil di input!');
				redirect(base_url('pengaduan'), 'refresh');
			} else {
				$this->session->set_flashdata('abort', 'pengaduan gagal di input!');
				redirect(base_url('pengaduan/add/' . ($id != 0) ? "/" . $id : ''), 'refresh');
			}
		}
	}


	// public function proses_pengaduan($id)
	// {
	// 	$result = $this->pengaduan_model->proses_pengaduan($id);

	// 	if ($result) {
	// 		$this->session->set_flashdata('message', 'pengaduan sudah berhasil!');
	// 	} else {
	// 		$this->session->set_flashdata('abort', 'pengaduan gagal!');
	// 	}

	// 	redirect(base_url('pengaduan'), 'refresh');
	// }

	public function acc_kepala($id)
	{
		$result = $this->pengaduan_model->proses_acc($id);

		if ($result) {
			$this->session->set_flashdata('message', 'pengaduan berhasil diterima!');
		} else {
			$this->session->set_flashdata('abort', 'pengaduan gagal diterima!');
		}

		redirect(base_url('pengaduan'), 'refresh');
	}

	public function revisi_kepala($id)
	{


		if ($this->input->post('submit')) {

			$cancel = $this->input->post('revisi');
			$result = $this->pengaduan_model->proses_revisi($id, $cancel);

			if ($result) {
				$this->session->set_flashdata('message', 'pengaduan berhasil diterima!');
			} else {
				$this->session->set_flashdata('abort', 'pengaduan gagal diterima!');
			}

			redirect(base_url('pengaduan'), 'refresh');
		} else {
			$data['title'] = 'pengaduan';

			$data['pengaduan'] = $this->pengaduan_model->get_pengaduan($id);
			if ($data['pengaduan']) {
				$data['layout'] = 'pengaduan/revisi_pengaduan';
				$this->load->view('layout', $data);
			} else {
				$this->session->set_flashdata('abort', 'Data pengaduan tidak ditemukan');
				redirect(base_url('pengaduan'), 'refresh');
			}
		}
	}

	public function cancel_kepala($id)
	{

		if ($this->input->post('submit')) {

			$cancel = $this->input->post('cancel');
			$result = $this->pengaduan_model->proses_cancel($id, $cancel);

			if ($result) {
				$this->session->set_flashdata('message', 'pengaduan berhasil ditolak!');
			} else {
				$this->session->set_flashdata('abort', 'proses tolak gagal!');
			}

			redirect(base_url('pengaduan'), 'refresh');
		} else {
			$data['title'] = 'pengaduan';

			$data['pengaduan'] = $this->pengaduan_model->get_pengaduan($id);
			if ($data['pengaduan']) {
				$data['layout'] = 'pengaduan/cancel_pengaduan';
				$this->load->view('layout', $data);
			} else {
				$this->session->set_flashdata('abort', 'Data pengaduan tidak ditemukan');
				redirect(base_url('pengaduan'), 'refresh');
			}
		}
	}


	public function selesai_pengaduan($id)
	{
		$result = $this->pengaduan_model->proses_selesai($id);

		if ($result) {
			$this->session->set_flashdata('message', 'pengaduan berhasil diselesaikan!');
		} else {
			$this->session->set_flashdata('abort', 'proses gagal diselesaikan!');
		}

		redirect(base_url('pengaduan'), 'refresh');
	}

	public function closing($id)
	{
		if ($this->input->post('submit')) {

			$penerima = $this->input->post('penerima');
			$result = $this->pengaduan_model->proses_closing($id, $penerima);

			if ($result) {
				$this->session->set_flashdata('message', 'pengaduan berhasil diselesaikan!');
			} else {
				$this->session->set_flashdata('abort', 'proses gagal diselesaikan!');
			}

			redirect(base_url('pengaduan'), 'refresh');
		} else {
			$data['title'] = 'pengaduan';

			$data['pengaduan'] = $this->pengaduan_model->get_pengaduan($id);
			if ($data['pengaduan']) {
				$data['layout'] = 'pengaduan/closing_pengaduan';
				$this->load->view('layout', $data);
			} else {
				$this->session->set_flashdata('abort', 'Data pengaduan tidak ditemukan');
				redirect(base_url('pengaduan'), 'refresh');
			}
		}
	}
}
