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
            <h5 class="card-title">Data Berita</h5>

            
            <a href="<?= site_url('admin/berita/tambah') ?>"  class="btn btn-primary btn-sm"><i class="bi bi-plus-square"></i> Tambah Data</a>


            <!-- <?= form_open("admin/berita/tambahview"); ?>

            <input type="hidden" name="id_berita" required="required" value="<?php echo $key->id_berita; ?>">

            <button type="submit" class="btn btn-info btn-sm"><i class="bi bi-pen-fill"></i> Tambah Data</button>

            <?= form_close(); ?> --> <!-- Jika tambah data ingin pindah halaman tentu dengan fungsi menambahkan berita lebih kompleks -->

            
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Foto Berita</th>
                  <th scope="col">Nama Berita</th>
                  <th scope="col">Status Berita</th>
                  <th scope="col">Jenis Berita</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>

                <?php if($berita){  $no=1; foreach($berita as $key){ ?>

                  <tr>

                   <td><?php echo $no; ?></td>

                   <td><img width="80px" height="80px" src="<?php echo base_url('uploads/foto_berita/').$key->foto_berita; ?>" alt="Profile" class="rounded-circle"></td>
                   <td><?php echo $key->nama_berita; ?></td>

                   <td><?php echo $key->status_berita; ?></td>
                   <td><?php echo $key->nama_divisi; ?></td>

                   <td>




                    <a href="<?= site_url('admin/berita/edit/'.$key->id_berita) ?>"  class="btn btn-primary btn-sm"><i class="bi bi-pen-fill"></i> Edit Data</a>






                    <a   href="<?php echo site_url('admin/berita/hapus/'.$key->id_berita) ?>" class="btn btn-danger btn-sm " onclick="return confirm('Apakah Anda Yakin Akan Menghapus!')"><i class="bi bi-trash"></i> Hapus</a>







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