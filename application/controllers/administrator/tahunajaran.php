<?php


class tahunajaran extends CI_Controller
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
		$data['tahun_ajaran'] = $this->tahun_ajaran_model->tampil_data('tahun_ajaran')->result();

		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/tahunajaran', $data);
		$this->load->view('templates_administrator/footer');
	}

	public function tambah_tahunajaran()
	{
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/tahunajaran_form');
		$this->load->view('templates_administrator/footer');
	}

	public function tambah_tahunajaran_aksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->tambah_tahunajaran();
		} else {
			$tahun_ajaran = $this->input->post('tahun_ajaran');
			$status 		= $this->input->post('status');

			$data = array(
				'tahun_ajaran' 		=> $tahun_ajaran,
				'status'			=> $status
			);

			$this->tahun_ajaran_model->insert_data($data, 'tahun_ajaran');

			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						 Data Tahun Ajaran Berhasil Ditambahkan!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
			redirect('administrator/tahunajaran');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('tahun_ajaran', 'tahun_ajaran', 'required', ['required' => 'Tahun Ajaran wajib diisi!']);
		$this->form_validation->set_rules('status', 'status', 'required', ['required' => 'Status wajib diisi!']);
	}


	public function update($id)
	{
		$where = array('id' => $id);
		$data['tahun_ajaran'] = $this->tahun_ajaran_model->edit_data($where, 'tahun_ajaran')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/tahunajaran_update', $data);
		$this->load->view('templates_administrator/footer');
	}

	public function update_aksi()
	{
		$id 			= $this->input->post('id');
		$tahun_ajaran 	= $this->input->post('tahun_ajaran');
		$status 		= $this->input->post('status');

		$data = array(
			'tahun_ajaran' 	=> $tahun_ajaran,
			'status' 		=> $status,
		);

		$where = array(
			'id' => $id
		);

		$this->tahun_ajaran_model->update_data($where, $data, 'tahun_ajaran');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						 Data Tahun Ajar Berhasil Diupdate!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
		redirect('administrator/tahunajaran');
	}

	public function delete($id)
	{
		$where = array('id' => $id);
		$this->tahun_ajaran_model->hapus_data($where, 'tahun_ajaran');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
						 Data Tahun Ajaran Berhasil Dihapus!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
		redirect('administrator/tahunajaran');
	}
}
