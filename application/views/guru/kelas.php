<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		<i class="fas fa-users"></i> Kelas
	</div>
	<?php
	// echo $this->session->flashdata('pesan')
	?>
	<div class="table-responsive">
		<table class="table table-bordered table-striped table-hover">
			<tr>
				<th>NO</th>
				<th>KODE KELAS</th>
				<th>NAMA KELAS</th>
				<th>TAHUN AJARAN</th>
			</tr>
			<?php
			$no = 1;
			foreach ($kelas as $kls) : ?>
				<tr>
					<td width="20px"><?php echo $no++ ?></td>
					<td><?php echo $kls->kode_kelas ?></td>
					<td><?php echo $kls->nama_kelas ?></td>
					<td><?php echo $kls->tahun_ajaran ?></td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>

</div>