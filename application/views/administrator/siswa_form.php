<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		<i class="fas fa-user"></i> Form Input Siswa
	</div>

	<?php echo form_open_multipart('administrator/siswa/tambah_siswa_aksi') ?>
	<div class="form-group">
		<label>NIS Siswa</label>
		<input type="text" name="nis" class="form-control">
		<?php echo form_error('nis', '<div class="text-danger small ml-3">', '</div>') ?>
	</div>
	<div class="form-group">
		<label>Username</label>
		<input type="text" name="username" class="form-control">
		<?php echo form_error('username', '<div class="text-danger small ml-3">', '</div>') ?>
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="password" name="password" class="form-control">
		<?php echo form_error('password', '<div class="text-danger small ml-3">', '</div>') ?>
	</div>

	<div class="form-group">
		<label>Nama Lengkap Siswa</label>
		<input type="text" name="nama" class="form-control">
		<?php echo form_error('nama', '<div class="text-danger small ml-3">', '</div>') ?>
	</div>

	<div class="form-group">
		<label>Tempat Lahir</label>
		<input type="text" name="tempat_lahir" class="form-control">
		<?php echo form_error('tempat_lahir', '<div class="text-danger small ml-3">', '</div>') ?>
	</div>

	<div class="form-group">
		<label>Tanggal Lahir</label>
		<input type="date" name="tgl_lahir" class="form-control">
		<?php echo form_error('tgl_lahir', '<div class="text-danger small ml-3">', '</div>') ?>
	</div>

	<div class="form-group">
		<label>Gender</label>
		<select name="gender" class="form-control">
			<option value="">--Pilih Gender--</option>
			<option value="Laki-laki">Laki-laki</option>
			<option value="Perempuan">Perempuan</option>
		</select>
		<?php echo form_error('gender', '<div class="text-danger small ml-3">', '</div>') ?>
	</div>

	<div class="form-group">
		<label>Nama Kelas</label>
		<select name="id_kelas" class="form-control">
			<option value="">--Pilih Kelas--</option>
			<?php foreach ($kelas as $kls) : ?>
				<option value="<?= $kls->id_kelas ?>"><?= $kls->nama_kelas ?></option>
			<?php endforeach; ?>
		</select>
		<?php echo form_error('kelas', '<div class="text-danger small ml-3">', '</div>') ?>
	</div>

	<div class="form-group">
		<label>Alamat</label>
		<input type="text" name="alamat" class="form-control">
		<?php echo form_error('alamat', '<div class="text-danger small ml-3">', '</div>') ?>
	</div>

	<div class="form-group">
		<label>Nomor Hp (gunakan +62)</label>
		<input type="text" name="no_hp" class="form-control">
		<?php echo form_error('no_hp', '<div class="text-danger small ml-3">', '</div>') ?>
	</div>

	<div class="form-group">
		<label>Photo</label><br>
		<input type="file" name="photo">
	</div>

	<button type="submit" class="btn btn-primary">Simpan</button>
	<?php form_close(); ?>
</div>