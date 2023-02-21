<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		<i class="fas fa-users"></i> Form Update Kelas
	</div>

	<?php
	// echo $this->session->flashdata('pesan')
	?>

	<?php foreach ($kelas as $kls) : ?>
		<form method="post" action="<?php echo base_url('administrator/kelas/update_aksi') ?>">
			<div class="form-group">
				<label>Kode Kelas</label>
				<input type="hidden" name="id_kelas" value="<?php echo $kls->id_kelas ?>">
				<input type="text" name="kode_kelas" class="form-control" value="<?= $kls->kode_kelas ?>">
			</div>
			<div class="form-group">
				<label>Nama Kelas</label>
				<input type="text" name="nama_kelas" class="form-control" value="<?= $kls->nama_kelas ?>">
			</div>
			<div class="form-group">
				<label>Tahun Ajaran</label>
				<?php
				$ta = $this->tahun_ajaran_model->tampil_data('tahun_ajaran')->result();
				?>
				<select name="id_ta" class="form-control">
					<?php foreach ($ta as $item) { ?>
						<?php if ($kls->id_ta == null) {
							echo '<option></option>';
						} ?>
						<option <?= ($item->id == $kls->id_ta) ? "selected" : '' ?> value="<?= $item->id ?>"><?= $item->tahun_ajaran ?> </option>
					<?php } ?>
				</select>
				<?php echo form_error('id_ta', '<div class="text-danger small" ml-3') ?>
			</div>
			<button type="submit" class="btn btn-primary">Simpan</button>
		</form>
	<?php endforeach; ?>