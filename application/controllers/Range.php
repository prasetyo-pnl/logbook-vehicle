<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Range extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('report_m', 'report');
    }


    public function index()
    {
        $queryPlant = $this->report->getPlant();
        $queryVehicle = $this->report->getVehicle();
        $data = array(
            'range' => '',
            'header' => 'Date Range Report',
            'plant' => $queryPlant->result(),
            'tagsign' => $queryVehicle->result(),
            'dateStart' => ' ',
            'dateFinish' => ' ',
            'tagsort' => ' ',
            'plantsort' => ' ',
        );
        $this->load->view('range_report', $data);
    }

    public function report()
    {
        if (isset($_POST['show'])) {
            $dateStart = date('d-m-yy', strtotime($_POST['dateStart']));
            $dateFinish = date('d-m-yy', strtotime($_POST['dateFinish']));
            if ($_POST['tagSort'] != 'all') {
                $tagSort = $_POST['tagSort'];
            } else {
                $tagSort = 'all';
            }

            if ($_POST['plantSort'] != 'all') {
                $plantSort = $_POST['plantSort'];
            } else {
                $plantSort = 'all';
            }
        }
        $filter = array(
            'dateStart' => $dateStart,
            'dateFinish' => $dateFinish,
            'tagsort' => $tagSort,
            'plantsort' => $plantSort,
        );
        $query = $this->report->getRange($filter);
        $queryPlant = $this->report->getPlant();
        $queryVehicle = $this->report->getVehicle();
        $data = array(
            'range' => $query->result(),
            'plant' => $queryPlant->result(),
            'tagsign' => $queryVehicle->result(),
            'header' => 'Date Range Report',
            'dateStart' => $dateStart,
            'dateFinish' => $dateFinish,
            'tagsort' => $tagSort,
            'plantsort' => $plantSort,
        );
        $this->load->view('range_report', $data);
    }
}
