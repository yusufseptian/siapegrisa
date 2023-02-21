<div class="container-fluid">
  <div class="alert alert-success" role="alert">
    <i class="fas fa-tachometer-alt"></i> Pengumuman
    <?php
    // echo $this->session->flashdata('pesan')
    ?>
  </div>
  <!-- Button trigger modal -->

  <div class="row">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-header">
          <h4>Pengumuman</h4>
        </div>
        <div class="card-body">
          <p><?= $pengumuman->pengumuman ?></p>
        </div>
      </div>
    </div>
  </div>

</div>