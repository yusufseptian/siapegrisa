<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Form Input Nilai
    </div>

    <div class="row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="<?= base_url('administrator/inputnilai/tambah_detail_aksi') ?>">
                        <div class="form-group">
                            <input type="hidden" name="id_nilai" value="<?= $id_nilai ?>" id="">
                            <label for="nilai">Nilai</label>
                            <input type="text" name="nilai" id="nilai" placeholder="Masukkan Nilai" class="form-control">
                            <?= form_error('nilai', '<div class="text-danger small ml-2">', '</div>') ?>
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select class="form-control" name="kategori" id="">
                                <option value="">Pilih Kategori..</option>
                                <option value="tugas">Tugas</option>
                                <option value="ulangan">Ulangan</option>
                                <option value="uts">UTS</option>
                                <option value="uas">UAS</option>
                            </select>
                            <?= form_error('kategori', '<div class="text-danger small ml-2">', '</div>') ?>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Proses
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>