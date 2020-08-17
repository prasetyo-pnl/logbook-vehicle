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
        $tahun = date('yy');
        $bulan = date('m');
        $tagSort = 'all';
        $plantSort = 'all';
        $filter = array(
            'tahun' => $tahun,
            'bulan' => $bulan,
            'tagsort' => $tagSort,
            'plantsort' => $plantSort,
        );
        $query = $this->report->getMonth($filter);
        $queryVehicle = $this->report->getVehicle();
        $queryPlant = $this->report->getPlant();
        $queryTrouble = $this->report->getTrouble();
        $data = array(
            'monthly' => $query->result(),
            'header' => 'Monthly Report',
            'tahun' => $tahun,
            'bulan' => $bulan,
            'plant' => $queryPlant->result(),
            'tagsign' => $queryVehicle->result(),
            'tagsort' => $tagSort,
            'plantsort' => $plantSort,
            'trouble' => $queryTrouble->result(),
        );
        $this->load->view('monthly_report', $data);
    }

    public function report()
    {
        if (isset($_POST['show'])) {
            $tahun = $_POST['year'];
            $bulan = $_POST['month'];
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
            $tahun = date('yy');
            $bulan = date('m');
            $tagSort = 'all';
            $plantSort = 'all';
        }
        $filter = array(
            'bulan' => $bulan,
            'tahun' => $tahun,
            'tagsort' => $tagSort,
            'plantsort' => $plantSort,
        );

        $query = $this->report->getMonth($filter);
        $queryPlant = $this->report->getPlant();
        $queryVehicle = $this->report->getVehicle();
        $data = array(
            'monthly' => $query->result(),
            'plant' => $queryPlant->result(),
            'tagsign' => $queryVehicle->result(),
            'header' => 'Monthly Report',
            'tahun' => $tahun,
            'bulan' => $bulan,
            'tagsort' => $tagSort,
            'plantsort' => $plantSort,
        );
        $this->load->view('monthly_report', $data);
    }
    public function print($data)
    {
        $pisah = explode("x", $data);
        $tahun = $pisah[0];
        $bulan = $pisah[1];
        $tagSort = $pisah[2];
        $plantSort = $pisah[3];

        $filter = array(
            'tahun' => $tahun,
            'bulan' => $bulan,
            'tagsort' => $tagSort,
            'plantsort' => $plantSort,
        );
        $query = $this->report->getMonth($filter);
        $queryPlant = $this->report->getPlant();
        $queryVehicle = $this->report->getVehicle();
        $print = 1;
        $data = array(
            'monthly' => $query->result(),
            'plant' => $queryPlant->result(),
            'tagsign' => $queryVehicle->result(),
            'tahun' => $tahun,
            'bulan' => $bulan,
            'tagsort' => $tagSort,
            'plantsort' => $plantSort,
            'print' => $print,
        );
        $this->load->view('report/monthly_print', $data);
    }
}
