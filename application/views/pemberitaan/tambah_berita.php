<main id="main" class="main">
  <div class="pagetitle">
    <h1>Data Tables</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= site_url('admin/dashboard_admin') ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= site_url('admin/berita') ?>">Berita</a></li>
        <li class="breadcrumb-item active">Edit Berita</li>
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

            <?php  echo form_open_multipart(base_url('admin/berita/tambah')); ?>
            <input type="hidden" name="id_berita" value="<?= set_value('id_berita') ?>">
            <input type="hidden" name="foto_berita_old" value="<?= set_value('foto_berita') ?>">

            <div class="row mb-3">
              <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Foto</label>
              <div class="col-md-8 col-lg-9">
                <span>"Foto Harus (800 L X 600 T)"</span>
                <div class="pt-2">
                  <input type="file" name="foto_berita" class="form-control">
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama Berita</label>
              <div class="col-md-8 col-lg-9">
                <input autocomplete="off" name="nama_berita" type="text" class="form-control" id="nama_berita" value="<?= set_value('nama_berita') ?>">
                <?php echo form_error('nama_berita', '<div class="text-danger mt-2">', '</div>'); ?>
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-md-4 col-lg-3 col-form-label" for="summernote" class="form-label">Isi Berita</label>
              <div class="col-md-8 col-lg-9">
                <textarea class="form-control" id="content2" name="isi_berita"><?= set_value('isi_berita') ?></textarea>
                <?php echo form_error('isi_berita', '<div class="text-danger mt-2">', '</div>'); ?>
              </div>
            </div>

            <div class="row mb-3">
              <label for="Country" class="col-md-4 col-lg-3 col-form-label">Status Berita(aktif/tidak aktif)</label>
              <div class="col-md-8 col-lg-9">
                <select name="status_berita" class="form-control">
                  <option value="">--pilih--</option>
                  <option value="publish">Publish</option>
                  <option value="no publish">No Publish</option>
                  <option value="pending">Pending</option>
                </select>
                <?php echo form_error('status_berita', '<div class="text-danger mt-2">', '</div>'); ?>
              </div>
            </div>

            <div class="row mb-3">
              <label for="Country" class="col-md-4 col-lg-3 col-form-label">Divisi Berita</label>
              <div class="col-md-8 col-lg-9">
                <select class="form-select" aria-label="Default select example" name="tbl_divisi" autocomplete="off" required="required">
                  <option value="">Pilih Divisi:</option>
                  <?php foreach ($kategori as $row) : ?>
                    <option value="<?= $row->id_divisi; ?>"><?= $row->nama_divisi; ?></option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>

            <div class="text-center">
            </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>
            <?php form_close() ?>

            <!-- End Table with stripped rows -->
          </div>
        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->