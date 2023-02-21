<div class="container-fluid">

	<div class="alert alert-success" role="alert">
		<i class="fas fa-book"></i> Mata Pelajaran
	</div>

	<?php
	// echo $this->session->flashdata('pesan')
	?>
	<?php echo anchor('administrator/matapelajaran/tambah_matapelajaran', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Mata Pelajaran </button>') ?>
	<div class="table-responsive">

		<table class="table table-bordered table-hover table-striped">
			<tr>
				<th>NO</th>
				<th>KODE MATA PELAJARAN</th>
				<th>NAMA MATA PELAJARAN</th>
				<th>SEMESTER - TA</th>
				<th>GURU</th>
				<th>JUMLAH JAM</th>
				<th colspan="2">AKSI</th>
			</tr>

			<?php
			$no = 1;
			foreach ($matapelajaran as $mp) : ?>
				<tr>
					<td width="20px"><?php echo $no++ ?></td>
					<td><?php echo $mp->kode_matapelajaran ?></td>
					<td><?php echo $mp->nama_matapelajaran ?></td>
					<td><?php echo $mp->semester . ' - ' . $mp->tahun_ajaran ?></td>
					<td><?php echo $mp->nama ?></td>
					<td><?php echo $mp->jam_pelajaran ?></td>
					<td width="20px"><?php echo anchor('administrator/matapelajaran/update/' . $mp->id, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
					<td width="20px"><?php echo anchor('administrator/matapelajaran/delete/' . $mp->id, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>