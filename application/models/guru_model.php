<?php

class guru_model extends CI_Model
{

    public function tampil_data()
    {
        return $this->db->get('guru');
    }

    public function ambil_id_guru($id)
    {
        $hasil = $this->db->where('id_guru', $id)->get('guru');
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

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function ambil_data($username)
    {
        $this->db->where('username', $username);
        return $this->db->get('guru')->row();
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
