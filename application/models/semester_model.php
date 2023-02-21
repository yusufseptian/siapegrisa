<?php

class semester_model extends CI_Model
{

	public function tampil_data()
	{
		$query = $this->db->query('SELECT semester.*, tahun_ajaran.tahun_ajaran FROM semester JOIN tahun_ajaran ON(semester.id_ta=tahun_ajaran.id) ORDER BY id_semester DESC')->result();
		return $query;
	}

	public function insert_data($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function edit_data($where, $table)
	{
		return $this->db->get_where($table, $where);
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
