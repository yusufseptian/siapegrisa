<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		<i class="fas fa-book"></i> Form Update Pengumuman
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="card">
				<div class="card-body">
					<form method="post" action="<?php echo base_url('administrator/pengumuman/update_pengumuman_aksi') ?>">
						<?php foreach ($pengumuman as $item) : ?>
							<div class="form-group">
								<label>Judul</label>
								<input type="hidden" name="id" value="<?= $item->id ?>" id="">
								<input type="text" name="judul" value="<?= $item->judul ?>" class="form-control">
								<?php echo form_error('judul', '<div class="text-danger small ml-3">') ?>
							</div>

							<div class="form-group">
								<label>Pengumuman</label>
								<textarea name="pengumuman" id="" class="form-control" cols="30" rows="10"><?= $item->pengumuman ?></textarea>
								<?php echo form_error('pengumuman', '<div class="text-danger small ml-3">') ?>
							</div>

							<button type="submit" class="btn btn-primary mb-5">Simpan</button>
						<?php endforeach ?>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>