<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Form Masuk Input Nilai
    </div>

    <form method="post" action="<?= base_url('administrator/inputnilai/form_masuk_aksi') ?>">
        <div class="form-group">
            <label for="nis">NIS Siswa</label>
            <input type="text" name="nis" id="nis" placeholder="Masukkan NIS Siswa" class="form-control">
            <?= form_error('nis', '<div class="text-danger small ml-2">', '</div>') ?>
        </div>
        <div class="form-group">
            <label for="kode_matapelajaran">Kode Mata Pelajaran</label>
            <input type="text" name="kode_matapelajaran" id="kode_matapelajaran" placeholder="Masukkan Kode Mata Pelajaran" class="form-control">
            <?= form_error('kode_matapelajaran', '<div class="text-danger small ml-2">', '</div>') ?>
        </div>
        <div class="form-group">
            <label>Semester - Tahun Ajaran</label>
            <?php
            $query = $this->db->query('SELECT semester.id_semester, semester.semester, tahun_ajaran.tahun_ajaran FROM semester INNER JOIN tahun_ajaran ON semester.id_ta = tahun_ajaran.id');

            $dropdowns = $query->result();

            foreach ($dropdowns as $dropdown) {
                if ($dropdown->semester == 'ganjil') {
                    $tampilSemester = "Ganjil";
                } else {
                    $tampilSemester = "Genap";
                }

                // $dropdownList[$dropdown->id] = $dropdown->thn_semester . " " . $tampilSemester;
                $dropdownList[$dropdown->id_semester] = $tampilSemester . " - " . $dropdown->tahun_ajaran;
            }

            echo form_dropdown('id_semester', $dropdownList, '', 'class="form-control" id="id_semester"');
            ?>
        </div>

        <button type="submit" class="btn btn-primary">
            Proses
        </button>
    </form>
</div>