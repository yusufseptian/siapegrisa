<div class="container-fluid">
	<div class="alert alert-success" role="alert">
 		<i class="fas fa-edit"></i> Form Update Tahun Ajaran
	</div>

	<?php foreach($tahun_ajaran as $ta) : ?>
	<form method="post" action="<?php echo base_url('administrator/tahunajaran/update_aksi')?>">
		<div class="form-group">
			<label>Tahun Ajaran</label>
			<input type="hidden" name="id" class="form-control" value="<?php echo $ta->id ?>">
			<input type="text" name="tahun_ajaran" class="form-control" value="<?php echo $ta->tahun_ajaran ?>">
			<?php echo form_error('tahun_ajaran','<div class="text-danger small ml-3">') ?>
		</div>
		<div class="form-group">
			<label>Semester</label>
			<select name="semester" class="form-control" value="<?php echo $ta->id ?>">
				<option><?php echo $ta->semester ?> </option>
				<option>Ganjil</option>
				<option>Genap</option>
			</select>
			<?php echo form_error('semester','<div class="text-danger small ml-3">') ?> 
		</div>
	</form>

		<div class="form-group">
			<label>Status</label>
			<select name="status" class="form-control" value="<?php $ta->id ?>">
				<option><?php echo $ta->status ?></option>
				<option>Aktif</option>
				<option>Tidak Aktif</option>
			</select>
			<?php echo form_error('status','<div class="text-danger small ml-3">') ?>
		</div>

		<button type="submit" class="btn btn-primary mb-5">Simpan</button>
	</form>
<?php endforeach; ?>
</div>

