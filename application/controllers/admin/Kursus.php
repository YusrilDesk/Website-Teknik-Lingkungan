<?php 
class kursus extends CI_Controller
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

		$data['title'] = 'kursus';
		$data['kursus'] = $this->M_lengkap->ambil_data_kursus();


    # Template
    $dashboard_admin = 'admin/kursus/v_kursus';#view file;
    $this->load->view('template_admin/header_admin',$data);
    $this->load->view('template_admin/sidebar_admin',$data);
    $this->load->view($dashboard_admin,$data);
    $this->load->view('template_admin/footer_admin',$data);
}

public function tambah() {


	$this->load->library('upload');


	$data['kursus'] = $this->input->post('kursus');
	$data['semester'] = $this->input->post('semester');
	$data['silabus'] = $this->input->post('silabus');
	$data['waktu'] = date('Y-m-d H:i:s');



	$this->M_lengkap->tambah_kursus($data);

    // Set success message
	$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		Data Berhasil Di Tambahkan!
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');

	redirect('admin/kursus');
}


public function edit() {
	$id = $this->uri->segment(4);

    // Validasi ID
	if (!$id || !is_numeric($id)) {
        // ID tidak valid, tampilkan pesan kesalahan atau arahkan ke halaman 404
		show_404();
	}

    // Cek apakah kursus dengan ID tersebut ada
	$kursus = $this->M_lengkap->get_kursus($id);


	if (!$kursus) {
        // kursus dengan ID tersebut tidak ditemukan, tampilkan pesan kesalahan atau arahkan ke halaman lain
		show_404();
	}

	$data['title'] = 'kursus';
	$data['kursusEdit'] = $kursus;

	$data['kategori'] = $this->Kategori_model->get_kategori_dokumen();

    // Template
    $dashboard_admin = 'admin/kursus/edit_kursus'; // Nama view file
    $this->load->view('template_admin/header_admin', $data);
    $this->load->view('template_admin/sidebar_admin', $data);
    $this->load->view($dashboard_admin, $data);
    $this->load->view('template_admin/footer_admin', $data);
}

public function update() {
    // csrfValidate();
    // POST
	$data['id_kursus'] = $this->input->post('id_kursus');
	$data['kursus'] = $this->input->post('kursus');
	$data['semester'] = $this->input->post('semester');
	$data['silabus'] = $this->input->post('silabus');




	$this->M_lengkap->edit_kursus($data);

    // ALERT
	$this->session->set_flashdata('pesan', ' <div class="alert alert-info alert-dismissible fade show" role="alert">
		Data Berhasil Diubah!
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');

	redirect('admin/kursus');
}




public function delete() {
	$id = $this->uri->segment(4);

    // Get the file name of the photo associated with the data to be deleted
	$photo_name = $this->M_lengkap->get_file_name_by_id($id);

	if ($photo_name) {
        // Define the path to the photo directory
		$photo_path = './uploads/file_kursus/';

        // Full path to the photo
		$photo_full_path = $photo_path . $photo_name;

        // Check if the photo file exists and then delete it
		if (is_file($photo_full_path) && file_exists($photo_full_path)) {
            // Use unlink to delete the file
			unlink($photo_full_path);
		}
	}

    // Delete the data
	$this->M_lengkap->delete_kursus($id);

    // Set success message
	$this->session->set_flashdata('pesan', ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
		Data Berhasil Dihapus!
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');

	redirect('admin/kursus');
}







}


?>
