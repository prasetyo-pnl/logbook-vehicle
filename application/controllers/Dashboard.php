<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_m', 'dashboard');
	}

	public function index()
	{
		$queryUser = $this->dashboard->getUser();
		$queryVehicle = $this->dashboard->getVehicle();
		$queryPlant = $this->dashboard->getPlant();
		$queryTrouble = $this->dashboard->getTrouble();
		$data = array(
			'totalUser' => $queryUser->row(),
			'totalVehicle' => $queryVehicle->row(),
			'totalPlant' => $queryPlant->row(),
			'totalTrouble' => $queryTrouble->row(),
		);
		$this->load->view('dashboard', $data);
	}
}
