<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_m', 'user');
    }

    public function login()
    {
        $this->load->view('login');
    }
    public function proses()
    {
        $post = $this->input->post(null, true);

        if (isset($post['login'])) {

            $query = $this->user->login($post);
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $params = array(
                    'userid' => $row->id_user,
                    'level' => $row->level,
                );
                $this->session->set_userdata($params);
                echo "<script>
                    alert('login berhasil');
                    window.location = '" . site_url('dashboard') . "';
                    </script>";
            } else {
                echo "<script>
                    alert('login gagal, username / password salah');
                    window.location = '" . site_url('auth/login') . "';
                    </script>";
            }
        }
    }
}
