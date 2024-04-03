<main id="main" class="main">

  <div class="pagetitle">
    <h1><?= get_setting_data()[0]->sub_web; ?></h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= site_url('admin/dashboard_admin') ?>">Home</a></li>
        <li class="breadcrumb-item active">Edit Profil <?= get_setting_data()[0]->sub_web; ?></li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <?php echo $this->session->flashdata('pesan') ?>
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Profil</h5>

            <?= form_open_multipart('admin/profil/update') ?>

            <input type="hidden" name="id_profil" value="<?php echo $profile[0]->id_profil; ?>">




            <div class="row mb-3">
              <label class="col-md-4 col-lg-3 col-form-label" class="form-label">Sejarah</label>
              <div class="col-md-8 col-lg-9">
                <textarea class="form-control summernote" id="editor1" name="sambutan_ketua"><?= $profile[0]->sambutan_ketua; ?></textarea>
                <?php echo form_error('sambutan_ketua', '<div class="text-danger mt-2">', '</div>'); ?>
              </div>
            </div>

            <div class="row mb-3">
              <label for="company" class="col-md-4 col-lg-3 col-form-label">Visi</label>
              <div class="col-md-8 col-lg-9">
                <input autocomplete="off" name="visi" value="<?= $profile[0]->visi ?>" type="text" class="form-control" id="visi" >
              </div>
            </div>

            <div class="row mb-3">
              <label for="company" class="col-md-4 col-lg-3 col-form-label">Misi</label>
              <div class="col-md-8 col-lg-9">
                <input autocomplete="off" name="misi" type="text" value="<?= $profile[0]->misi ?>" class="form-control" id="misi" >
              </div>
            </div>

            <div class="row mb-3">
              <label for="company" class="col-md-4 col-lg-3 col-form-label">Tujuan</label>
              <div class="col-md-8 col-lg-9">
                <input autocomplete="off" name="tujuan" value="<?= $profile[0]->tujuan ?>" type="text" class="form-control" id="tujuan" >
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-md-4 col-lg-3 col-form-label">Tugas Pokok dan Fungsi</label>
              <div class="col-md-8 col-lg-9">


                <textarea class="form-control summernote" id="editor2" name="tugas_pokok"><?= $profile[0]->tugas_pokok; ?></textarea>

                
                <?php echo form_error('tugas_pokok', '<div class="text-danger mt-2">', '</div>'); ?>
              </div>
            </div>


            <div class="row mb-3">
              <label class="col-md-4 col-lg-3 col-form-label"  class="form-label">Akreditasi</label>
              <div class="col-md-8 col-lg-9">
                <textarea class="form-control summernote" id="editor4" name="akreditasi"><?= $profile[0]->akreditasi; ?></textarea>
                <?php echo form_error('akreditasi', '<div class="text-danger mt-2">', '</div>'); ?>
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-md-4 col-lg-3 col-form-label"  class="form-label">Struktur Organisasi</label>
              <div class="col-md-8 col-lg-9">
                <textarea class="form-control summernote" id="editor3" name="struktur_organisasi"><?= $profile[0]->struktur_organisasi; ?></textarea>
                <?php echo form_error('struktur_organisasi', '<div class="text-danger mt-2">', '</div>'); ?>
              </div>
            </div>



            <input type="hidden" name="foto_struktur_old" value="<?php echo $profile[0]->foto_struktur; ?>">
            <div class="row mb-3">
              <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Foto Struktur Organisasi</label>
              <div class="col-md-8 col-lg-9">
                
                <img width="200px" height="200px;" src="<?php echo base_url('uploads/foto_struktur/').$profile[0]->foto_struktur; ?>" alt="Profile">
                <div class="pt-2">
                  <input type="file" name="foto_struktur" class="form-control">

                </div>
              </div>
            </div>





            <div class="text-center">



            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Edit Data</button>
            </div>
            <?= form_close(); ?>


            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->


