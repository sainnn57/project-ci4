<?php $this->extend('layout/admin'); ?>
<?php $this->section('content'); ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Data</h1>

            <!-- form edit data -->
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Edit Data Kelahiran
                </div>
                <div class="card-body">
                    <form action="/perpustakaan/update/<?= $perpustakaan['id']; ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id" value="<?= $perpustakaan['id']; ?>">
                        
                        <div class="row mb-3">
                            <label for="no_buku" class="col-sm-2 col-form-label">No Buku</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control <?= ($validation->hasError('no_buku')) ? 'is-invalid' : ''; ?>" id="no_buku" name="no_buku" autofocus value="<?= (old('no_buku')) ? old('no_buku') : $perpustakaan['no_buku']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('no_buku'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="judul_buku" class="col-sm-2 col-form-label">Judul Buku</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('judul_buku')) ? 'is-invalid' : ''; ?>" id="judul_buku" name="judul_buku" value="<?= (old('judul_buku')) ? old('judul_buku') : $perpustakaan['judul_buku']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('judul_buku'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="pengarang" class="col-sm-2 col-form-label">Pengarang</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('pengarang')) ? 'is-invalid' : ''; ?>" id="pengarang" name="pengarang" value="<?= (old('pengarang')) ? old('pengarang') : $perpustakaan['pengarang']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('pengarang'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="jumlah_buku" class="col-sm-2 col-form-label">Jumlah Buku</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control <?= ($validation->hasError('jumlah_buku')) ? 'is-invalid' : ''; ?>" id="jumlah_buku" name="jumlah_buku" value="<?= (old('jumlah_buku')) ? old('jumlah_buku') : $perpustakaan['jumlah_buku']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('jumlah_buku'); ?>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Edit Data</button>
                    </form>
                </div>
            </div>
            <!-- end form edit data -->
    </main>

    <?php $this->endSection(); ?>