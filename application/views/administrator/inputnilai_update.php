<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Form Update Nilai
    </div>


    <div class="row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <?php foreach ($detail_nilai as $item) : ?>
                        <form method="post" action="<?= base_url('administrator/inputnilai/update_detail_aksi') ?>">
                            <div class="form-group">
                                <input type="hidden" name="id_detail_nilai" value="<?= $item->id_detail_nilai ?>" id="">
                                <input type="hidden" name="id_nilai" value="<?= $item->id_nilai ?>" id="">
                                <label for="nilai">Nilai</label>
                                <input type="text" name="nilai" id="nilai" value="<?= $item->nilai ?>" class="form-control">
                                <?= form_error('nilai', '<div class="text-danger small ml-2">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select class="form-control" name="kategori" id="">
                                    <option value="">Pilih Kategori..</option>
                                    <option value="tugas" <?= ($item->kategori == "tugas") ? "selected" : '' ?>>Tugas</option>
                                    <option value="ulangan" <?= ($item->kategori == "ulangan") ? "selected" : '' ?>>Ulangan</option>
                                    <option value="uts" <?= ($item->kategori == "uts") ? "selected" : '' ?>>UTS</option>
                                    <option value="uas" <?= ($item->kategori == "uas") ? "selected" : '' ?>>UAS</option>
                                </select>
                                <?= form_error('kategori', '<div class="text-danger small ml-2">', '</div>') ?>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                Proses
                            </button>
                        </form>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>