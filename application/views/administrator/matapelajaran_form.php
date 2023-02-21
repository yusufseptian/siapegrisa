<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		<i class="fas fa-book"></i> Form Input Mata Pelajaran
	</div>
	<form method="post" action="<?php echo base_url('administrator/matapelajaran/tambah_matapelajaran_aksi') ?>">
		<div class="form-group">
			<label>Kode Mata Pelajaran</label>
			<input type="text" name="kode_matapelajaran" class="form-control">
			<?php echo form_error('kode_matapelajaran', '<div class="text-danger small ml-3">') ?>
		</div>

		<div class="form-group">
			<label>Nama Mata Pelajaran</label>
			<input type="text" name="nama_matapelajaran" class="form-control">
			<?php echo form_error('nama_matapelajaran', '<div class="text-danger small ml-3">') ?>
		</div>

		<div class="form-group">
			<label>Semester</label>
			<?php
			$semester = $this->db->query('SELECT * FROM semester
				LEFT JOIN tahun_ajaran ON(semester.id_ta = tahun_ajaran.id)')->result();
			?>
			<select name="id_semester" class="form-control">
				<?php foreach ($semester as $item) { ?>
					<option value="<?= $item->id_semester ?>"><?= $item->semester . ' - ' . $item->tahun_ajaran ?></option>
				<?php } ?>
			</select>
		</div>

		<div class="form-group">
			<label>Guru</label>
			<select name="id_guru" class="form-control">
				<option value="">Pilih Guru...</option>
				<?php foreach ($guru as $item) : ?>
					<option value="<?php echo $item->id_guru ?>"><?php echo $item->nama ?></option>
				<?php endforeach; ?>
			</select>
		</div>

		<div class="form-group">
			<label>Jam Pelajaran</label>
			<input type="text" name="jam_pelajaran" class="form-control">
		</div>

		<button type="submit" class="btn btn-primary mb-5">Simpan</button>
	</form>
</div>