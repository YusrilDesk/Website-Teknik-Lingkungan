<?php 
class Profil extends CI_Controller
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

		$data['title'] = 'profile';
		$data['profile'] = $this->M_lengkap->ambil_data_profile();


    # Template
    $dashboard_admin = 'admin/Profile/edit_profile';#view file;
    $this->load->view('template_admin/header_admin',$data);
    $this->load->view('template_admin/sidebar_admin',$data);
    $this->load->view($dashboard_admin,$data);
    $this->load->view('template_admin/footer_admin',$data);
}





public function update()
{
    // csrfValidate();
    // POST
    $data['id_profil'] = $this->input->post('id_profil');
    $data['sambutan_ketua'] = $this->input->post('sambutan_ketua');
    $data['visi'] = $this->input->post('visi');
    $data['misi'] = $this->input->post('misi');
    $data['tujuan'] = $this->input->post('tujuan');
    $data['tugas_pokok'] = $this->input->post('tugas_pokok');
    $data['struktur_organisasi'] = $this->input->post('struktur_organisasi');
    $data['akreditasi'] = $this->input->post('akreditasi');

    // UPLOAD foto

	if($_FILES['foto_struktur']['name']!=''){



		$path                    = './uploads/foto_struktur/';

		if ($this->input->post('foto_struktur_old')!='') {
			$old_file_path = $path . $this->input->post('foto_struktur_old');
			if (file_exists($old_file_path)) {
				unlink($old_file_path);
			}
		}

		$filename                = "foto_struktur".$this->session->userdata('nama');

		$config['upload_path']   = $path;

		$config['allowed_types'] = "jpg|png|jpeg";

		$config['overwrite']     = "true";

		$config['max_size']      = 2024;

		$config['file_name']      = $filename;

		$this->upload->initialize($config);



		if (!$this->upload->do_upload('foto_struktur')) {





			redirect('admin/profil');



		} else {

			$dat             = $this->upload->data();

			$data['foto_struktur'] = $dat['file_name'];

		}

	}else{

		$data['foto_struktur'] = $this->input->post('foto_struktur_old');

	}

    // Update profile using your model (M_lengkap)
    $this->M_lengkap->edit_profile($data);

    // ALERT
    $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible fade show" role="alert">
        Data Berhasil Diubah!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');

    redirect('admin/profil');
}









}


?>
