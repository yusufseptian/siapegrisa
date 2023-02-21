<?php

class Profil extends CI_Controller
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
        $data = $this->ortu_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'ortu' => $data,
        );
        $this->load->view('ortu/templates/header');
        $this->load->view('ortu/templates/sidebar');
        $this->load->view('ortu/profil', $data);
        $this->load->view('ortu/templates/footer');
    }
}
