<?php

class ortu_model extends CI_Model
{

	public $table = 'orangtua';
	public $username = 'username';
	public $order = 'DESC';

	public function tampil_data($table)
	{
		return $this->db->get($table);
	}

	public function ambil_data($username)
	{
		$this->db->where('username', $username);
		return $this->db->get('orangtua')->row();
	}

	public function tampil_kelas($id)
	{
		$data = $this->db->query("SELECT kelas.nama_kelas FROM $this->table 
			JOIN kelas ON (siswa.id_kelas = kelas.id_kelas)
			WHERE siswa.id = $id")->result();

		return $data;
	}

	public function ambil_id_siswa($id)
	{
		$hasil = $this->db->where('id', $id)->get('siswa');
		if ($hasil->num_rows() > 0) {
			return $hasil->result();
		} else {
			return false;
		}
	}

	public function insert_data($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function hapus_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
}
