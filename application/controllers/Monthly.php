<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Monthly extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('report_m', 'report');
    }
    public function index()
    {
        $data = array(
            'header' => 'Monthly Report',
            'bulanini' => '',
        );
        $this->load->view('monthly_report', $data);
    }
}
