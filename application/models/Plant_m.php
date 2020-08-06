<?php

class Plant_m extends CI_Model
{
    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('tb_bidang');
        if ($id != null) {
            $this->db->where('kodebidang', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function add($data)
    {
        $param = array(
            'kodebidang' => $data['codePlant'],
            'namabidang' => $data['namePlant'],
        );
        $this->db->insert('tb_bidang', $param);
    }
    public function edit($data)
    {
        $param = array(
            'kodebidang' => $data['codePlant'],
            'namabidang' => $data['namePlant'],
        );
        $this->db->set($param);
        $this->db->where('kodebidang', $data['id']);
        $this->db->update('tb_bidang');
    }
    function delete($id)
    {
        $this->db->where('kodebidang', $id);
        $this->db->delete('tb_bidang');
    }
}
