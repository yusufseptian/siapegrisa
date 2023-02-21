<?php

class matapelajaran extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		if (!isset($this->session->userdata['username']) || $this->session->userdata['level'] != 'guru') {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Anda Belum Login!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>');
			redirect('guru/auth');
		}
	}

	public function index()
	{
		$guru = $this->guru_model->ambil_data($this->session->userdata['username']);
		$data['matapelajaran'] = $this->db->query("SELECT matapelajaran.*, semester.semester, tahun_ajaran.tahun_ajaran, guru.nama 
			FROM matapelajaran 
			LEFT JOIN semester ON(matapelajaran.id_semester = semester.id_semester)
			LEFT JOIN tahun_ajaran ON(semester.id_ta = tahun_ajaran.id)
			LEFT JOIN guru ON(matapelajaran.id_guru = guru.id_guru)
			WHERE matapelajaran.id_guru = $guru->id_guru
			")->result();
		// $data['matapelajaran'] = $this->matapelajaran_model->tampil_data('matapelajaran')->result();
		$this->load->view('guru/templates/header');
		$this->load->view('guru/templates/sidebar');
		$this->load->view('guru/matapelajaran', $data);
		$this->load->view('guru/templates/footer');
	}
}
