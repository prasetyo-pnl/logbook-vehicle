<?php
class Vehicle_m extends Ci_Model{
    
    public function get($id = null){

        $this->db->select('*');
        $this->db->from('tb_vehicle');
        if ($id != null) {
            $this->db->where('tagsign', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    function getPlant(){
        $query = $this->db->get('tb_bidang');
        return $query;
    }

    function add($data){
        $param =array(
            'tagsign'=> $data['tagsign'],
            'namakendaraan' => $data['namakendaraan'],
            'type' => $data['type'],
            'kapasitas' => $data['kapasitas'],
            'model' => $data['model'],
            'maker' => $data['maker'],
            'chasis' => $data['chasis'],
            'engine' => $data['engine'],
            'usingdate' => $data['usingdate'],
            'foto' => $data['foto'],
            'kodebidang' => $data['kodebidang'],
        );
        $this->db->insert('tb_vehicle',$param);
    }
    function edit($data)
    {
        $param = array(
            'tagsign' => $data['tagsign'],
            'namakendaraan' => $data['namakendaraan'],
            'type' => $data['type'],
            'kapasitas' => $data['kapasitas'],
            'model' => $data['model'],
            'maker' => $data['maker'],
            'chasis' => $data['chasis'],
            'engine' => $data['engine'],
            'usingdate' => $data['usingdate'],
            'kodebidang' => $data['kodebidang'],
        );
        if ($data['foto'] != null) {
            $param['foto'] = $data['foto'];
        }
        $this->db->set($param);
        $this->db->where('tagsign', $data['id']);
        $this->db->update('tb_vehicle');
    }

    function delete($id){
        $this->db->where('tagsign', $id);
        $this->db->delete('tb_vehicle');
    }
}

?>