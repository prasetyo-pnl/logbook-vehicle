<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Trouble extends CI_Controller
{
    function __construct()
    {
        parent:: __construct();
        $this->load->model('trouble_m', 'trouble');
    }

    public function index()
    {
        $query = $this->trouble->get();
        
        $data = array(
            'header'=> 'Tampil Data Trouble',
            'trouble'=> $query->result(),
            
        );
        $this->load->view('trouble_tampil', $data);
    }

    public function add()
    {
        $query = $this->trouble->getVehicle();
        $data = array(
            'header' => 'Tambah Data Vehicle',
            'tagsign' => $query->result(),
        );
        $this->load->view('trouble_tambah', $data);
    }

    // public function delete($id = null)
    // {
    //     $this->vehicle->delete($id);
    //     redirect('vehicle');
    // }

    // public function edit($id = null)
    // {
    //     $query = $this->vehicle->get($id);
    //     $plant = $this->vehicle->getPlant();
    //     $data = array(
    //         'header' => 'Edit Data Vehicle',
    //         'plant' => $plant->result(),
    //         'vehicle' => $query->row()

    //     );
    //     $this->load->view('vehicle_edit', $data);
    // }

    // public function proses()
    // {
    //     if (isset($_POST['add'])) {
    //         $inputan = $this->input->post(null, true);

    //         $config['upload_path']   = './uploads/files';
    //         $config['allowed_types'] = 'jpg|png|jpeg';
    //         $config['max_size']      = 2048;
    //         $config['file_name']     = $this->input->post('tagsign');
    //         $this->load->library('upload', $config);

    //         if (@$_FILES['foto']['name'] != null) {
    //             if ($this->upload->do_upload('foto')) {
    //                 $inputan['foto'] = $this->upload->data('file_name');
    //                 $this->vehicle->add($inputan);

    //                 redirect('vehicle');
    //             } else {

    //                 redirect('vehicle/add');
    //             }
    //         } else {
    //             $inputan['foto'] = null;
    //             $this->vehicle->add($inputan);

    //             redirect('vehicle');
    //         }

    //     } elseif (isset($_POST['edit'])) {
    //         $inputan = $this->input->post(null, true);

    //         $config['upload_path']   = './uploads/files';
    //         $config['allowed_types'] = 'jpg|png|jpeg';
    //         $config['max_size']      = 2048;
    //         $config['file_name']     = $this->input->post('tagsign');
    //         $this->load->library('upload', $config);

    //         if (@$_FILES['foto']['name'] != null) {
    //             if ($this->upload->do_upload('foto')) {
    //                 $inputan['foto'] = $this->upload->data('file_name');
    //                 $this->vehicle->edit($inputan);
    //                 // if ($this->db->affected_rows() > 0) {
    //                 //     $this->session->set_flashdata('success', 'Data Berhasil disimpan');
    //                 // }
    //                 redirect('vehicle');
    //             } else {
    //                 // $error = $this->upload->display_errors();
    //                 // $this->session->set_flashdata('error', $error);
    //                 redirect('vehicle/edit');
    //             }
    //         } else {
    //             $inputan['foto'] = null;
    //             redirect('vehicle');
    //         }
    //     }
    //     redirect('vehicle');
    // }
}