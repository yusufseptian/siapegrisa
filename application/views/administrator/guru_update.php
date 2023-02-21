<div class="container-fluid">
    <div class="card">
        <div class="alert alert-success" role="alert">
            <i class="fas fa-user"></i> Form Update Guru
        </div>
        <div class="card-body">
            <div class="row justify-content-lg-center">
                <?php foreach ($guru as $item) : ?>
                    <div class="col-lg-9">
                        <?php echo form_open_multipart('administrator/guru/update_guru_aksi') ?>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" value="<?= $item->username ?>" name="username" class="form-control">
                            <?php echo form_error('username', '<div class="text-danger small ml-3">', '</div>') ?>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" value="<?= $item->password ?>" name="password" class="form-control">
                            <?php echo form_error('password', '<div class="text-danger small ml-3">', '</div>') ?>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="id_guru" value="<?= $item->id_guru ?>">
                            <label>NIP</label>
                            <input type="text" value="<?= $item->nip ?>" name="nip" class="form-control">
                            <?php echo form_error('nip', '<div class="text-danger small ml-3">', '</div>') ?>
                        </div>

                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" value="<?= $item->nama ?>" name="nama" class="form-control">
                            <?php echo form_error('nama', '<div class="text-danger small ml-3">', '</div>') ?>
                        </div>

                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" value="<?= $item->tempat_lahir ?>" class="form-control">
                            <?php echo form_error('tempat_lahir', '<div class="text-danger small ml-3">', '</div>') ?>
                        </div>

                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" value="<?= $item->tgl_lahir ?>" class="form-control">
                            <?php echo form_error('tgl_lahir', '<div class="text-danger small ml-3">', '</div>') ?>
                        </div>

                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" class="form-control">
                                <option value="">--Pilih Gender--</option>
                                <option <?= ($item->gender == "Laki-laki") ? "selected" : '' ?> value="<?= $item->gender ?>"><?= $item->gender ?> </option>
                                <option <?= ($item->gender == "Perempuan") ? "selected" : '' ?> value="<?= $item->gender ?>"><?= $item->gender ?> </option>
                            </select>
                            <?php echo form_error('gender', '<div class="text-danger small ml-3">', '</div>') ?>
                        </div>

                        <div class="form-group">
                            <label>Nomor Hp (gunakan +62)</label>
                            <input type="text" name="no_hp" value="<?= $item->no_hp ?>" class="form-control">
                            <?php echo form_error('no_hp', '<div class="text-danger small ml-3">', '</div>') ?>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" value="<?= $item->email ?>" class="form-control">
                            <?php echo form_error('email', '<div class="text-danger small ml-3">', '</div>') ?>
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat" value="<?= $item->alamat ?>" class="form-control">
                            <?php echo form_error('alamat', '<div class="text-danger small ml-3">', '</div>') ?>
                        </div>

                        <div class="form-group">
                            <label>Jabatan</label>
                            <input type="text" name="jabatan" value="<?= $item->jabatan ?>" class="form-control">
                            <?php echo form_error('jabatan', '<div class="text-danger small ml-3">', '</div>') ?>
                        </div>

                        <div class="form-group">
                            <label>Pendidikan Terakhir</label>
                            <input type="text" name="pendidikan_terakhir" value="<?= $item->pendidikan_terakhir ?>" class="form-control">
                            <?php echo form_error('pendidikan_terakhir', '<div class="text-danger small ml-3">', '</div>') ?>
                        </div>

                        <div class="form-group">
                            <?php foreach ($detail as $dt) : ?>
                                <img width="200px" src="<?= base_url() . 'assets/uploads/' . $item->photo ?>" alt="">
                            <?php endforeach ?><br><br>
                            <label>Photo</label><br>
                            <input type="file" name="userfile" value="<?= $item->photo ?>">
                        </div>
                    </div>
            </div>
        </div>
        <div class="card-footer text-center">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <?php form_close(); ?>
        </div>
    <?php endforeach; ?>
    </div>
</div>