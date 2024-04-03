<main id="main" class="main">

  <div class="pagetitle">
    <h1>Profile</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item active">Profile</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="<?php echo base_url('./uploads/foto_admin/').$data_admin->foto_admin; ?>" alt="Profile" class="rounded-circle">
            <h2><?= $data_admin->nama ?></h2>
            <div class="social-links mt-2">

            </div>
          </div>
        </div>

      </div>

      <div class="col-xl-8">
        <?php echo $this->session->flashdata('pesan') ?>
        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Tambah Admin</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Edit Admin</button>
              </li>

              

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">


                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Nama</div>
                  <div class="col-lg-9 col-md-8"><?= $data_admin->nama ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">username</div>
                  <div class="col-lg-9 col-md-8"><?= $data_admin->username ?></div>
                </div>
              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <?= form_open_multipart('admin/pengguna/tambah') ?> 


                <input type="hidden" name="id" value="<?php echo $data_admin->id; ?>">

                <input type="hidden" name="foto_admin_old" value="<?php echo $data_admin->foto_admin; ?>">

                <div class="row mb-3">
                  <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                  <div class="col-md-8 col-lg-9">
                    <img src="assets/img/profile-img.jpg" alt="Profile">
                    <div class="pt-2">
                      <button type="button" id="uploadButton" onclick="showFileInput()" class="btn btn-primary btn-sm"><i class="bi bi-upload"></i></button>
                      <input type="file" name="foto_admin" id="fileInput" style="display: none;">
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama</label>
                  <div class="col-md-8 col-lg-9">
                    <input autocomplete="off" name="nama" type="text" class="form-control" id="nama">
                  </div>
                </div>



                <div class="row mb-3">
                  <label for="company" class="col-md-4 col-lg-3 col-form-label">Username</label>
                  <div class="col-md-8 col-lg-9">
                    <input autocomplete="off" name="username" type="text" class="form-control" id="username" >
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Country" class="col-md-4 col-lg-3 col-form-label">Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="password" type="text" class="form-control" id="password" >
                  </div>
                </div>



                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Tambah Data</button>
                </div>
                <?= form_close(); ?> <!-- End Profile Edit Form -->

              </div>

              <div class="tab-pane fade pt-3" id="profile-settings">

                <!-- Settings Form -->
                <!-- Profile Edit Form -->
                <?= form_open_multipart('admin/pengguna/update') ?> 


                <input type="hidden" name="id" value="<?php echo $data_admin->id; ?>">

                <input type="hidden" name="foto_admin_old" value="<?php echo $data_admin->foto_admin; ?>">

                <div class="row mb-3">
                  <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                  <div class="col-md-8 col-lg-9">
                    <img width="100px" height="100" src="<?php echo base_url('uploads/foto_admin/').$data_admin->foto_admin; ?>" alt="Profile">
                    <div class="pt-2">
                      <button type="button" id="uploadButton" onclick="showFileInput2()" class="btn btn-primary btn-sm"><i class="bi bi-upload"></i></button>
                      <input type="file" name="foto_admin" id="fileInput2" style="display: none;">
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama</label>
                  <div class="col-md-8 col-lg-9">
                    <input autocomplete="off" name="nama" type="text" class="form-control" id="nama" value="<?= $data_admin->nama ?>">
                  </div>
                </div>



                <div class="row mb-3">
                  <label for="company" class="col-md-4 col-lg-3 col-form-label">Username</label>
                  <div class="col-md-8 col-lg-9">
                    <input autocomplete="off" name="username" type="text" class="form-control" id="username" value="<?= $data_admin->username ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Country" class="col-md-4 col-lg-3 col-form-label">Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="password" type="password" class="form-control" id="password" value="<?= $data_admin->password ?>">
                  </div>
                </div>



                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Edit Data</button>
                </div>
                <?= form_close(); ?><!-- End settings Form -->

              </div>



            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>

  </main><!-- End #main -->