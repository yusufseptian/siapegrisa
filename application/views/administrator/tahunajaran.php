<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		<i class="fas fa-calendar-alt"></i> Tahun Ajaran
	</div>

	<?php
	// echo $this->session->flashdata('pesan')
	?>
	<?php echo anchor('administrator/tahunajaran/tambah_tahunajaran', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Tahun Ajaran </button>') ?>
	<div class="table-responsive">

		<table class="table table-hover table-bordered table-striped">
			<tr>
				<th>NO</th>
				<th>TAHUN AJARAN</th>
				<!-- <th>STATUS</th> -->
				<th colspan="2">AKSI</th>
			</tr>

			<?php
			$no = 1;
			foreach ($tahun_ajaran as $ta) : ?>
				<tr>
					<td width="20px"><?php echo $no++ ?></td>
					<td><?php echo $ta->tahun_ajaran ?></td>
					<!-- <td><?php echo $ta->status ?></td> -->
					<td width="20px"><?php echo anchor('administrator/tahunajaran/update/' . $ta->id, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
					<td width="20px"><?php echo anchor('administrator/tahunajaran/delete/' . $ta->id, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
				<?php endforeach; ?>
		</table>
	</div>
</div>