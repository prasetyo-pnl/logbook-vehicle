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
    public function print($data)
    {
        $pisah = explode("x", $data);
        $dateStart = date('d-m-yy', strtotime($pisah[0]));
        $dateFinish = date('d-m-yy', strtotime($pisah[1]));
        $tagSort = $pisah[2];
        $plantSort = $pisah[3];

        $filter = array(
            'dateStart' => $dateStart,
            'dateFinish' => $dateFinish,
            'tagsort' => $tagSort,
            'plantsort' => $plantSort,
        );

        $query = $this->report->getRange($filter);
        $queryPlant = $this->report->getPlant();
        $queryVehicle = $this->report->getVehicle();
        $print = 1;
        $data = array(
            'range' => $query->result(),
            'plant' => $queryPlant->result(),
            'tagsign' => $queryVehicle->result(),
            // 'header' => 'Report',
            'dateStart' => $dateStart,
            'dateFinish' => $dateFinish,
            'tagsort' => $tagSort,
            'plantsort' => $plantSort,
            'print' => $print,
        );
        $this->load->view('report/range_print', $data);
    }
    public function pdf($data)
    {
        $this->load->library('dompdf_gen');
        $pisah = explode("x", $data);
        $dateStart = date('d-m-yy', strtotime($pisah[0]));
        $dateFinish = date('d-m-yy', strtotime($pisah[1]));
        $tagSort = $pisah[2];
        $plantSort = $pisah[3];

        $filter = array(
            'dateStart' => $dateStart,
            'dateFinish' => $dateFinish,
            'tagsort' => $tagSort,
            'plantsort' => $plantSort,
        );

        $query = $this->report->getRange($filter);
        $queryPlant = $this->report->getPlant();
        $data = array(
            'range' => $query->result(),
            'plant' => $queryPlant->result(),
            'dateStart' => $dateStart,
            'dateFinish' => $dateFinish,
            'tagsort' => $tagSort,
            'plantsort' => $plantSort,
        );
        $this->load->view('report/range_pdf', $data);
        $paperSize = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paperSize, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Range_report.pdf", array('Attachment' => 0));
    }
    public function excel($data)
    {
        $pisah = explode("x", $data);
        $dateStart = date('d-m-yy', strtotime($pisah[0]));
        $dateFinish = date('d-m-yy', strtotime($pisah[1]));
        $tagSort = $pisah[2];
        $plantSort = $pisah[3];

        $filter = array(
            'dateStart' => $dateStart,
            'dateFinish' => $dateFinish,
            'tagsort' => $tagSort,
            'plantsort' => $plantSort,
        );

        $query = $this->report->getRange($filter);
        $queryPlant = $this->report->getPlant();
        $data = array(
            'range' => $query->result(),
            'plant' => $queryPlant->result(),
            'dateStart' => $dateStart,
            'dateFinish' => $dateFinish,
            'tagsort' => $tagSort,
            'plantsort' => $plantSort,
        );
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();
        $object->getProperties()->setCreator("PT.INDONESIA ASAHAN ALUMINIUM");
        $object->getProperties()->setLastModifiedBy("PT.INDONESIA ASAHAN ALUMINIUM");
        $object->getProperties()->setTitle("Date Range Report");

        $object->setActiveSheetIndex(0);
        $object->getActiveSheet()->setCellValue('H1', 'Section');
        $object->getActiveSheet()->setCellValue('H2', 'Approved by (M)');
        $object->getActiveSheet()->setCellValue('H3', 'Checked by (JM)');
        $object->getActiveSheet()->setCellValue('H4', 'Prepared by (SI)');
        $object->getActiveSheet()->setCellValue('H5', 'Date');
        $object->getActiveSheet()->setCellValue('I1', 'SSW-3');
        $object->getActiveSheet()->setCellValueByColumnAndRow(0, 2, "DATE RANGE REPORT OF VEHICLE PERFORMANCE");
        $object->getActiveSheet()->mergeCells('A2:G3');
        $object->getActiveSheet()->getStyle('A2:G3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $object->getActiveSheet()->setCellValueByColumnAndRow(0, 4, $dateStart . " s/d " . $dateFinish);
        $object->getActiveSheet()->mergeCells('A4:G5');
        $object->getActiveSheet()->getStyle('A4:G5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $object->getActiveSheet()->getStyle('A4:G5')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
        $object->getActiveSheet()->setCellValue('A6', 'NO');
        $object->getActiveSheet()->setCellValue('B6', 'Tag Sign');
        $object->getActiveSheet()->setCellValue('C6', 'Type');
        $object->getActiveSheet()->setCellValue('D6', 'Plant');
        $object->getActiveSheet()->setCellValue('E6', 'Operation Hours Available (A)');
        $object->getActiveSheet()->setCellValue('F6', 'Shutdwn Time At VS (Hours)(C)');
        $object->getActiveSheet()->setCellValue('G6', 'Trouble Frequency (Times)(D)');
        $object->getActiveSheet()->setCellValue('H6', 'Availability AV = A-C/A');
        $object->getActiveSheet()->setCellValue('I6', 'Remarks');

        $baris = 7;
        $no = 1;
        $hitung = 0;
        $total = 0;
        foreach ($data['range'] as $row) {
            $object->getActiveSheet()->setCellValue('A' . $baris, $no++);
            $object->getActiveSheet()->setCellValue('B' . $baris, $row->tagsign);
            $object->getActiveSheet()->setCellValue('C' . $baris, $row->type);
            $object->getActiveSheet()->setCellValue('D' . $baris, $row->kodebidang);
            $object->getActiveSheet()->setCellValue('E' . $baris, 168);
            $object->getActiveSheet()->setCellValue('F' . $baris, $row->shutdown);
            $object->getActiveSheet()->setCellValue('G' . $baris, $row->troublefrec);
            $availability = (((168 - $row->shutdown) / 168) * 100);
            $total = $total + $availability;
            $availability = number_format($availability, 2);
            $hitung++;
            $object->getActiveSheet()->setCellValue('H' . $baris, $availability . ' %');
            $object->getActiveSheet()->setCellValue('I' . $baris, $row->remarks);

            $baris++;
        }
        $total = number_format($total, 2);
        $object->getActiveSheet()->setCellValue('C' . $baris, 'TOTAL');
        $object->getActiveSheet()->setCellValue('H' . $baris, $total . ' %');
        $baris++;
        $object->getActiveSheet()->setCellValue('C' . $baris, 'AVERAGE');
        $average = number_format($total / $hitung, 2);
        $object->getActiveSheet()->setCellValue('H' . $baris, $average . ' %');

        $thick = array();
        $thick['borders'] = array();
        $thick['borders']['allborders'] = array();
        $thick['borders']['allborders']['style'] = PHPExcel_Style_Border::BORDER_THIN;
        $object->getActiveSheet()->getStyle('A1:I' . $baris)->applyFromArray($thick);

        $baris += 4;
        $borderAwal = $baris;
        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $baris, "GRAND TOTAL AVAILABILITY");
        $object->getActiveSheet()->mergeCells('A' . $baris . ':C' . $baris);
        $object->getActiveSheet()->setCellValue('D' . $baris, "PLANT");
        $object->getActiveSheet()->setCellValue('E' . $baris, "AVAILABILITY");
        $hitungplant = 0;
        $total = 0;
        $dateFinish = date('yy-m-d', strtotime($dateFinish));
        $dateStart = date('yy-m-d', strtotime($dateStart));
        foreach ($data['plant'] as $plant) {
            $baris++;
            $bidang = $plant->kodebidang;
            $hitungplant++;
            $object->getActiveSheet()->setCellValue('D' . $baris, $bidang);
            if ($tagSort == 'all' and $plantSort == 'all') {
                $query1 = $this->db->query("SELECT tb_trouble.tagsign,dateentry,SUM(stoptime) AS shutdown from tb_vehicle,tb_trouble WHERE tb_vehicle.tagsign=tb_trouble.tagsign AND DATE_FORMAT(dateentry, '%Y-%m-%d') between '$dateStart' and '$dateFinish' AND tb_vehicle.kodebidang='$bidang' GROUP BY tb_trouble.tagsign");
            } else if ($tagSort == 'all') {
                $query1 = $this->db->query("SELECT tb_trouble.tagsign,dateentry,SUM(stoptime) AS shutdown from tb_vehicle,tb_trouble WHERE tb_vehicle.tagsign=tb_trouble.tagsign AND DATE_FORMAT(dateentry, '%Y-%m-%d') between '$dateStart' and '$dateFinish' AND tb_vehicle.kodebidang='$bidang' AND tb_vehicle.kodebidang='$plantSort' GROUP BY tb_trouble.tagsign");
            } else if ($plantSort == 'all') {
                $query1 = $this->db->query("SELECT tb_trouble.tagsign,dateentry,SUM(stoptime) AS shutdown from tb_vehicle,tb_trouble WHERE tb_vehicle.tagsign=tb_trouble.tagsign AND tb_trouble.tagsign='$tagSort' AND DATE_FORMAT(dateentry, '%Y-%m-%d') between '$dateStart' and '$dateFinish' AND tb_vehicle.kodebidang='$bidang' GROUP BY tb_trouble.tagsign");
            } else {
                $query1 = $this->db->query("SELECT tb_trouble.tagsign,dateentry,SUM(stoptime) AS shutdown from tb_vehicle,tb_trouble WHERE tb_vehicle.tagsign=tb_trouble.tagsign AND tb_trouble.tagsign='$tagSort' AND DATE_FORMAT(dateentry, '%Y-%m-%d') between '$dateStart' and '$dateFinish' AND tb_vehicle.kodebidang='$bidang' AND tb_vehicle.kodebidang='$plantSort' GROUP BY tb_trouble.tagsign");
            }

            $hitung = 0;
            $totalavb = 0;
            foreach ($query1->result() as $row) {
                $shutdown = $row->shutdown;
                $availability1 = (((168 - $shutdown) / 168) * 100);
                $totalavb = $totalavb + $availability1;
                $hitung++;
            }
            if ($hitung == 0) {
                $availability1 = 100;
                $total = $total + $availability1;
                $object->getActiveSheet()->setCellValue('E' . $baris, $availability1 . " %");
            } else {
                $totalavb = $totalavb / $hitung;
                $total = $total + $totalavb;
                $totalavb = number_format($totalavb, 2);
                $object->getActiveSheet()->setCellValue('E' . $baris, $totalavb . " %");
            }
        }
        $baris++;
        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $baris, "TOTAL AVERAGE AVAILABILITY");
        $object->getActiveSheet()->mergeCells('A' . $baris . ':C' . $baris);
        $TAA = number_format($total / $hitungplant, 2);
        $object->getActiveSheet()->setCellValue('E' . $baris, $TAA . " %");

        $thick = array();
        $thick['borders'] = array();
        $thick['borders']['allborders'] = array();
        $thick['borders']['allborders']['style'] = PHPExcel_Style_Border::BORDER_THIN;
        $object->getActiveSheet()->getStyle('A' . $borderAwal . ':E' . $baris)->applyFromArray($thick);

        $filename = "Range_Report_Excel" . '.xlsx';
        $object->getActiveSheet()->setTitle("Range Report Excel");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createwriter($object, 'Excel2007');
        $writer->save('PHP://output');

        exit;
    }
}
