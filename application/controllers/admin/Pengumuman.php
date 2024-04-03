<?php 
class pengumuman extends CI_Controller
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

		$data['title'] = 'pengumuman';
		$data['pengumuman'] = $this->M_lengkap->ambil_data_pengumuman();


    # Template
    $dashboard_admin = 'admin/edit_pengumuman';#view file;
    $this->load->view('template_admin/header_admin',$data);
    $this->load->view('template_admin/sidebar_admin',$data);
    $this->load->view($dashboard_admin,$data);
    $this->load->view('template_admin/footer_admin',$data);
}





public function update()
{
    // csrfValidate();
    // POST
    $data['id_pengumuman'] = $this->input->post('id_pengumuman');
    $data['nama_pengumuman'] = $this->input->post('nama_pengumuman');
    $data['isi_pengumuman'] = $this->input->post('isi_pengumuman');
    $data['waktu'] = date('Y-m-d H:i:s');

    // UPLOAD foto

	if($_FILES['foto_pengumuman']['name']!=''){



		$path                    = './uploads/foto_pengumuman/';

		if ($this->input->post('foto_pengumuman_old')!='') {
			$old_file_path = $path . $this->input->post('foto_pengumuman_old');
			if (file_exists($old_file_path)) {
				unlink($old_file_path);
			}
		}

		$filename                = 'foto_pengumuman'.$this->session->userdata('nama');

		$config['upload_path']   = $path;

		$config['allowed_types'] = 'gif|jpg|png|jpeg';

		$config['overwrite']     = 'true';

		$config['max_size']      = '2024';

		$config['file_name']      = $filename;

		$this->upload->initialize($config);



		if (!$this->upload->do_upload('foto_pengumuman')) {





			redirect('admin/pengumuman');



		} else {

			$dat             = $this->upload->data();

			$data['foto_pengumuman'] = $dat['file_name'];

		}

	}else{

		$data['foto_pengumuman'] = $this->input->post('foto_pengumuman_old');

	}

    // Update pengumuman using your model (M_lengkap)
    $this->M_lengkap->edit_pengumuman($data);

    // ALERT
    $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible fade show" role="alert">
        Data Berhasil Diubah!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');

    redirect('admin/pengumuman');
}




 




}

?>
