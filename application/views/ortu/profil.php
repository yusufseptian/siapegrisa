<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-tachometer-alt"></i> Profil
    </div>

    <div class="row mb-5">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-user"></i> Profil Orangtua
                </div>
                <div class="card-body">
                    <div class="row justify-content-lg-center">
                        <div class="col-lg-12">
                            <table>
                                <tr>
                                    <td height="40px" width="300px">Username</td>
                                    <td><?= $ortu->username ?></td>
                                </tr>
                                <tr>
                                    <td height="40px" width="300px">Nama</td>
                                    <td><?= $ortu->nama ?></td>
                                </tr>
                                <tr>
                                    <td height="40px" width="300px">No Handphone</td>
                                    <td><?= $ortu->no_hp ?></td>
                                </tr>
                                <tr>
                                    <td height="40px" width="300px">Pekerjaan</td>
                                    <td><?= $ortu->pekerjaan ?></td>
                                </tr>
                                <tr>
                                    <td height="40px" width="300px">NIS Siswa</td>
                                    <td><?= $ortu->nis_siswa ?></td>
                                </tr>
                                <tr>
                                    <td height="40px" width="300px">Alamat</td>
                                    <td><?= $ortu->alamat ?></td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>