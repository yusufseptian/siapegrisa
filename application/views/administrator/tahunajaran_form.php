<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		<i class="fas fa-calendar-alt"></i> Form Input Tahun Ajaran
	</div>
	<form method="post" action="<?php echo base_url('administrator/tahunajaran/tambah_tahunajaran_aksi') ?>">
		<div class="form-group">
			<label>Tahun Ajaran</label>
			<input type="text" name="tahun_ajaran" class="form-control">
			<?php echo form_error('tahun_ajaran', '<div class="text-danger small ml-3">') ?>
		</div>

		<div class="form-group">
			<label>Status</label>
			<select name="status" class="form-control">
				<option value="">-- Pilih Status --</option>
				<option value="aktif">Aktif</option>
				<option value="tidak aktif">Tidak Aktif</option>
			</select>
			<?php echo form_error('status', '<div class="text-danger small ml-3">') ?>
		</div>

		<button type="submit" class="btn btn-primary mb-5">Simpan</button>
	</form>
</div>