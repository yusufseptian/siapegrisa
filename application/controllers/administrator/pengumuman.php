<?php

class pengumuman extends CI_Controller
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
		$data['pengumuman'] = $this->pengumuman_model->tampil_data()->result();

		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/pengumuman', $data);
		// $this->load->view('administrator/guru');
		$this->load->view('templates_administrator/footer');
	}

	public function detail($id)
	{
		$data['detail'] = $this->guru_model->ambil_id_guru($id);
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/guru_detail', $data);
		$this->load->view('templates_administrator/footer');
	}

	public function tambah_pengumuman()
	{
		$data['pengumuman'] = $this->pengumuman_model->tampil_data('pengumuman');
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/pengumuman_form', $data);
		$this->load->view('templates_administrator/footer');
	}

	public function tambah_pengumuman_aksi()
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->tambah_pengumuman();
		} else {
			$judul 			= $this->input->post('judul');
			$pengumuman 			= $this->input->post('pengumuman');

			$data = array(
				'judul' 			=> $judul,
				'pengumuman' 			=> $pengumuman,
				'created_at' 		=> date("Y-m-d"),
			);

			$this->pengumuman_model->insert_data($data, 'pengumuman');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
					Data pengumuman Berhasil Ditambahkan!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('administrator/pengumuman');
		}
	}

	public function update($id)
	{
		$data['pengumuman'] = $this->db->query("SELECT * FROM pengumuman WHERE id = $id")->result();

		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/pengumuman_update', $data);
		$this->load->view('templates_administrator/footer');
	}

	public function update_pengumuman_aksi()
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->update();
		} else {
			$id 			= $this->input->post('id');
			$judul 			= $this->input->post('judul');
			$pengumuman 			= $this->input->post('pengumuman');

			$data = array(
				'judul' 			=> $judul,
				'pengumuman' 			=> $pengumuman,
				'updated_at' 		=> date("Y-m-d"),
			);

			$where = array('id' => $id);

			// var_dump($this->input->post());

			$this->pengumuman_model->update_data($where, $data, 'pengumuman');
			$this->session->set_flashdata(
				'pesan',
				'<div class="alert alert-success alert-dismissible fade show" role="alert">
					Pengumuman Berhasil Diupdate!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>'
			);
			redirect('administrator/pengumuman');
		}
	}

	public function delete($id)
	{
		$where = array('id' => $id);
		$this->pengumuman_model->hapus_data($where, 'pengumuman');
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Data pengumuman Berhasil Dihapus!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>'
		);
		redirect('administrator/pengumuman');
	}

	public function _rules()
	{
		$this->form_validation->set_rules('judul', 'judul', 'required', [
			'required' => 'judul wajib diisi!'
		]);
		$this->form_validation->set_rules('pengumuman', 'pengumuman', 'required', [
			'required' => 'pengumuman wajib diisi!'
		]);
	}
}
