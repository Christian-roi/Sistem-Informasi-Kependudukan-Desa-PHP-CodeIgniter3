<?php

class model_penduduk extends CI_Model
{
     public function tampil_data()
     {
          return $this->db->get_where('tb_penduduk', array('isDeleted' => 0));
     }

     public function tambah_data($data, $table)
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
          // update set isdeleted = 1 where id = $id
          $this->db->where($where);
          $this->db->update($table, array('isdeleted' => 1));
     }

     public function detail_data($id)
     {
          $result = $this->db->where('id', $id)->get('tb_penduduk');
          if ($result->num_rows() > 0) {
               return $result->result();
          } else {
               return false;
          }
     }

     public function tampil_sampah()
     {
          return $this->db->get_where('tb_penduduk', array('isDeleted' => 1));
     }

     public function restore_data($where, $table)
     {
          $this->db->where($where);
          $this->db->update($table, array('isdeleted' => 0));
     }

     public function hapus_permanen($where, $table)
     {
          $this->db->where($where);
          $this->db->delete($table);
     }

     public function tampil_data_keluarga($table, $array)
     {
          return $this->db->get_where($table, $array);
     }
}
