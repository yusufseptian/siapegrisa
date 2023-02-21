<?php

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		if (!isset($this->session->userdata['username']) || $this->session->userdata['level'] != 'ortu') {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
						  Anda Belum Login!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
			redirect('ortu/auth');
		}
	}

	public function index()
	{
		$query_p = "SELECT * FROM pengumuman";
		$pengumuman = $this->db->query($query_p)->result();
		$data = $this->ortu_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'nama' => $data->nama,
			'username' => $data->username,
			'pengumuman' => $pengumuman,
		);

		$this->load->view('ortu/templates/header');
		$this->load->view('ortu/templates/sidebar');
		$this->load->view('ortu/dashboard', $data);
		$this->load->view('ortu/templates/footer');
	}

	public function pengumuman($id)
	{
		$query_p = "SELECT * FROM pengumuman WHERE id=$id";
		$pengumuman = $this->db->query($query_p)->row();
		$data = array(
			'pengumuman' => $pengumuman,
		);
		$this->load->view('ortu/templates/header');
		$this->load->view('ortu/templates/sidebar');
		$this->load->view('ortu/pengumuman_detail', $data);
		$this->load->view('ortu/templates/footer');
	}
}
