<?php

class nilai_model extends CI_Model
{

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function input_detail($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function get_id_nilai($nis, $kode_mp)
    {
        $id = $this->db->query("SELECT id_nilai FROM nilai WHERE nis_siswa=$nis AND kode_matapelajaran='$kode_mp'")->result();

        return $id;
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
