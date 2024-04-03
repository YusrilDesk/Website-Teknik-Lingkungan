<main id="main" class="main">

  <div class="pagetitle">
    <h1>Data Tables</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= site_url('admin/dashboard_admin') ?>">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active">Data</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <?php echo $this->session->flashdata('pesan') ?>
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Slider IMG</h5>
            <button type="button" data-bs-toggle="modal" data-bs-target="#tambahdata" class="btn btn-primary btn-sm"><i class="bi bi-plus-square"></i> Tambah Data</button><br>

            <div class="modal fade" id="tambahdata" tabindex="-1">
              <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Tambah Slider</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <?= form_open_multipart('admin/setting/tambah') ?>
                    




                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Nama Slider</label>
                      <div class="col-md-8 col-lg-9">
                        <input autocomplete="off" name="nama" type="text" class="form-control" id="nama" >
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Slider IMG</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="pt-2">
                          <input type="file" name="slider" class="form-control">

                        </div>
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
                  <th scope="col">Nama</th>
                  <th scope="col">Slider</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>

                <?php if($setting){  $no=1; foreach($setting as $key){ ?>

                  <tr>

                   <td><?php echo $no; ?></td>

                   <td><?php echo $key->nama; ?></td>

                   <td>
                    <img width="200px" height="200px;" src="<?php echo base_url('uploads/slider/').$key->slider; ?>" alt="Profile">
                  </td>

                  <td>





                    <button type="button" data-bs-toggle="modal" data-bs-target="#editdata<?php echo($no); ?>" class="btn btn-info btn-sm"><i class="bi bi-pencil"></i> Edit</button>

                    <div class="modal fade" id="editdata<?php echo($no); ?>" tabindex="-1">
                      <div class="modal-dialog modal-lg modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Detail Data Layanan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <?= form_open_multipart('admin/setting/update_slider') ?>
                            <input type="hidden" name="id" value="<?php echo $key->id; ?>">


                            <input type="hidden" name="slider_old" value="<?php echo $key->slider; ?>">
                            <div class="row mb-3">
                              <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Foto Struktur Organisasi</label>
                              <div class="col-md-8 col-lg-9">

                                <img width="200px" height="200px;" src="<?php echo base_url('uploads/slider/').$key->slider; ?>" alt="Profile">
                                <div class="pt-2">
                                  <input type="file" name="slider" class="form-control">

                                </div>
                              </div>
                            </div>

                            <div class="row mb-3">
                              <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama</label>
                              <div class="col-md-8 col-lg-9">
                                <input autocomplete="off" name="nama" type="text" class="form-control" id="nama" value="<?= $key->nama ?>" disabled>
                              </div>
                            </div>





                          <div class="text-center">



                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Ubah Status</button>
                          </div>
                          <?= form_close(); ?>
                        </div>
                      </div>
                    </div>
                  </div>


                  <a   href="<?php echo site_url('admin/setting/delete/'.$key->id) ?>" class="btn btn-danger btn-sm " onclick="return confirm('Apakah Anda Yakin Akan Menghapus!')"><i class="bi bi-trash"></i> Hapus</a>







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