<div class="container-fluid">
        <div class="alert alert-success mb-5" role="alert">
            <i class="fas fa-university"></i> Guru
        </div>

        <?php
        // echo $this->session->flashdata('pesan')
        ?>

        <?= anchor('administrator/guru/tambah_guru', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Guru</button>') ?>

        <div class="table-responsive">

            <table class="table table-bordered table-striped table-hover">
                <tr>
                    <th>NO</th>
                    <th>NIP</th>
                    <th>NAMA</th>
                    <th>GENDER</th>
                    <th>JABATAN</th>
                    <th colspan="3">AKSI</th>
                </tr>
                <?php
                $no = 1;
                foreach ($guru as $item) : ?>
                    <tr>
                        <td width="20px"><?= $no++ ?></td>
                        <td><?= $item->nip ?></td>
                        <td><?= $item->nama ?></td>
                        <td><?= $item->gender ?></td>
                        <td><?= $item->jabatan ?></td>
                        <td width="20px"><?php echo anchor('administrator/guru/detail/' . $item->id_guru, '<div class="btn btn-sm btn-info"><i class="fa fa-eye"></i></div>') ?></td>
                        <td width="20px"><?= anchor('administrator/guru/update/' . $item->id_guru, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
                        <td width="20px"><?= anchor('administrator/guru/delete/' . $item->id_guru, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>