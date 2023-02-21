<div class="container-fluid">
    <div class="alert alert-succes" role="alert">
        <i class="fas fa-university"></i> Hasil Belajar
    </div>

    <?php
    // echo $this->session->flashdata('pesan')
    // var_dump($siswa);
    ?>


    <div class="card mb-5">
        <div class="card-header">
            <center class="mb-4">
                <legend class="mt-3 mb-4"><strong>Hasil Belajar</strong></legend>


                <table>
                    <tr>
                        <td width="200px"><strong>NIS</strong></td>
                        <td><?= $nis ?></td>
                    </tr>
                    <tr>
                        <td><strong>Nama Lengkap</strong></td>
                        <td><?= $siswa->nama ?></td>
                    </tr>
                    <tr>
                        <td><strong>Kelas</strong></td>
                        <td><?= $kelas->nama_kelas ?></td>
                    </tr>
                </table>
            </center>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <tr>
                    <th>NO</th>
                    <th>Kode Mata Pelajaran</th>
                    <th>Mata Pelajaran</th>
                    <th>Kategori</th>
                    <th>Nilai</th>
                    <th>KKM</th>
                </tr>
                <?php
                $nilai_akhir = 0;
                $no = 1;
                foreach ($nilai as $item) : ?>
                    <?php $nilai_akhir = $nilai_akhir + $item->nilai ?>
                    <tr>
                        <td width="20px"><?= $no++ ?></td>
                        <td><?= $item->kode_matapelajaran ?></td>
                        <td><?= $item->nama_matapelajaran ?></td>
                        <td><?= $item->kategori ?></td>
                        <td><?= $item->nilai ?></td>
                        <td><?= $item->kkm ?></td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
        <div class="card-footer">
            <center>
            </center>
        </div>
    </div>
</div>