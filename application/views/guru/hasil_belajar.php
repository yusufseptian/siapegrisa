<div class="container-fluid">
    <div class="alert alert-succes" role="alert">
        <i class="fas fa-star"></i> Hasil Belajar
    </div>

    <?php
    // echo $this->session->flashdata('pesan')
    ?>

    <center class="mb-4">
        <legend class="mt-3 mb-4"><strong>Hasil Belajar</strong></legend>

        <?php
        foreach ($info as $item) : ?>
            <div class="table-responsive">
                <table style="width: 400px;">
                    <tr>
                        <td><strong>NIS</strong></td>
                        <td><?= $item->nis ?></td>
                    </tr>
                    <tr>
                        <td><strong>Nama Lengkap</strong></td>
                        <td><?= $item->nama ?></td>
                    </tr>
                    <tr>
                        <td><strong>Kelas</strong></td>
                        <td><?= $item->nama_kelas ?></td>
                    </tr>
                    <tr>
                        <td><strong>Semester - Tahun Ajaran</strong></td>
                        <td><?= $semester . ' - ' . $tahun_ajaran  ?></td>
                    </tr>
                </table>
            </div>
        <?php endforeach; ?>
    </center>

    <a href="<?= base_url() . 'guru/nilai/print/' . $nis . '/' . $id_semester ?>" target="_blank" class="btn btn-sm btn-info mb-3"><i class="fas fa-plus fa-sm"></i> Print</a>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <tr>
                <th>NO</th>
                <th>Kode Mata Pelajaran</th>
                <th>Mata Pelajaran</th>
                <th>Nilai</th>
                <th>KKM</th>
            </tr>
            <?php
            $no = 1;
            foreach ($nilai as $item) :
            ?>
                <tr>
                    <td width="20px"><?= $no++ ?></td>
                    <td><?= $item->kode_matapelajaran ?></td>
                    <td><?= $item->nama_matapelajaran ?></td>
                    <td><?= $item->nilai ?></td>
                    <td><?= $item->kkm ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
    <center>
        <p>Nilai Akhir : <?= $nilai_akhir ?></p>
    </center>
</div>