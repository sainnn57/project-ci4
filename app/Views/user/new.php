<?= $this->extend('layout/user'); ?>

<?= $this->section('content'); ?>

<?php
$pesan = session()->getFlashdata('pesan');
?>

<section id="hero2">

  <div class="row mt-5">
    <div class="col-md-10 offset-md-1">
      <form action="/perpustakaan/save" method="POST" enctype='multipart/form-data'>
        <?php csrf_field(); ?>
        <div>
          <?php if ($pesan) { ?>
            <p style="color:green"><?php echo $pesan ?></p>
          <?php } ?>
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text" id="productName"><i class="bi bi-bag"></i></span>
          <input type="number" name="no_buku" class="form-control" placeholder="No Buku" aria-label="No Buku" aria-describedby="no_buku" required="true">
        </div>

        <div class="input-group mb-3">
          <span class="input-group-text" id="productName"><i class="bi bi-bag"></i></span>
          <input type="text" name="judul_buku" class="form-control" placeholder="Judul Buku" aria-label="Judul Buku" aria-describedby="judul_buku" required="true">
        </div>

        <div class="input-group mb-3">
          <span class="input-group-text" id="productName"><i class="bi bi-bag"></i></span>
          <input type="text" name="pengarang" class="form-control" placeholder="Pengarang" aria-label="Pengarang" aria-describedby="pengarang" required="true">
        </div>

        <div class="input-group mb-3">
          <span class="input-group-text" id="productName"><i class="bi bi-bag"></i></span>
          <input type="number" name="jumlah_buku" class="form-control" placeholder="Jumlah Buku" aria-label="Jumlah Buku" aria-describedby="jumlah_buku" required="true">
        </div>

        <div class="input-group mb-3">
          <button type="submit" class="btn btn-primary">Tambah Data</button>
        </div>
      </form>
    </div>
  </div>

</section>

<?= $this->endSection(); ?>