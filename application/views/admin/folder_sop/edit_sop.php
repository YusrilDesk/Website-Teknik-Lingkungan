<main id="main" class="main">

  <div class="pagetitle">
    <h1>Data Tables</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= site_url('admin/dashboard_admin') ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= site_url('admin/sop') ?>">sop</a></li>
        <li class="breadcrumb-item active">Edit sop</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <?php echo $this->session->flashdata('pesan') ?>
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data sop</h5>

            <?= form_open_multipart('admin/sop/update') ?>
            <input type="hidden" name="id_sop" value="<?= $sopEdit[0]->id_sop; ?>">

            <div class="row mb-3">
              <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Dokumen</label>
              <div class="col-md-8 col-lg-9">
               <a target="_blank" href="<?= $sopEdit[0]->file_sop; ?>" alt="Profile" class="rounded-circle">
                <i class="bi bi-file-earmark-text-fill" style="font-size: 4em;"></i> 
              </a>
              <input autocomplete="off" name="file_sop" value="<?= $sopEdit[0]->file_sop; ?>" type="text" class="form-control" id="file_sop" >
              
              <div class="pt-2">
                <input type="file" name="file_sop" class="form-control">
              </div>
            </div>
          </div>

          <div class="row mb-3">
            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama sop</label>
            <div class="col-md-8 col-lg-9">
              <input autocomplete="off" name="nama_sop" type="text" class="form-control" id="nama_sop" value="<?= $sopEdit[0]->nama_sop ?>">
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-md-4 col-lg-3 col-form-label" for="content2">Deskripsi sop</label>
            <div class="col-md-8 col-lg-9">
              <textarea class="form-control" id="content2" name="deskripsi_sop"><?= $sopEdit[0]->deskripsi_sop; ?></textarea>
            </div>
          </div>


          <div class="row mb-3">
            <label for="Country" class="col-md-4 col-lg-3 col-form-label">Kategori SOP</label>
            <div class="col-md-8 col-lg-9">
              <select name="kategori_dokumen" class="form-control">
                <option value="">--pilih--</option>
                <?php foreach($kategori as $row ) : ?>
                  <option value="<?= $row->id_dokumen; ?>" <?php if($sopEdit[0]->id_dokumen == $row->id_dokumen) {echo "selected";} ?> ><?= $row->nama_dokumen; ?></option>
                <?php endforeach ?>
              </select>
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