<div class="container-fluid">

	<div class="alert alert-success" role="alert">
		<i class="fas fa-book"></i> Mata Pelajaran
	</div>

	<?php
	// echo $this->session->flashdata('pesan')
	?>
	<div class="table-responsive">
		<table class="table table-bordered table-hover table-striped">
			<tr>
				<th>NO</th>
				<th>KODE MATA PELAJARAN</th>
				<th>NAMA MATA PELAJARAN</th>
				<th>SEMESTER - TA</th>
				<th>JUMLAH JAM</th>
			</tr>

			<?php
			$no = 1;
			foreach ($matapelajaran as $mp) : ?>
				<tr>
					<td width="20px"><?php echo $no++ ?></td>
					<td><?php echo $mp->kode_matapelajaran ?></td>
					<td><?php echo $mp->nama_matapelajaran ?></td>
					<td><?php echo $mp->semester . ' - ' . $mp->tahun_ajaran ?></td>
					<td><?php echo $mp->jam_pelajaran ?></td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>