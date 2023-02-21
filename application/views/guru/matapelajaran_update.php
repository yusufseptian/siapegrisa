<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		<i class="fas fa-edit"></i> Form Edit Mata Pelajaran
	</div>

	<?php foreach ($matapelajaran as $mp) : ?>

		<form method="post" action="<?php echo base_url('guru/matapelajaran/update_aksi'); ?>">

			<div class="form-group">
				<label>Kode Mata Pelajaran</label>
				<input type="hidden" name="id" class="form-control" value="<?php echo $mp->id ?>">
				<input type="text" value="<?= $mp->kode_matapelajaran ?>" name="kode_matapelajaran" class="form-control">
				<?php echo form_error('kode_matapelajaran', '<div class="text-danger small ml-3">') ?>
			</div>

			<div class="form-group">
				<label>Nama Mata Pelajaran</label>
				<input type="text" name="nama_matapelajaran" class="form-control" value="<?php echo $mp->nama_matapelajaran ?>">
			</div>

			<div class="form-group">
				<label>Semester</label>
				<?php
				$semester = $this->db->query('SELECT * FROM semester
				LEFT JOIN tahun_ajaran ON(semester.id_ta = tahun_ajaran.id)')->result();
				?>
				<select name="id_semester" class="form-control">
					<option value="">Pilih Semester...</option>
					<?php foreach ($semester as $item) { ?>
						<option <?= ($item->id_semester == $mp->id_semester) ? "selected" : '' ?> value="<?= $item->id_semester ?>"><?= $item->semester . ' - ' . $item->tahun_ajaran ?></option>
					<?php } ?>
				</select>
			</div>

			<div class="form-group">
				<label>Guru</label>
				<select name="id_guru" class="form-control">
					<?php
					$guru = $this->db->query('SELECT * FROM guru')->result();
					?>
					<option value="">Pilih Guru...</option>
					<?php foreach ($guru as $item) : ?>
						<option <?= ($item->id_guru == $mp->id_guru) ? "selected" : '' ?> value="<?php echo $item->id_guru ?>"><?php echo $item->nama ?></option>
					<?php endforeach; ?>
				</select>
			</div>

			<div class="form-group">
				<label>Jam Pelajaran</label>
				<input type="text" value="<?= $mp->jam_pelajaran ?>" name="jam_pelajaran" class="form-control">
			</div>

			<button type="submit" class="btn btn-sm btn-primary">Simpan</button>
		</form>
	<?php endforeach; ?>
</div>