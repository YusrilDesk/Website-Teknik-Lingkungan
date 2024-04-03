<main id="main" class="main">

  <div class="pagetitle">
    <h1>Data Tables</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= site_url('admin/dashboard_admin') ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= site_url('admin/kursus') ?>">kursus</a></li>
        <li class="breadcrumb-item active">Edit kursus</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <?php echo $this->session->flashdata('pesan') ?>
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Kursus</h5>

            <?= form_open_multipart('admin/kursus/update') ?>
            <input type="hidden" name="id_kursus" value="<?= $kursusEdit[0]->id_kursus; ?>">

            <div class="row mb-3">
              <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Silabus</label>
              <div class="col-md-8 col-lg-9">
               <a target="_blank" href="<?= $kursusEdit[0]->silabus; ?>" alt="Profile" class="rounded-circle">
                <i class="bi bi-file-earmark-text-fill" style="font-size: 4em;"></i> 
              </a>
              <input autocomplete="off" name="silabus" value="<?= $kursusEdit[0]->silabus; ?>" type="text" class="form-control" id="silabus" >
              
              <div class="pt-2">
                <input type="file" name="silabus" class="form-control">
              </div>
            </div>
          </div>

          <div class="row mb-3">
            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama kursus</label>
            <div class="col-md-8 col-lg-9">
              <input autocomplete="off" name="kursus" type="text" class="form-control" id="kursus" value="<?= $kursusEdit[0]->kursus ?>">
            </div>
          </div>

          <div class="row mb-3">
            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Semester</label>
            <div class="col-md-8 col-lg-9">
              <input autocomplete="off" name="semester" type="number" class="form-control" id="semester" value="<?= $kursusEdit[0]->semester ?>">
            </div>
          </div>




          <div class="text-center">
            <!-- Tempatkan tombol "Edit Data" di sini -->
            <button type="submit" class="btn btn-primary">Edit Data</button>
          </div>
        </form>


        <!-- End Table with stripped rows -->

      </div>
    </div>

  </div>
</div>
</section>

  </main><!-- End #main -->