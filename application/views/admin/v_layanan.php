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
            <h5 class="card-title">Data Layanan</h5>


            
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama Pelanggan</th>
                  <th scope="col">Asal Pelanggan</th>
                  <th scope="col">Jenis Layanan</th>
                  <th scope="col">Status Pengajuan</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>

                <?php if($layanan){  $no=1; foreach($layanan as $key){ ?>

                  <tr>

                   <td><?php echo $no; ?></td>
                   <td><?php echo $key->nama_pelanggan; ?></td>
                   <td><?php echo $key->asal_pelanggan; ?></td>
                   <td><?php echo $key->jenis_layanan; ?></td>
                   <td>
                    <?php if ($key->status_pengajuan == "dalam proses"): ?>
                      <div class="spinner-border spinner-border-sm text-warning" role="status_pengajuan">

                      </div> Dalam Proses
                    <?php elseif ($key->status_pengajuan == "disetujui"): ?>
                      <i class="bi bi-check2-square text-success" aria-hidden="true"></i> Disetujui
                    <?php elseif ($key->status_pengajuan == "ditolak"): ?>
                      <i class="bi bi-x-square text-danger"></i> Ditolak
                    <?php elseif ($key->status_pengajuan == "selesai"): ?>
                      <i class="bi bi-x-square text-danger"></i> Selesai
                    <?php endif ?>
                  </td>

                  <td>




                    <button type="button" data-bs-toggle="modal" data-bs-target="#editdata<?php echo($no); ?>" class="btn btn-info btn-sm"><i class="bi bi-pencil"></i> Ubah Status</button>

                    <div class="modal fade" id="editdata<?php echo($no); ?>" tabindex="-1">
                      <div class="modal-dialog modal-lg modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Detail Data Layanan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <?= form_open_multipart('admin/layanan/detail') ?>
                            <input type="hidden" name="id_layanan" value="<?php echo $key->id_layanan; ?>">

                            <div class="row mb-3">
                              <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama</label>
                              <div class="col-md-8 col-lg-9">
                                <input autocomplete="off" name="nama_pelanggan" type="text" class="form-control" id="nama_pelanggan" value="<?= $key->nama_pelanggan ?>" disabled>
                              </div>
                            </div>

                            <div class="row mb-3">
                              <label for="company" class="col-md-4 col-lg-3 col-form-label">Asal Pelanggan</label>
                              <div class="col-md-8 col-lg-9">
                                <input autocomplete="off" name="asal_pelanggan" type="text" class="form-control" id="asal_pelanggan" value="<?= $key->asal_pelanggan ?>" disabled>
                              </div>
                            </div>

                            <div class="row mb-3">
                              <label for="Country" class="col-md-4 col-lg-3 col-form-label">Nomor Telp</label>
                              <div class="col-md-8 col-lg-9">
                                <input name="no_telp" type="text" class="form-control" id="no_telp" value="<?= $key->no_telp ?>" disabled>
                              </div>
                            </div>

                            <div class="row mb-3">
                              <label for="Country" class="col-md-4 col-lg-3 col-form-label">Jenis Layanan</label>
                              <div class="col-md-8 col-lg-9">
                                <input name="jenis_layanan" type="text" class="form-control" id="jenis_layanan" value="<?= $key->jenis_layanan ?>" disabled>
                              </div>
                            </div>

                            <div class="row mb-3">
                              <label for="Country" class="col-md-4 col-lg-3 col-form-label">Deskripsi Layanan</label>
                              <div class="col-md-8 col-lg-9">
                                <input name="deskripsi_layanan" type="text" class="form-control" id="deskripsi_layanan" value="<?= $key->deskripsi_layanan ?>" disabled>
                              </div>
                            </div>

                            <div class="row mb-3">
                              <label for="Country" class="col-md-4 col-lg-3 col-form-label">Tanggal Pengajuan</label>
                              <div class="col-md-8 col-lg-9">
                                <input name="tanggal_pengajuan" type="text" class="form-control" id="tanggal_pengajuan" value="<?= $key->tanggal_pengajuan ?>" disabled>
                              </div>
                            </div>

                            <div class="row mb-3">
                              <label for="Country" class="col-md-4 col-lg-3 col-form-label">Status Pengajuan</label>
                              <div class="col-md-8 col-lg-9">
                               <select name="status_pengajuan" class="form-select">
                                  <option value="" >Pilih Status Pengajuan :</option>
                                  <option value="dalam proses" <?= $key->status_pengajuan == "dalam proses" ? "selected" : "" ?>>Dalam Proses</option>
                                  <option value="disetujui" <?= $key->status_pengajuan == "disetujui" ? "selected" : "" ?>>Disetujui</option>
                                  <option value="ditolak" <?= $key->status_pengajuan == "ditolak" ? "selected" : "" ?>>Ditolak</option>
                                  <option value="selesai" <?= $key->status_pengajuan == "selesai" ? "selected" : "" ?>>Selesai</option>
                                </select>
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




                    <a   href="<?php echo site_url('admin/layanan/delete/'.$key->id_layanan) ?>" class="btn btn-danger btn-sm " onclick="return confirm('Apakah Anda Yakin Akan Menghapus!')"><i class="bi bi-trash"></i> Hapus</a>







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