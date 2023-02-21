<div class="container-fluid">
    <div class="alert alert-success mb-3" role="alert">
        <i class="fas fa-university"></i> Input Nilai
    </div>


    <div class="row justify-content-center mb-3">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <table>
                        <?php
                        foreach ($info as $item) : ?>
                            <tr>
                                <td width="200px"><strong>NIS</strong></td>
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
                        <?php endforeach ?>
                        <?php foreach ($semester as $item) : ?>
                            <tr>
                                <td><strong>Semester - TA</strong></td>
                                <td><?= $item->semester . ' - ' . $item->tahun_ajaran  ?></td>
                            </tr>
                            <tr>
                                <td><strong>Mata Pelajaran</strong></td>
                                <td><?= $item->nama_matapelajaran ?></td>
                            </tr>
                        <?php endforeach; ?>

                        <tr>
                            <td><strong>KKM</strong></td>
                            <td><?= $kkm->kkm ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-start">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <?php echo anchor('administrator/inputnilai/inputNilai/' . $nis . '/' . $kode_matapelajaran, '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Nilai</button>') ?>
                    <?php echo anchor('administrator/inputnilai/setKkm/' . $id_nilai, '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Set KKM</button>') ?>
                    <table class="table table-bordered table-hover table-striped">
                        <tr>
                            <th>NO</th>
                            <th>Kategori</th>
                            <th>Nilai</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                        <?php
                        $no = 1;
                        foreach ($nilai as $item) :
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $item->kategori ?></td>
                                <td><?= $item->nilai ?></td>
                                <td width="20px"><?= anchor('administrator/inputnilai/update/' . $item->id_detail_nilai, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
                                <td width="20px"><?= anchor('administrator/inputnilai/delete/' . $item->id_detail_nilai, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
                            </tr>
                        <?php endforeach ?>
                    </table>
                </div>
                <div class="card-footer">
                    <center>
                        <p>Nilai Akhir : <?= $nilai_akhir ?></p>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>