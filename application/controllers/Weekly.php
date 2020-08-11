<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Weekly extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('report_m', 'report');
    }

    public function index()
    {
        // if (isset($_POST['show'])) {
        //     $hariini = date('d-m-yy', strtotime($_POST['date']));
        // } else {
        //     $hariini = date('d-m-yy');
        // }
        $hariini = date('d-m-yy');
        $tagSort = 'all';
        $plantSort = 'all';
        $filter = array(
            'hariini' => $hariini,
            'tagsort' => $tagSort,
            'plantsort' => $plantSort,
        );

        $query = $this->report->getWeek($filter);
        $queryPlant = $this->report->getPlant();
        $queryVehicle = $this->report->getVehicle();

        $batas = date('d-m-yy', strtotime('-6 days', strtotime($hariini)));
        $data = array(
            'weekly' => $query->result(),
            'plant' => $queryPlant->result(),
            'tagsign' => $queryVehicle->result(),
            'header' => 'Weekly Report',
            'hariini' => $hariini,
            'batas' => $batas,
            'tagsort' => $tagSort,
            'plantsort' => $plantSort,
        );
        $this->load->view('weekly_report', $data);
    }
    public function report()
    {
        if (isset($_POST['show'])) {
            $hariini = date('d-m-yy', strtotime($_POST['date']));
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
        } else {
            $hariini = date('d-m-yy');
            $tagSort = 'all';
            $plantSort = 'all';
        }
        $filter = array(
            'hariini' => $hariini,
            'tagsort' => $tagSort,
            'plantsort' => $plantSort,
        );

        $query = $this->report->getWeek($filter);
        $queryPlant = $this->report->getPlant();
        $queryVehicle = $this->report->getVehicle();
        $batas = date('d-m-yy', strtotime('-6 days', strtotime($hariini)));
        $data = array(
            'weekly' => $query->result(),
            'plant' => $queryPlant->result(),
            'tagsign' => $queryVehicle->result(),
            'header' => 'Weekly Report',
            'hariini' => $hariini,
            'batas' => $batas,
            'tagsort' => $tagSort,
            'plantsort' => $plantSort,
        );
        $this->load->view('weekly_report', $data);
    }

    // public function proses()
    // {
    //     $availability = $this->report->proses();
    //     $data = array(
    //         'avb' => $availability->result()
    //     );
    //     $this->load->view('availability_print', $data);
    // }
}
