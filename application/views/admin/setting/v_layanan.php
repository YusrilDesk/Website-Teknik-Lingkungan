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
            <h5 class="card-title">Kategori layanan</h5>
            <button type="button" data-bs-toggle="modal" data-bs-target="#tambahdata" class="btn btn-primary btn-sm"><i class="bi bi-plus-square"></i> Tambah Data</button><br>

            <div class="modal fade" id="tambahdata" tabindex="-1">
              <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Tambah layanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <?= form_open_multipart('admin/setting/tambah_layanan') ?>
                    




                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Nama layanan</label>
                      <div class="col-md-8 col-lg-9">
                        <input autocomplete="off" name="nama_layanan" type="text" class="form-control" id="nama_layanan" >
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Deskripsi</label>
                      <div class="col-md-8 col-lg-9">
                        <input autocomplete="off" name="deskripsi" type="text" class="form-control" id="deskripsi" >
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
                  <th scope="col">Nama layanan</th>
                  <th scope="col">Deskripsi</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>

                <?php if($setting){  $no=1; foreach($setting as $key){ ?>

                  <tr>

                   <td><?php echo $no; ?></td>

                   <td><?php echo $key->nama_layanan; ?></td>
                   <td><?php echo $key->deskripsi; ?></td>

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
                            <?= form_open_multipart('admin/setting/update_layanan') ?>
                            <input type="hidden" name="id_layanan" value="<?php echo $key->id_layanan; ?>">


                            <div class="row mb-3">
                              <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama layanan</label>
                              <div class="col-md-8 col-lg-9">
                                <input autocomplete="off" name="nama_layanan" type="text" class="form-control" id="nama_layanan" value="<?= $key->nama_layanan ?>" >
                              </div>
                            </div>

                            <div class="row mb-3">
                              <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Deskripsi</label>
                              <div class="col-md-8 col-lg-9">
                                <input autocomplete="off" name="deskripsi" type="text" class="form-control" id="deskripsi" value="<?= $key->deskripsi ?>" >
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


                  <a   href="<?php echo site_url('admin/setting/delete_layanan/'.$key->id_layanan) ?>" class="btn btn-danger btn-sm " onclick="return confirm('Apakah Anda Yakin Akan Menghapus!')"><i class="bi bi-trash"></i> Hapus</a>







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