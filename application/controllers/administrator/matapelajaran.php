<?php

class matapelajaran extends CI_Controller
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
		$data['matapelajaran'] = $this->db->query("SELECT matapelajaran.*, semester.semester, tahun_ajaran.tahun_ajaran, guru.nama 
			FROM matapelajaran 
			LEFT JOIN semester ON(matapelajaran.id_semester = semester.id_semester)
			LEFT JOIN tahun_ajaran ON(semester.id_ta = tahun_ajaran.id)
			LEFT JOIN guru ON(matapelajaran.id_guru = guru.id_guru)
			")->result();

		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/matapelajaran', $data);
		$this->load->view('templates_administrator/footer');
	}

	public function tambah_matapelajaran()
	{
		$data['guru'] = $this->guru_model->tampil_data('guru')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/matapelajaran_form', $data);
		$this->load->view('templates_administrator/footer');
	}

	public function tambah_matapelajaran_aksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->tambah_matapelajaran();
		} else {
			$kode_matapelajaran = $this->input->post('kode_matapelajaran');
			$nama_matapelajaran = $this->input->post('nama_matapelajaran');
			$semester 			= $this->input->post('id_semester');
			$id_guru 		= $this->input->post('id_guru');
			$jam_pelajaran 		= $this->input->post('jam_pelajaran');

			$data = array(
				'kode_matapelajaran' => $kode_matapelajaran,
				'nama_matapelajaran' => $nama_matapelajaran,
				'id_semester' 			=> $semester,
				'id_guru' 		=> $id_guru,
				'jam_pelajaran'		=> $jam_pelajaran
			);

			$this->matapelajaran_model->insert_data($data, 'matapelajaran');

			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
					Data Mata Pelajaran Berhasil Ditambahkan!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('administrator/matapelajaran');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('kode_matapelajaran', 'kode_matapelajaran', 'required', ['required' => 'Kode Mata Pelajaran wajib diisi!']);
		$this->form_validation->set_rules('nama_matapelajaran', 'nama_matapelajaran', 'required', ['required' => 'Nama Mata Pelajaran wajib diisi!']);
		$this->form_validation->set_rules('id_semester', 'semester', 'required', ['required' => 'Semester wajib dipilih!']);
		$this->form_validation->set_rules('id_guru', 'nama guru', 'required', ['required' => 'guru wajib dipilih!']);
		$this->form_validation->set_rules('jam_pelajaran', 'jam_pelajaran', 'required', ['required' => 'Jam Pelajaran wajib diisi!']);
	}

	public function detail($kode)
	{
		$data['detail'] = $this->matapelajaran_model->ambil_kode_matapelajaran($kode);
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/matapelajaran_detail', $data);
		$this->load->view('templates_administrator/footer');
	}

	public function update($id)
	{
		$where = array('id' => $id);
		$data['matapelajaran'] = $this->db->query("SELECT matapelajaran.*, semester.semester, guru.nama 
			FROM matapelajaran 
			LEFT JOIN semester ON(matapelajaran.id_semester = semester.id_semester)
			LEFT JOIN guru ON(matapelajaran.id_guru = guru.id_guru)
			WHERE id = $id")->result();

		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/matapelajaran_update', $data);
		$this->load->view('templates_administrator/footer');
	}

	public function update_aksi()
	{
		$id = $this->input->post('id');
		$kode_matapelajaran = $this->input->post('kode_matapelajaran');
		$nama_matapelajaran = $this->input->post('nama_matapelajaran');
		$semester = $this->input->post('id_semester');
		$id_guru = $this->input->post('id_guru');
		$jam_pelajaran = $this->input->post('jam_pelajaran');

		$data = array(
			'kode_matapelajaran' 	=> $kode_matapelajaran,
			'nama_matapelajaran'	=> $nama_matapelajaran,
			'id_semester'				=> $semester,
			'id_guru' => $id_guru,
			'jam_pelajaran' => $jam_pelajaran
		);

		$where = array(
			'id' => $id
		);

		$this->matapelajaran_model->update_data($where, $data, 'matapelajaran');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			Data Mata Pelajaran Berhasil Diupdate!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('administrator/matapelajaran');
	}

	public function delete($id)
	{
		$where = array('id' => $id);
		$this->matapelajaran_model->hapus_data($where, 'matapelajaran');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Data Mata Pelajaran Berhasil Dihapus!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>');
		redirect('administrator/matapelajaran');
	}
}
