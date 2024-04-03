<?php

class Layanan extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('M_lengkap');
    $this->load->model('Kategori_model');
    $this->load->library('upload');

  }

  public function index()
  {
    $data['title'] = 'layanan';
    $this->load->view('template_user/header_user', $data);
    $this->load->view('template_user/topbar_user', $data);
    $this->load->view('landing_page/layanan/v_layanan', $data);
    $this->load->view('template_user/footer_user', $data);
  }

  public function tampilkanForm()
  {
    $statusPengguna = $this->input->post('status_pengguna');
    $data['title'] = 'layanan';
    $data['layanan'] = $this->Kategori_model->get_kategori_layanan();

    // Periksa status_pengguna dan pilih tampilan yang sesuai
    if ($statusPengguna == 'mahasiswa' || $statusPengguna == 'alumni') {
      $this->load->view('template_user/header_user', $data);
      $this->load->view('template_user/topbar_user', $data);
      $this->load->view('landing_page/layanan/v_layanan_' . $statusPengguna, $data);
      $this->load->view('template_user/footer_user', $data);
    } else {
      // Tampilkan default jika tidak sesuai
      $this->load->view('template_user/header_user', $data);
      $this->load->view('template_user/topbar_user', $data);
      $this->load->view('landing_page/layanan/v_layanan', $data);
      $this->load->view('template_user/footer_user', $data);
    }
  }

  

  public function tambah_MHS()
  {

    $data['nama_pelanggan'] = $this->input->post('nama_pelanggan');
    $data['asal_pelanggan'] = $this->input->post('asal_pelanggan');
    $data['no_telp'] = $this->input->post('no_telp');
    $data['jenis_layanan'] = $this->input->post('jenis_layanan');
    $data['status_pengguna'] = 'mahasiswa';
    $data['nim_mhs'] = $this->input->post('nim_mhs');
    $data['deskripsi_layanan'] = $this->input->post('deskripsi_layanan');
    $data['email_pengguna'] = $this->input->post('email_pengguna');
    $data['tanggal_pengajuan'] = date('Y-m-d H:i:s');

    $this->M_lengkap->tambah_layanan($data);

    $jenis_layanan = $this->input->post('jenis_layanan');
    $nama_pelanggan = $this->input->post('nama_pelanggan');
    $nim_mhs = $this->input->post('nim_mhs');
    $asal_pelanggan = $this->input->post('asal_pelanggan');
    $deskripsi_layanan = $this->input->post('deskripsi_layanan');
    $email_pengguna = $this->input->post('email_pengguna');

    $subject = "Pengajuan Layanan - $jenis_layanan";
    $body = "Nama Pelanggan: $nama_pelanggan <br>NIM Mahasiswa: $nim_mhs  <br>Program Studi: $asal_pelanggan  <br>Deskripsi Layanan: $deskripsi_layanan";
    $website = 'Direktorat Sistem dan Teknologi Informasi';

    // Email ke pengguna
    $email_body1 = "$body <br>Konfirmasi Pengajuan: darman@umkendari.ac.id";
    $email_address1 = $this->input->post('email_pengguna');
    send_mail($subject, $email_body1, $email_address1, $website);

    // Email ke 'darman@umkendari.ac.id'
    $email_body2 = "$body <br>Email Pengadu: $email_pengguna";
    $email_address2 = 'darman@umkendari.ac.id';
    send_mail($subject, $email_body2, $email_address2, $website);

    // Email ke 'dsti@umkendari.ac.id'
    $email_body3 = "$body <br>Email Pengadu: $email_pengguna";
    $email_address3 = 'dsti@umkendari.ac.id';
    send_mail($subject, $email_body3, $email_address3, $website);

    $this->session->set_flashdata('info', '<div id="autoCloseAlert" class="alert alert-info alert-dismissible fade show mt-2" role="alert"><strong>Sukses ! </strong> Cek Email Anda !</div>');
    redirect('layanan');
  }


  public function tambah_Alumni()
  {
    $data['nama_pelanggan'] = $this->input->post('nama_pelanggan');
    $data['asal_pelanggan'] = $this->input->post('asal_pelanggan');
    $data['no_telp'] = $this->input->post('no_telp');
    $data['jenis_layanan'] = $this->input->post('jenis_layanan');
    $data['status_pengguna'] = 'mahasiswa';
    $data['nim_mhs'] = $this->input->post('nim_mhs');
    $data['deskripsi_layanan'] = $this->input->post('deskripsi_layanan');
    $data['email_pengguna'] = $this->input->post('email_pengguna');
    $data['tanggal_pengajuan'] = date('Y-m-d H:i:s');

    $this->M_lengkap->tambah_layanan($data);

    $jenis_layanan = $this->input->post('jenis_layanan');
    $nama_pelanggan = $this->input->post('nama_pelanggan');
    $nim_mhs = $this->input->post('nim_mhs');
    $asal_pelanggan = $this->input->post('asal_pelanggan');
    $deskripsi_layanan = $this->input->post('deskripsi_layanan');
    $email_pengguna = $this->input->post('email_pengguna');

    $subject = "Pengajuan Layanan - $jenis_layanan";
    $body = "Nama Pelanggan: $nama_pelanggan <br>NIM Mahasiswa: $nim_mhs  <br>Program Studi: $asal_pelanggan  <br>Deskripsi Layanan: $deskripsi_layanan";
    $website = 'Direktorat Sistem dan Teknologi Informasi';

    // Email ke pengguna
    $email_body1 = "$body <br>Konfirmasi Pengajuan: darman@umkendari.ac.id";
    $email_address1 = $this->input->post('email_pengguna');
    send_mail($subject, $email_body1, $email_address1, $website);

    // Email ke 'darman@umkendari.ac.id'
    $email_body2 = "$body <br>Email Pengadu: $email_pengguna";
    $email_address2 = 'darman@umkendari.ac.id';
    send_mail($subject, $email_body2, $email_address2, $website);

    // Email ke 'dsti@umkendari.ac.id'
    $email_body3 = "$body <br>Email Pengadu: $email_pengguna";
    $email_address3 = 'dsti@umkendari.ac.id';
    send_mail($subject, $email_body3, $email_address3, $website);

    $this->session->set_flashdata('info', '<div id="autoCloseAlert" class="alert alert-info alert-dismissible fade show mt-2" role="alert"><strong>Sukses ! </strong> Cek Email Anda !</div>');
    redirect('layanan');
  }

  public function tambah_Tendik()
  {
     // Ambil data dari formulir
    $data['nama_pelanggan'] = $this->input->post('nama_pelanggan');
    $data['asal_pelanggan'] = $this->input->post('asal_pelanggan');
    $data['no_telp'] = $this->input->post('no_telp');
    $data['jenis_layanan'] = $this->input->post('jenis_layanan');
    $data['status_pengguna'] = 'dosen';
    $data['deskripsi_layanan'] = $this->input->post('deskripsi_layanan');
    $data['email_pengguna'] = $this->input->post('email_pengguna');
    $data['tanggal_pengajuan'] = date('Y-m-d H:i:s');

    // Simpan data ke dalam database
    $this->M_lengkap->tambah_layanan($data);

    $jenis_layanan = $this->input->post('jenis_layanan');
    $nama_pelanggan = $this->input->post('nama_pelanggan');
    $asal_pelanggan = $this->input->post('asal_pelanggan');
    $email_pengguna = $this->input->post('email_pengguna');
    $deskripsi_layanan = $this->input->post('deskripsi_layanan');

    $common_subject = 'Pengajuan Layanan - ' . $jenis_layanan;
    $common_body = "Nama Pelanggan: $nama_pelanggan<br>Direktorat: $asal_pelanggan<br>Deskripsi Layanan: $deskripsi_layanan";
    $website = 'Direktorat Sistem dan Teknologi Informasi';

    switch ($jenis_layanan) {
      case 'Perencanaan dan Sekretariat':
      $subject1 = $common_subject;
      $body1 = "$common_body<br>Konfirmasi Pengajuan: hendra.nelva@umkendari.ac.id";
      send_mail($subject1, $body1, $email_pengguna, $website);

      $subject2 = $common_subject;
      $body2 = "$common_body<br>Email Pengadu: $email_pengguna";
      send_mail($subject2, $body2, 'hendra.nelva@umkendari.ac.id', $website);

      $subject3 = $common_subject;
      $body3 = "$common_body<br>Email Pengadu: $email_pengguna";
      send_mail($subject3, $body3, 'dsti@umkendari.ac.id', $website);
      break;

      case 'Teknologi Informasi':
      $subject1 = $common_subject;
      $body1 = "$common_body<br>Konfirmasi Pengajuan: alfiahfajriani@gmail.com";
      send_mail($subject1, $body1, $email_pengguna, $website);

      $subject2 = $common_subject;
      $body2 = "$common_body<br>Email Pengadu: $email_pengguna";
      send_mail($subject2, $body2, 'alfiahfajriani@gmail.com', $website);

      $subject3 = $common_subject;
      $body3 = "$common_body<br>Email Pengadu: $email_pengguna";
      send_mail($subject3, $body3, 'dsti@umkendari.ac.id', $website);
      break;

      case 'Infrastruktur Jaringan':
      case 'Email Universitas':
      $subject1 = $common_subject;
      $body1 = "$common_body<br>Konfirmasi Pengajuan: darman@umkendari.ac.id";
      send_mail($subject1, $body1, $email_pengguna, $website);

      $subject2 = $common_subject;
      $body2 = "$common_body<br>Email Pengadu: $email_pengguna";
      send_mail($subject2, $body2, 'darman@umkendari.ac.id', $website);

      $subject3 = $common_subject;
      $body3 = "$common_body<br>Email Pengadu: $email_pengguna";
      send_mail($subject3, $body3, 'dsti@umkendari.ac.id', $website);
      break;

        // Tambahkan kondisi lainnya sesuai dengan jenis layanan yang ada

      default:
            // Jenis layanan tidak dikenali
      break;
    }

    $this->session->set_flashdata('info', '<div id="autoCloseAlert" class="alert alert-info alert-dismissible fade show mt-2" role="alert"><strong>Sukses ! </strong> Cek Email Anda !</div>');
    redirect('layanan');
  }

  public function tambah_Dosen()
  {
    // Ambil data dari formulir
    $data['nama_pelanggan'] = $this->input->post('nama_pelanggan');
    $data['asal_pelanggan'] = $this->input->post('asal_pelanggan');
    $data['no_telp'] = $this->input->post('no_telp');
    $data['jenis_layanan'] = $this->input->post('jenis_layanan');
    $data['status_pengguna'] = 'dosen';
    $data['deskripsi_layanan'] = $this->input->post('deskripsi_layanan');
    $data['email_pengguna'] = $this->input->post('email_pengguna');
    $data['tanggal_pengajuan'] = date('Y-m-d H:i:s');

    // Simpan data ke dalam database
    $this->M_lengkap->tambah_layanan($data);

    $jenis_layanan = $this->input->post('jenis_layanan');
    $nama_pelanggan = $this->input->post('nama_pelanggan');
    $asal_pelanggan = $this->input->post('asal_pelanggan');
    $email_pengguna = $this->input->post('email_pengguna');
    $deskripsi_layanan = $this->input->post('deskripsi_layanan');

    $common_subject = 'Pengajuan Layanan - ' . $jenis_layanan;
    $common_body = "Nama Pelanggan: $nama_pelanggan<br>Program Studi: $asal_pelanggan<br>Deskripsi Layanan: $deskripsi_layanan";
    $website = 'Direktorat Sistem dan Teknologi Informasi';

    switch ($jenis_layanan) {
      case 'Perencanaan dan Sekretariat':
      $subject1 = $common_subject;
      $body1 = "$common_body<br>Konfirmasi Pengajuan: hendra.nelva@umkendari.ac.id";
      send_mail($subject1, $body1, $email_pengguna, $website);

      $subject2 = $common_subject;
      $body2 = "$common_body<br>Email Pengadu: $email_pengguna";
      send_mail($subject2, $body2, 'hendra.nelva@umkendari.ac.id', $website);

      $subject3 = $common_subject;
      $body3 = "$common_body<br>Email Pengadu: $email_pengguna";
      send_mail($subject3, $body3, 'dsti@umkendari.ac.id', $website);
      break;

      case 'Teknologi Informasi':
      $subject1 = $common_subject;
      $body1 = "$common_body<br>Konfirmasi Pengajuan: alfiahfajriani@gmail.com";
      send_mail($subject1, $body1, $email_pengguna, $website);

      $subject2 = $common_subject;
      $body2 = "$common_body<br>Email Pengadu: $email_pengguna";
      send_mail($subject2, $body2, 'alfiahfajriani@gmail.com', $website);

      $subject3 = $common_subject;
      $body3 = "$common_body<br>Email Pengadu: $email_pengguna";
      send_mail($subject3, $body3, 'dsti@umkendari.ac.id', $website);
      break;

      case 'Infrastruktur Jaringan':
      case 'Email Universitas':
      $subject1 = $common_subject;
      $body1 = "$common_body<br>Konfirmasi Pengajuan: darman@umkendari.ac.id";
      send_mail($subject1, $body1, $email_pengguna, $website);

      $subject2 = $common_subject;
      $body2 = "$common_body<br>Email Pengadu: $email_pengguna";
      send_mail($subject2, $body2, 'darman@umkendari.ac.id', $website);

      $subject3 = $common_subject;
      $body3 = "$common_body<br>Email Pengadu: $email_pengguna";
      send_mail($subject3, $body3, 'dsti@umkendari.ac.id', $website);
      break;

        // Tambahkan kondisi lainnya sesuai dengan jenis layanan yang ada

      default:
            // Jenis layanan tidak dikenali
      break;
    }

    $this->session->set_flashdata('info', '<div id="autoCloseAlert" class="alert alert-info alert-dismissible fade show mt-2" role="alert"><strong>Sukses ! </strong> Cek Email Anda !</div>');
    redirect('layanan');
  }




}

?>