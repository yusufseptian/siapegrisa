<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		<i class="fas fa-book"></i> Form Input Pengumuman
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="card">
				<div class="card-body">
					<form method="post" action="<?php echo base_url('administrator/pengumuman/tambah_pengumuman_aksi') ?>">
						<div class="form-group">
							<label>Judul</label>
							<input type="text" name="judul" class="form-control">
							<?php echo form_error('judul', '<div class="text-danger small ml-3">') ?>
						</div>

						<div class="form-group">
							<label>Pengumuman</label>
							<textarea name="pengumuman" id="" class="form-control" cols="30" rows="10"></textarea>
							<?php echo form_error('pengumuman', '<div class="text-danger small ml-3">') ?>
						</div>

						<button type="submit" class="btn btn-primary mb-5">Simpan</button>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>