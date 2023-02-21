<?php

class Nilai extends CI_Controller
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
        $data = array(
            'nis' => set_value('nis'),
            'id_semester' => set_value('id_semester')
        );
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/masuk_hasil_belajar', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function nilai_aksi()
    {
        $this->rulesHasilBelajar();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $nis = $this->input->post('nis', TRUE);
            $id_semester = $this->input->post('id_semester', TRUE);

            // echo $nis;

            $query = "SELECT siswa.nis, siswa.nama, kelas.nama_kelas 
                FROM siswa
                JOIN kelas ON (siswa.id_kelas = kelas.id_kelas)
                WHERE siswa.nis = $nis";

            $query_semester = "SELECT semester.semester, tahun_ajaran.tahun_ajaran FROM semester
                JOIN tahun_ajaran ON (semester.id_ta = tahun_ajaran.id)
                WHERE semester.id_semester = $id_semester";

            $semester = $this->db->query($query_semester)->result();

            foreach ($semester as $item) {
                $semester = $item->semester;
                $tahun_ajaran = $item->tahun_ajaran;
            }

            $sql = $this->db->query($query)->result();

            $query_nilai = "SELECT nilai.nilai, nilai.kkm, matapelajaran.kode_matapelajaran, matapelajaran.nama_matapelajaran
                FROM nilai
                JOIN matapelajaran ON (nilai.kode_matapelajaran = matapelajaran.kode_matapelajaran)
                JOIN semester ON (matapelajaran.id_semester = semester.id_semester)
                WHERE nilai.nis_siswa = $nis AND semester.id_semester = $id_semester
                ORDER BY matapelajaran.kode_matapelajaran ASC";

            $nilai = $this->db->query($query_nilai)->result();

            $jml = 0;
            $nilai_akhir = 0;
            foreach ($nilai as $item) {
                $nilai_akhir += $item->nilai;
                $jml++;
            }

            $nilai_akhir /= $jml;
            if($jml == null) {
            $nilai_akhir = $nilai_akhir:
            }
            // var_dump($nilai);

            // var_dump($sql);
            $data['info'] = $sql;
            $data['nilai'] = $nilai;
            $data['nilai_akhir'] = $nilai_akhir;
            $data['semester'] = $semester;
            $data['tahun_ajaran'] = $tahun_ajaran;
            $data['nis'] = $nis;
            $data['id_semester'] = $id_semester;


            $this->load->view('templates_administrator/header');
            $this->load->view('templates_administrator/sidebar');
            $this->load->view('administrator/hasil_belajar', $data);
            $this->load->view('templates_administrator/footer');
        }
    }

    public function rulesHasilBelajar()
    {
        $this->form_validation->set_rules('nis', 'nis', 'required');
        $this->form_validation->set_rules('id_semester', 'id_semester', 'required');
    }

    public function print($nis, $id_semester)
    {
        $query = "SELECT siswa.nis, siswa.nama, kelas.nama_kelas 
                FROM siswa
                JOIN kelas ON (siswa.id_kelas = kelas.id_kelas)
                WHERE siswa.nis = $nis";

        $query_semester = "SELECT semester.semester, tahun_ajaran.tahun_ajaran FROM semester
                JOIN tahun_ajaran ON (semester.id_ta = tahun_ajaran.id)
                WHERE semester.id_semester = $id_semester";

        $semester = $this->db->query($query_semester)->result();

        foreach ($semester as $item) {
            $semester = $item->semester;
            $tahun_ajaran = $item->tahun_ajaran;
        }

        $sql = $this->db->query($query)->result();

        $query_nilai = "SELECT nilai.nilai, nilai.kkm, matapelajaran.kode_matapelajaran, matapelajaran.nama_matapelajaran
                FROM nilai
                JOIN matapelajaran ON (nilai.kode_matapelajaran = matapelajaran.kode_matapelajaran)
                JOIN semester ON (matapelajaran.id_semester = semester.id_semester)
                WHERE nilai.nis_siswa = $nis AND semester.id_semester = $id_semester";

        $nilai = $this->db->query($query_nilai)->result();

        $jml = 0;
        $nilai_akhir = 0;
        foreach ($nilai as $item) {
            $nilai_akhir += $item->nilai;
            $jml++;
        }

        $nilai_akhir /= $jml;

        $data['nilai'] = $nilai;
        $data['nilai_akhir'] = $nilai_akhir;
        $data['info'] = $sql;
        $data['semester'] = $semester;
        $data['tahun_ajaran'] = $tahun_ajaran;

        $this->load->view('administrator/print', $data);
    }
}
