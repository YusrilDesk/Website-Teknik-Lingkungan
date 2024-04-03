<?php 
class Sop extends CI_Controller
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

		$data['title'] = 'SOP';
		$data['sop'] = $this->M_lengkap->ambil_data_sop();
		$data['kategori'] = $this->Kategori_model->get_kategori_dokumen();


    # Template
    $dashboard_admin = 'admin/folder_sop/v_sop';#view file;
    $this->load->view('template_admin/header_admin',$data);
    $this->load->view('template_admin/sidebar_admin',$data);
    $this->load->view($dashboard_admin,$data);
    $this->load->view('template_admin/footer_admin',$data);
}

public function tambah() {
    // Load the CodeIgniter Upload library


	$this->load->library('upload');


	$data['nama_sop'] = $this->input->post('nama_sop');
	$data['deskripsi_sop'] = $this->input->post('deskripsi_sop');
	$data['id_dokumen'] = $this->input->post('kategori_dokumen');
	$data['file_sop'] = $this->input->post('file_sop');
	$data['waktu'] = date('Y-m-d H:i:s');

    

	$this->M_lengkap->tambah_sop($data);

    // Set success message
	$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		Data Berhasil Di Tambahkan!
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');

	redirect('admin/sop');
}


public function edit() {
	$id = $this->uri->segment(4);

    // Validasi ID
	if (!$id || !is_numeric($id)) {
        // ID tidak valid, tampilkan pesan kesalahan atau arahkan ke halaman 404
		show_404();
	}

    // Cek apakah SOP dengan ID tersebut ada
	$sop = $this->M_lengkap->get_sop($id);


	if (!$sop) {
        // SOP dengan ID tersebut tidak ditemukan, tampilkan pesan kesalahan atau arahkan ke halaman lain
		show_404();
	}

	$data['title'] = 'SOP';
	$data['sopEdit'] = $sop;

	$data['kategori'] = $this->Kategori_model->get_kategori_dokumen();

    // Template
    $dashboard_admin = 'admin/folder_sop/edit_sop'; // Nama view file
    $this->load->view('template_admin/header_admin', $data);
    $this->load->view('template_admin/sidebar_admin', $data);
    $this->load->view($dashboard_admin, $data);
    $this->load->view('template_admin/footer_admin', $data);
}

public function update() {
    // csrfValidate();
    // POST
	$data['deskripsi_sop'] = $this->input->post('deskripsi_sop');
	$data['id_sop'] = $this->input->post('id_sop');
	$data['nama_sop'] = $this->input->post('nama_sop');
	$data['id_dokumen'] = $this->input->post('kategori_dokumen');
	$data['file_sop'] = $this->input->post('file_sop');

   


	$this->M_lengkap->edit_sop($data);

    // ALERT
	$this->session->set_flashdata('pesan', ' <div class="alert alert-info alert-dismissible fade show" role="alert">
		Data Berhasil Diubah!
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');

	redirect('admin/sop');
}


public function detail(){
	if(!$this->uri->segment(4)){redirect('admin/bebas_tunggakan');}

	$data['title'] = 'Detail Data';
	$id = $this->uri->segment(4);
	$idsop = $this->session->userdata('id_sop');


	$data ['detail'] = $this->M_tunggakan->get($id);
	$data ['bukti'] = $this->M_tunggakan->getwis($id);




    # Template
    $dashboard_admin = 'bebas_tunggakan/detail_data';#view file;
    $this->load->view('template_admin/header_admin',$data);
    $this->load->view('template_admin/sidebar_admin',$data);
    $this->load->view($dashboard_admin,$data);
    $this->load->view('template_admin/footer_admin',$data);
}

public function delete() {
	$id = $this->uri->segment(4);

    // Get the file name of the photo associated with the data to be deleted
	$photo_name = $this->M_lengkap->get_file_name_by_id($id);

	if ($photo_name) {
        // Define the path to the photo directory
		$photo_path = './uploads/file_sop/';

        // Full path to the photo
		$photo_full_path = $photo_path . $photo_name;

        // Check if the photo file exists and then delete it
		if (is_file($photo_full_path) && file_exists($photo_full_path)) {
            // Use unlink to delete the file
			unlink($photo_full_path);
		}
	}

    // Delete the data
	$this->M_lengkap->delete_sop($id);

    // Set success message
	$this->session->set_flashdata('pesan', ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
		Data Berhasil Dihapus!
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');

	redirect('admin/sop');
}

public function cetak(){

    // if(!$this->uri->segment(4)){redirect('admin/bebas_tunggakan');}

	$data['title'] = 'Detail Data';
	$id = $this->uri->segment(4);
	$data ['detail'] = $this->M_tunggakan->get($id);

    # Template

	$this->load->view('bebas_tunggakan/cetak_data',$data);

}

  // ------------------------------------------------------------------- //
  // ------------------------------------------------------------------- //
  // ------------------------------------------------------------------- //
  // -------------------Konfirmasi Fileeeeeeeeeeeeee-------------------- //
  // ------------------------------------------------------------------- //
  // ------------------------------------------------------------------- //
  // ------------------------------------------------------------------- //
  // ------------------------------------------------------------------- //





}


?>
