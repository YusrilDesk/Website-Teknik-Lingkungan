 <main id="main" class="main">
        <div class="pagetitle">
            <h1>Data Tables</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= site_url('admin/dashboard_admin') ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= site_url('admin/berita') ?>">Berita</a></li>
                    <li class="breadcrumb-item active">Edit Berita</li>
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

                            <form action="<?= base_url('admin/berita/edit/'.$berita->id_berita) ?>" id="validation-form" method="post" enctype="multipart/form-data">
                                
                                
                                <div class="row mb-3">
                                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Foto</label>
                                    <div class="col-md-8 col-lg-9">
                                        <img width="140px" height="80px;" src="<?php echo base_url('uploads/foto_berita/').$berita->foto_berita; ?>" alt="Profile">
                                        <div class="pt-2">
                                            <input type="file" name="foto_berita" class="form-control">
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama Berita</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input autocomplete="off" name="nama_berita" type="text" class="form-control" id="nama_berita" value="<?= $berita->nama_berita ?>">
                                       
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-4 col-lg-3 col-form-label" for="summernote" class="form-label">Isi Berita</label>
                                    <div class="col-md-8 col-lg-9">
                                        <textarea class="form-control" id="content2" name="isi_berita">
                                            <?= $berita->isi_berita; ?>
                                        </textarea>
                                        
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Country" class="col-md-4 col-lg-3 col-form-label">Status Berita (aktif/tidak aktif)</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="status_berita" type="text" class="form-control" id="status_berita" value="<?= $berita->status_berita ?>">
                                       
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Country" class="col-md-4 col-lg-3 col-form-label">Divisi</label>
                                    <div class="col-md-8 col-lg-9">
                                        <select name="tbl_divisi" class="form-control">
                                            <option value="">--pilih--</option>
                                            <?php foreach($kategori as $row ) : ?>
                                                <option value="<?= $row->id_divisi; ?>" <?php if($berita->id_divisi == $row->id_divisi) {echo "selected";} ?> ><?= $row->nama_divisi; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        
                                    </div>
                                </div>

                                <div class="text-center">
                                    <!-- Tombol Submit -->
                                    <button type="submit" class="btn btn-primary">Edit Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->