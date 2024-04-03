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
            <h5 class="card-title">Data Dosen</h5>
            <button type="button" data-bs-toggle="modal" data-bs-target="#tambahdata" class="btn btn-primary btn-sm"><i class="bi bi-plus-square"></i> Tambah Data</button><br>

            <div class="modal fade" id="tambahdata" tabindex="-1">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Proker</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <?= form_open_multipart('admin/proker/tambah') ?>
                    

                    

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama Proker</label>
                      <div class="col-md-8 col-lg-9">
                        <input autocomplete="off" name="nama_proker" type="text" class="form-control" id="nama_proker">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Deskripsi Proker</label>
                     <div class="col-md-8 col-lg-9">
                        <input autocomplete="off" name="deskripsi_proker" type="text" class="form-control" id="deskripsi_proker">
                      </div>
                    </div>
                  

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Penaggung Jawab</label>
                      <div class="col-md-8 col-lg-9">
                        <input autocomplete="off" name="penanggung_jawab" type="text" class="form-control" id="penanggung_jawab" >
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Target Waktu</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="target_waktu" type="date" class="form-control" id="target_waktu" >
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Anggaran</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="anggaran" type="text" class="form-control" id="anggaran" >
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
                  <th scope="col">Nama Proker</th>
                  <th scope="col">Penanggung Jawab</th>
                  <th scope="col">Target Waktu</th>
                  <th scope="col">Anggaran</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>

                <?php if($proker){  $no=1; foreach($proker as $key){ ?>

                  <tr>

                   <td><?php echo $no; ?></td>


                   <td><?php echo $key->nama_proker; ?></td>

                   <td><?php echo $key->penanggung_jawab; ?></td>

                   <td><?php echo $key->target_waktu; ?></td>

                   <td><?php echo $key->anggaran; ?></td>

                   <td>





                    <button type="button" data-bs-toggle="modal" data-bs-target="#editdata<?php echo($no); ?>" class="btn btn-info btn-sm"><i class="bi bi-pen-fill"></i> Edit Data</button>

                    <div class="modal fade" id="editdata<?php echo($no); ?>" tabindex="-1">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Edit proker HMPS</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <?= form_open_multipart('admin/proker/update') ?>
                            <input type="hidden" name="id_proker" value="<?php echo $key->id_proker; ?>">



                            <div class="row mb-3">
                              <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama Proker</label>
                              <div class="col-md-8 col-lg-9">
                                <input autocomplete="off" name="nama_proker" type="text" class="form-control" value="<?= $key->nama_proker ?>" id="nama_proker">
                              </div>
                            </div>

                            <div class="row mb-3">
                              <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Deskripsi Proker</label>
                              <div class="col-md-8 col-lg-9">
                                <input autocomplete="off" name="deskripsi_proker" value="<?= $key->deskripsi_proker ?>" type="text" class="form-control" id="deskripsi_proker" >
                              </div>
                            </div>
                            

                            <div class="row mb-3">
                              <label for="company" class="col-md-4 col-lg-3 col-form-label">Penaggung Jawab</label>
                              <div class="col-md-8 col-lg-9">
                                <input autocomplete="off" name="penanggung_jawab" value="<?= $key->penanggung_jawab ?>" type="text" class="form-control" id="penanggung_jawab" >
                              </div>
                            </div>

                            <div class="row mb-3">
                              <label for="Country" class="col-md-4 col-lg-3 col-form-label">Target Waktu</label>
                              <div class="col-md-8 col-lg-9">
                                <input name="target_waktu" type="date" class="form-control" value="<?= $key->target_waktu ?>" id="target_waktu" >
                              </div>
                            </div>

                            <div class="row mb-3">
                              <label for="Country" class="col-md-4 col-lg-3 col-form-label">Anggaran</label>
                              <div class="col-md-8 col-lg-9">
                                <input name="anggaran" type="text" class="form-control" value="<?= $key->anggaran ?>" id="anggaran" >
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

           

           <a   href="<?php echo site_url('admin/proker/delete/'.$key->id_proker) ?>" class="btn btn-danger btn-sm " onclick="return confirm('Apakah Anda Yakin Akan Menghapus!')"><i class="bi bi-trash"></i> Hapus</a>







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