<?php
class Trouble_m extends CI_Model
{
    public function get($id = null)
    {

        if ($id != null) {
            $query = $this->db->query("SELECT id_trouble, tb_trouble.tagsign, dateentry, datefinish, stoptime, kindoftrouble,partofwork,description,countermeasure,sparepart,manpower,remarks, tb_vehicle.kodebidang FROM tb_trouble,tb_vehicle WHERE tb_trouble.tagsign = tb_vehicle.tagsign AND id_trouble = '$id'");
        } else {
            $query = $this->db->query("SELECT id_trouble, tb_trouble.tagsign, dateentry, datefinish, stoptime, kindoftrouble,partofwork,description,countermeasure,sparepart,manpower,remarks, tb_vehicle.kodebidang FROM tb_trouble,tb_vehicle WHERE tb_trouble.tagsign = tb_vehicle.tagsign");
        }
        return $query;
    }
    function getVehicle()
    {
        $query = $this->db->get('tb_vehicle');
        return $query;
    }

    function add($data, $tambahan)
    {
        $param = array(
            'tagsign' => $data['tagsign'],
            'dateentry' => $tambahan['dateentry'],
            'datefinish' => $tambahan['datefinish'],
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
    function edit($data, $tambahan)
    {
        $param = array(
            'dateentry' => $tambahan['dateentry'],
            'datefinish' => $tambahan['datefinish'],
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
