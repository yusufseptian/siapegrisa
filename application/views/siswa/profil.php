<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-tachometer-alt"></i> Profil
    </div>

    <div class="row mb-5">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-user"></i> Profil Siswa
                </div>
                <div class="card-body">
                    <div class="row justify-content-lg-center">
                        <div class="col-lg-12">
                            <table>
                                <tr>
                                    <td height="40px" width="300px">NIS</td>
                                    <td><?= $siswa->nis ?></td>
                                </tr>
                                <tr>
                                    <td height="40px" width="300px">Username</td>
                                    <td><?= $siswa->username ?></td>
                                </tr>
                                <tr>
                                    <td height="40px" width="300px">Nama</td>
                                    <td><?= $siswa->nama ?></td>
                                </tr>
                                <tr>
                                    <td height="40px" width="300px">Tempat, Tanggal Lahir</td>
                                    <td><?= $siswa->tempat_lahir . ', ' . $siswa->tgl_lahir ?></td>
                                </tr>
                                <tr>
                                    <td height="40px" width="300px">Gender</td>
                                    <td><?= $siswa->gender ?></td>
                                </tr>
                                <tr>
                                    <td height="40px" width="300px">Alamat</td>
                                    <td><?= $siswa->alamat ?></td>
                                </tr>
                                <tr>
                                    <td height="40px" width="300px">No Handphone</td>
                                    <td><?= $siswa->no_hp ?></td>
                                </tr>
                                <tr>
                                    <td height="40px" width="300px">Photo</td>
                                    <td>
                                        <img height="200px" src="<?= base_url() . 'assets/uploads/' . $siswa->photo ?>" alt="">

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