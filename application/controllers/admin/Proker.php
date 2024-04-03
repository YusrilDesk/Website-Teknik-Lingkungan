<?php 
class Proker extends CI_Controller
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

		$data['title'] = 'proker';
		$data['proker'] = $this->M_lengkap->ambil_data_proker();


    # Template
    $dashboard_admin = 'admin/v_proker';#view file;
    $this->load->view('template_admin/header_admin',$data);
    $this->load->view('template_admin/sidebar_admin',$data);
    $this->load->view($dashboard_admin,$data);
    $this->load->view('template_admin/footer_admin',$data);
}

public function tambah(){

	$data['deskripsi_proker'] = $this->input->post('deskripsi_proker');
	$data['nama_proker'] = $this->input->post('nama_proker');
	$data['target_waktu'] = $this->input->post('target_waktu');
	$data['anggaran'] = $this->input->post('anggaran');
	$data['penanggung_jawab'] = $this->input->post('penanggung_jawab');


	

	$this->M_lengkap->tambah_proker($data);


	// ALERT

    $this->session->set_flashdata('pesan',' <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Di Tambahkan!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');

	redirect('admin/proker');
}


public function edit(){
	if(!$this->uri->segment(4)){redirect('admin/bebas_tunggakan');}
	$id=$this->uri->segment(4);
	$data['title'] = 'Edit Data';
	$data['tunggakan'] = $this->M_tunggakan->get($id);

    # Template
    $dashboard_admin = 'bebas_tunggakan/edit_data';#view file;
    $this->load->view('template_admin/header_admin',$data);
    $this->load->view('template_admin/sidebar_admin',$data);
    $this->load->view($dashboard_admin,$data);
    $this->load->view('template_admin/footer_admin',$data);
}

public function update() {
        // csrfValidate();
        // POST
	$data['id_proker'] = $this->input->post('id_proker');
	$data['deskripsi_proker'] = $this->input->post('deskripsi_proker');
	$data['target_waktu'] = $this->input->post('target_waktu');
	$data['anggaran'] = $this->input->post('anggaran');
	$data['penanggung_jawab'] = $this->input->post('penanggung_jawab');


	

	$this->M_lengkap->edit_proker($data);


	// ALERT

    $this->session->set_flashdata('pesan',' <div class="alert alert-info alert-dismissible fade show" role="alert">
            Data Berhasil Di Ubah!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');


	redirect('admin/proker');
}

public function detail(){
	if(!$this->uri->segment(4)){redirect('admin/bebas_tunggakan');}

	$data['title'] = 'Detail Data';
	$id = $this->uri->segment(4);
	$idproker = $this->session->userdata('id_proker');


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
        // POST
	$id = $this->uri->segment(4);
	$this->M_lengkap->delete_proker($id);

	$this->session->set_flashdata('pesan',' <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Berhasil Di Hapus!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');

	redirect('admin/proker');

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



public function ditolak(){
	$id = $this->input->post('id_tunggakan');

	$data['id_tunggakan'] = $id;
	$data['status_tunggakan'] = 'di tolak';
	$data['komentar'] = $this->input->post('komentar');

	$this->M_tunggakan->ditolak($data);
	$text = 'Berhasil Menolak data';
    $toastrStatus  = "error";# = warning,error,info,success
    getAlert1($toastrStatus, $text);
    redirect('admin/bebas_tunggakan');

}

public function detailpengusulan(){
	if(!$this->uri->segment(4)){redirect('admin/bebas_tunggakan');}

	$data['title'] = 'Detail Data';
	$id = $this->uri->segment(4);
	$data ['detail'] = $this->M_tunggakan->getpengusulan($id);

    # Template
    $dashboard_admin = 'bebas_tunggakan/detail_data';#view file;
    $this->load->view('template_admin/header_admin',$data);
    $this->load->view('template_admin/sidebar_admin',$data);
    $this->load->view($dashboard_admin,$data);
    $this->load->view('template_admin/footer_admin',$data);
}

}

?>
