<main id="main" class="main">

  <div class="pagetitle">
    <h1><?= get_setting_data()[0]->nama_web; ?></h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= site_url('admin/dashboard_admin') ?>">Home</a></li>
        <li class="breadcrumb-item active">Setting Web</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <?php echo $this->session->flashdata('pesan') ?>
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Setting Web</h5>

            <?= form_open_multipart('admin/setting/update_web') ?>

            <input type="hidden" name="id" value="<?php echo $setting[0]->id; ?>">


            <input type="hidden" name="logo_web_old" value="<?php echo $setting[0]->logo_web; ?>">
            <div class="row mb-3">
              <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Logo Web</label>
              <div class="col-md-8 col-lg-9">
                
                <img width="200px" height="200px;" src="<?php echo base_url('uploads/logo_web/').$setting[0]->logo_web; ?>" alt="Profile">
                <div class="pt-2">
                  <input type="file" name="logo_web" class="form-control">

                </div>
              </div>
            </div>

            <div class="row mb-3">
              <label for="company" class="col-md-4 col-lg-3 col-form-label">Nama Web</label>
              <div class="col-md-8 col-lg-9">
                <input autocomplete="off" name="nama_web" value="<?= $setting[0]->nama_web ?>" type="text" class="form-control" id="visi" >
              </div>
            </div>

            <div class="row mb-3">
              <label for="company" class="col-md-4 col-lg-3 col-form-label">Nama Singkat Web</label>
              <div class="col-md-8 col-lg-9">
                <input autocomplete="off" name="sub_web" type="text" value="<?= $setting[0]->sub_web ?>" class="form-control" id="misi" >
              </div>
            </div>

            <div class="row mb-3">
              <label for="company" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
              <div class="col-md-8 col-lg-9">
                <input autocomplete="off" name="alamat" value="<?= $setting[0]->alamat ?>" type="text" class="form-control" id="tujuan" >
              </div>
            </div>

            <div class="row mb-3">
              <label for="company" class="col-md-4 col-lg-3 col-form-label">Facebook</label>
              <div class="col-md-8 col-lg-9">
                <input autocomplete="off" name="facebook" value="<?= $setting[0]->facebook ?>" type="text" class="form-control" id="tujuan" >
              </div>
            </div>

            <div class="row mb-3">
              <label for="company" class="col-md-4 col-lg-3 col-form-label">Instagram</label>
              <div class="col-md-8 col-lg-9">
                <input autocomplete="off" name="instagram" value="<?= $setting[0]->instagram ?>" type="text" class="form-control" id="tujuan" >
              </div>
            </div>

            <div class="row mb-3">
              <label for="company" class="col-md-4 col-lg-3 col-form-label">Email</label>
              <div class="col-md-8 col-lg-9">
                <input autocomplete="off" name="email" value="<?= $setting[0]->email ?>" type="text" class="form-control" id="tujuan" >
              </div>
            </div>

            <div class="row mb-3">
              <label for="company" class="col-md-4 col-lg-3 col-form-label">Password Email</label>
              <div class="col-md-8 col-lg-9">
                <input autocomplete="off" name="pass_email" value="<?= $setting[0]->pass_email ?>" type="password" class="form-control"  >
              </div>
            </div>

            <div class="row mb-3">
              <label for="company" class="col-md-4 col-lg-3 col-form-label">No. Telpon</label>
              <div class="col-md-8 col-lg-9">
                <input autocomplete="off" name="no_telp" value="<?= $setting[0]->no_telp ?>" type="text" class="form-control" id="tujuan" >
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


