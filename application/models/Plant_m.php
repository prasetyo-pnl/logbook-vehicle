<?php

class Plant_m extends CI_Model
{
    public function get($id = null){
        $this->db->select('*');
        $this->db->from('tb_bidang');
        if ($id != null) {
            $this->db->where('kodebidang, $id');
        }
        $query = $this->db->get();
        return $query;
    }
}


?>