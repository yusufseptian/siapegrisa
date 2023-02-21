<?php


class semester extends CI_Controller
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
		$data['semester'] = $this->semester_model->tampil_data();

		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/semester', $data);
		$this->load->view('templates_administrator/footer');
	}

	public function tambah_semester()
	{
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/semester_form');
		$this->load->view('templates_administrator/footer');
	}

	public function tambah_semester_aksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->tambah_semester();
		} else {
			$id_ta 			= $this->input->post('id_ta');
			$semester 		= $this->input->post('semester');

			$data = array(
				'id_ta' 		=> $id_ta,
				'semester'		=> $semester
			);

			$this->semester_model->insert_data($data, 'semester');

			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						 Data Tahun Ajaran Berhasil Ditambahkan!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
			redirect('administrator/semester');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('id_ta', 'id_ta', 'required', ['required' => 'Tahun Ajaran wajib diisi!']);
		$this->form_validation->set_rules('semester', 'semester', 'required', ['required' => 'Semester wajib diisi!']);
	}


	public function update($id)
	{
		$where = array('id_semester' => $id);
		$data['semester'] = $this->semester_model->edit_data($where, 'semester')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/semester_update', $data);
		$this->load->view('templates_administrator/footer');
	}

	public function update_aksi()
	{
		$id_semester			= $this->input->post('id_semester');
		$id_ta 	= $this->input->post('id_ta');
		$semester 		= $this->input->post('semester');

		$data = array(
			'id_ta' 	=> $id_ta,
			'semester' 		=> $semester,
		);

		$where = array(
			'id_semester' => $id_semester
		);

		$this->semester_model->update_data($where, $data, 'semester');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						 Semester Berhasil Diupdate!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
		redirect('administrator/semester');
	}

	public function delete($id)
	{
		$where = array('id_semester' => $id);
		$this->semester_model->hapus_data($where, 'semester');
		$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
						 Semester Ajaran Berhasil Dihapus!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
		redirect('administrator/semester');
	}
}
