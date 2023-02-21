<div class="container-fluid">
    <div class="alert alert-success mb-5" role="alert">
        <i class="fas fa-university"></i> Pengumuman
    </div>

    <?php
    // echo $this->session->flashdata('pesan')
    ?>

    <?= anchor('administrator/pengumuman/tambah_pengumuman', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Pengumuman</button>') ?>

    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>NO</th>
            <th>Judul</th>
            <th>Pengumuman</th>
            <th colspan="2">AKSI</th>
        </tr>
        <?php
        $no = 1;
        foreach ($pengumuman as $item) : ?>
            <tr>
                <td width="20px"><?= $no++ ?></td>
                <td><?= $item->judul ?></td>
                <td><?= $item->pengumuman ?></td>
                <td width="20px"><?= anchor('administrator/pengumuman/update/' . $item->id, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
                <td width="20px"><?= anchor('administrator/pengumuman/delete/' . $item->id, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>