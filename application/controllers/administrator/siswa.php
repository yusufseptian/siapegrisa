<?php

class siswa extends CI_Controller
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
		$data['siswa'] = $this->siswa_model->tampil_data('siswa')->result();

		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/siswa', $data);
		$this->load->view('templates_administrator/footer');
	}

	public function detail($id)
	{
		$data['detail'] = $this->siswa_model->ambil_id_siswa($id);
		$data['kelas'] = $this->siswa_model->tampil_kelas($id);
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/siswa_detail', $data);
		$this->load->view('templates_administrator/footer');
	}

	public function tambah_siswa()
	{
		$data['siswa'] = $this->siswa_model->tampil_data('siswa')->result();
		$data['kelas'] = $this->siswa_model->tampil_data('kelas')->result();
		// $kelas = kelas_model::tampil_data();

		// var_dump($data['siswa']);

		// die();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/siswa_form', $data);
		$this->load->view('templates_administrator/footer');
	}

	public function tambah_siswa_aksi()
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->tambah_siswa();
		} else {
			$nis = $this->input->post('nis');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$nama 			= $this->input->post('nama');
			$tempat_lahir 	= $this->input->post('tempat_lahir');
			$tgl_lahir 		= $this->input->post('tgl_lahir');
			$gender 		= $this->input->post('gender');
			$kelas 			= $this->input->post('id_kelas');
			$alamat 		= $this->input->post('alamat');
			$no_hp 			= $this->input->post('no_hp');
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
				'nis' 			=> $nis,
				'username' 			=> $username,
				'password' 			=> md5($password),
				'nama' 			=> $nama,
				'tempat_lahir' 	=> $tempat_lahir,
				'tgl_lahir' 	=> $tgl_lahir,
				'gender' 		=> $gender,
				'id_kelas' 		=> $kelas,
				'alamat' 		=> $alamat,
				'no_hp' 		=> $no_hp,
				'photo' 		=> $photo,
			);
			$this->siswa_model->insert_data($data, 'siswa');
			$this->session->set_flashdata(
				'pesan',
				'<div class="alert alert-success alert-dismissible fade show" role="alert">
					Data Siswa Berhasil Ditambahkan!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>'
			);
			redirect('administrator/siswa');
		}
	}

	public function update($id)
	{
		$where = array('id' => $id);
		$data['siswa'] = $this->db->query("SELECT * FROM siswa 
 			ssw, kelas kls where ssw.id_kelas=kls.id_kelas and ssw.id='$id'")->result();
		$data['kelas'] = $this->matapelajaran_model->tampil_data('kelas')->result();
		$data['detail'] = $this->siswa_model->ambil_id_siswa($id);
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/siswa_update', $data);
		$this->load->view('templates_administrator/footer');
	}

	public function update_siswa_aksi()
	{
		// var_dump($this->input->post());
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			echo "Gagal Validasi";
		} else {
			$id = $this->input->post('id');
			$nis = $this->input->post('nis');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$nama 			= $this->input->post('nama');
			$tempat_lahir 	= $this->input->post('tempat_lahir');
			$tgl_lahir 		= $this->input->post('tgl_lahir');
			$gender 		= $this->input->post('gender');
			$kelas 			= $this->input->post('id_kelas');
			$alamat 		= $this->input->post('alamat');
			$no_hp 			= $this->input->post('no_hp');
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
				'nis' 			=> $nis,
				'username' 			=> $username,
				'password' 			=> $password,
				'nama' 			=> $nama,
				'tempat_lahir' 	=> $tempat_lahir,
				'tgl_lahir' 	=> $tgl_lahir,
				'gender' 		=> $gender,
				'id_kelas' 		=> $kelas,
				'alamat' 		=> $alamat,
				'no_hp' 		=> $no_hp,

			);

			$where = array(
				'id' => $id
			);

			$this->siswa_model->update_data($where, $data, 'siswa');
			$this->session->set_flashdata(
				'pesan',
				'<div class="alert alert-success alert-dismissible fade show" role="alert">
					Data Siswa Berhasil Diupdate!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>'
			);
			redirect('administrator/siswa');
		}
	}

	public function delete($id)
	{
		$where = array('id' => $id);
		$this->siswa_model->hapus_data($where, 'siswa');
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Data siswa Berhasil Dihapus!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>'
		);
		redirect('administrator/siswa');
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nis', 'Nis', 'required', [
			'required' => 'NIS wajib diisi!'
		]);
		$this->form_validation->set_rules('nama', 'Nama', 'required', [
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
		$this->form_validation->set_rules('id_kelas', 'Kelas', 'required', [
			'required' => 'Kelas wajib diisi!'
		]);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required', [
			'required' => 'Alamat wajib diisi!'
		]);
		$this->form_validation->set_rules('no_hp', 'Nomor Hp', 'required', [
			'required' => 'Nomor Hp wajib diisi!'
		]);
		// $this->form_validation->set_rules('photo', 'Photo', 'required', [
		// 	'required' => 'Photo wajib diunggah!'
		// ]);
	}
}