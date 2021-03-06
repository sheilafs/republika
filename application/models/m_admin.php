<?php
class M_admin extends CI_Model {
	function kat(){
		$query = ('SELECT * from kategori'); //query untuk menampilkan data dari tabel 
		return $this->db->query($query);
	}
	
	function cari()
	{
		$cari = $this->input->GET('cari', TRUE);
		$data = $this->db->query("SELECT * from news 
			join kategori on news.id_kategori = kategori.id_ktg where title||content||kategori like '%$cari%' ");
		return $data->result();
	}
	
	function kategori(){
		$query = ('SELECT * from news 
			join kategori on news.id_kategori = kategori.id_ktg'); //query untuk menampilkan data dari tabel dengan kondisi join
		return $this->db->query($query);
	}
	
	function input($data,$table){
		$this->db->insert($table,$data); //untuk menambah data berdasar array $table dan $data
	}
	
	function hapus($where,$table){
		$this->db->where($where); //$where untuk menyeleksi query
		$this->db->delete($table); //delete untuk menghapus record
	}

	function pilih($where, $table){		
		return $this->db->get_where($table, $where);
	}
	
	function update_data($where, $data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
		return TRUE;
	}
}
