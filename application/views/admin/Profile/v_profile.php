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
            <h5 class="card-title">Data profile</h5>
            <button type="button" data-bs-toggle="modal" data-bs-target="#tambahdata" class="btn btn-primary btn-sm"><i class="bi bi-plus-square"></i> Tambah Data</button><br>

            <div class="modal fade" id="tambahdata" tabindex="-1">
              <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Tambah Data profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <?= form_open_multipart('admin/profile/tambah') ?>
                    



                    <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label" for="summernote" class="form-label">Sambutan Ketua</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea class="form-control" id="content2" name="sambutan_ketua"><?= set_value('sambutan_ketua') ?></textarea>
                        <?php echo form_error('sambutan_ketua', '<div class="text-danger mt-2">', '</div>'); ?>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Visi</label>
                      <div class="col-md-8 col-lg-9">
                        <input autocomplete="off" name="visi" type="text" class="form-control" id="visi" >
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Misi</label>
                      <div class="col-md-8 col-lg-9">
                        <input autocomplete="off" name="misi" type="text" class="form-control" id="misi" >
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Tujuan</label>
                      <div class="col-md-8 col-lg-9">
                        <input autocomplete="off" name="tujuan" type="text" class="form-control" id="tujuan" >
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label" for="summernote" class="form-label">Tugas Pokok dan Fungsi</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea class="form-control" id="content2" name="sambutan_ketua"><?= set_value('sambutan_ketua') ?></textarea>
                        <?php echo form_error('sambutan_ketua', '<div class="text-danger mt-2">', '</div>'); ?>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-md-4 col-lg-3 col-form-label" for="summernote" class="form-label">Struktur Organisasi</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea class="form-control" id="content2" name="sambutan_ketua"><?= set_value('sambutan_ketua') ?></textarea>
                        <?php echo form_error('sambutan_ketua', '<div class="text-danger mt-2">', '</div>'); ?>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Foto Struktur Organisasi</label>
                      <div class="col-md-8 col-lg-9">

                        <div class="pt-2">
                          <input type="file" name="file_struktur" class="form-control" >
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
                  <th scope="col">Visi</th>
                  <th scope="col">Misi</th>
                  <th scope="col">Deskripsi</th>
                  <th scope="col">Kategori</th>
                  <th scope="col">Waktu</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>

                <?php if($profile){  $no=1; foreach($profile as $key){ ?>

                  <tr>

                   <td><?php echo $no; ?></td>

                   <td>
                    <a target="_blank" href="<?php echo site_url('uploads/file_struktur/').$key->file_struktur; ?>" alt="Profile" >
                      <i class="bi bi-file-earmark-text-fill" style="font-size: 4em;"></i> 
                    </a>
                    <!-- <br> <?= $key->file_struktur; ?> -->
                  </td>

                  <td><?php echo $key->nama_profile; ?></td>

                  <td><?php echo $key->deskripsi_profile; ?></td>

                  <td><?php echo $key->kategori_profile; ?></td>

                  <td><?php echo $key->waktu; ?></td>

                  <td>





                    <a   href="<?php echo site_url('admin/profile/edit/'.$key->id_profile) ?>" class="btn btn-info btn-sm "><i class="bi bi-pen-fill"></i> Edit</a>


                    <a   href="<?php echo site_url('admin/profile/delete/'.$key->id_profile) ?>" class="btn btn-danger btn-sm " onclick="return confirm('Apakah Anda Yakin Akan Menghapus!')"><i class="bi bi-trash"></i> Hapus</a>







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