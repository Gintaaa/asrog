<?php

class Kost_model extends CI_Model
{
    function get_data_kost()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->join('kost', 'kost.kode_kost = kategori.kode_kost');
        $query = $this->db->get();
        return $query;
    }

    public function detail_kost($id)
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->where('kost.kode_kost', $id);
        $this->db->join('kost', 'kost.kode_kost = kategori.kode_kost', 'left');
        $query = $this->db->get()->row_array();
        return $query;
    }

    public function total($field, $where)
    {
        $this->db->select_sum($field);
        if (!empty($where) && count($where) > 0) {
            $this->db->where($where);
        }
        $this->db->from('kost');
        return $this->db->get()->row($field);
    }

    public function delete_kost($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kost');
    }
    public function edit_kost($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function update_data_Kost($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
