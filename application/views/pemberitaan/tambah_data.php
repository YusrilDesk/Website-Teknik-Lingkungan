<main id="main" class="main">

  <div class="pagetitle">
    <h1>Data Tables</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= site_url('admin/dashboard_admin') ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= site_url('admin/berita') ?>">Berita</a></li>
        <li class="breadcrumb-item active">Tambah Berita</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <?php echo $this->session->flashdata('pesan') ?>
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Berita</h5>

            <?= form_open_multipart('admin/berita/tambah') ?>
            <input type="hidden" name="id_berita" value="<?php echo $tambah_berita[0]->id_berita; ?>">

            <input type="hidden" name="foto_berita_old" value="<?php echo $tambah_berita[0]->foto_berita; ?>">

            <div class="row mb-3">
              <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Foto</label>
              <div class="col-md-8 col-lg-9">
                <img src="assets/img/profile-img.jpg" alt="Profile">
                <div class="pt-2">
                  <input required type="file" name="foto_berita" class="form-control">
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama Berita</label>
              <div class="col-md-8 col-lg-9">
                <input required autocomplete="off" name="nama_berita" type="text" class="form-control" id="nama_berita">
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-md-4 col-lg-3 col-form-label" for="company" class="col-md-4 col-lg-3 col-form-label">Isi Berita</label>
              <div class="col-md-8 col-lg-9">
                <textarea required class="form-control" id="content" name="isi_berita" class="form-control" style="height: 100px"></textarea>
              </div>
            </div>

            <div class="row mb-3">
              <label for="Country" class="col-md-4 col-lg-3 col-form-label">Status Berita(aktif/tidak aktif)</label>
              <div class="col-md-8 col-lg-9">
                <input required name="status_berita" type="text" class="form-control" id="status_berita" >
              </div>
            </div>

            <div class="row mb-3">
              <label for="Country" class="col-md-4 col-lg-3 col-form-label">Divisi</label>
              <div class="col-md-8 col-lg-9">
                <input required name="divisi" type="text" class="form-control" id="divisi" >
              </div>
            </div>



            <div class="text-center">



            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>
            <?= form_close(); ?>
            
            
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>

  </main><!-- End #main -->