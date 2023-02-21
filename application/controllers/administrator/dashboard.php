<?php

class Dashboard extends CI_Controller
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
		$query_p = "SELECT * FROM pengumuman";
		$pengumuman = $this->db->query($query_p)->result();
		$data = $this->user_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'username' => $data->username,
			'level' => $data->level,
			'pengumuman' => $pengumuman,
		);
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/dashboard', $data);
		$this->load->view('templates_administrator/footer');
	}

	public function pengumuman($id)
	{
		$query_p = "SELECT * FROM pengumuman WHERE id=$id";
		$pengumuman = $this->db->query($query_p)->row();
		$data = array(
			'pengumuman' => $pengumuman,
		);
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/pengumuman_detail', $data);
		$this->load->view('templates_administrator/footer');
	}
}
