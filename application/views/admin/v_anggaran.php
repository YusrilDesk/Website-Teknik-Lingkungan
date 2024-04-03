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
            <h5 class="card-title">Data Anggaran</h5>
            <button type="button" data-bs-toggle="modal" data-bs-target="#tambahdata" class="btn btn-primary btn-sm"><i class="bi bi-plus-square"></i> Tambah Data</button><br>

            <div class="modal fade" id="tambahdata" tabindex="-1">
              <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Tambah Data anggaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <?= form_open_multipart('admin/anggaran/tambah') ?>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Jenis Anggaran</label>
                      <div class="col-md-8 col-lg-9">
                        <select name="nama_anggaran" class="form-control" id="nama_anggaran" required="required">
                          <option value="Pagu Universitas">Pagu Universitas</option>
                          <option value="Anggaran Mandiri">Anggaran Mandiri</option>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Kredit</label>
                      <div class="col-md-8 col-lg-9">
                        <input autocomplete="off" name="kredit" type="number" class="form-control" id="kredit">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Debit</label>
                      <div class="col-md-8 col-lg-9">
                        <input autocomplete="off" name="debit" type="number" class="form-control" id="debit">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Kegiatan</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea class="form-control" required="required" name="kegiatan"></textarea>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Waktu Pelaksanaan</label>
                      <div class="col-md-8 col-lg-9">
                        <input autocomplete="off" name="waktu" type="date" class="form-control" id="waktu" required="required">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Divisi</label>
                      <div class="col-md-8 col-lg-9">
                        <select class="form-select" aria-label="Default select example" name="tbl_divisi" autocomplete="off" required="required">
                          <option value="">Pilih Divisi:</option>
                          <?php foreach ($divisi as $row) : ?>
                            <option value="<?= $row->id_divisi; ?>"><?= $row->nama_divisi; ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                    </div>



                    <!-- Tambahkan elemen tambahan di sini -->

                    <div class="text-center">
                      <!-- Konten tambahan di sini -->
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
                  <th scope="col">Nama Anggaran</th>
                  <th scope="col">Kredit</th>
                  <th scope="col">Debit</th>
                  <th scope="col">Saldo</th>
                  <th scope="col">Kegiatan</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>

                <?php $no = 1;  if($anggaran) { foreach($anggaran as $key) { ?>

                  <tr>

                   <td><?php echo $no; ?></td>

                   <td><?php echo $key->nama_anggaran; ?></td>

                   <td>RP.<?php echo $key->kredit; ?></td>

                   <td>RP.<?php echo $key->debit; ?></td>
                   <td>RP.<?php echo $key->jumlah_anggaran; ?></td>

                   <td><?php echo $key->kegiatan; ?></td>

                   <td>





                    <button type="button" data-bs-toggle="modal" data-bs-target="#editdata<?php echo($no); ?>" class="btn btn-info btn-sm"><i class="bi bi-pencil"></i> Ubah</button>

                    <div class="modal fade" id="editdata<?php echo($no); ?>" tabindex="-1">
                      <div class="modal-dialog modal-lg modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Edit Data anggaran</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <?= form_open_multipart('admin/anggaran/update') ?>

                            <input type="hidden" name="id_anggaran" value="<?php echo $key->id_anggaran; ?>">


                            <div class="row mb-3">
                              <label for="jenis_anggaran" class="col-md-4 col-lg-3 col-form-label">Jenis Anggaran</label>
                              <div class="col-md-8 col-lg-9">
                                <select name="nama_anggaran" class="form-control" id="nama_anggaran" required>
                                  <option value="Pagu Universitas" <?= ($key->nama_anggaran == 'Pagu Universitas') ? 'selected' : ''; ?>>Pagu Universitas</option>
                                  <option value="Anggaran Mandiri" <?= ($key->nama_anggaran == 'Anggaran Mandiri') ? 'selected' : ''; ?>>Anggaran Mandiri</option>
                                </select>
                              </div>
                            </div>

                            <div class="row mb-3">
                              <label for="company" class="col-md-4 col-lg-3 col-form-label">Kredit</label>
                              <div class="col-md-8 col-lg-9">
                                <input type="number" name="kredit" class="form-control" id="kredit" value="<?= $key->kredit ?>">
                              </div>
                            </div>

                            <div class="row mb-3">
                              <label for="company" class="col-md-4 col-lg-3 col-form-label">Debit</label>
                              <div class="col-md-8 col-lg-9">
                                <input type="number" name="debit" class="form-control" id="debit" value="<?= $key->debit ?>">
                              </div>
                            </div>

                            <div class="row mb-3">
                              <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Kegiatan</label>
                              <div class="col-md-8 col-lg-9">
                                <input autocomplete="off" name="kegiatan" type="text" value="<?= $key->kegiatan ?>" class="form-control" id="kegiatan">
                              </div>
                            </div>

                            <div class="row mb-3">
                              <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Waktu Pelaksanaan</label>
                              <div class="col-md-8 col-lg-9">
                                <input autocomplete="off" name="waktu" type="date" value="<?= $key->waktu ?>" class="form-control" id="waktu" >
                              </div>
                            </div>

                            <div class="row mb-3">
                              <label for="Country" class="col-md-4 col-lg-3 col-form-label">Divisi</label>
                              <div class="col-md-8 col-lg-9">
                                <select class="form-select" aria-label="Default select example" name="tbl_divisi" autocomplete="off" required="required">
                                  <option value="">Pilih Divisi :</option>
                                  <?php foreach ($divisi as $row) : ?>
                                    <option value="<?= $row->id_divisi; ?>" <?php if ($row->id_divisi == $key->id_divisi) echo 'selected'; ?>>
                                      <?= $row->nama_divisi; ?>
                                    </option>
                                  <?php endforeach ?>
                                </select>
                              </div>
                            </div>





                            <div class="text-center">



                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Edit Data</button>
                            </div>
                            <?= form_close(); ?>
                          </div>
                        </div>
                      </div>
                    </div>


                    <a   href="<?php echo site_url('admin/anggaran/delete/'.$key->id_anggaran) ?>" class="btn btn-danger btn-sm " onclick="return confirm('Apakah Anda Yakin Akan Menghapus!')"><i class="bi bi-trash"></i> Hapus</a>







                  </td>

                  <div>



                  </div>

                </tr>







                <?php 
                $no++; 
              }
            } else {
              echo '<tr><td colspan="5">Tidak ada ditemukan</td></tr>';
            }
            ?>



          </tbody>  
        </table>
        <!-- End Table with stripped rows -->

      </div>
    </div>

  </div>
</div>
</section>

</main><!-- End #main -->

