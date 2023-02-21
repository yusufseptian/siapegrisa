<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-chalkboard-teacher"></i> Profil
    </div>

    <div class="row mb-5">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-user"></i> Profil Guru
                </div>
                <div class="card-body">
                    <div class="row justify-content-lg-center">
                        <div class="col-lg-12">
                            <table>
                                <tr>
                                    <td height="40px" width="300px">Username</td>
                                    <td><?= $guru->username ?></td>
                                </tr>
                                <tr>
                                    <td height="40px" width="300px">NIP</td>
                                    <td><?= $guru->nip ?></td>
                                </tr>
                                <tr>
                                    <td height="40px" width="300px">Nama</td>
                                    <td><?= $guru->nama ?></td>
                                </tr>
                                <tr>
                                    <td height="40px" width="300px">Tempat, Tanggal Lahir</td>
                                    <td><?= $guru->tempat_lahir . ', ' . $guru->tgl_lahir ?></td>
                                </tr>
                                <tr>
                                    <td height="40px" width="300px">Gender</td>
                                    <td><?= $guru->gender ?></td>
                                </tr>
                                <tr>
                                    <td height="40px" width="300px">No Handphone</td>
                                    <td><?= $guru->no_hp ?></td>
                                </tr>
                                <tr>
                                    <td height="40px" width="300px">Email</td>
                                    <td><?= $guru->email ?></td>
                                </tr>
                                <tr>
                                    <td height="40px" width="300px">Alamat</td>
                                    <td><?= $guru->alamat ?></td>
                                </tr>
                                <tr>
                                    <td height="40px" width="300px">Jabatan</td>
                                    <td><?= $guru->jabatan ?></td>
                                </tr>
                                <tr>
                                    <td height="40px" width="300px">Pendidikan Terakhir</td>
                                    <td><?= $guru->pendidikan_terakhir ?></td>
                                </tr>
                                <tr>
                                    <td height="40px" width="300px">Photo</td>
                                    <td>
                                        <img height="200px" src="<?= base_url() . 'assets/uploads/' . $guru->photo ?>" alt="">

                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>