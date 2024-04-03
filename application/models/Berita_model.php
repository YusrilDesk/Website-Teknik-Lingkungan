<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_Model {

	function getAllBerita()
	{
		$this->db->select('tbl_berita.*, tbl_divisi.nama_divisi, tbl_admin.nama');
		$this->db->from('tbl_berita');
		$this->db->join('tbl_divisi', 'tbl_divisi.id_divisi = tbl_berita.id_divisi', 'LEFT');
		$this->db->join('tbl_admin', 'tbl_admin.id = tbl_berita.id', 'LEFT');
		$this->db->order_by('id_berita', 'desc');

		$query = $this->db->get();
		return $query->result();
	}

	function tambah($data)
	{
		$this->db->insert('tbl_berita', $data);
	}

	public function all_berita($limit = 6) {
        $this->db->select('*');
        $this->db->from('tbl_berita');
        $this->db->order_by('waktu', 'desc');
        $this->db->limit($limit);
        $query = $this->db->get();
        
        return $query->result();
    }
	
	function edit($data)
	{
		$this->db->where('id_berita', $data['id_berita']);
		$this->db->update('tbl_berita',$data);
	}

	function akhir()
	{
		$query = $this->db->query('SELECT * FROM tbl_berita ORDER BY id_berita DESC');
		return $query->row();
	}

	function getById($id_berita)
	{
		$this->db->select('*');
		$this->db->from('tbl_berita');
		$this->db->where('id_berita', $id_berita);
		$this->db->order_by('id_berita', 'desc');

		$query = $this->db->get();
		return $query->row();
	}
	
	function delete($data)
	{
		$this->db->where('id_berita', $data['id_berita']);
		$this->db->delete('tbl_berita', $data);
	}

	function home_berita()
	{
		$query = "SELECT max(id_berita) as id_berita FROM tbl_berita";
		$id_berita_baru = $this->db->query($query)->row()->id_berita;

		$this->db->select('*');
		$this->db->from('tbl_berita');
		$this->db->where(['status_berita' => 'publish', 'id_berita !=' => $id_berita_baru]);
		$this->db->limit(3);
		$this->db->order_by('id_berita', 'desc');

		$query = $this->db->get()->result();
		return $query;

	}

	public function berita_terbaru()
	{
		$this->db->select('tbl_berita.*, tbl_admin.nama as admin_nama, tbl_divisi.nama_divisi');
		$this->db->from('tbl_berita');
		$this->db->join('tbl_admin', 'tbl_admin.id = tbl_berita.id', 'LEFT');
		$this->db->join('tbl_divisi', 'tbl_divisi.id_divisi = tbl_berita.id_divisi', 'LEFT');
		$this->db->where('tbl_berita.status_berita', 'publish');
		$this->db->limit(1);
		$this->db->order_by('tbl_berita.id_berita', 'desc');

		$query = $this->db->get();
		return $query->row();
	}

	function getBerita($slug_berita)
	{
		
		$this->db->select('tbl_berita.*, tbl_admin.nama');
		$this->db->from('tbl_berita');
		$this->db->join('tbl_admin', 'tbl_admin.id = tbl_berita.id', 'LEFT');
		$this->db->where('slug_berita', $slug_berita);
		$this->db->order_by('id_berita', 'desc');

		$query = $this->db->get();
		return $query->row();
	}

	public function beritaLain($slug)
	{
		$this->db->select('*');
		$this->db->from('tbl_berita');
		// where slider
		$this->db->where(['status_berita' => 'publish', 'slug_berita !=' => $slug]);
		$this->db->order_by('id_berita', rand());
		// batasi 10 slide saja
		$this->db->limit(3);
		$query = $this->db->get();

		return $query->result();
	}

	function countAllNews()
	{
		return $this->db->get('tbl_berita')->num_rows();
	}

	function getNews($limit, $start)
	{
		$this->db->order_by('id_berita', 'desc');
		return $this->db->get('tbl_berita', $limit, $start)->result();
		
	}
	
	public function getSkripsi()
	{
		$this->db->select('pengguna.nama_lengkap, prodi.nama_prodi, bimbingan_mhs.*');
		$this->db->from('bimbingan_mhs');
		$this->db->join('pengguna', 'pengguna.nim = bimbingan_mhs.nim', 'LEFT');
		$this->db->join('prodi', 'prodi.id_prodi = bimbingan_mhs.id_prodi', 'LEFT');
		$this->db->order_by('bimbingan_mhs.id', 'desc');

		$query = $this->db->get();
		return $query->result();
	}
	
	
}