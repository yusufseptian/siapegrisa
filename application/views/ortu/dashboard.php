<div class="container-fluid">
  <div class="alert alert-success" role="alert">
    <i class="fas fa-tachometer-alt"></i> Dashboard
  </div>
  <div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Selamat Datang!</h4>
    <p>Selamat Datang <strong><?php echo $username; ?></strong> di Sistem Informasi Akademik SMP PGRI 1 Sempor.</p>
    <hr>
  </div>

  <div class="row">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-header">
          <h4>Pengumuman</h4>
        </div>
        <div class="card-body">
          <center>
            <img width="300px" src="<?= base_url() . 'assets/img/info.png' ?>" alt="">
          </center>
          <ul class="list-group">
            <?php foreach ($pengumuman as $item) : ?>
              <li class="list-group-item"><a href="<?= base_url() . 'ortu/dashboard/pengumuman/' . $item->id ?>"><?= $item->judul ?></a></li>
            <?php endforeach ?>
          </ul>
        </div>
      </div>
    </div>
  </div>


</div>