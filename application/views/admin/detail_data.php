<div class="container-fluid">
  <strong><?= ucwords($title); ?></strong><hr>
  <div class="alert alert-success" role="alert">
    <a href="<?php echo site_url('dashboard') ?>">
      <span><i class="fa fa-tachometer-alt" aria-hidden="true"></i> <?= strtoupper('dashboard |'); ?></span>
    </a>
    <a href="<?php echo site_url('admin/bebas_tunggakan') ?>">
      <span><i class="fas fa-fw fa-credit-card" ></i> <?= strtoupper('Bebas tunggakan '); ?></span>
    </a>
  </div>

  <?php if($this->session->flashdata('pesan')){echo $this->session->flashdata('pesan');}?>
  <div class="row ">


    <div class="col-md-5 ">

      <div class="card shadow mb-3 ">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
        </div>
        <div class="card-body">
          <div class="row align-items-center justify-content-center" style="background-image: url('<?= base_url('assets/img/bg.png') ?>'); background-size: cover; background-attachment: fixed; background-repeat: no-repeat;">
            <img src="<?php echo base_url('./uploads/foto_mhs/').$detail[0]->foto_mhs; ?> ?>" class="rounded-circle img-fluid p-2" onerror="imgError(this);" style="width: 140px; height: 140px; ">

          </div>


          <div class="align-items-center justify-content-center p-2">
            <div class="form-group row ml-1">
              <b for="staticEmail" class="col-sm-4 col-form-label">Nama</b>
              <div class="col-sm-8">
               <?php echo $detail[0]->nama_mahasiswa; ?>
             </div>
           </div>

           <div class="form-group row ml-1">
            <b for="staticEmail" class="col-sm-4 col-form-b">Nim</b>
            <div class="col-sm-8">
             <?php echo $detail[0]->nim_mahasiswa; ?>
           </div>
         </div>

         <div class="form-group row ml-1">
          <b for="staticEmail" class="col-sm-4 col-form-b">Program Studi</b>
          <div class="col-sm-8">
           <?php echo $detail[0]->kode_jurusan_mahasiswa; ?>
         </div>
       </div>

       <div class="form-group row ml-1">
        <b for="staticEmail" class="col-sm-4 col-form-b">Tahun Lulus</b>
        <div class="col-sm-8">
         <?php echo $detail[0]->sejak_tanggal; ?>
       </div>
     </div>

     <div class="form-group row ml-1">
      <b for="staticEmail" class="col-sm-4 col-form-b">Status</b>
      <div class="col-sm-8">
        <?php echo $detail[0]->status_tunggakan; ?>
      </div>
    </div>
  </div>

</div>
</div>
</div>



<div class="col-md-7">
  <div class="card shadow mb-3">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Dokumen</h6>
    </div>
    <div class="card-body">




      <div class="col-12 ml-1">
        <b>Upload Surat Bebas Tunggakan</b>
        <p>Silahkan Upload Keterangan Bebas tunggakan, Jika Mahasiswa Masih Memiliki Pinjaman Maka Silakan Di Tolak</p>

        <div class="table borderless">
          <table class="table borderless">
            <?php if ($detail[0]->bukti_bayar){ ?>
             <tr>
               <th>Bukti Pembayaran</th>
               <td><a href="<?php echo base_url('uploads/file_bukti_bayar/'.$detail[0]->bukti_bayar); ?>" target="_blank"><i class="fa fa-file"></i> lihat</a></td>
             </tr>
           <?php }else {?>
            <tr>
             <th>Bukti Pembayaran</th>
             <td><i class="fa fa-file"></i> Belum Ada</a></td>
           </tr>
         <?php } ?>

       </table>
     </div>


     <?= form_open_multipart('pengusulan_tunggakan/upload') ?>



     <div class="form-group custom-file mt-2 ml-1" >
      <input type="hidden" name="id_tunggakan" value="<?php echo $detail[0]->id_tunggakan ?>">
      <input type="hidden" name="id_mahasiswa" value="<?php echo $detail[0]->id_mahasiswa ?>">
      <label class="mt-2"><b>Link File Bebas Tunggakan</b></label>
      <div class="custom-file">
        <input  type="text" class="form-control" name="file_tunggakan" value="<?php echo $detail[0]->file_tunggakan; ?>" >
      </div>
    </div>

    <div class=" text-right mt-5">

      <button type= "button"class="btn btn-danger" data-toggle="modal" data-target="#tolak"> Tolak</button>
      <button type="submit" class="btn btn-primary">Kirim</button>


    </div>

    <?php echo form_close(); ?>



  </div>






</div>
</div>
</div>

<div class="modal fade" id="tolak">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Data Ditolak </h4>
      </div>
      <form method="post" action="<?php echo site_url('pengusulan_tunggakan/ditolak') ?>">
        <div class="modal-body text-center">
          <div class="form-group">
            <input type="hidden" name="id_tunggakan" value="<?php echo $detail[0]->id_tunggakan ?>">
            <input type="hidden" name="id_mahasiswa" value="<?php echo $detail[0]->id_mahasiswa ?>">
            <label for="exampleFormControlTextarea1">Keterangan</label>
            <textarea name="komentar" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>

        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Kirim</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>




</div>


