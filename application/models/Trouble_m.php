<?php
class Trouble_m extends CI_Model
{
    public function get($id=null){
        $this->db->select('*');
        $this->db->from('tb_trouble');
        if ($id != null) {
            $this->db->where('id_trouble', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    function getVehicle()
    {
        $query = $this->db->get('tb_vehicle');
        return $query;
    }

    function add($data,$tambahan)
    {
        $param = array(
            'tagsign' => $data['tagsign'],
            'dateentry' => $data['dateentry'],
            'datefinish' => $data['datefinish'],
            'stoptime' => $tambahan['stoptime'],
            'kindoftrouble' => $data['kindoftrouble'],
            'partofwork' => $tambahan['pow'],
            'description' => $tambahan['desc'],
            'countermeasure' => $tambahan['count'],
            'sparepart' => $tambahan['spare'],
            'manpower' => $data['manpower'],
            'remarks' => $data['remarks'],
        );
        $this->db->insert('tb_trouble', $param);
    }
    function edit($data,$tambahan)
    {
        $param = array(
            'dateentry' => $data['dateentry'],
            'datefinish' => $data['datefinish'],
            'stoptime' => $tambahan['stoptime'],
            'kindoftrouble' => $data['kindoftrouble'],
            'partofwork' => $tambahan['pow'],
            'description' => $tambahan['desc'],
            'countermeasure' => $tambahan['count'],
            'sparepart' => $tambahan['spare'],
            'manpower' => $data['manpower'],
            'remarks' => $data['remarks'],
        );
        $this->db->set($param);
        $this->db->where('id_trouble', $data['id']);
        $this->db->update('tb_trouble');
    }

    function delete($id)
    {
        $this->db->where('id_trouble', $id);
        $this->db->delete('tb_trouble');
    }
}

?>