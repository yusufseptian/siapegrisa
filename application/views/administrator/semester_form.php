<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		<i class="fas fa-book"></i> Form Input Semester
	</div>
	<div class="row">
		<div class="col-lg-5">
			<div class="card">
				<div class="card-body">
					<form method="post" action="<?php echo base_url('administrator/semester/tambah_semester_aksi') ?>">
						<div class="form-group">
							<label>Tahun Ajaran</label>
							<?php
							$tahun_ajaran = $this->db->query('SELECT * FROM tahun_ajaran')->result();
							?>
							<select name="id_ta" class="form-control">
								<option value="">Pilih Tahun Ajaran...</option>
								<?php foreach ($tahun_ajaran as $item) { ?>
									<option value="<?= $item->id ?>"><?= $item->tahun_ajaran ?></option>
								<?php } ?>
							</select>
							<?php echo form_error('id_ta', '<div class="text-danger small ml-3">') ?>
						</div>

						<div class="form-group">
							<label>Semester</label>
							<select name="semester" class="form-control">
								<option value="">Pilih Semester...</option>
								<option value="ganjil">Ganjil</option>
								<option value="genap">Genap</option>
							</select>
							<?php echo form_error('semester', '<div class="text-danger small ml-3">') ?>
						</div>

						<button type="submit" class="btn btn-primary mb-5">Simpan</button>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>