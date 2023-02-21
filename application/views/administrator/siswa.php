<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		<i class="fas fa-user"></i> Siswa
	</div>

	<?php
	// echo $this->session->flashdata('pesan')
	?>
	<?php echo anchor('administrator/siswa/tambah_siswa', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Siswa </button>') ?>
	<div class="table-responsive">

		<table class="table table-striped table-hover table-bordered">
			<tr>
				<th>NO</th>
				<th>NIS</th>
				<th>NAMA LENGKAP</th>
				<th>ALAMAT</th>
				<th colspan="3">AKSI</th>
			</tr>

			<?php
			$no = 1;
			foreach ($siswa as $ssw) : ?>

				<tr>
					<td><?php echo $no++ ?></td>
					<td><?php echo $ssw->nis ?></td>
					<td><?php echo $ssw->nama ?></td>
					<td><?php echo $ssw->alamat ?></td>
					<td width="20px"><?php echo anchor('administrator/siswa/detail/' . $ssw->id, '<div class="btn btn-sm btn-info"><i class="fa fa-eye"></i></div>') ?></td>
					<td width="20px"><?php echo anchor('administrator/siswa/update/' . $ssw->id, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
					<td width="20px"><?php echo anchor('administrator/siswa/delete/' . $ssw->id, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
				</tr>

			<?php endforeach; ?>
		</table>
	</div>
</div>