<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		<i class="fas fa-users"></i> Kelas
	</div>
	<?php
	// echo $this->session->flashdata('pesan')
	?>
	<?php echo anchor('administrator/kelas/input', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Kelas</button>') ?>

	<table class="table table-bordered table-striped table-hover">
		<tr>
			<th>NO</th>
			<th>KODE KELAS</th>
			<th>NAMA KELAS</th>
			<th>TAHUN AJARAN</th>
			<th colspan="2">AKSI</th>
		</tr>
		<?php
		$no = 1;
		foreach ($kelas as $kls) : ?>
			<tr>
				<td width="20px"><?php echo $no++ ?></td>
				<td><?php echo $kls->kode_kelas ?></td>
				<td><?php echo $kls->nama_kelas ?></td>
				<td><?php echo $kls->tahun_ajaran ?></td>
				<td width="20px"><?= anchor('administrator/kelas/update/' . $kls->id_kelas, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
				<td width="20px"><?= anchor('administrator/kelas/delete/' . $kls->id_kelas, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
			</tr>
		<?php endforeach; ?>
	</table>

</div>