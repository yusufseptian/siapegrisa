<div class="container-fluid mb-4">
	<div class="alert alert-success" role="alert">
		<i class="fas fa-eye"></i> Detail Siswa
	</div>

	<table class="table table-hover table-bordered table-striped">
		<?php foreach ($detail as $dt) : ?>

			<img class="mb-4" src="<?php echo base_url('assets/uploads/') . $dt->photo ?>" style="width:20%">
			<tr>
				<td>NIS</td>
				<td><?php echo $dt->nis ?></td>
			</tr>
			<tr>
				<td>Username</td>
				<td><?php echo $dt->username ?></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><?php echo $dt->password ?></td>
			</tr>
			<tr>
				<td>Nama Lengkap</td>
				<td><?php echo $dt->nama ?></td>
			</tr>
			<tr>
				<td>Tempat Lahir</td>
				<td><?php echo $dt->tempat_lahir ?></td>
			</tr>
			<tr>
				<td>Tanggal Lahir</td>
				<td><?php echo $dt->tgl_lahir ?></td>
			</tr>
			<tr>
				<td>Gender</td>
				<td><?php echo $dt->gender ?></td>
			</tr>
			<tr>
				<td>Kelas</td>
				<?php foreach ($kelas as $item) : ?>
					<td><?php echo $item->nama_kelas ?></td>
				<?php endforeach ?>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><?php echo $dt->alamat ?></td>
			</tr>
			<tr>
				<td>Nomor HP</td>
				<td><?php echo $dt->no_hp ?></td>
			</tr>

		<?php endforeach; ?>
	</table>

	<?php echo anchor('administrator/siswa', '<div class="btn btn-sm btn-primary">Kembali</div>') ?>
</div>