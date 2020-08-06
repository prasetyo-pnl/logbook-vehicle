<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Plant extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('plant_m', 'plant');
    }
    public function index()
    {
        $query = $this->plant->get();

        $data = array(
            'header' => 'Tampil Data Plant',
            'plant' => $query->result(),
        );

        $this->load->view('plant_tampil', $data);
    }
    public function add()
    {
        $data = array(
            'header' => 'Tambah Data Plant',
        );

        $this->load->view('plant_tambah', $data);
    }
    public function edit($id = null)
    {
        $query = $this->plant->get($id);

        $data = array(
            'header' => 'Edit Data Plant',
            'plant' => $query->row(),
        );
        $this->load->view('plant_edit', $data);
    }
    public function delete($id = null)
    {
        $this->plant->delete($id);
        redirect('plant');
    }

    public function proses()
    {
        if (isset($_POST['add'])) {
            $inputan = $this->input->post(null, true);
            $this->plant->add($inputan);
        } elseif (isset($_POST['edit'])) {
            $inputan = $this->input->post(null, true);
            $this->plant->edit($inputan);
        }
        redirect('plant');
    }
}
