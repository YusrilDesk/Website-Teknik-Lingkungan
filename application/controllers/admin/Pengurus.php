<?php 
class Pengurus extends CI_Controller
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

		$data['title'] = 'kepengurusan';
		$data['pengurus'] = $this->M_lengkap->ambil_data();


    # Template
    $dashboard_admin = 'admin/v_pengurus';#view file;
    $this->load->view('template_admin/header_admin',$data);
    $this->load->view('template_admin/sidebar_admin',$data);
    $this->load->view($dashboard_admin,$data);
    $this->load->view('template_admin/footer_admin',$data);
}

public function tambah(){

	$data['jabatan'] = $this->input->post('jabatan');
	$data['nama_pengurus'] = $this->input->post('nama_pengurus');
	$data['email'] = $this->input->post('email');
	$data['twiter'] = $this->input->post('twiter');
	$data['facebook'] = $this->input->post('facebook');
	$data['instagram'] = $this->input->post('instagram');
	$data['linkin'] = $this->input->post('linkin');
	$data['no_telp'] = $this->input->post('no_telp');


	// UPLOAD foto

	if($_FILES['foto_pengurus']['name']!=''){



		$path                    = './uploads/foto_pengurus/';

		if ($this->input->post('foto_pengurus')!='') {

			unlink($this->input->post('foto_pengurus_old'));

		}

		$filename                = "foto_pengurus".$this->session->userdata('nama');

		$config['upload_path']   = $path;

		$config['allowed_types'] = "jpg|png|jpeg";

		$config['overwrite']     = "true";

		$config['max_size']      = "0";

		$config['file_name']      = $filename;

		$this->upload->initialize($config);



		if (!$this->upload->do_upload('foto_pengurus')) {





			redirect('admin/berita');



		} else {

			$dat             = $this->upload->data();

			$data['foto_pengurus'] = $dat['file_name'];

		}

	}else{

		$data['foto_pengurus'] = $this->input->post('foto_pengurus_old');

	}

	$this->M_lengkap->tambah_pengurus($data);


	// ALERT

    $this->session->set_flashdata('pesan',' <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Di Tambahkan!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');

	redirect('admin/pengurus');
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
	$data['id_pengurus'] = $this->input->post('id_pengurus');
	$data['jabatan'] = $this->input->post('jabatan');
	$data['nama_pengurus'] = $this->input->post('nama_pengurus');
	$data['email'] = $this->input->post('email');
	$data['twiter'] = $this->input->post('twiter');
	$data['facebook'] = $this->input->post('facebook');
	$data['instagram'] = $this->input->post('instagram');
	$data['linkin'] = $this->input->post('linkin');
	$data['no_telp'] = $this->input->post('no_telp');


	// UPLOAD foto

	if($_FILES['foto_pengurus']['name']!=''){



		$path                    = './uploads/foto_pengurus/';

		if ($this->input->post('foto_pengurus')!='') {

			unlink($this->input->post('foto_pengurus_old'));

		}

		$filename                = "foto_pengurus".$this->session->userdata('nama');

		$config['upload_path']   = $path;

		$config['allowed_types'] = "jpg|png|jpeg";

		$config['overwrite']     = "true";

		$config['max_size']      = "0";

		$config['file_name']      = $filename;

		$this->upload->initialize($config);



		if (!$this->upload->do_upload('foto_pengurus')) {





			redirect('admin/berita');



		} else {

			$dat             = $this->upload->data();

			$data['foto_pengurus'] = $dat['file_name'];

		}

	}else{

		$data['foto_pengurus'] = $this->input->post('foto_pengurus_old');

	}

	$this->M_lengkap->edit_pengurus($data);


	// ALERT

    $this->session->set_flashdata('pesan',' <div class="alert alert-info alert-dismissible fade show" role="alert">
            Data Berhasil Di Ubah!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');


	redirect('admin/pengurus');
}

public function detail(){
	if(!$this->uri->segment(4)){redirect('admin/bebas_tunggakan');}

	$data['title'] = 'Detail Data';
	$id = $this->uri->segment(4);
	$idmahasiswa = $this->session->userdata('id_mahasiswa');


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
	$this->M_lengkap->delete_pengurus($id);

	$this->session->set_flashdata('pesan',' <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Berhasil Di Hapus!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');

	redirect('admin/pengurus');

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
