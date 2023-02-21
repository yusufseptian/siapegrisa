<?php

class inputnilai extends CI_Controller
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
        $data = array(
            'nis_siswa' => set_value('nis_siswa'),
            'kode_matapelajaran' => set_value('kode_matapelajaran'),
            'id_semester' => set_value('id_semester')
        );

        $this->load->view('guru/templates/header');
        $this->load->view('guru/templates/sidebar');
        $this->load->view('guru/masuk_inputnilai_form', $data);
        $this->load->view('guru/templates/footer');
    }

    public function form_masuk_aksi()
    {
        $this->rulesInputNilai();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $nis = $this->input->post('nis', TRUE);
            $kode_matapelajaran = $this->input->post('kode_matapelajaran', TRUE);
            $id_semester = $this->input->post('id_semester', TRUE);

            $query_nilai = "SELECT n.id_nilai, n.kkm, d.kategori, d.nilai, d.id_detail_nilai
                FROM nilai as n
                LEFT JOIN detail_nilai as d ON (n.id_nilai = d.id_nilai)
                WHERE n.nis_siswa=$nis AND n.kode_matapelajaran='$kode_matapelajaran'
                ORDER BY n.kode_matapelajaran ASC";

            $query_id = "SELECT id_nilai FROM nilai WHERE nis_siswa=$nis AND kode_matapelajaran='$kode_matapelajaran'";

            $query_info = "SELECT siswa.nis, siswa.nama, kelas.nama_kelas 
                FROM siswa
                JOIN kelas ON (kelas.id_kelas = siswa.id_kelas)
                WHERE siswa.nis=$nis";

            $query_semester = "SELECT matapelajaran.nama_matapelajaran, semester.semester, tahun_ajaran.tahun_ajaran
                FROM matapelajaran
                JOIN semester ON (matapelajaran.id_semester = semester.id_semester)
                JOIN tahun_ajaran ON (semester.id_ta = tahun_ajaran.id)
                WHERE matapelajaran.kode_matapelajaran='$kode_matapelajaran' AND semester.id_semester=$id_semester";

            $id_nilai = $this->db->query($query_id)->row();
            $nilai = $this->db->query($query_nilai)->result();
            $info = $this->db->query($query_info)->result();
            $semester = $this->db->query($query_semester)->result();
            $kkm = $this->db->query("SELECT kkm FROM nilai WHERE kode_matapelajaran='$kode_matapelajaran' AND nis_siswa=$nis")->row();

            if ($semester == null) {
                echo '<script language="javascript">';
                echo 'alert("Data kelas dan semester tidak sesuai")';
                echo '</script>';
                return $this->index();
            }
            if ($nilai == null) {
                $data = array(
                    'nis_siswa' => $nis,
                    'kode_matapelajaran' => $kode_matapelajaran,
                );

                $this->nilai_model->insert_data($data, 'nilai');
                return $this->form_masuk_aksi();
            }

            $nilai_akhir = 0;
            foreach ($nilai as $item) {
                $nilai_akhir += $item->nilai;
            }

            $nilai_akhir /= 4;

            $this->db->set('nilai', $nilai_akhir);
            $this->db->where('id_nilai', $id_nilai->id_nilai);
            $this->db->update('nilai');


            $data['nilai'] = $nilai;
            $data['nilai_akhir'] = $nilai_akhir;
            $data['info'] = $info;
            $data['semester'] = $semester;
            $data['nis'] = $nis;
            $data['kkm'] = $kkm->kkm;
            $data['kode_matapelajaran'] = $kode_matapelajaran;
            $data['id_nilai'] = $id_nilai->id_nilai;



            // $data['id'] = $info->nis_siswa;

            $this->load->view('guru/templates/header');
            $this->load->view('guru/templates/sidebar');
            $this->load->view('guru/inputnilai', $data);
            $this->load->view('guru/templates/footer');

            // $nilai = $this->db->query($query_nilai)->result();

            // echo $nis;

            // $query = "SELECT siswa.nis, siswa.nama, kelas.nama_kelas, tahun_ajaran.tahun_ajaran, semester.* 
            //     FROM siswa
            //     JOIN kelas ON (siswa.id_kelas = kelas.id_kelas)
            //     JOIN tahun_ajaran ON (kelas.id_ta = tahun_ajaran.id)
            //     JOIN semester ON (tahun_ajaran.id = semester.id_ta)
            //     WHERE siswa.nis = $nis && semester.id_semester = $id_semester";



            // if ($sql != null) {

            //     // $data['info'] = $sql;
            // } else {
            //     echo '<script language="javascript">';
            //     echo 'alert("Data tidak sesuai")';
            //     echo '</script>';
            //     $this->index();
            // }
            // var_dump($nilai);
            // var_dump($sql);
        }
    }

    public function rulesInputNilai()
    {
        $this->form_validation->set_rules('nis', 'nis', 'required');
        $this->form_validation->set_rules('kode_matapelajaran', 'kode_matapelajaran', 'required');
        $this->form_validation->set_rules('id_semester', 'id_semester', 'required');
    }

    public function inputNilai($nis, $kode_mp)
    {
        $id_nilai = $this->nilai_model->get_id_nilai($nis, $kode_mp);
        // var_dump($id_nilai);

        foreach ($id_nilai as $row) {
            $id = $row->id_nilai;
        }
        // echo $id;
        $data = array(
            'id_nilai' => $id,
            'nilai' => set_value('nilai'),
            'kategori' => set_value('nama_kelas'),
        );
        $this->load->view('guru/templates/header');
        $this->load->view('guru/templates/sidebar');
        $this->load->view('guru/inputnilai_form', $data);
        $this->load->view('guru/templates/footer');
    }

    public function tambah_detail_aksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->inputNilai();
        } else {
            $data = array(
                'id_nilai' => $this->input->post('id_nilai', TRUE),
                'nilai' => $this->input->post('nilai', TRUE),
                'kategori' => $this->input->post('kategori', TRUE),
            );
            $this->nilai_model->input_detail($data, 'detail_nilai');
            echo '<script language="javascript">';
            echo 'alert("Nilai Berhasil ditambahkan")';
            echo '</script>';
            return $this->index();
            // redirect('administrator/nilai');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_nilai', 'id_nilai', 'required');
        $this->form_validation->set_rules('nilai', 'nilai', 'required', ['required' => 'Nilai wajib diisi!']);
        $this->form_validation->set_rules('kategori', 'kategori', 'required', ['required' => 'Kategori wajib diisi!']);
    }

    public function _rulesKkm()
    {
        $this->form_validation->set_rules('kkm', 'kkm', 'required', ['required' => 'KKM wajib diisi!']);
    }

    public function update($id)
    {
        $data['detail_nilai'] = $this->db->query("SELECT * FROM detail_nilai WHERE id_detail_nilai = $id")->result();

        $this->load->view('guru/templates/header');
        $this->load->view('guru/templates/sidebar');
        $this->load->view('guru/inputnilai_update', $data);
        $this->load->view('guru/templates/footer');
    }
    public function setKkm($id)
    {
        $data['nilai'] = $this->db->query("SELECT kkm, id_nilai FROM nilai WHERE id_nilai = $id")->result();

        $this->load->view('guru/templates/header');
        $this->load->view('guru/templates/sidebar');
        $this->load->view('guru/kkm_update', $data);
        $this->load->view('guru/templates/footer');
    }

    public function setKkm_aksi()
    {
        $this->_rulesKkm();
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $id = $this->input->post('id_nilai', TRUE);
            $kkm = $this->input->post('kkm', TRUE);

            $where = array('id_nilai' => $id);

            // $this->nilai_model->update_data($where, $data, 'detail_nilai');
            $this->db->set('kkm', $kkm);
            $this->db->where('id_nilai', $id);
            $this->db->update('nilai');

            echo '<script language="javascript">';
            echo 'alert("KKM Berhasil di-set")';
            echo '</script>';
            return $this->index();
            // redirect('guru/nilai');
        }
    }

    public function update_detail_aksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->inputNilai();
        } else {
            $id = $this->input->post('id_detail_nilai', TRUE);
            $data = array(
                'id_nilai' => $this->input->post('id_nilai', TRUE),
                'nilai' => $this->input->post('nilai', TRUE),
                'kategori' => $this->input->post('kategori', TRUE),
            );

            $where = array('id_detail_nilai' => $id);

            $this->nilai_model->update_data($where, $data, 'detail_nilai');
            echo '<script language="javascript">';
            echo 'alert("Nilai Berhasil diupdate")';
            echo '</script>';
            return $this->index();
            // redirect('guru/nilai');
        }
    }

    public function delete($id)
    {
        $where = array('id_detail_nilai' => $id);
        $this->nilai_model->hapus_data($where, 'detail_nilai');
        echo '<script language="javascript">';
        echo 'alert("Nilai Berhasil dihapus")';
        echo '</script>';
        redirect('guru/inputnilai');
    }
}