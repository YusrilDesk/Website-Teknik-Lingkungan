<main id="main" class="main">

  <div class="pagetitle">
    <h1>Data Tables</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= site_url('admin/dashboard_admin') ?>">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active">Kursus</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <?php echo $this->session->flashdata('pesan') ?>
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Kurikulum</h5>
            <button type="button" data-bs-toggle="modal" data-bs-target="#tambahdata" class="btn btn-primary btn-sm"><i class="bi bi-plus-square"></i> Tambah Data</button><br>

            <div class="modal fade" id="tambahdata" tabindex="-1">
              <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <?= form_open_multipart('admin/kursus/tambah') ?>
                    

                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Silabus (Masukan Link!)</label>
                      <div class="col-md-8 col-lg-9">
                        <input autocomplete="off" name="silabus" type="text" class="form-control" id="silabus" >
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Kursus</label>
                      <div class="col-md-8 col-lg-9">
                        <input autocomplete="off" name="kursus" type="text" class="form-control" id="kursus">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Semester</label>
                      <div class="col-md-8 col-lg-9">
                        <input autocomplete="off" name="semester" type="number" class="form-control" id="semester" >
                      </div>
                    </div>





                    <div class="text-center">



                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                    <?= form_close(); ?>
                  </div>
                </div>
              </div>
            </div>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Silabus</th>
                  <th scope="col">Kursus</th>
                  <th scope="col">Semester</th>
                  <th scope="col">Waktu</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>

                <?php if($kursus){  $no=1; foreach($kursus as $key){ ?>

                  <tr>

                   <td><?php echo $no; ?></td>

                   <td>
                    <a target="_blank" href="<?= $key->silabus; ?>" alt="Profile" >
                      <i class="bi bi-file-earmark-text-fill" style="font-size: 4em;"></i> 
                    </a>
                    <!-- <br> <?= $key->file_kursus; ?> -->
                  </td>

                  <td><?php echo $key->kursus; ?></td>

                  <td><?php echo $key->semester; ?></td>

                  <td><?php echo $key->waktu; ?></td>

                  <td>





                    <a type="button" data-bs-toggle="modal" data-bs-target="#editdata" class="btn btn-primary btn-sm"><i class="bi bi-plus-square"></i> edit Data</a>

                    <div class="modal fade" id="editdata" tabindex="-1">
                      <div class="modal-dialog modal-lg modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">edit Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <?= form_open_multipart('admin/kursus/update') ?>
                            <input type="hidden" name="id_kursus" value="<?= $key->id_kursus ?>">

                            <div class="row mb-3">
                              <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Silabus (Masukan Link!)</label>
                              <div class="col-md-8 col-lg-9">
                                <a target="_blank" href="<?= $key->silabus; ?>" alt="Profile" >
                                  <i class="bi bi-file-earmark-text-fill" style="font-size: 4em;"></i> 
                                </a>
                                <input autocomplete="off" name="silabus" type="text" class="form-control" id="silabus" value="<?= $key->silabus ?>">
                              </div>
                            </div>

                            <div class="row mb-3">
                              <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Kursus</label>
                              <div class="col-md-8 col-lg-9">
                                <input autocomplete="off" name="kursus" type="text" class="form-control" id="kursus" value="<?= $key->kursus ?>">
                              </div>
                            </div>

                            <div class="row mb-3">
                              <label for="company" class="col-md-4 col-lg-3 col-form-label">Semester</label>
                              <div class="col-md-8 col-lg-9">
                                <input autocomplete="off" name="semester" type="number" class="form-control" id="semester" value="<?= $key->semester ?>">
                              </div>
                            </div>





                            <div class="text-center">



                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">edit Data</button>
                            </div>
                            <?= form_close(); ?>
                          </div>
                        </div>
                      </div>
                    </div>


                    <a   href="<?php echo site_url('admin/kursus/delete/'.$key->id_kursus) ?>" class="btn btn-danger btn-sm " onclick="return confirm('Apakah Anda Yakin Akan Menghapus!')"><i class="bi bi-trash"></i> Hapus</a>







                  </td>

                  <div>



                  </div>

                </tr>







                <?php $no++; }}else{

                  echo '

                  <tr>

                  <td colspan="5">Tidak ada ditemukan</td>

                  </tr>

                  ';

                }?>

              </tbody>  
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>

  </main><!-- End #main -->