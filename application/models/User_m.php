<?php
class User_m extends CI_Model
{
    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('tb_pengguna');
        if ($id != null) {
            $this->db->where('username', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    function getPlant()
    {
        $query = $this->db->get('tb_bidang');
        return $query;
    }
    public function add($data)
    {
        $param = array(
            'username' => $data['username'],
            'password' => $data['password'],
            'kodebidang' => $data['plant'],
        );
        $this->db->insert('tb_pengguna', $param);
    }
    public function edit($data)
    {
        $param = array(
            'username' => $data['username'],
            'password' => $data['password'],
            'kodebidang' => $data['plant'],
        );
        $this->db->set($param);
        $this->db->where('username', $data['id']);
        $this->db->update('tb_pengguna');
    }
    function delete($id)
    {
        $this->db->where('username', $id);
        $this->db->delete('tb_pengguna');
    }
}
