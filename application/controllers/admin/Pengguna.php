<?php 
class Pengguna extends CI_Controller
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

		$data['title'] = 'Admin';
		$data['data_admin'] = $this->M_lengkap->get_user_login();


    # Template
    $dashboard_admin = 'admin/v_data_admin';#view file;
    $this->load->view('template_admin/header_admin',$data);
    $this->load->view('template_admin/sidebar_admin',$data);
    $this->load->view($dashboard_admin,$data);
    $this->load->view('template_admin/footer_admin',$data);
}

public function tambah(){

	$data['password'] = sha1($this->input->post('password'));
	$data['nama'] = $this->input->post('nama');
	$data['username'] = $this->input->post('username');


	// UPLOAD foto

	if($_FILES['foto_admin']['name']!=''){



		$path                    = './uploads/foto_admin/';

		if ($this->input->post('foto_admin')!='') {

			unlink($this->input->post('foto_admin_old'));

		}

		$filename                = "foto_admin".$this->session->userdata('nama');

		$config['upload_path']   = $path;

		$config['allowed_types'] = "jpg|png|jpeg";

		$config['overwrite']     = "true";

		$config['max_size']      = "0";

		$config['file_name']      = $filename;

		$this->upload->initialize($config);



		if (!$this->upload->do_upload('foto_admin')) {





			redirect('admin/pengguna');



		} else {

			$dat             = $this->upload->data();

			$data['foto_admin'] = $dat['file_name'];

		}

	}else{

		$data['foto_admin'] = $this->input->post('foto_admin_old');

	}

	$this->M_lengkap->tambah($data);


	$this->session->set_flashdata('pesan',' <div class="alert alert-success alert-dismissible fade show" role="alert">
		<i class="bi bi-check-circle me-1"></i>
		Data Berhasil di tambahkan!
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');

	redirect('admin/pengguna');
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
    // POST
    $data['id'] = $this->input->post('id');
    $data['password'] = $this->input->post('password');
    $data['nama'] = $this->input->post('nama');
    $data['username'] = $this->input->post('username');

    // UPLOAD foto
    if($_FILES['foto_admin']['name']!='') {
        $path = './uploads/foto_admin/';
        $old_foto = $path . $this->input->post('foto_admin_old');

        // Delete old photo if exists
        if (file_exists($old_foto)) {
            unlink($old_foto);
        }

        $filename = "foto_admin".$this->session->userdata('nama');
        $config['upload_path'] = $path;
        $config['allowed_types'] = "jpg|png|jpeg";
        $config['overwrite'] = "true";
        $config['max_size'] = 2034;
        $config['file_name'] = $filename;
        $this->upload->initialize($config);

        // Upload the file
        if (!$this->upload->do_upload('foto_admin')) {
            $text = 'foto_admin anda gagal tersimpan';
            $toastrStatus  = "error";/*# = warning,error,info,success*/
            getAlert1($toastrStatus, $text);
            redirect('admin/penggunan');
        } else {
            $dat = $this->upload->data();
            $data['foto_admin'] = $dat['file_name'];
        }
    } else {
        $data['foto_admin'] = $this->input->post('foto_admin_old');
    }

    $this->M_lengkap->edit($data);
    $this->session->set_flashdata('pesan',' <div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="bi bi-check-circle me-1"></i>
    Data Berhasil di tambahkan!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>');

    redirect('admin/pengguna');
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
	$this->M_tunggakan->delete($id);

	redirect('admin/bebas_tunggakan');

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
