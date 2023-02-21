<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		<i class="fas fa-edit"></i> Form Update Semester
	</div>

	<?php foreach ($semester as $row) : ?>
		<form method="post" action="<?php echo base_url('administrator/semester/update_aksi') ?>">
			<div class="form-group">
				<input type="hidden" name="id_semester" class="form-control" value="<?php echo $row->id_semester ?>">
				<label>Tahun Ajaran</label>
				<?php
				$tahun_ajaran = $this->db->query('SELECT * FROM tahun_ajaran')->result();
				?>
				<select name="id_ta" class="form-control">
					<option value="">Pilih Tahun Ajaran...</option>
					<?php foreach ($tahun_ajaran as $item) { ?>
						<option value="<?= $item->id ?>" <?= ($row->id_ta == $item->id) ? "selected" : '' ?>><?= $item->tahun_ajaran ?></option>
					<?php } ?>
				</select>
				<?php echo form_error('id_ta', '<div class="text-danger small ml-3">') ?>
			</div>

			<div class="form-group">
				<label>Semester</label>
				<select name="semester" class="form-control">
					<option value="ganjil" <?= ($row->semester == "ganjil") ? "selected" : '' ?>>Ganjil</option>
					<option value="genap" <?= ($row->semester == "genap") ? "selected" : '' ?>>Genap</option>
				</select>
				<?php echo form_error('semester', '<div class="text-danger small ml-3">') ?>
			</div>

			<button type="submit" class="btn btn-primary mb-5">Simpan</button>
		</form>
	<?php endforeach; ?>
</div>