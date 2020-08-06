<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Trouble extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('trouble_m', 'trouble');
    }

    public function index()
    {
        $query = $this->trouble->get();

        $data = array(
            'header' => 'Tampil Data Trouble',
            'trouble' => $query->result(),

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

    public function delete($id = null)
    {
        $this->trouble->delete($id);
        redirect('trouble');
    }

    public function edit($id = null)
    {
        $query = $this->trouble->get($id);
        $data = array(
            'header' => 'Edit Data Trouble',
            'trouble' => $query->row(),
        );
        $this->load->view('trouble_edit', $data);
    }

    public function proses()
    {
        $dateentry = $this->input->post('dateentry');
        $datefinish = $this->input->post('datefinish');

        $dateentry1 = date("yy-m-d H:i", strtotime($dateentry));
        $datefinish1 = date("yy-m-d H:i", strtotime($datefinish));

        $kalender = CAL_GREGORIAN;
        $bulanentry = date("m", strtotime($dateentry1));
        $tahunentry = date("Y", strtotime($dateentry1));

        $jharientry = cal_days_in_month($kalender, $bulanentry, $tahunentry);

        $harientry = date("d", strtotime($dateentry1));
        $harifinish = date("d", strtotime($datefinish1));
        $jamentry = date("H", strtotime($dateentry1));
        $jamfinish = date("H", strtotime($datefinish1));
        if ($harifinish < $harientry) {
            $harifinish = $harifinish + $jharientry;
        }
        $stoptime = ((($harifinish - $harientry) * 24) - $jamentry) + $jamfinish;

        $pow = implode(";", $this->input->post('pow'));
        $desc = implode(";", $this->input->post('description'));
        $count = implode(";", $this->input->post('countermeasure'));
        $spare = implode(";", $this->input->post('sparepart'));

        $tambahan = array(
            'stoptime' => $stoptime,
            'pow' => $pow,
            'desc' => $desc,
            'count' => $count,
            'spare' => $spare,
            'dateentry' => $dateentry1,
            'datefinish' => $datefinish1,
        );
        if (isset($_POST['add'])) {
            $inputan = $this->input->post(null, true);
            $this->trouble->add($inputan, $tambahan);
        } elseif (isset($_POST['edit'])) {
            $inputan = $this->input->post(null, true);
            $this->trouble->edit($inputan, $tambahan);
        }
        redirect('trouble');
    }
}
