 <main id="main" class="main">
    <div class="pagetitle">
        <h1>Data Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= site_url('admin/dashboard_admin') ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= site_url('admin/pengumuman') ?>">pengumuman</a></li>
                <li class="breadcrumb-item active">Edit pengumuman</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <?php echo $this->session->flashdata('pesan') ?>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data pengumuman</h5>

                        <?= form_open_multipart('admin/pengumuman/update') ?>

                        <input type="hidden" name="id_pengumuman" value="<?php echo $pengumuman[0]->id_pengumuman; ?>">


                        <div class="row mb-3">
                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama Pengumuman</label>
                            <div class="col-md-8 col-lg-9">
                                <textarea class="form-control" name="nama_pengumuman"><?= $pengumuman[0]->nama_pengumuman; ?></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="summernote" class="col-md-4 col-lg-3 col-form-label">Isi Pengumuman</label>
                            <div class="col-md-8 col-lg-9">
                                <textarea class="form-control" id="content2" name="isi_pengumuman"><?= $pengumuman[0]->isi_pengumuman; ?></textarea>
                            </div>
                        </div>


                       

                        <input type="hidden" name="foto_pengumuman_old" value="<?php echo $pengumuman[0]->foto_pengumuman; ?>">
                        <div class="row mb-3">
                          <label for="pengumumanImage" class="col-md-4 col-lg-3 col-form-label">Foto Pengumuman</label>
                          <div class="col-md-8 col-lg-9">

                            <img width="200px" height="200px;" src="<?php echo base_url('uploads/foto_pengumuman/').$pengumuman[0]->foto_pengumuman; ?>" alt="pengumuman">
                            <div class="pt-2">
                                <input type="file" name="foto_pengumuman" class="form-control">

                            </div>
                        </div>
                    </div>



                    <div class="text-center">
                        <!-- Tombol Submit -->
                        <button type="submit" class="btn btn-primary">Edit Data</button>
                    </div>

                    <?= form_close(); ?>

                </div>
            </div>
        </div>
    </div>
</section>
    </main><!-- End #main -->