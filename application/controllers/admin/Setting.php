<?php 
class Setting extends CI_Controller
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

		$data['title'] = 'setting_web';
     $data ['setting'] = $this->M_lengkap->setting();


    # Template
    $dashboard_admin = 'admin/setting/v_setting';#view file;
    $this->load->view('template_admin/header_admin',$data);
    $this->load->view('template_admin/sidebar_admin',$data);
    $this->load->view($dashboard_admin,$data);
    $this->load->view('template_admin/footer_admin',$data);
}

public function slider(){

        $data['title'] = 'slider';
     $data ['setting'] = $this->M_lengkap->slider();


    # Template
    $dashboard_admin = 'admin/setting/v_slider';#view file;
    $this->load->view('template_admin/header_admin',$data);
    $this->load->view('template_admin/sidebar_admin',$data);
    $this->load->view($dashboard_admin,$data);
    $this->load->view('template_admin/footer_admin',$data);
}

public function divisi(){

        $data['title'] = 'divisi';
     $data ['setting'] = $this->M_lengkap->divisi();


    # Template
    $dashboard_admin = 'admin/setting/v_divisi';#view file;
    $this->load->view('template_admin/header_admin',$data);
    $this->load->view('template_admin/sidebar_admin',$data);
    $this->load->view($dashboard_admin,$data);
    $this->load->view('template_admin/footer_admin',$data);
}

public function layanan(){

        $data['title'] = 'layanan';
     $data ['setting'] = $this->M_lengkap->layanan();


    # Template
    $dashboard_admin = 'admin/setting/v_layanan';#view file;
    $this->load->view('template_admin/header_admin',$data);
    $this->load->view('template_admin/sidebar_admin',$data);
    $this->load->view($dashboard_admin,$data);
    $this->load->view('template_admin/footer_admin',$data);
}

public function dokumen(){

        $data['title'] = 'dokumen';
     $data ['setting'] = $this->M_lengkap->dokumen();


    # Template
    $dashboard_admin = 'admin/setting/v_dokumen';#view file;
    $this->load->view('template_admin/header_admin',$data);
    $this->load->view('template_admin/sidebar_admin',$data);
    $this->load->view($dashboard_admin,$data);
    $this->load->view('template_admin/footer_admin',$data);
}


public function tambah()
{


    $data['nama'] = $this->input->post('nama');
    
    if($_FILES['slider']['name']!=''){



        $path                    = './uploads/slider/';

        if ($this->input->post('slider_old')!='') {
            $old_file_path = $path . $this->input->post('slider_old');
            if (file_exists($old_file_path)) {
                unlink($old_file_path);
            }
        }

        $filename                = "slider".$this->session->userdata('nama');

        $config['upload_path']   = $path;

        $config['allowed_types'] = "jpg|png|jpeg";

        $config['overwrite']     = "true";

        $config['max_size']      = 2024;

        $config['file_name']      = $filename;

        $this->upload->initialize($config);



        if (!$this->upload->do_upload('slider')) {





            redirect('admin/setting');



        } else {

            $dat             = $this->upload->data();

            $data['slider'] = $dat['file_name'];

        }

    }else{

        $data['slider'] = $this->input->post('slider_old');

    }

    // Update profile using your model (M_lengkap)
    $this->M_lengkap->tambah_slider($data);

    // ALERT
    $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible fade show" role="alert">
        Data Berhasil Diubah!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');

    redirect('admin/setting/slider');
}

public function tambah_divisi()
{


    $data['nama_divisi'] = $this->input->post('nama_divisi');
    
    

    // Update profile using your model (M_lengkap)
    $this->M_lengkap->tambah_kategori_divisi($data);

    // ALERT
    $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible fade show" role="alert">
        Data Berhasil Diubah!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');

    redirect('admin/setting/divisi');
}

public function tambah_layanan()
{


    $data['nama_layanan'] = $this->input->post('nama_layanan');
    $data['deskripsi'] = $this->input->post('deskripsi');
    
    

    // Update profile using your model (M_lengkap)
    $this->M_lengkap->tambah_kategori_layanan($data);

    // ALERT
    $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible fade show" role="alert">
        Data Berhasil Diubah!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');

    redirect('admin/setting/layanan');
}

public function tambah_dokumen()
{


    $data['nama_dokumen'] = $this->input->post('nama_dokumen');
    $data['deskripsi'] = $this->input->post('deskripsi');
    
    

    // Update profile using your model (M_lengkap)
    $this->M_lengkap->tambah_kategori_dokumen($data);

    // ALERT
    $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible fade show" role="alert">
        Data Berhasil Diubah!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');

    redirect('admin/setting/dokumen');
}


public function update_slider()
{


    $data['nama'] = $this->input->post('nama');
    
    if($_FILES['slider']['name']!=''){



        $path                    = './uploads/slider/';

        if ($this->input->post('slider_old')!='') {
            $old_file_path = $path . $this->input->post('slider_old');
            if (file_exists($old_file_path)) {
                unlink($old_file_path);
            }
        }

        $filename                = "slider".$this->session->userdata('nama');

        $config['upload_path']   = $path;

        $config['allowed_types'] = "jpg|png|jpeg";

        $config['overwrite']     = "true";

        $config['max_size']      = 2024;

        $config['file_name']      = $filename;

        $this->upload->initialize($config);



        if (!$this->upload->do_upload('slider')) {





            redirect('admin/profil');



        } else {

            $dat             = $this->upload->data();

            $data['slider'] = $dat['file_name'];

        }

    }else{

        $data['slider'] = $this->input->post('slider_old');

    }

    // Update profile using your model (M_lengkap)
    $this->M_lengkap->edit_slider($data);

    // ALERT
    $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible fade show" role="alert">
        Data Berhasil Diubah!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');

    redirect('admin/setting/slider');
}


public function update_web()
{
    // csrfValidate();
    // POST
    $data['id'] = $this->input->post('id');
    $data['nama_web'] = $this->input->post('nama_web');
    $data['sub_web'] = $this->input->post('sub_web');
    $data['alamat'] = $this->input->post('alamat');
    $data['facebook'] = $this->input->post('facebook');
    $data['email'] = $this->input->post('email');
    $data['pass_email'] = $this->input->post('pass_email');
    $data['instagram'] = $this->input->post('instagram');
    $data['no_telp'] = $this->input->post('no_telp');


    if($_FILES['logo_web']['name']!=''){



        $path                    = './uploads/logo_web/';

        if ($this->input->post('logo_web_old')!='') {
            $old_file_path = $path . $this->input->post('logo_web_old');
            if (file_exists($old_file_path)) {
                unlink($old_file_path);
            }
        }

        $filename                = "logo_web".$this->session->userdata('nama');

        $config['upload_path']   = $path;

        $config['allowed_types'] = "jpg|png|jpeg";

        $config['overwrite']     = "true";

        $config['max_size']      = 2024;

        $config['file_name']      = $filename;

        $this->upload->initialize($config);



        if (!$this->upload->do_upload('logo_web')) {





            redirect('admin/setting');



        } else {

            $dat             = $this->upload->data();

            $data['logo_web'] = $dat['file_name'];

        }

    }else{

        $data['logo_web'] = $this->input->post('logo_web_old');

    }


    // Update profile using your model (M_lengkap)
    $this->M_lengkap->edit_setting($data);

    // ALERT
    $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible fade show" role="alert">
        Data Berhasil Diubah!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');

    redirect('admin/setting');
}

public function update_divisi()
{
    // csrfValidate();
    // POST
    $data['id_divisi'] = $this->input->post('id_divisi');
    $data['nama_divisi'] = $this->input->post('nama_divisi');



    // Update profile using your model (M_lengkap)
    $this->M_lengkap->edit_setting_divisi($data);

    // ALERT
    $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible fade show" role="alert">
        Data Berhasil Diubah!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');

    redirect('admin/setting/divisi');
}

public function update_layanan()
{
    // csrfValidate();
    // POST
    $data['id_layanan'] = $this->input->post('id_layanan');
    $data['nama_layanan'] = $this->input->post('nama_layanan');
    $data['deskripsi'] = $this->input->post('deskripsi');

    // Update profile using your model (M_lengkap)
    $this->M_lengkap->edit_setting_layanan($data);

    // ALERT
    $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible fade show" role="alert">
        Data Berhasil Diubah!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');

    redirect('admin/setting/layanan');
}

public function update_dokumen()
{
    // csrfValidate();
    // POST
    $data['id_dokumen'] = $this->input->post('id_dokumen');
    $data['nama_dokumen'] = $this->input->post('nama_dokumen');
    $data['deskripsi'] = $this->input->post('deskripsi');

    // Update profile using your model (M_lengkap)
    $this->M_lengkap->edit_setting_dokumen($data);

    // ALERT
    $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible fade show" role="alert">
        Data Berhasil Diubah!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');

    redirect('admin/setting/dokumen');
}

public function delete() {
	$id = $this->uri->segment(4);


    // Delete the data
	$this->M_lengkap->delete_slider($id);

    // Set success message
	$this->session->set_flashdata('pesan', ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
		Data Berhasil Dihapus!
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');

	redirect('admin/setting/slider');
}

public function delete_divisi() {
    $id = $this->uri->segment(4);


    // Delete the data
    $this->M_lengkap->delete_setting_divisi($id);

    // Set success message
    $this->session->set_flashdata('pesan', ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data Berhasil Dihapus!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');

    redirect('admin/setting/divisi');
}


public function delete_layanan() {
    $id = $this->uri->segment(4);


    // Delete the data
    $this->M_lengkap->delete_setting_layanan($id);

    // Set success message
    $this->session->set_flashdata('pesan', ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data Berhasil Dihapus!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');

    redirect('admin/setting/layanan');
}


public function delete_dokumen() {
    $id = $this->uri->segment(4);


    // Delete the data
    $this->M_lengkap->delete_setting_dokumen($id);

    // Set success message
    $this->session->set_flashdata('pesan', ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data Berhasil Dihapus!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');

    redirect('admin/setting/dokumen');
}










}


?>
