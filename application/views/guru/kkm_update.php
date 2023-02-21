<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Form Set KKM
    </div>


    <div class="row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <?php foreach ($nilai as $item) : ?>
                        <form method="post" action="<?= base_url('guru/inputnilai/setKkm_aksi') ?>">
                            <div class="form-group">
                                <input type="hidden" name="id_nilai" value="<?= $item->id_nilai ?>" id="">
                                <label for="kkm">KKM</label>
                                <input type="number" name="kkm" id="kkm" value="<?= $item->kkm ?>" class="form-control">
                                <?= form_error('kkm', '<div class="text-danger small ml-2">', '</div>') ?>
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