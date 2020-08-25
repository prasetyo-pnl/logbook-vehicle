<?php
class Dashboard_m extends CI_Model
{
    public function getUser()
    {
        $query = $this->db->query("SELECT COUNT(username) AS user FROM tb_pengguna");
        return $query;
    }
    public function getVehicle()
    {
        $query = $this->db->query("SELECT COUNT(tagsign) AS vehicle FROM tb_vehicle");
        return $query;
    }
    public function getPlant()
    {
        $query = $this->db->query("SELECT COUNT(kodebidang) AS plant FROM tb_bidang");
        return $query;
    }
    public function getTrouble()
    {
        $query = $this->db->query("SELECT COUNT(id_trouble) AS trouble FROM tb_trouble");
        return $query;
    }
    function Jum_trouble()
    {
        //$hariini = year('yy-m-d', strtotime($filter['hariini']));
        $this->db->group_by('month(dateentry)');
        $this->db->where("year(dateentry)='2020'");
        $this->db->select('month(dateentry) as bulan');
        $this->db->select("COUNT(kindoftrouble) as total");
        return $this->db->from('tb_trouble')
            ->get()
            ->result();
    }
}
