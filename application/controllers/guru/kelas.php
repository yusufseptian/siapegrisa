<?php

class kelas extends CI_Controller
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
		$data['kelas'] = $this->db->query("SELECT kelas.*, tahun_ajaran.tahun_ajaran FROM kelas LEFT JOIN tahun_ajaran ON(kelas.id_ta = tahun_ajaran.id)")->result();

		$this->load->view('guru/templates/header');
		$this->load->view('guru/templates/sidebar');
		$this->load->view('guru/kelas', $data);
		$this->load->view('guru/templates/footer');
	}

	public function input()
	{
		$data = array(
			'id_kelas' => set_value('id_kelas'),
			'kode_kelas' => set_value('kode_kelas'),
			'nama_kelas' => set_value('nama_kelas'),
			'id_ta' => set_value('id_ta')
		);
		$this->load->view('guru/templates/header');
		$this->load->view('guru/templates/sidebar');
		$this->load->view('guru/kelas_form', $data);
		$this->load->view('guru/templates/footer');
	}


	public function input_aksi()
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->input();
		} else {
			$data = array(
				'kode_kelas' => $this->input->post('kode_kelas', TRUE),
				'nama_kelas' => $this->input->post('nama_kelas', TRUE),
				'id_ta' => $this->input->post('id_ta', TRUE),
			);
			$this->kelas_model->input_data($data);
			$this->session->set_flashdata(
				'pesan',
				'<div class="alert alert-success alert-dismissible fade show" role="alert">
					Data Kelas Berhasil Ditambahkan!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>'
			);
			redirect('guru/kelas');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('kode_kelas', 'kode_kelas', 'required');
		$this->form_validation->set_rules('nama_kelas', 'nama_kelas', 'required', ['required' => 'Nama Kelas wajib diisi!']);
		$this->form_validation->set_rules('id_ta', 'id_ta', 'required', ['required' => 'Tahun AJaran wajib diisi!']);
	}
	public function update($id)
	{
		$where = array('id_kelas' => $id);
		$data['kelas'] = $this->kelas_model->edit_data($where, 'kelas')->result();

		// var_dump($data['kelas']);
		$this->load->view('guru/templates/header');
		$this->load->view('guru/templates/sidebar');
		$this->load->view('guru/kelas_update', $data);
		$this->load->view('guru/templates/footer');
	}
	public function update_aksi()
	{
		$id = $this->input->post('id_kelas');
		$kode_kelas = $this->input->post('kode_kelas');
		$nama_kelas = $this->input->post('nama_kelas');
		$id_ta = $this->input->post('id_ta');

		$data = array(
			'kode_kelas' => $kode_kelas,
			'nama_kelas' => $nama_kelas,
			'id_ta' => $id_ta
		);

		$where = array(
			'id_kelas' => $id
		);
		$this->kelas_model->update_data($where, $data, 'kelas');
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
				Data Kelas Berhasil Diupdate!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>'
		);
		redirect('guru/kelas');
	}

	public function delete($id)
	{
		$where = array('id_kelas' => $id);
		$this->kelas_model->hapus_data($where, 'kelas');
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Data Kelas Berhasil Dihapus!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>'
		);
		redirect('guru/kelas');
	}
}
