<?= $this->extend('layout/user'); ?>

<?= $this->section('content'); ?>

<section id="hero2">

<div class="container" >
<table class="table" id="productTable">
    <thead>
      <tr>
        <th>No</th>
        <th>No Buku</th>
        <th>Judul Buku</th>
        <th>Pengarang</th>
        <th>Jumlah Buku</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; ?>
      <?php foreach ($perpustakaan as $p) : ?>
        <tr>
          <td><?= $i++; ?></td>
          <td><?= $p['no_buku']; ?></td>
          <td><?= $p['judul_buku']; ?></td>
          <td><?= $p['pengarang']; ?></td>
          <td><?= $p['jumlah_buku']; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

</section>

<?= $this->endSection(); ?>