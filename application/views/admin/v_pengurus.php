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
            <h5 class="card-title">Data Kepengurusan</h5>
            <button type="button" data-bs-toggle="modal" data-bs-target="#tambahdata" class="btn btn-primary btn-sm"><i class="bi bi-plus-square"></i> Tambah Data</button><br>

            <div class="modal fade" id="tambahdata" tabindex="-1">
              <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Tambah pengurus DSTI</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <?= form_open_multipart('admin/pengurus/tambah') ?>
                    

                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Foto</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="pt-2">
                          <input type="file" required="required" name="foto_pengurus" class="form-control">
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama</label>
                      <div class="col-md-8 col-lg-9">
                        <input autocomplete="off" name="nama_pengurus" type="text" class="form-control" id="nama_pengurus">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Jabatan</label>
                      <div class="col-md-8 col-lg-9">
                        <input autocomplete="off" name="jabatan" type="text" class="form-control" id="jabatan" >
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="text" class="form-control" id="email" >
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Twiter</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="twiter" type="text" class="form-control" id="twiter" >
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Facebook</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="facebook" type="text" class="form-control" id="facebook" >
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Instagram</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="instagram" type="text" class="form-control" id="instagram" >
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Linkin</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="linkin" type="text" class="form-control" id="linkin" >
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">No.Telpon</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="no_telp" type="text" class="form-control" id="no_telp" >
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
                  <th scope="col">#</th>
                  <th scope="col">Foto</th>
                  <th scope="col">Nama</th>
                  <th scope="col">No Telpon</th>
                  <th scope="col">Jabatan</th>
                  <th scope="col">Email</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>

                <?php if($pengurus){  $no=1; foreach($pengurus as $key){ ?>

                  <tr>

                   <td><?php echo $no; ?></td>

                   <td><img width="80px" height="80px" src="<?php echo base_url('uploads/foto_pengurus/').$key->foto_pengurus; ?>" alt="Profile" class="rounded-circle"></td>
                   <td><?php echo $key->nama_pengurus; ?></td>

                   <td><?php echo $key->no_telp; ?></td>

                   <td><?php echo $key->jabatan; ?></td>

                   <td><?php echo $key->email; ?></td>

                   <td>





                    <button type="button" data-bs-toggle="modal" data-bs-target="#editdata<?php echo($no); ?>" class="btn btn-info btn-sm"><i class="bi bi-pen-fill"></i> Edit Data</button>

                    <div class="modal fade" id="editdata<?php echo($no); ?>" tabindex="-1">
                      <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Edit pengurus DSTI</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <?= form_open_multipart('admin/pengurus/update') ?>
                            <input type="hidden" name="id_pengurus" value="<?php echo $key->id_pengurus; ?>">

                            <input type="hidden" name="foto_pengurus_old"  value="<?php echo $key->foto_pengurus; ?>" >

                            <div class="row mb-3">
                              <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Foto</label>
                              <div class="col-md-8 col-lg-9">
                                <img width="80px" height="80px" src="<?php echo base_url('uploads/foto_pengurus/').$key->foto_pengurus; ?>" alt="Profile" class="rounded-circle">
                                <div class="pt-2">
                                  <input type="file"  name="foto_pengurus" class="form-control">
                                </div>
                              </div>
                            </div>

                            <div class="row mb-3">
                              <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama</label>
                              <div class="col-md-8 col-lg-9">
                                <input autocomplete="off" name="nama_pengurus" type="text" class="form-control" id="nama_pengurus" value="<?= $key->nama_pengurus ?>">
                              </div>
                            </div>

                            <div class="row mb-3">
                              <label for="company" class="col-md-4 col-lg-3 col-form-label">Jabatan</label>
                              <div class="col-md-8 col-lg-9">
                                <input autocomplete="off" name="jabatan" type="text" class="form-control" id="jabatan" value="<?= $key->jabatan ?>">
                              </div>
                            </div>

                            <div class="row mb-3">
                              <label for="Country" class="col-md-4 col-lg-3 col-form-label">Email</label>
                              <div class="col-md-8 col-lg-9">
                                <input name="email" type="text" class="form-control" id="email" value="<?= $key->email ?>">
                              </div>
                            </div>

                            <div class="row mb-3">
                              <label for="Country" class="col-md-4 col-lg-3 col-form-label">Twiter</label>
                              <div class="col-md-8 col-lg-9">
                                <input name="twiter" type="text" class="form-control" id="twiter" value="<?= $key->twiter ?>">
                              </div>
                            </div>

                            <div class="row mb-3">
                              <label for="Country" class="col-md-4 col-lg-3 col-form-label">Facebook</label>
                              <div class="col-md-8 col-lg-9">
                                <input name="facebook" type="text" class="form-control" id="facebook" value="<?= $key->facebook ?>">
                              </div>
                            </div>

                            <div class="row mb-3">
                              <label for="Country" class="col-md-4 col-lg-3 col-form-label">Instagram</label>
                              <div class="col-md-8 col-lg-9">
                                <input name="instagram" type="text" class="form-control" id="instagram" value="<?= $key->instagram ?>">
                              </div>
                            </div>

                            <div class="row mb-3">
                              <label for="Country" class="col-md-4 col-lg-3 col-form-label">Linkin</label>
                              <div class="col-md-8 col-lg-9">
                                <input name="linkin" type="text" class="form-control" id="linkin" value="<?= $key->linkin ?>">
                              </div>
                            </div>

                            <div class="row mb-3">
                              <label for="Country" class="col-md-4 col-lg-3 col-form-label">No.Telpon</label>
                              <div class="col-md-8 col-lg-9">
                                <input name="no_telp" type="text" class="form-control" id="no_telp" value="<?= $key->no_telp ?>">
                              </div>
                            </div>



                            <div class="text-center">



                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Simpan Data</button>
                            </div>
                            <?= form_close(); ?>
                          </div>
                        </div>
                      </div>
                    </div>





                    <!--   <a href="<?php echo site_url('admin/bebas_tunggakan/edit/'.$key->id_tunggakan) ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a> -->



                    <!--  <a   href="<?php echo site_url('admin/bebas_tunggakan/delete/'.$key->id_tunggakan) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> -->





           <!--   <?php if ($key->status_tunggakan != 'di tolak' and $key->status_tunggakan != 'di terima'){ ?>





              <button data-toggle="modal" data-target="#tolak<?= $key->id_tunggakan; ?>" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Tolak</button>



             <?php }?>

           -->

           

           <a   href="<?php echo site_url('admin/pengurus/delete/'.$key->id_pengurus) ?>" class="btn btn-danger btn-sm " onclick="return confirm('Apakah Anda Yakin Akan Menghapus!')"><i class="bi bi-trash"></i> Hapus</a>







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

  