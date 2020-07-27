<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Plant extends CI_Controller
{
    function __construct()
    {
        parent :: __construct();
        $this->load->model('plant_m');
    }
    public function index(){
        $query = $this->plant_m->get();

        $data = array(
            'header'=> 'Tampil Data Plant',
            'plant' => $query->result(),
        );
        
        $this->load->view('plant_tampil', $data);
    }        
}
