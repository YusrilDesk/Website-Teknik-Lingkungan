<?php 
class Layanan extends CI_Controller
{

	function __construct() {
		parent::__construct();
		$this->load->model('M_lengkap');
		$this->load->library('upload');


		if (!$this->session->userdata('username')) {
      $text = 'Anda Belum Login!';
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">' . $text . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect('auth');
    }



	}

	public function index(){

		$data['title'] = 'layanan';
		$data['layanan'] = $this->M_lengkap->ambil_data_layanan();


    # Template
    $dashboard_admin = 'admin/v_layanan';#view file;
    $this->load->view('template_admin/header_admin',$data);
    $this->load->view('template_admin/sidebar_admin',$data);
    $this->load->view($dashboard_admin,$data);
    $this->load->view('template_admin/footer_admin',$data);
}




public function detail() {
    // csrfValidate();
    // POST
	
	$data['id_layanan'] = $this->input->post('id_layanan');
	$data['status_pengajuan'] = $this->input->post('status_pengajuan');

    



	$this->M_lengkap->edit_layanan($data);

    // ALERT
	$this->session->set_flashdata('pesan', ' <div class="alert alert-info alert-dismissible fade show" role="alert">
		Data Berhasil Diubah!
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');

	redirect('admin/layanan');
}




public function delete() {
	$id = $this->uri->segment(4);


    // Delete the data
	$this->M_lengkap->delete_layanan($id);

    // Set success message
	$this->session->set_flashdata('pesan', ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
		Data Berhasil Dihapus!
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');

	redirect('admin/layanan');
}






}


?>
