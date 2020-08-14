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
        $queryVehicle = $this->report->getVehicle();
        $queryPlant = $this->report->getPlant();
        $data = array(
            'header' => 'Monthly Report',
            'plant' => $queryPlant->result(),
            'tagsign' => $queryVehicle->result(),
        );
        $this->load->view('monthly_report', $data);
    }
}
