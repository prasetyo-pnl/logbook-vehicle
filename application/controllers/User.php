<?php
class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_m', 'user');
    }

    public function index()
    {
        check_not_login();
        $query = $this->user->get();
        $data = array(
            'header' => 'Data User',
            'user' => $query->result(),
        );
        $this->load->view('user_tampil', $data);
    }

    public function add()
    {
        $queryPlant = $this->user->getPlant();
        $data = array(
            'header' => 'Tambah User',
            'plant' => $queryPlant->result(),
        );

        $this->load->view('user_tambah', $data);
    }
    public function edit($id = null)
    {
        $query = $this->user->get($id);
        $queryPlant = $this->user->getPlant();
        $data = array(
            'header' => 'Edit Data User',
            'user' => $query->row(),
            'plant' => $queryPlant->result(),
        );
        $this->load->view('user_edit', $data);
    }
    public function delete($id = null)
    {
        $this->user->delete($id);
        redirect('user');
    }

    public function proses()
    {
        if (isset($_POST['add'])) {
            $inputan = $this->input->post(null, true);
            $this->user->add($inputan);
        } elseif (isset($_POST['edit'])) {
            $inputan = $this->input->post(null, true);
            $this->user->edit($inputan);
        }
        redirect('user');
    }
}
