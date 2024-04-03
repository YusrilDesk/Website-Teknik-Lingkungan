<div class="container-fluid">
  <strong><?= ucwords($title); ?></strong><hr>
  <div class="alert alert-success" role="alert">
    <a href="<?php echo site_url('dashboard') ?>">
      <span><i class="fa fa-tachometer-alt" aria-hidden="true"></i> <?= strtoupper('dashboard |'); ?></span>
    </a>
    <a href="<?php echo site_url('admin/bebas_tunggakan') ?>">
      <span><i class="fas fa-fw fa-credit-card" ></i> <?= strtoupper('Data Tunggakan '); ?></span>
    </a>
  </div>

  <?php if($this->session->flashdata('pesan')){echo $this->session->flashdata('pesan');}?>

  <form method="post" action="<?php echo base_url().'admin/bebas_tunggakan/update'; ?>">
    <div class="form-group" >
      <input type="hidden" name="id_tunggakan" class="form-control" required="required" value="<?php echo $tunggakan[0]->id_tunggakan; ?>">
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Nama</label>
      <div class="col-sm-4">
        <input type="text" name="nama" class="form-control" value="<?php echo $tunggakan[0]->nama; ?>" placeholder="Nama" autocomplete="on" required="required">
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Nim</label>
      <div class="col-sm-4">
        <input type="text" name="nim" class="form-control" value="<?php echo $tunggakan[0]->nim; ?>" placeholder="nim" autocomplete="off" required="required"> 
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Program Studi</label>
      <div class="col-sm-4">
        <input type="text" name="program_studi" class="form-control" value="<?php echo $tunggakan[0]->program_studi; ?>" placeholder="program studi" autocomplete="off" required="required"> 
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Tahun Pembelajaran</label>
      <div class="col-sm-4">
        <input type="text" name="tahun_pembelajaran" class="form-control" value="<?php echo $tunggakan[0]->tahun_pembelajaran; ?>" placeholder="tahun pembelajaran" autocomplete="off" required="required">
      </div>
    </div>

     <div class="form-group">
      <label class="col-sm-2 control-label">Alamat</label>
      <div class="col-sm-4">
        <input type="text" name="tahun_pembelajaran" class="form-control" value="<?php echo $tunggakan[0]->alamat; ?>" placeholder="tahun pembelajaran" autocomplete="off" required="required">
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-4">
        <button type="submit" class="btn btn-primary ">Submit</button>
      </div>
    </div>
  </form>

</div>