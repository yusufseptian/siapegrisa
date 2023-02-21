<?php

class Rekap extends CI_Controller
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
        $ortu = $this->ortu_model->ambil_data($this->session->userdata['username']);
        $nis = $ortu->nis_siswa;

        $siswa = $this->db->query("SELECT * FROM siswa WHERE nis=$nis")->row();

        $query_kelas = "SELECT kelas.nama_kelas FROM siswa JOIN kelas ON (siswa.id_kelas=kelas.id_kelas)WHERE siswa.nis=$nis";

        $kelas = $this->db->query($query_kelas)->row();

        $query_nilai = "SELECT nilai.kkm, nilai.nilai, matapelajaran.kode_matapelajaran, matapelajaran.nama_matapelajaran, semester.semester
                FROM nilai
                JOIN matapelajaran ON (nilai.kode_matapelajaran = matapelajaran.kode_matapelajaran)
                JOIN semester ON (matapelajaran.id_semester = semester.id_semester)
                WHERE nilai.nis_siswa = $nis";

        $nilai = $this->db->query($query_nilai)->result();

        // $jumlah = $this->db->count_all($nilai);

        $data = array(
            'ortu' => $ortu,
            'siswa' => $siswa,
            'nis' => $nis,
            'nilai' => $nilai,
            'kelas' => $kelas,
        );
        $this->load->view('ortu/templates/header');
        $this->load->view('ortu/templates/sidebar');
        $this->load->view('ortu/rekap', $data);
        $this->load->view('ortu/templates/footer');
    }

    public function print()
    {
        $ortu = $this->ortu_model->ambil_data($this->session->userdata['username']);
        $nis = $ortu->nis_siswa;

        $siswa = $this->db->query("SELECT * FROM siswa WHERE nis=$nis")->row();

        $query_nilai = "SELECT nilai.kkm, nilai.nilai, matapelajaran.kode_matapelajaran, matapelajaran.nama_matapelajaran, semester.semester
                FROM nilai
                JOIN matapelajaran ON (nilai.kode_matapelajaran = matapelajaran.kode_matapelajaran)
                JOIN semester ON (matapelajaran.id_semester = semester.id_semester)
                WHERE nilai.nis_siswa = $nis";

        $query_kelas = "SELECT kelas.nama_kelas FROM siswa JOIN kelas ON (siswa.id_kelas=kelas.id_kelas)WHERE siswa.nis=$nis";

        $kelas = $this->db->query($query_kelas)->row();
        $nilai = $this->db->query($query_nilai)->result();

        $data['nilai'] = $nilai;
        $data['siswa'] = $siswa;
        $data['kelas'] = $kelas;

        $this->load->view('ortu/print', $data);
    }
}
