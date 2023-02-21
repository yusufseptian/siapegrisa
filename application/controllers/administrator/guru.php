<?php

class guru extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		if (!isset($this->session->userdata['username']) || $this->session->userdata['level'] != 'admin') {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Anda Belum Login!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>');
			redirect('administrator/auth');
		}
	}

	public function index()
	{
		$data['guru'] = $this->guru_model->tampil_data()->result();

		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/guru', $data);
		// $this->load->view('administrator/guru');
		$this->load->view('templates_administrator/footer');
	}


	public function detail($id)
	{
		$data['detail'] = $this->guru_model->ambil_id_guru($id);
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/guru_detail', $data);
		$this->load->view('templates_administrator/footer');
	}

	public function tambah_guru()
	{
		$data['guru'] = $this->guru_model->tampil_data('guru');
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/guru_form', $data);
		$this->load->view('templates_administrator/footer');
	}

	public function tambah_guru_aksi()
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->tambah_guru();
		} else {
			$nip 			= $this->input->post('nip');
			$username 			= $this->input->post('username');
			$password 			= $this->input->post('password');
			$nama 			= $this->input->post('nama');
			$tempat_lahir 	= $this->input->post('tempat_lahir');
			$tgl_lahir 		= $this->input->post('tgl_lahir');
			$gender 		= $this->input->post('gender');
			$no_hp 			= $this->input->post('no_hp');
			$email 			= $this->input->post('email');
			$alamat 		= $this->input->post('alamat');
			$jabatan 			= $this->input->post('jabatan');
			$pendidikan_terakhir 			= $this->input->post('pendidikan_terakhir');
			$photo 			= $_FILES['photo'];

			if ($photo = '') {
			} else {
				$config['upload_path'] = './assets/uploads';
				$config['allowed_types'] = 'jpg|png|gif|tiff';
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('photo')) {
					echo "Gagal Upload";
					die();
				} else {
					$photo = $this->upload->data('file_name');
				}
			}

			$data = array(
				'username' 			=> $username,
				'password' 			=> md5($password),
				'nip' 			=> $nip,
				'nama' 			=> $nama,
				'tempat_lahir' 	=> $tempat_lahir,
				'tgl_lahir' 	=> $tgl_lahir,
				'gender' 		=> $gender,
				'no_hp' 		=> $no_hp,
				'email' 		=> $email,
				'alamat' 		=> $alamat,
				'jabatan' 		=> $jabatan,
				'pendidikan_terakhir' 		=> $pendidikan_terakhir,
				'photo' 		=> $photo,
			);

			$this->guru_model->insert_data($data, 'guru');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
					Data Guru Berhasil Ditambahkan!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('administrator/guru');
		}
	}

	public function update($id)
	{
		$data['guru'] = $this->db->query("SELECT * FROM guru WHERE id_guru = $id")->result();
		$data['detail'] = $this->guru_model->ambil_id_guru($id);

		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/guru_update', $data);
		$this->load->view('templates_administrator/footer');
	}

	public function update_guru_aksi()
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->update();
		} else {
			$id 			= $this->input->post('id_guru');
			$username 			= $this->input->post('username');
			$password 			= $this->input->post('password');
			$nip 			= $this->input->post('nip');
			$nama 			= $this->input->post('nama');
			$tempat_lahir 	= $this->input->post('tempat_lahir');
			$tgl_lahir 		= $this->input->post('tgl_lahir');
			$gender 		= $this->input->post('gender');
			$no_hp 			= $this->input->post('no_hp');
			$email 			= $this->input->post('email');
			$alamat 		= $this->input->post('alamat');
			$jabatan 			= $this->input->post('jabatan');
			$pendidikan_terakhir 			= $this->input->post('pendidikan_terakhir');
			$photo 			= $_FILES['userfile']['name'];

			if ($photo) {
				$config['upload_path'] = './assets/uploads';
				$config['allowed_types'] = 'jpg|png|gif|tiff';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('userfile')) {
					$userfile = $this->upload->data('file_name');
					$this->db->set('photo', $userfile);
				} else {
					echo "Gagal Upload";
				}
			}

			$data = array(
				'nip' 			=> $nip,
				'username' 			=> $username,
				'password' 			=> md5($password),
				'nama' 			=> $nama,
				'tempat_lahir' 	=> $tempat_lahir,
				'tgl_lahir' 	=> $tgl_lahir,
				'gender' 		=> $gender,
				'no_hp' 		=> $no_hp,
				'email' 		=> $email,
				'alamat' 		=> $alamat,
				'jabatan' 		=> $jabatan,
				'pendidikan_terakhir' 		=> $pendidikan_terakhir,
			);

			$where = array('id_guru' => $id);

			// var_dump($this->input->post());

			$this->guru_model->update_data($where, $data, 'guru');
			$this->session->set_flashdata(
				'pesan',
				'<div class="alert alert-success alert-dismissible fade show" role="alert">
					Data Siswa Berhasil Diupdate!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>'
			);
			redirect('administrator/guru');
		}
	}

	public function delete($id)
	{
		$where = array('id_guru' => $id);
		$this->guru_model->hapus_data($where, 'guru');
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Data guru Berhasil Dihapus!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>'
		);
		redirect('administrator/guru');
	}

	public function _rules()
	{
		$this->form_validation->set_rules('username', 'username', 'required', [
			'required' => 'username wajib diisi!'
		]);
		$this->form_validation->set_rules('password', 'password', 'required', [
			'required' => 'password wajib diisi!'
		]);
		$this->form_validation->set_rules('nip', 'nip', 'required', [
			'required' => 'nip wajib diisi!'
		]);
		$this->form_validation->set_rules('nama', 'nama', 'required', [
			'required' => 'Nama wajib diisi!'
		]);
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required', [
			'required' => 'Tempat lahir wajib diisi!'
		]);
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required', [
			'required' => 'Tanggal lahir wajib diisi!'
		]);
		$this->form_validation->set_rules('gender', 'Gender', 'required', [
			'required' => 'Gender wajib diisi!'
		]);
		$this->form_validation->set_rules('no_hp', 'Nomor Hp', 'required', [
			'required' => 'Nomor Hp wajib diisi!'
		]);
		$this->form_validation->set_rules('email', 'email', 'required', [
			'required' => 'email wajib diisi!'
		]);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required', [
			'required' => 'Alamat wajib diisi!'
		]);
		$this->form_validation->set_rules('jabatan', 'jabatan', 'required', [
			'required' => 'jabatan wajib diisi!'
		]);
		$this->form_validation->set_rules('pendidikan_terakhir', 'pendidikan terakhir', 'required', [
			'required' => 'pendidikan terakhir wajib diisi!'
		]);
		// $this->form_validation->set_rules('photo', 'photo', 'required', [
		// 	'required' => 'photo wajib diisi!'
		// ]);
	}
}