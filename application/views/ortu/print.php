<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<link href="<?php echo base_url() ?>assets/img/logo.png" rel="icon">

<title>SIAPegrisa</title>

<!-- Custom fonts for this template-->
<link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

<center class="mb-4">
    <legend class="mt-3 mb-4"><strong>Hasil Belajar</strong></legend>

    <table style="width: 400px;">
        <tr>
            <td><strong>NIS</strong></td>
            <td><?= $siswa->nis ?></td>
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
<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>NO</th>
            <th>Kode Mata Pelajaran</th>
            <th>Mata Pelajaran</th>
            <th>Semester</th>
            <th>Nilai</th>
            <th>KKM</th>
        </tr>
        <?php
        $no = 1;
        $nilai_akhir = 0;
        foreach ($nilai as $item) :
        ?>
            <?php $nilai_akhir = $nilai_akhir + $item->nilai ?>
            <tr>
                <td width="20px"><?= $no++ ?></td>
                <td><?= $item->kode_matapelajaran ?></td>
                <td><?= $item->nama_matapelajaran ?></td>
                <td><?= $item->semester ?></td>
                <td><?= $item->nilai ?></td>
                <td><?= $item->kkm ?></td>
            </tr>
        <?php endforeach ?>
    </table>
</div>
<center>
    <p>Nilai Akhir : <?= $nilai_akhir / ($no - 1) ?></p>
</center>
</div>

<script>
    window.print();
</script>