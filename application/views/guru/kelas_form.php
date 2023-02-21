<div class="container-fluid">
	<form method="post" action="<?php echo base_url('guru/kelas/input_aksi') ?>">
		<div class="form-group">
			<label>Kode Kelas</label>
			<input type="text" name="kode_kelas" placeholder="Masukkan Kode Kelas" class="form-control">
			<?php echo form_error('kode_kelas', '<div class="text-danger small" ml-3') ?>
		</div>

		<div class="form-group">
			<label>Nama Kelas</label>
			<input type="text" name="nama_kelas" placeholder="Masukkan Nama Kelas" class="form-control">
			<?php echo form_error('nama_kelas', '<div class="text-danger small" ml-3') ?>
		</div>

		<div class="form-group">
			<label>Tahun Ajaran</label>
			<?php
			$ta = $this->tahun_ajaran_model->tampil_data('tahun_ajaran')->result();
			?>
			<select name="id_ta" class="form-control">
				<?php foreach ($ta as $item) { ?>
					<option value="<?= $item->id ?>"><?= $item->tahun_ajaran ?></option>
				<?php } ?>
			</select>
			<?php echo form_error('id_ta', '<div class="text-danger small" ml-3') ?>
		</div>

		<button type="submit" class="btn btn-primary">Simpan</button>
	</form>