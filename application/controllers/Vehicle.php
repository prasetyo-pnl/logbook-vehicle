<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vehicle extends CI_Controller
{
    function __construct()
    {
        parent:: __construct();
        $this->load->model('vehicle_m','vehicle');
    }

    public function index()
    {
        
        $query = $this->vehicle->get();
        
        // $data['vehicle'] = $query->result();
        $data = array(
            'header'=> 'Tampil Data Vehicle',
            'vehicle'=> $query->result(),
            
        );
        $this->load->view('vehicle_tampil', $data);
    }

    public function add(){
        $query = $this->vehicle->getPlant();
        $data = array(
            'header' => 'Tambah Data Vehicle',
            'plant' => $query->result(),
        );
        $this->load->view('vehicle_tambah', $data);  
    }

    public function delete($id = null){
        $this->vehicle->delete($id);
        redirect('vehicle');
    }

    public function edit($id = null){
        $query = $this->vehicle->get($id);
        $plant = $this->vehicle->getPlant();
        $data = array(
            'page' => 'edit',
            'header' => 'Edit Data Vehicle',
            'plant' => $plant->result(),
            'vehicle' => $query->row()

        );
        $this->load->view('vehicle_edit', $data);
    }

    public function proses(){
        
        $config['upload_path']   = './uploads/files';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']      = 2048;
        $config['file_name']     = $this->input->post('tagsign');
        $this->load->library('upload', $config);

        if (isset($_POST['add'])) {
            $inputan = $this->input->post(null,true);

            if(@$_FILES['foto']['name'] != null){
                if ($this->upload->do_upload('foto')) {
                    $inputan['foto']= $this->upload->data('file_name');
                    $this->vehicle->add($inputan);
                    // if ($this->db->affected_rows() > 0) {
                    //     $this->session->set_flashdata('success', 'Data Berhasil disimpan');
                    // }
                    redirect('vehicle');
                }else {
                    // $error = $this->upload->display_errors();
                    // $this->session->set_flashdata('error', $error);
                    redirect('vehicle/add');
                }
                
            }else{
                $inputan['foto'] = null;
                $this->vehicle->add($inputan);
                // if ($this->db->affected_rows() > 0) {
                //     $this->session->set_flashdata('success', 'Data Berhasil disimpan');
                // }
                redirect('vehicle');

            }
            
        }elseif (isset($_POST['edit'])) {
            $inputan = $this->input->post(null, true);
            
            $config['upload_path']   = './uploads/files';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']      = 2048;
            $config['file_name']     = $this->input->post('tagsign');
            $this->load->library('upload', $config);

            if (@$_FILES['foto']['name'] != null) {
                if ($this->upload->do_upload('foto')) {
                    $inputan['foto'] = $this->upload->data('file_name');
                    $this->vehicle->edit($inputan);
                    redirect('vehicle');
                } else {
                    redirect('vehicle/edit');
                }
            } else {
                $inputan['foto'] = null;
                $this->vehicle->edit($inputan);
                // if ($this->db->affected_rows() > 0) {
                //     $this->session->set_flashdata('success', 'Data Berhasil disimpan');
                // }
                redirect('vehicle');
            }
        }
        redirect('vehicle');
    }
}
