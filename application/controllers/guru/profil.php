<?php

class Profil extends CI_Controller
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
        $data = $this->guru_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'guru' => $data,
        );
        $this->load->view('guru/templates/header');
        $this->load->view('guru/templates/sidebar');
        $this->load->view('guru/profil', $data);
        $this->load->view('guru/templates/footer');
    }
}
