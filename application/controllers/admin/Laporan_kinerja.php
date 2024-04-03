<?php 
class Laporan_kinerja extends CI_Controller
{

	function __construct() {
		parent::__construct();
		$this->load->model('M_lengkap');
		$this->load->library('upload');


	}

	public function index(){

		$data['title'] = 'kinerja';
		$data['laporan'] = $this->M_lengkap->ambil_data_laporan();


    # Template
    $dashboard_admin = 'admin/v_laporan_kinerja';#view file;
    $this->load->view('template_admin/header_admin',$data);
    $this->load->view('template_admin/sidebar_admin',$data);
    $this->load->view($dashboard_admin,$data);
    $this->load->view('template_admin/footer_admin',$data);
}


public function tambah()
{
   
	$data['nama_dokumen'] = $this->input->post('nama_dokumen');
	$data['jenis_dokumen'] = $this->input->post('jenis_dokumen');
	$data['file_dokumen'] = $this->input->post('file_dokumen');
	$data['waktu'] = date('Y-m-d H:i:s');

	

    // Update laporan_kinerja using your model (M_lengkap)
	$this->M_lengkap->tambah_laporan($data);

    // ALERT
	$this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible fade show" role="alert">
		Data Berhasil tambah!
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');

	redirect('admin/laporan_kinerja');
}




public function update()
{
    // csrfValidate();
    // POST
	$data['id_laporan'] = $this->input->post('id_laporan');
	$data['nama_dokumen'] = $this->input->post('nama_dokumen');
	$data['jenis_dokumen'] = $this->input->post('jenis_dokumen');
	$data['file_dokumen'] = $this->input->post('file_dokumen');
	$data['waktu'] = date('Y-m-d H:i:s');

	

    // Update laporan_kinerja using your model (M_lengkap)
	$this->M_lengkap->edit_laporan($data);

    // ALERT
	$this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible fade show" role="alert">
		Data Berhasil Diubah!
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');

	redirect('admin/laporan_kinerja');
}




public function delete() {
        // POST
	$id = $this->uri->segment(4);
	$this->M_lengkap->delete_laporan($id);

	$this->session->set_flashdata('pesan',' <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Berhasil Di Hapus!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');

	redirect('admin/laporan_kinerja');

}  




}

?>
