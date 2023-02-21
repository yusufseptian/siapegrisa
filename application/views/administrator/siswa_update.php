<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		<i class="fas fa-user"></i> Form Update Siswa
	</div>
	<?php foreach ($siswa as $ssw) : ?>
		<?php echo form_open_multipart('administrator/siswa/update_siswa_aksi') ?>
		<div class="form-group">
			<label>NIS Siswa</label>
			<input type="hidden" name="id" class="form-control" value="<?php echo $ssw->id ?>">
			<input type="text" name="nis" class="form-control" value="<?= $ssw->nis ?>">
			<?php echo form_error('nis', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>
		<div class="form-group">
			<label>Username</label>
			<input type="text" name="username" class="form-control" value="<?= $ssw->username ?>">
			<?php echo form_error('username', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" name="password" class="form-control" value="<?= $ssw->password ?>">
			<?php echo form_error('password', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>Nama Lengkap Siswa</label>
			<input type="text" name="nama" value="<?= $ssw->nama ?>" class="form-control">
			<?php echo form_error('nama', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>Tempat Lahir</label>
			<input type="text" name="tempat_lahir" value="<?= $ssw->tempat_lahir ?>" class="form-control">
			<?php echo form_error('tempat_lahir', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>Tanggal Lahir</label>
			<input type="date" name="tgl_lahir" value="<?= $ssw->tgl_lahir ?>" class="form-control">
			<?php echo form_error('tgl_lahir', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>Gender</label>
			<select name="gender" class="form-control">
				<option value="">--Pilih Gender--</option>
				<option <?= ($ssw->gender == "Laki-laki") ? "selected" : '' ?> value="Laki-laki">Laki-laki </option>
				<option <?= ($ssw->gender == "Perempuan") ? "selected" : '' ?> value="Perempuan">Perempuan</option>
			</select>
			<?php echo form_error('gender', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>Nama Kelas</label>
			<select name="id_kelas" class="form-control">
				<option value="">--Pilih Kelas--</option>
				<?php foreach ($kelas as $kls) : ?>
					<option <?= ($ssw->id_kelas == $kls->id_kelas) ? "selected" : '' ?> value="<?= $kls->id_kelas ?>"><?php echo $kls->nama_kelas ?></option>
				<?php endforeach; ?>
			</select>
			<?php echo form_error('id_kelas', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>Alamat</label>
			<input type="text" name="alamat" value="<?= $ssw->alamat ?>" class="form-control">
			<?php echo form_error('alamat', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>Nomor Hp (gunakan +62)</label>
			<input type="text" name="no_hp" value="<?= $ssw->no_hp ?>" class="form-control">
			<?php echo form_error('no_hp', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<?php foreach ($detail as $dt) : ?>
				<img src="<?= base_url() . 'assets/uploads/' . $ssw->photo ?>" alt="">
			<?php endforeach ?><br><br>
			<label>Photo</label><br>
			<input type="file" name="userfile" value="<?= $ssw->photo ?>">
		</div>

		<button type="submit" class="btn btn-primary">Simpan</button>
		<?php form_close(); ?>
	<?php endforeach; ?>
</div>