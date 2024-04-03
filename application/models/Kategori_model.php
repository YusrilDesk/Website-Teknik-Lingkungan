<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

	function getAllKategori()
	{
		$this->db->select('*');
        $this->db->from('tbl_divisi');
        $this->db->order_by('id_divisi', 'desc');

        $query = $this->db->get();
        return $query->result();
    }

    function tambah($data){

        $this->db->insert('tbl_divisi', $data);
        
    }

    public function get_kategori_dokumen()
    {
        $this->db->select('id_dokumen, nama_dokumen');
        $this->db->from('kategori_dokumen');
        $this->db->order_by('id_dokumen', 'desc');

        $query = $this->db->get();
        return $query->result();
    }

    public function get_kategori_layanan()
    {
        $this->db->select('id_layanan, nama_layanan');
        $this->db->from('kategori_layanan');
        $this->db->order_by('id_layanan', 'desc');

        $query = $this->db->get();
        return $query->result();
    }
    
    function getById($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_divisi');
        $this->db->where('id_divisi', $id);
        $this->db->order_by('id_divisi', 'desc');
        
        $query = $this->db->get();

        return $query->row();

    }

    function edit($data)
    {
      $this->db->where('id_divisi', $data['id_divisi']);
      $this->db->update('tbl_divisi', $data);
  }

  function delete($data)
  {

      $this->db->where('id_divisi', $data['id_divisi']);
      $this->db->delete('tbl_divisi', $data);

  }


}