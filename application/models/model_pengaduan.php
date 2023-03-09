<?php 

class Model_pengaduan extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('tb_pengaduan');
    }

    public function hapus($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}