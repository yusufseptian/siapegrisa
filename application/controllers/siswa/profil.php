<?php

class Profil extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if (!isset($this->session->userdata['username']) || $this->session->userdata['level'] != 'siswa') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
						  Anda Belum Login!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
            redirect('siswa/auth');
        }
    }

    public function index()
    {
        $data = $this->siswa_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'siswa' => $data,
        );
        $this->load->view('siswa/templates/header');
        $this->load->view('siswa/templates/sidebar');
        $this->load->view('siswa/profil', $data);
        $this->load->view('siswa/templates/footer');
    }

    public function pengumuman($id)
    {
        $query_p = "SELECT * FROM pengumuman WHERE id=$id";
        $pengumuman = $this->db->query($query_p)->row();
        $data = array(
            'pengumuman' => $pengumuman,
        );
        $this->load->view('siswa/templates/header');
        $this->load->view('siswa/templates/sidebar');
        $this->load->view('siswa/pengumuman_detail', $data);
        $this->load->view('siswa/templates/footer');
    }
}
