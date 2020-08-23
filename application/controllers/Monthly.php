<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Monthly extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('report_m', 'report');
    }
    public function index($d = null)
    {
        check_not_login();
        $tahun = date('yy');
        $bulan = date('m');
        $tagSort = 'all';
        if ($this->session->userdata('kodebidang') != null) {
            $plantSort = $this->session->userdata('kodebidang');
        } else {
            $plantSort = 'all';
        }

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

        $toggle = @$d;
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
            'toggle' => $toggle,
        );
        $this->load->view('monthly_report', $data);
    }

    public function report($d = null)
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
        $toggle = @$d;
        $data = array(
            'monthly' => $query->result(),
            'plant' => $queryPlant->result(),
            'tagsign' => $queryVehicle->result(),
            'header' => 'Monthly Report',
            'tahun' => $tahun,
            'bulan' => $bulan,
            'tagsort' => $tagSort,
            'plantsort' => $plantSort,
            'toggle' => $toggle,
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
    public function pdf($data)
    {
        $this->load->library('dompdf_gen');
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
        $data = array(
            'monthly' => $query->result(),
            'plant' => $queryPlant->result(),
            'tahun' => $tahun,
            'bulan' => $bulan,
            'tagsort' => $tagSort,
            'plantsort' => $plantSort,
        );
        $this->load->view('report/monthly_pdf', $data);
        $paperSize = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paperSize, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("monthly_report.pdf", array('Attachment' => 0));
    }
    public function excel($data)
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
        $data = array(
            'monthly' => $query->result(),
            'plant' => $queryPlant->result(),
            'tahun' => $tahun,
            'bulan' => $bulan,
            'tagsort' => $tagSort,
            'plantsort' => $plantSort,
        );
        $bulanini = $tahun . "-" . $bulan;
        $bulanexcel = date('F Y', strtotime($bulanini));
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();
        $object->getProperties()->setCreator("PT.INDONESIA ASAHAN ALUMINIUM");
        $object->getProperties()->setLastModifiedBy("PT.INDONESIA ASAHAN ALUMINIUM");
        $object->getProperties()->setTitle("Monthly Report");

        $object->setActiveSheetIndex(0);
        $object->getActiveSheet()->setCellValueByColumnAndRow(7, 1, "Section");
        $object->getActiveSheet()->mergeCells('H1:I1');
        $object->getActiveSheet()->setCellValueByColumnAndRow(7, 2, "Approved by (M)");
        $object->getActiveSheet()->mergeCells('H2:I2');
        $object->getActiveSheet()->setCellValueByColumnAndRow(7, 3, "Checked by (JM)");
        $object->getActiveSheet()->mergeCells('H3:I3');
        $object->getActiveSheet()->setCellValueByColumnAndRow(7, 4, "Prepared by (SI)");
        $object->getActiveSheet()->mergeCells('H4:I4');
        $object->getActiveSheet()->setCellValueByColumnAndRow(7, 5, "Date");
        $object->getActiveSheet()->mergeCells('H5:I5');
        $object->getActiveSheet()->setCellValue('J1', 'SSW-3');
        $object->getActiveSheet()->setCellValueByColumnAndRow(0, 2, "MONTHLY REPORT OF VEHICLE PERFORMANCE");
        $object->getActiveSheet()->mergeCells('A2:G3');
        $object->getActiveSheet()->getStyle('A2:G3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $object->getActiveSheet()->setCellValueByColumnAndRow(0, 4, $bulanexcel);
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
        $object->getActiveSheet()->setCellValue('I6', 'MTBF(Day)');
        $object->getActiveSheet()->setCellValue('J6', 'Remarks');

        $baris = 7;
        $no = 1;
        $hitung = 0;
        $total = 0;
        $kalender = CAL_GREGORIAN;
        $jharibulan = cal_days_in_month($kalender, $bulan, $tahun);
        $oph = $jharibulan * 24;
        foreach ($data['monthly'] as $row) {
            $object->getActiveSheet()->setCellValue('A' . $baris, $no++);
            $object->getActiveSheet()->setCellValue('B' . $baris, $row->tagsign);
            $object->getActiveSheet()->setCellValue('C' . $baris, $row->type);
            $object->getActiveSheet()->setCellValue('D' . $baris, $row->kodebidang);
            $object->getActiveSheet()->setCellValue('E' . $baris, $oph);
            $object->getActiveSheet()->setCellValue('F' . $baris, $row->shutdown);
            $object->getActiveSheet()->setCellValue('G' . $baris, $row->troublefrec);
            $availability = ((($oph - $row->shutdown) / $oph) * 100);
            $total = $total + $availability;
            $availability = number_format($availability, 2);
            $hitung++;
            $object->getActiveSheet()->setCellValue('H' . $baris, $availability . ' %');
            if ($row->daystop < 0) {
                $daystop = $row->daystop + $jharibulan;
            } else {
                $daystop = $row->daystop;
            }
            $mtbf = number_format($jharibulan / $daystop, 2);
            $object->getActiveSheet()->setCellValue('I' . $baris, $mtbf);
            $object->getActiveSheet()->setCellValue('J' . $baris, $row->remarks);

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
        $object->getActiveSheet()->getStyle('A1:J' . $baris)->applyFromArray($thick);

        $baris += 4;
        $borderAwal = $baris;
        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $baris, "GRAND TOTAL AVAILABILITY");
        $object->getActiveSheet()->mergeCells('A' . $baris . ':C' . $baris);
        $object->getActiveSheet()->setCellValue('D' . $baris, "PLANT");
        $object->getActiveSheet()->setCellValue('E' . $baris, "AVAILABILITY");
        $hitungplant = 0;
        $total = 0;
        $filterBulan = $tahun . "-" . $bulan;
        foreach ($data['plant'] as $plant) {
            $baris++;
            $bidang = $plant->kodebidang;
            $hitungplant++;
            $object->getActiveSheet()->setCellValue('D' . $baris, $bidang);
            if ($tagSort == 'all' and $plantSort == 'all') {
                $query1 = $this->db->query("SELECT tb_trouble.tagsign, dateentry, SUM(stoptime) AS shutdown FROM tb_vehicle, tb_trouble WHERE tb_vehicle.tagsign = tb_trouble.tagsign AND DATE_FORMAT(dateentry, '%Y-%m') = '$filterBulan'  AND tb_vehicle.kodebidang = '$bidang' GROUP BY tb_trouble.tagsign");
            } elseif ($tagSort == 'all') {
                $query1 = $this->db->query("SELECT tb_trouble.tagsign, dateentry, SUM(stoptime) AS shutdown FROM tb_vehicle, tb_trouble WHERE tb_vehicle.tagsign = tb_trouble.tagsign AND DATE_FORMAT(dateentry, '%Y-%m') = '$filterBulan' AND tb_vehicle.kodebidang = '$bidang' AND tb_vehicle.kodebidang = '$plantSort' GROUP BY tb_trouble.tagsign");
            } elseif ($plantSort == 'all') {
                $query1 = $this->db->query("SELECT tb_trouble.tagsign, dateentry, SUM(stoptime) AS shutdown FROM tb_vehicle, tb_trouble WHERE tb_vehicle.tagsign = tb_trouble.tagsign AND tb_trouble.tagsign = '$tagSort' AND DATE_FORMAT(dateentry, '%Y-%m') = '$filterBulan' AND tb_vehicle.kodebidang = '$bidang' GROUP BY tb_trouble.tagsign");
            } else {
                $query1 = $this->db->query("SELECT tb_trouble.tagsign, dateentry, SUM(stoptime) AS shutdown FROM tb_vehicle, tb_trouble WHERE tb_vehicle.tagsign = tb_trouble.tagsign AND tb_trouble.tagsign = '$tagSort' AND DATE_FORMAT(dateentry, '%Y-%m') = '$filterBulan' AND tb_vehicle.kodebidang = '$bidang' AND tb_vehicle.kodebidang = '$plantSort' GROUP BY tb_trouble.tagsign");
            }

            $hitung = 0;
            $totalavb = 0;
            foreach ($query1->result() as $row) {
                $shutdown = $row->shutdown;
                $availability1 = ((($oph - $shutdown) / $oph) * 100);
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

        $baris += 4;
        $borderAwal = $baris - 1;
        $batas = $baris + 1;
        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $baris, "Trouble Frequency");
        $object->getActiveSheet()->mergeCells('A' . $baris . ':H' . $batas);
        $object->getActiveSheet()->getStyle('A' . $baris . ':H' . $batas)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $batas = $baris + 2;
        $batas2 = $baris + 3;
        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $batas, 'MONTH : ' . $bulanexcel);
        $object->getActiveSheet()->mergeCells('A' . $batas . ':H' . $batas2);
        $object->getActiveSheet()->getStyle('A' . $batas . ':H' . $batas2)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $object->getActiveSheet()->getStyle('A' . $batas . ':H' . $batas2)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
        $baris--;
        $object->getActiveSheet()->setCellValueByColumnAndRow(8, $baris, "Section");
        $object->getActiveSheet()->mergeCells('I' . $baris . ':J' . $baris);
        $object->getActiveSheet()->setCellValueByColumnAndRow(10, $baris, "SSW-3");
        $object->getActiveSheet()->mergeCells('K' . $baris . ':L' . $baris);
        $object->getActiveSheet()->setCellValueByColumnAndRow(12, $baris, "PT AUTO PADU");
        $baris++;
        $object->getActiveSheet()->setCellValueByColumnAndRow(8, $baris, "Approved by (M)");
        $object->getActiveSheet()->mergeCells('I' . $baris . ':J' . $baris);
        $baris++;
        $object->getActiveSheet()->setCellValueByColumnAndRow(8, $baris, "Checked by (JM)");
        $object->getActiveSheet()->mergeCells('I' . $baris . ':J' . $baris);
        $baris++;
        $object->getActiveSheet()->setCellValueByColumnAndRow(8, $baris, "Prepared by (SI)");
        $object->getActiveSheet()->mergeCells('I' . $baris . ':J' . $baris);
        $baris++;
        $object->getActiveSheet()->setCellValueByColumnAndRow(8, $baris, "Date");
        $object->getActiveSheet()->mergeCells('I' . $baris . ':J' . $baris);
        $baris++;
        $object->getActiveSheet()->setCellValue('A' . $baris, 'NO');
        $object->getActiveSheet()->setCellValue('B' . $baris, 'Tag Sign');
        $object->getActiveSheet()->setCellValue('C' . $baris, 'Type');
        $object->getActiveSheet()->setCellValue('D' . $baris, 'Plant');
        $object->getActiveSheet()->setCellValue('E' . $baris, 'Engine');
        $object->getActiveSheet()->setCellValue('F' . $baris, 'Transmisi');
        $object->getActiveSheet()->setCellValue('G' . $baris, 'Brake');
        $object->getActiveSheet()->setCellValue('H' . $baris, 'Hydraulic');
        $object->getActiveSheet()->setCellValue('I' . $baris, 'Steering');
        $object->getActiveSheet()->setCellValue('J' . $baris, 'Body & Chasis');
        $object->getActiveSheet()->setCellValue('K' . $baris, 'Attachment');
        $object->getActiveSheet()->setCellValue('L' . $baris, 'Electrical');
        $object->getActiveSheet()->setCellValue('M' . $baris, 'Total');

        $baris++;
        $filterBulan = $tahun . "-" . $bulan;
        $no = 0;
        $total = 0;
        $hitung = 0;
        $tengine = 0;
        $ttransmisi = 0;
        $tbrake = 0;
        $thydraulic = 0;
        $tsteering = 0;
        $tbodychasis = 0;
        $tattachment = 0;
        $telectrical = 0;
        foreach ($data['monthly'] as $m => $row) {
            $no++;
            $object->getActiveSheet()->setCellValue('A' . $baris, $no);
            $tagSign = $row->tagsign;
            $object->getActiveSheet()->setCellValue('B' . $baris, $tagSign);
            $object->getActiveSheet()->setCellValue('C' . $baris, $row->type);
            $object->getActiveSheet()->setCellValue('D' . $baris, $row->kodebidang);
            $engine = 0;
            $transmisi = 0;
            $brake = 0;
            $hydraulic = 0;
            $steering = 0;
            $bodychasis = 0;
            $attachment = 0;
            $electrical = 0;
            $queryFreq = $this->db->query("SELECT partofwork, dateentry FROM tb_trouble WHERE tagsign = '$tagSign' AND DATE_FORMAT(dateentry, '%Y-%m') = '$filterBulan'");
            foreach ($queryFreq->result() as $q => $row) {
                $freq = $row->partofwork;
                $pisah = explode(";", $freq);
                for ($i = 0; $i < count($pisah); $i++) {
                    if ($pisah[$i] == 'Engine') {
                        $engine++;
                    } else if ($pisah[$i] == 'Transmisi') {
                        $transmisi++;
                    } else if ($pisah[$i] == 'Brake') {
                        $brake++;
                    } else if ($pisah[$i] == 'Hydraulic') {
                        $hydraulic++;
                    } else if ($pisah[$i] == 'Steering') {
                        $steering++;
                    } else if ($pisah[$i] == 'Body Chasis') {
                        $bodychasis++;
                    } else if ($pisah[$i] == 'Attachment') {
                        $attachment++;
                    } else if ($pisah[$i] == 'Electrical') {
                        $electrical++;
                    } else if ($pisah[$i] == 'All') {
                        $engine++;
                        $transmisi++;
                        $brake++;
                        $hydraulic++;
                        $steering++;
                        $bodychasis++;
                        $attachment++;
                        $electrical++;
                    }
                }
            }
            $tengine = $tengine + $engine;
            $ttransmisi = $ttransmisi + $transmisi;
            $tbrake = $tbrake + $brake;
            $thydraulic = $thydraulic + $hydraulic;
            $tsteering = $tsteering + $steering;
            $tbodychasis = $tbodychasis + $bodychasis;
            $tattachment = $tattachment + $attachment;
            $telectrical = $telectrical + $electrical;
            $object->getActiveSheet()->setCellValue('E' . $baris, $engine);
            $object->getActiveSheet()->setCellValue('F' . $baris, $transmisi);
            $object->getActiveSheet()->setCellValue('G' . $baris, $brake);
            $object->getActiveSheet()->setCellValue('H' . $baris, $hydraulic);
            $object->getActiveSheet()->setCellValue('I' . $baris, $steering);
            $object->getActiveSheet()->setCellValue('J' . $baris, $bodychasis);
            $object->getActiveSheet()->setCellValue('K' . $baris, $attachment);
            $object->getActiveSheet()->setCellValue('L' . $baris, $electrical);
            $total = $engine + $transmisi + $brake + $hydraulic + $steering + $bodychasis + $attachment + $electrical;
            $object->getActiveSheet()->setCellValue('M' . $baris, $total);
            $baris++;
        }
        $object->getActiveSheet()->setCellValue('C' . $baris, 'TOTAL');
        $object->getActiveSheet()->setCellValue('E' . $baris, $tengine);
        $object->getActiveSheet()->setCellValue('F' . $baris, $ttransmisi);
        $object->getActiveSheet()->setCellValue('G' . $baris, $tbrake);
        $object->getActiveSheet()->setCellValue('H' . $baris, $thydraulic);
        $object->getActiveSheet()->setCellValue('I' . $baris, $tsteering);
        $object->getActiveSheet()->setCellValue('J' . $baris, $tbodychasis);
        $object->getActiveSheet()->setCellValue('K' . $baris, $tattachment);
        $object->getActiveSheet()->setCellValue('L' . $baris, $telectrical);
        $ttotal = $tengine + $ttransmisi + $tbrake + $thydraulic + $tsteering + $tbodychasis + $tattachment + $telectrical;
        $object->getActiveSheet()->setCellValue('M' . $baris, $ttotal);

        $thick = array();
        $thick['borders'] = array();
        $thick['borders']['allborders'] = array();
        $thick['borders']['allborders']['style'] = PHPExcel_Style_Border::BORDER_THIN;
        $object->getActiveSheet()->getStyle('A' . $borderAwal . ':M' . $baris)->applyFromArray($thick);


        $filename = "Monthly_Report_Excel" . '.xlsx';
        $object->getActiveSheet()->setTitle("Monthly Report Excel");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createwriter($object, 'Excel2007');
        $writer->save('PHP://output');

        exit;
    }
}
