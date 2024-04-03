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
            <h5 class="card-title">Data Laporan</h5>
            <button type="button" data-bs-toggle="modal" data-bs-target="#tambahdata" class="btn btn-primary btn-sm"><i class="bi bi-plus-square"></i> Tambah Data</button><br>

            <div class="modal fade" id="tambahdata" tabindex="-1">
              <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Tambah laporan_kinerja DSTI</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?= form_open_multipart('admin/laporan_kinerja/tambah') ?>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama Dokumen</label>
                      <div class="col-md-8 col-lg-9">
                        <input autocomplete="off" name="nama_dokumen" type="text" class="form-control" id="nama_dokumen">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="Country" class="col-md-4 col-lg-3 col-form-label">Jenis Dokumen</label>
                    <div class="col-md-8 col-lg-9">
                        <select class="form-select" aria-label="Default select example" name="jenis_dokumen" autocomplete="off" required="required">
                            <option value=""> Pilih kategori : </option>
                            <?php 
                            $kategori = array('Laporan Kinerja','Rencana Kerja Tahunan','Rencana Strategis');
                            foreach ($kategori as $kategori_item) {
                                $selected = ($key->jenis_dokumen == $kategori_item) ? 'selected' : '';
                                echo '<option value="'.$kategori_item.'" '.$selected.'>'.$kategori_item.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="company" class="col-md-4 col-lg-3 col-form-label">File Dokumen</label>
                    <div class="col-md-8 col-lg-9">
                        <input autocomplete="off" name="file_dokumen" type="text" class="form-control" id="file_dokumen" >
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
      <th scope="col">File Dokumen</th>
      <th scope="col">Nama</th>
      <th scope="col">Jenis Dokumen</th>
      <th scope="col">Waktu</th>
      <th scope="col">Aksi</th>
  </tr>
</thead>
<tbody>

    <?php if($laporan){  $no=1; foreach($laporan as $key){ ?>

      <tr>

       <td><?php echo $no; ?></td>

       <td>
        <a target="_blank" href="<?= $key->file_dokumen ?>" alt="Profile" >
          <i class="bi bi-file-earmark-text-fill" style="font-size: 4em;"></i> 
      </a>

  </td>
  <td><?php echo $key->nama_dokumen; ?></td>

  <td><?php echo $key->jenis_dokumen; ?></td>

  <td><?php echo $key->waktu; ?></td>

  <td>





    <button type="button" data-bs-toggle="modal" data-bs-target="#editdata<?php echo($no); ?>" class="btn btn-info btn-sm"><i class="bi bi-pen-fill"></i> Edit Data</button>

    <div class="modal fade" id="editdata<?php echo($no); ?>" tabindex="-1">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Laporan Dokumen DSTI</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <?= form_open_multipart('admin/laporan_kinerja/update') ?>
            <input type="hidden" name="id_laporan" value="<?php echo $key->id_laporan; ?>">


            <div class="row mb-3">
              <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama</label>
              <div class="col-md-8 col-lg-9">
                <input autocomplete="off" name="nama_dokumen" type="text" class="form-control" id="nama_dokumen" value="<?= $key->nama_dokumen ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label for="Country" class="col-md-4 col-lg-3 col-form-label">Jenis Dokumen</label>
            <div class="col-md-8 col-lg-9">
                <select class="form-select" aria-label="Default select example" name="jenis_dokumen" autocomplete="off" required="required">
                    <option value=""> Pilih kategori : </option>
                    <?php 
                    $kategori = array('Laporan Kinerja','Rencana Kerja Tahunan','Rencana Strategis');
                    foreach ($kategori as $kategori_item) {
                        $selected = ($key->jenis_dokumen == $kategori_item) ? 'selected' : '';
                        echo '<option value="'.$kategori_item.'" '.$selected.'>'.$kategori_item.'</option>';
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label for="company" class="col-md-4 col-lg-3 col-form-label">File Dokumen</label>
            <div class="col-md-8 col-lg-9">
                <input autocomplete="off" name="file_dokumen" type="text" class="form-control" id="file_dokumen" value="<?= $key->file_dokumen ?>">
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





<!--   <a href="<?php echo site_url('admin/bebas_tunggakan/edit/'.$key->id_tunggakan) ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a> -->



<!--  <a   href="<?php echo site_url('admin/bebas_tunggakan/delete/'.$key->id_tunggakan) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> -->





           <!--   <?php if ($key->status_tunggakan != 'di tolak' and $key->status_tunggakan != 'di terima'){ ?>





              <button data-toggle="modal" data-target="#tolak<?= $key->id_tunggakan; ?>" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Tolak</button>



             <?php }?>

         -->



         <a   href="<?php echo site_url('admin/laporan_kinerja/delete/'.$key->id_laporan) ?>" class="btn btn-danger btn-sm " onclick="return confirm('Apakah Anda Yakin Akan Menghapus!')"><i class="bi bi-trash"></i> Hapus</a>







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