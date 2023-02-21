<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		<i class="fas fa-calendar-alt"></i> Semester
	</div>

	<?php
	// echo $this->session->flashdata('pesan')
	?>
	<?php echo anchor('administrator/semester/tambah_semester', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Semester </button>') ?>
	<div class="table-responsive">

		<table class="table table-hover table-bordered table-striped">
			<tr>
				<th>NO</th>
				<th>Tahun Ajaran</th>
				<th>Semester</th>
				<th colspan="2">AKSI</th>
			</tr>

			<?php
			$no = 1;
			foreach ($semester as $item) : ?>
				<tr>
					<td width="20px"><?php echo $no++ ?></td>
					<td><?php echo $item->tahun_ajaran ?></td>
					<td><?php echo $item->semester ?></td>
					<td width="20px"><?php echo anchor('administrator/semester/update/' . $item->id_semester, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
					<td width="20px"><?php echo anchor('administrator/semester/delete/' . $item->id_semester, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
				<?php endforeach; ?>
		</table>
	</div>
</div>