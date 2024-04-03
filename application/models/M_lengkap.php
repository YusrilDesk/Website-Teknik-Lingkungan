<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_lengkap extends CI_Model {

	public function readLengkap($select,$tabel1,$tabel2,$gabung,$where,$order,$limit, $start, $key) {
		$this->db->select($select);
		$this->db->from($tabel1);

		if($tabel2 !="" OR $gabung !=""){
			$this->db->join($tabel2,$gabung,'LEFT');
		}
		if($where!=''){
			$this->db->where($where);
		}

		if($order!=''){
			$this->db->order_by($order, 'DESC');
		}
		if($key!=''){
			$this->db->like("a.id_mahasiswa", $key);
		}
		if($limit !="" OR $start !=""){
			$this->db->limit($limit, $start);
		}

		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return null;
	}

	public function berita_terbaru()
	{
		$this->db->select('*');
		$this->db->from('tbl_berita');
		$this->db->where('status_berita', 'publish');
		$this->db->limit(1);
		$this->db->order_by('id_berita', 'desc');

		$query = $this->db->get();
		return $query->row();
	}


	public function countDataBerita() {
		$this->db->from('tbl_berita');
		return $this->db->count_all_results();
	}

	public function countDataSop() {
		$this->db->from('tbl_sop');
		return $this->db->count_all_results();
	}

	public function countDataDokumen() {
		$this->db->from('tbl_Dokumen');
		return $this->db->count_all_results();
	}

	public function countDataStandart() {
		$this->db->from('tbl_standart_mutu');
		return $this->db->count_all_results();
	}
	public function countDataLaporan() {
		$this->db->from('tbl_laporan_spmi');
		return $this->db->count_all_results();
	}
	public function countDataAkreditasi1() {
		$this->db->from('tbl_akreditasi_institusi');
		return $this->db->count_all_results();
	}
	public function countDataAkreditasi2() {
		$this->db->from('tbl_akreditasi_prodi');
		return $this->db->count_all_results();
	}



	public function getDaftarBerita() {
        // Gantilah 'berita' dengan nama tabel sebenarnya
		$query = $this->db->get('tbl_berita');
		return $query->result();
	}

	public function get_latest_berita($limit = 3) {
        $this->db->select('*');
        $this->db->from('tbl_berita');
        $this->db->order_by('waktu', 'desc');
        $this->db->limit($limit);
        $query = $this->db->get();
        return $query->result_array();
    }

	public function getDetailBeritaById($id_berita) {
        // Gantilah 'berita' dengan nama tabel sebenarnya
		$query = $this->db->get_where('tbl_berita', array('id_berita' => $id_berita));

        // Periksa apakah berita dengan ID tersebut ada dalam database
		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
            return false; // Berita tidak ditemukan
        }
    }

    public function get_foto_berita_by_id($id) {
    	$this->db->select('foto_berita');
    	$this->db->where('id_berita', $id);
    	$query = $this->db->get('tbl_berita');

    	if ($query->num_rows() > 0) {
    		$row = $query->row();
    		return $row->foto_berita;
    	}

        return null; // Mengembalikan null jika tidak ada data dengan ID yang sesuai
    }



    public function get_file_name_by_id($id) {
    	$this->db->select('file_sop');
        $this->db->from('tbl_sop'); // Gantilah 'nama_tabel' dengan nama tabel yang sesuai
        $this->db->where('id_sop', $id);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
        	$row = $query->row();
        	return $row->foto_berita;
        }

        return null; // Return null if no data is found
    }


    public function fetch_email() {
    	$this->db->select('*');
    	$this->db->from('setting_web');
    	$this->db->where('id', 1);
    	$query = $this->db->get();
    	if ($query->num_rows() > 0) {
    		foreach ($query->result() as $row) {
    			$data[] = $row;
    		}
    		return $data;
    	}
    	return false;
    }

    public function getLatestBeritaByDivisi($divisi) {
    	$this->db->where('divisi', $divisi);
    	$this->db->order_by('waktu', 'desc');
    	$this->db->limit(1);
    	return $this->db->get('tbl_berita')->row();
    }

    public function getPreviousBeritaByDivisi($divisi, $currentBeritaId) {
    	$this->db->where('divisi', $divisi);
    	$this->db->where('id_berita !=', $currentBeritaId);
    	$this->db->order_by('waktu', 'desc');
    	return $this->db->get('tbl_berita')->result();
    }

    public function getNewsBySlug($slug) {
    	$this->db->where('slug', $slug);
    	return $this->db->get('tbl_berita')->row();
    }

    public function get_berita_by_divisi($division_id) {
    	$this->db->select('*');
    	$this->db->from('tbl_berita');
    	$this->db->where('division_id', $division_id);
    	$query = $this->db->get();
    	return $query->result();
    }



    public function beritadivisi($divisi) {
        // Query untuk mengambil berita berdasarkan divisi
    	$this->db->where('divisi', $divisi);
        $query = $this->db->get('tbl_berita'); // 'berita' adalah nama tabel berita dalam contoh ini

        if ($query->num_rows() > 0) {
        	return $query->result();
        } else {
            return array(); // Mengembalikan array kosong jika tidak ada berita yang ditemukan
        }
    }

    public function getKetuaSambutan() {
        // Mengambil data sambutan ketua dari database
        $query = $this->db->get('tbl_profil'); // Gantilah 'tabel_profile' dengan nama tabel yang sesuai di database Anda

        if ($query->num_rows() > 0) {
        	return $query->row_array();
        } else {
        	return array('sambutan_ketua' => 'Sambutan ketua tidak ditemukan.');
        }
    }


    public function getAkreditasi() {
        // Mengambil data sambutan ketua dari database
        $query = $this->db->get('tbl_profil'); // Gantilah 'tabel_profile' dengan nama tabel yang sesuai di database Anda

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return array('akreditasi' => 'Akreditasi ketua tidak ditemukan.');
        }
    }



    public function getvisi() {
        // Mengambil data sambutan ketua dari database
        $query = $this->db->get('tbl_profil'); // Gantilah 'tabel_profile' dengan nama tabel yang sesuai di database Anda

        if ($query->num_rows() > 0) {
        	return $query->row_array();
        } else {
        	return array('visi' => 'Sambutan ketua tidak ditemukan.');
        }
    }

    public function getmisi() {
        // Mengambil data sambutan ketua dari database
        $query = $this->db->get('tbl_profil'); // Gantilah 'tabel_profile' dengan nama tabel yang sesuai di database Anda

        if ($query->num_rows() > 0) {
        	return $query->row_array();
        } else {
        	return array('misi' => 'Sambutan ketua tidak ditemukan.');
        }
    }

    public function getTujuan() {
        // Mengambil data sambutan ketua dari database
        $query = $this->db->get('tbl_profil'); // Gantilah 'tabel_profile' dengan nama tabel yang sesuai di database Anda

        if ($query->num_rows() > 0) {
        	return $query->row_array();
        } else {
        	return array('tujuan' => 'Sambutan ketua tidak ditemukan.');
        }
    }

    public function getStruktur() {
        // Mengambil data sambutan ketua dari database
        $query = $this->db->get('tbl_profil'); // Gantilah 'tabel_profile' dengan nama tabel yang sesuai di database Anda

        if ($query->num_rows() > 0) {
        	return $query->row_array();
        } else {
        	return array('struktur_organisasi' => 'Sambutan ketua tidak ditemukan.');
        }
    }

    public function getFotoStruktur() {
        // Mengambil data sambutan ketua dari database
        $query = $this->db->get('tbl_profil'); // Gantilah 'tabel_profile' dengan nama tabel yang sesuai di database Anda

        if ($query->num_rows() > 0) {
        	return $query->row_array();
        } else {
        	return array('foto_struktur' => 'Sambutan ketua tidak ditemukan.');
        }
    }

    public function getTugasPokok() {
        // Mengambil data sambutan ketua dari database
        $query = $this->db->get('tbl_profil'); // Gantilah 'tabel_profile' dengan nama tabel yang sesuai di database Anda

        if ($query->num_rows() > 0) {
        	return $query->row_array();
        } else {
        	return array('tugas_pokok' => 'Sambutan ketua tidak ditemukan.');
        }
    }

    public function getProfilSpmi() {
        // Mengambil data sambutan ketua dari database
        $query = $this->db->get('tbl_spmi'); // Gantilah 'tabel_profile' dengan nama tabel yang sesuai di database Anda

        if ($query->num_rows() > 0) {
        	return $query->row_array();
        } else {
        	return array('profil_spmi' => 'Sambutan ketua tidak ditemukan.');
        }
    }

    public function getAuditorLPM() {
        // Mengambil data sambutan ketua dari database
        $query = $this->db->get('tbl_spmi'); // Gantilah 'tabel_profile' dengan nama tabel yang sesuai di database Anda

        if ($query->num_rows() > 0) {
        	return $query->row_array();
        } else {
        	return array('auditor_lpm' => 'Sambutan ketua tidak ditemukan.');
        }
    }

    public function getFotoLPM() {
        // Mengambil data sambutan ketua dari database
        $query = $this->db->get('tbl_spmi'); // Gantilah 'tabel_profile' dengan nama tabel yang sesuai di database Anda

        if ($query->num_rows() > 0) {
        	return $query->row_array();
        } else {
        	return array('foto_auditor' => 'Sambutan ketua tidak ditemukan.');
        }
    }


    public function get_standarMutu() {
    	return $this->db->get('tbl_standart_mutu')->result();
    }

    public function get_SoP2() {
    	return $this->db->get('tbl_sop')->result();
    }

    public function get_laporanSPMI() {
    	return $this->db->get('tbl_laporan_spmi')->result();
    }

    public function get_akreditasi1() {
    	return $this->db->get('tbl_akreditasi_institusi')->result();
    }

    public function get_akreditasi2() {
    	return $this->db->get('tbl_akreditasi_prodi')->result();
    }

    public function prosedur_ak1() {
        // Mengambil data sambutan ketua dari database
        $query = $this->db->get('tbl_prosedur_akreditasi'); // Gantilah 'tabel_profile' dengan nama tabel yang sesuai di database Anda

        if ($query->num_rows() > 0) {
        	return $query->row_array();
        } else {
        	return array('prosedur_akreditasi' => 'Sambutan ketua tidak ditemukan.');
        }
    }





    public function get($id) {

    	$this->db->where('id_berita',$id);

    	$query = $this->db->get('tbl_berita', 1);

    	return $query->result();

    }

    public function get_sop($id) {

    	$this->db->where('id_sop',$id);

    	$query = $this->db->get('tbl_sop', 1);

    	return $query->result();

    }


    public function get_latest_news($limit = 3) {
        $this->db->select('*');
        $this->db->from('tbl_berita');
        $this->db->order_by('waktu', 'desc');
        $this->db->limit($limit);
        $query = $this->db->get();
        
        return $query->result();
    }

    public function ambil_data(){

    	$this->db->select('*');

    	$this->db->from('tbl_pengurus');

    	$query = $this->db->get();

    	if ($query->num_rows() > 0) {

    		foreach ($query->result() as $row) {

    			$data[] = $row;

    		}

    		return $data;

    	}

    	return null;

    }

    public function setting(){

    	$this->db->select('*');

    	$this->db->from('setting_web');

    	$query = $this->db->get();

    	if ($query->num_rows() > 0) {

    		foreach ($query->result() as $row) {

    			$data[] = $row;

    		}

    		return $data;

    	}

    	return null;

    }

    public function slider(){

    	$this->db->select('*');

    	$this->db->from('slider');

    	$query = $this->db->get();

    	if ($query->num_rows() > 0) {

    		foreach ($query->result() as $row) {

    			$data[] = $row;

    		}

    		return $data;

    	}

    	return null;

    }

    public function ambil_data_kursus(){

        $this->db->select('*');

        $this->db->from('tbl_kursus');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row) {

                $data[] = $row;

            }

            return $data;

        }

        return null;

    }


    public function divisi(){

    	$this->db->select('*');

    	$this->db->from('tbl_divisi');

    	$query = $this->db->get();

    	if ($query->num_rows() > 0) {

    		foreach ($query->result() as $row) {

    			$data[] = $row;

    		}

    		return $data;

    	}

    	return null;

    }

    public function layanan(){

    	$this->db->select('*');

    	$this->db->from('kategori_layanan');

    	$query = $this->db->get();

    	if ($query->num_rows() > 0) {

    		foreach ($query->result() as $row) {

    			$data[] = $row;

    		}

    		return $data;

    	}

    	return null;

    }

    public function dokumen(){

    	$this->db->select('*');

    	$this->db->from('kategori_dokumen');

    	$query = $this->db->get();

    	if ($query->num_rows() > 0) {

    		foreach ($query->result() as $row) {

    			$data[] = $row;

    		}

    		return $data;

    	}

    	return null;

    }

    public function ambil_data_ap(){

    	$this->db->select('*');

    	$this->db->from('tbl_akreditasi_prodi');

    	$query = $this->db->get();

    	if ($query->num_rows() > 0) {

    		foreach ($query->result() as $row) {

    			$data[] = $row;

    		}

    		return $data;

    	}

    	return null;

    }

    public function ambil_data_slider(){

    	$this->db->select('*');

    	$this->db->from('slider');

    	$query = $this->db->get();

    	if ($query->num_rows() > 0) {

    		foreach ($query->result() as $row) {

    			$data[] = $row;

    		}

    		return $data;

    	}

    	return null;

    }


    public function ambil_data_sop()
    {
    	$this->db->select('tbl_sop.*, kategori_dokumen.nama_dokumen');
    	$this->db->from('tbl_sop');
    	$this->db->join('kategori_dokumen', 'kategori_dokumen.id_dokumen = tbl_sop.id_dokumen', 'left');
    	$query = $this->db->get();

    	if ($query->num_rows() > 0) {
    		foreach ($query->result() as $row) {
    			$data[] = $row;
    		}
    		return $data;
    	}

    	return null;
    }



    public function getTotalSaldoByNamaAnggaran($nama_anggaran) {
    	$this->db->select_sum('kredit');
    	$this->db->select_sum('debit');
    	$this->db->where('nama_anggaran', $nama_anggaran);
        $query = $this->db->get('tbl_laporan_anggaran'); // Sesuaikan dengan nama tabel yang menyimpan saldo

        $result = $query->row();
        $total_kredit = ($result->kredit !== null) ? $result->kredit : 0;
        $total_debit = ($result->debit !== null) ? $result->debit : 0;

        return $total_kredit - $total_debit;
    }


    public function getSaldoTerakhir($nama_anggaran) {
    	$this->db->select('jumlah_anggaran');
    	$this->db->where('nama_anggaran', $nama_anggaran);
    	$this->db->order_by('id_anggaran', 'DESC');
    	$this->db->limit(1);
        $query = $this->db->get('tbl_laporan_anggaran'); // Sesuaikan dengan nama tabel yang menyimpan saldo
        if ($query->num_rows() > 0) {
        	return $query->row()->jumlah_anggaran;
        } else {
            return $this->getSaldoAwal($nama_anggaran); // Mengembalikan saldo awal jika tidak ada saldo sebelumnya
        }
    }

    public function getSaldoAwal($nama_anggaran) {
    	$this->db->select('jumlah_anggaran');
    	$this->db->from('tbl_laporan_anggaran');
    	$this->db->where('nama_anggaran', $nama_anggaran);
    	$result = $this->db->get()->row();

    	if ($result) {
    		return $result->jumlah_anggaran;
    	}

        // Jika tidak ada data, kembalikan 0 atau nilai default sesuai kebutuhan
    	return 0;
    }

    public function getAnggaranById($id) {
    	return $this->db->get_where('tbl_laporan_anggaran', array('id_anggaran' => $id))->row();
    }


    public function updateSaldoByNamaAnggaran($nama_anggaran, $saldo_terbaru) {
    	$this->db->where('nama_anggaran', $nama_anggaran);
    	$this->db->update('tbl_laporan_anggaran', array('jumlah_anggaran' => $saldo_terbaru));
    }

    public function delete_anggaran($id) {
    	$this->db->where('id_anggaran', $id);
    	$this->db->delete('tbl_laporan_anggaran');
    }


    public function ambil_data_profile(){

    	$this->db->select('*');

    	$this->db->from('tbl_profil');

    	$query = $this->db->get();

    	if ($query->num_rows() > 0) {

    		foreach ($query->result() as $row) {

    			$data[] = $row;

    		}

    		return $data;

    	}

    	return null;

    }

    public function ambil_data_proker(){

    	$this->db->select('*');

    	$this->db->from('tbl_proker');

    	$query = $this->db->get();

    	if ($query->num_rows() > 0) {

    		foreach ($query->result() as $row) {

    			$data[] = $row;

    		}

    		return $data;

    	}

    	return null;

    }

    public function ambil_data_dokumen(){

    	$this->db->select('*');

    	$this->db->from('tbl_dokumen');

    	$query = $this->db->get();

    	if ($query->num_rows() > 0) {

    		foreach ($query->result() as $row) {

    			$data[] = $row;

    		}

    		return $data;

    	}

    	return null;

    }

 public function get_laporan_by_year($year = null, $jenis_dokumen = null) {
    $this->db->select('*');
    $this->db->from('tbl_laporan_kinerja');

    // Filter berdasarkan tahun jika ada
    if ($year != null) {
        $this->db->where('tahun', $year);
    }

    // Filter berdasarkan jenis dokumen jika ada
    if ($jenis_dokumen != null) {
        $this->db->where('jenis_dokumen', $jenis_dokumen);
    }

    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->result();
    }

    return array(); // Mengembalikan array kosong jika tidak ada data
}

public function get_laporan_by_year_and_type($year, $type) {
    if (!empty($year)) {
        $this->db->where('YEAR(waktu)', $year);
    }
    if (!empty($type)) {
        $this->db->where('jenis_dokumen', $type);
    }
    $query = $this->db->get('tbl_laporan_kinerja');
    return $query->result();
}


    public function ambil_data_berita(){

    	$this->db->select('*');

    	$this->db->from('tbl_berita');

    	$query = $this->db->get();

    	if ($query->num_rows() > 0) {

    		foreach ($query->result() as $row) {

    			$data[] = $row;

    		}

    		return $data;

    	}

    	return null;

    }

    public function ambil_data_pengumuman(){

    	$this->db->select('*');

    	$this->db->from('tbl_pengumuman');

    	$query = $this->db->get();

    	if ($query->num_rows() > 0) {

    		foreach ($query->result() as $row) {

    			$data[] = $row;

    		}

    		return $data;

    	}

    	return null;

    }


     public function get_anggaran() {
        // Ubah 'nama_tabel' sesuai dengan nama tabel anggaran di database Anda
        $query = $this->db->get('tbl_laporan_anggaran');
        return $query->result();
    }

    public function get_dokumen2() {
        // Ubah 'nama_tabel' sesuai dengan nama tabel anggaran di database Anda
        $query = $this->db->get('tbl_sop');
        return $query->result();
    }

    public function get_dokumen() {
        return $this->db->get('tbl_dokumen')->result();
    }

    public function ambil_data_layanan(){

    	$this->db->select('*');

    	$this->db->from('tbl_layanan');

    	$query = $this->db->get();

    	if ($query->num_rows() > 0) {

    		foreach ($query->result() as $row) {

    			$data[] = $row;

    		}

    		return $data;

    	}

    	return null;

    }

    public function ambil_kategori_layanan(){

        $this->db->select('*');

        $this->db->from('kategori_layanan');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row) {

                $data[] = $row;

            }

            return $data;

        }

        return null;

    }

    public function getAllAnggaran()
    {
    	$this->db->select('tbl_laporan_anggaran.*, tbl_divisi.nama_divisi');
    	$this->db->from('tbl_laporan_anggaran');
    	$this->db->join('tbl_divisi', 'tbl_divisi.id_divisi = tbl_laporan_anggaran.id_divisi', 'LEFT');
    	$this->db->order_by('id_anggaran', 'desc');

    	$query = $this->db->get();
    	return $query->result();
    }

    public function ambil_data_admin(){

    	$this->db->select('*');

    	$this->db->from('tbl_admin');

    	$query = $this->db->get();

    	if ($query->num_rows() > 0) {

    		foreach ($query->result() as $row) {

    			$data[] = $row;

    		}

    		return $data;

    	}

    	return null;

    }

    public function ambil_data_laporan(){

    	$this->db->select('*');

    	$this->db->from('tbl_laporan_kinerja');

    	$query = $this->db->get();

    	if ($query->num_rows() > 0) {

    		foreach ($query->result() as $row) {

    			$data[] = $row;

    		}

    		return $data;

    	}

    	return null;

    }

    public function get_user_login(){
    	$this->db->where('id',$this->session->userdata('id'));
    	$row = $this->db->get('tbl_admin');
    	$user = $row->row();
    	return $user;
    }


    public function tambah($data) {

    	$this->db->insert('tbl_admin', $data);

    }

    public function tambah_kategori_divisi($data) {

    	$this->db->insert('tbl_divisi', $data);

    }

    public function tambah_kategori_layanan($data) {

    	$this->db->insert('kategori_layanan', $data);

    }

    public function tambah_kategori_dokumen($data) {

    	$this->db->insert('kategori_dokumen', $data);

    }

    public function tambah_laporan($data) {

    	$this->db->insert('tbl_laporan_kinerja', $data);

    }


    public function tambah_pengurus($data) {

    	$this->db->insert('tbl_pengurus', $data);

    }



    public function tambah_profile($data) {

    	$this->db->insert('tbl_profile', $data);

    }

    public function tambah_berita($data) {

    	$this->db->insert('tbl_berita', $data);

    }

    

    public function tambah_sop($data) {

    	$this->db->insert('tbl_sop', $data);

    }

    public function tambah_kursus($data) {

        $this->db->insert('tbl_kursus', $data);

    }

    public function tambah_mahasiswa($data) {

    	$this->db->insert('tbl_mahasiswa', $data);

    }

    public function tambah_anggaran($data) {

    	$this->db->insert('tbl_laporan_anggaran', $data);

    }

    public function get_sops() {
    	return $this->db->get('tbl_sop')->result();
    }

    public function tambah_proker($data) {

    	$this->db->insert('tbl_proker', $data);

    }

    public function tambah_slider($data) {

    	$this->db->insert('slider', $data);

    }


    public function edit_proker($data) {

    	$this->db->update('tbl_proker', $data, array('id_proker' => $data['id_proker']));

    }

    public function edit_pengumuman($data) {

    	$this->db->update('tbl_pengumuman', $data, array('id_pengumuman' => $data['id_pengumuman']));

    }

    public function edit($data) {

    	$this->db->update('tbl_admin', $data, array('id' => $data['id']));

    }

    public function edit_setting_divisi($data) {

    	$this->db->update('tbl_divisi', $data, array('id_divisi' => $data['id_divisi']));

    }

     public function edit_kursus($data) {

        $this->db->update('tbl_kursus', $data, array('id_kursus' => $data['id_kursus']));

    }

    public function edit_setting_layanan($data) {

    	$this->db->update('kategori_layanan', $data, array('id_layanan' => $data['id_layanan']));

    }

    public function edit_setting_dokumen($data) {

    	$this->db->update('kategori_dokumen', $data, array('id_dokumen' => $data['id_dokumen']));

    }

    public function edit_profile($data) {

    	$this->db->update('tbl_profil', $data, array('id_profil' => $data['id_profil']));

    }

    public function edit_setting($data) {

    	$this->db->update('setting_web', $data, array('id' => $data['id']));

    }

    public function edit_slider($data) {

    	$this->db->update('slider', $data, array('id' => $data['id']));

    }

    public function edit_anggaran($data) {
    	$this->db->where('id_anggaran', $data['id_anggaran']);
    	$this->db->update('tbl_laporan_anggaran', $data);
    }

    public function edit_pengurus($data) {

    	$this->db->update('tbl_pengurus', $data, array('id_pengurus' => $data['id_pengurus']));

    }

    public function edit_laporan($data) {

    	$this->db->update('tbl_laporan_kinerja', $data, array('id_laporan' => $data['id_laporan']));

    }

    public function edit_sop($data) {

    	$this->db->update('tbl_sop', $data, array('id_sop' => $data['id_sop']));

    }

    public function edit_spmi($data) {

    	$this->db->update('tbl_spmi', $data, array('id_spmi' => $data['id_spmi']));

    }

    public function edit_berita($data) {

    	$this->db->update('tbl_berita', $data, array('id_berita' => $data['id_berita']));

    }


    public function delete_pengurus($id) {

    	$this->db->delete('tbl_pengurus', array('id_pengurus' => $id));


    }


    public function delete_kursus($id) {

        $this->db->delete('tbl_kursus', array('id_kursus' => $id));


    }


    public function delete_slider($id) {

    	$this->db->delete('slider', array('id' => $id));


    }

    public function delete_akreditasi_P($id) {

    	$this->db->delete('tbl_akreditasi_prodi', array('id_akreditasi' => $id));


    }

    public function delete_standar_mutu($id) {

    	$this->db->delete('tbl_standart_mutu', array('id_mutu' => $id));


    }

    public function delete_berita($id) {

    	$this->db->delete('tbl_berita', array('id_berita' => $id));


    }

    public function delete_dokumen($id) {

    	$this->db->delete('tbl_dokumen', array('id_dokumen' => $id));


    }

    public function delete_profile($id) {

    	$this->db->delete('tbl_profil', array('id_profil' => $id));


    }

    public function delete_setting_divisi($id) {

    	$this->db->delete('tbl_divisi', array('id_divisi' => $id));


    }

    public function delete_setting_layanan($id) {

    	$this->db->delete('kategori_layanan', array('id_layanan' => $id));


    }

    public function delete_setting_dokumen($id) {

    	$this->db->delete('kategori_dokumen', array('id_dokumen' => $id));


    }

    public function delete_laporan($id) {

    	$this->db->delete('tbl_laporan_kinerja', array('id_laporan' => $id));


    }

    public function delete_sop($id) {

    	$this->db->delete('tbl_sop', array('id_sop' => $id));


    }

    public function delete_mahasiswa($id) {

    	$this->db->delete('tbl_mahasiswa', array('id_mahasiswa' => $id));


    }

    public function delete_proker($id) {

    	$this->db->delete('tbl_proker', array('id_proker' => $id));


    }


    public function cariMahasiswa($keyword) {
    	$this->db->like('nama_mahasiswa', $keyword);
    	$this->db->or_like('nim_mahasiswa', $keyword);
    	return $this->db->get('tbl_mahasiswa')->result();
    }

}







