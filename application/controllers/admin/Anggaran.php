<?php 
class Anggaran extends CI_Controller
{

	function __construct() {
		parent::__construct();
		$this->load->model('M_lengkap');
		$this->load->model('Kategori_model');
		$this->load->library('upload');


        if (!$this->session->userdata('username')) {
          $text = 'Anda Belum Login!';
          $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">' . $text . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
          redirect('auth');
      }

  }

  public function index(){

      $anggaran = $this->M_lengkap->getAllAnggaran();
      $kategori = $this->Kategori_model->getAllKategori();

      $data = [   'title'     => 'anggaran',
      'anggaran'   => $anggaran, 
      'divisi'   => $kategori 

  ];
  


    # Template
    $dashboard_admin = 'admin/v_anggaran';#view file;
    $this->load->view('template_admin/header_admin',$data);
    $this->load->view('template_admin/sidebar_admin',$data);
    $this->load->view($dashboard_admin,$data);
    $this->load->view('template_admin/footer_admin',$data);
}

public function tambah() {
    $data['nama_anggaran'] = $this->input->post('nama_anggaran');
    $data['kegiatan'] = $this->input->post('kegiatan');
    $data['debit'] = $this->input->post('debit');
    $data['kredit'] = $this->input->post('kredit');
    $data['id_divisi'] = $this->input->post('tbl_divisi');
    $data['waktu'] = $this->input->post('waktu');

    // Hitung saldo berdasarkan seluruh data anggaran dengan nama_anggaran yang sama
    $saldo_terbaru = $this->M_lengkap->getTotalSaldoByNamaAnggaran($data['nama_anggaran']);

    // Tambahkan saldo ke dalam array data
    $data['jumlah_anggaran'] = $saldo_terbaru;

    // Tambahkan kredit ke saldo jika ada
    if (!empty($data['kredit'])) {
        $data['jumlah_anggaran'] += $data['kredit'];
    }

    // Kurangkan debit dari saldo jika ada
    if (!empty($data['debit'])) {
        $data['jumlah_anggaran'] -= $data['debit'];
    }

    // Panggil model untuk menyimpan data anggaran
    $this->M_lengkap->tambah_anggaran($data);

    // Set success message
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Berhasil Ditambahkan!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');

    redirect('admin/anggaran');
}

public function update() {
    $data['id_anggaran'] = $this->input->post('id_anggaran');
    $data['nama_anggaran'] = $this->input->post('nama_anggaran');
    $data['debit'] = $this->input->post('debit');
    $data['kredit'] = $this->input->post('kredit');
    $data['kegiatan'] = $this->input->post('kegiatan');
    $data['id_divisi'] = $this->input->post('tbl_divisi');
    $data['waktu'] = $this->input->post('waktu');

    // Mendapatkan saldo terakhir atau saldo awal jika belum ada transaksi
    $saldo_sebelumnya = $this->M_lengkap->getSaldoTerakhir($data['nama_anggaran']);

    // Jika ini adalah transaksi pertama untuk anggaran tertentu
    if ($saldo_sebelumnya === null) {
        $saldo_sebelumnya = $this->M_lengkap->getSaldoAwal($data['nama_anggaran']);
    }

    // Hitung saldo berdasarkan transaksi debit dan kredit untuk nama anggaran tertentu
    $saldo_terbaru = $saldo_sebelumnya + ($data['kredit'] - $data['debit']);

    // Tambahkan saldo ke dalam array data
    $data['jumlah_anggaran'] = $saldo_terbaru;

    // Panggil model untuk menyimpan data anggaran
    $this->M_lengkap->edit_anggaran($data);

    // Set success message
    $this->session->set_flashdata('pesan', ' <div class="alert alert-info alert-dismissible fade show" role="alert">
        Data Berhasil Diubah!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');

    redirect('admin/anggaran');
}




public function delete() {
    $id = $this->uri->segment(4);
    $anggaran = $this->M_lengkap->getAnggaranById($id);

    if ($anggaran) {
        // Menghitung perubahan saldo saat data dihapus
        $perubahan_kredit = $anggaran->kredit;
        $perubahan_debit = $anggaran->debit;

        // Mendapatkan saldo sebelumnya
        $saldo_sebelumnya = $this->M_lengkap->getSaldoAwal($anggaran->nama_anggaran);

        // Menghitung saldo terbaru setelah menghapus data anggaran
        $saldo_terbaru = $saldo_sebelumnya - $perubahan_kredit + $perubahan_debit;

        // Update saldo terbaru ke dalam database
        $this->M_lengkap->updateSaldoByNamaAnggaran($anggaran->nama_anggaran, $saldo_terbaru);
    }

    $this->M_lengkap->delete_anggaran($id);

    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data Berhasil Dihapus!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');

    redirect('admin/anggaran');
}






}


?>
