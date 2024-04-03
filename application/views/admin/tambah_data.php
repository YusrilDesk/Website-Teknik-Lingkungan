<div class="container-fluid">
  <strong><?= ucwords($title); ?></strong><hr>
  <div class="alert alert-success" role="alert">
    <a href="<?php echo site_url('dashboard') ?>">
      <span><i class="fa fa-tachometer-alt" aria-hidden="true"></i> <?= strtoupper('dashboard |'); ?></span>
    </a>
    <a href="<?php echo site_url('admin/bebas_tunggakan') ?>">
      <span><i class="fas fa-fw fa-credit-card" ></i> <?= strtoupper('bebas tunggakan '); ?></span>
    </a>
  </div>

  <?php if($this->session->flashdata('pesan')){echo $this->session->flashdata('pesan');}?>

  <form method="post" action="<?php echo site_url('admin/bebas_tunggakan/create'); ?>">
    <div class="form-group">
      <label class="col-sm-2 control-label">Nama</label>
      <div class="col-sm-4">
        <input type="text" name="nama" class="form-control" value="" placeholder="Nama" required>
        
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Nim</label>
      <div class="col-sm-4">
        <input type="text" name="nim" class="form-control" value="" placeholder="Nim" required>
        
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Program Studi</label>
      <div class="col-sm-4">
        <input type="text" name="program_studi" class="form-control" value="" placeholder="Program Studi" required>

      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Tahun Pembelajaran</label>
      <div class="col-sm-4">
        <input type="text" name="tahun_pembelajaran" class="form-control" value="" placeholder="Tahun Pembelajaran" required>

      </div>
    </div>

      <div class="form-group">
      <label class="col-sm-2 control-label">Alamat</label>
      <div class="col-sm-4">
        <input type="text" name="alamat" class="form-control" value="" placeholder="alamat" required>

      </div>
    </div>


    <div class="form-group">
      <div class="col-sm-4">
        <button type="submit" class="btn btn-primary ">Submit</button>
      </div>
    </div>
  </form>

</div>