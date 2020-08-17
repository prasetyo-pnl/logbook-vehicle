<?php

class Report_m extends CI_Model
{
    public function getWeek($filter)
    {
        $hariini = date('yy-m-d', strtotime($filter['hariini']));
        $batas = date('yy-m-d', strtotime('-6 days', strtotime($hariini)));
        $tagSort = $filter['tagsort'];
        $plantSort = $filter['plantsort'];
        if ($tagSort ==  'all' and $plantSort == 'all') {

            $query = $this->db->query("SELECT tb_trouble.tagsign, type, kodebidang, remarks, dateentry, SUM(stoptime) AS shutdown, COUNT(tb_trouble.tagsign) AS troublefrec FROM tb_vehicle, tb_trouble WHERE tb_vehicle.tagsign = tb_trouble.tagsign AND DATE_FORMAT(dateentry, '%Y-%m-%d') BETWEEN '$batas' AND '$hariini' GROUP BY tb_trouble.tagsign");
        } elseif ($tagSort ==  'all') {
            $query = $this->db->query("SELECT tb_trouble.tagsign, type, kodebidang, remarks, dateentry, SUM(stoptime) AS shutdown, COUNT(tb_trouble.tagsign) AS troublefrec FROM tb_vehicle, tb_trouble WHERE tb_vehicle.tagsign = tb_trouble.tagsign AND DATE_FORMAT(dateentry, '%Y-%m-%d') BETWEEN '$batas' AND '$hariini' AND tb_vehicle.kodebidang = '$plantSort' GROUP BY tb_trouble.tagsign");
        } elseif ($plantSort == 'all') {
            $query = $this->db->query("SELECT tb_trouble.tagsign, type, kodebidang, remarks, dateentry, SUM(stoptime) AS shutdown, COUNT(tb_trouble.tagsign) AS troublefrec FROM tb_vehicle, tb_trouble WHERE tb_vehicle.tagsign = tb_trouble.tagsign AND tb_trouble.tagsign = '$tagSort' AND DATE_FORMAT(dateentry, '%Y-%m-%d') BETWEEN '$batas' AND '$hariini' GROUP BY tb_trouble.tagsign");
        } else {
            $query = $this->db->query("SELECT tb_trouble.tagsign, type, kodebidang, remarks, dateentry, SUM(stoptime) AS shutdown, COUNT(tb_trouble.tagsign) AS troublefrec FROM tb_vehicle, tb_trouble WHERE tb_vehicle.tagsign = tb_trouble.tagsign AND tb_trouble.tagsign = '$tagSort' AND DATE_FORMAT(dateentry, '%Y-%m-%d') BETWEEN '$batas' AND '$hariini'AND tb_vehicle.kodebidang = '$plantSort' GROUP BY tb_trouble.tagsign");
        }
        return $query;
    }
    public function getPlant()
    {
        $query = $this->db->query("SELECT kodebidang FROM tb_bidang");
        return $query;
    }
    public function getVehicle()
    {
        $query = $this->db->query("SELECT * FROM tb_vehicle");
        return $query;
    }

    public function getMonth($filter)
    {
        $filterBulan = $filter['tahun'] . "-" . $filter['bulan'];
        $tagSort = $filter['tagsort'];
        $plantSort = $filter['plantsort'];
        if ($tagSort ==  'all' and $plantSort == 'all') {
            $query = $this->db->query("SELECT tb_trouble.tagsign, type, kodebidang, remarks, dateentry, datefinish, SUM(DATE_FORMAT(datefinish, '%d')-DATE_FORMAT(dateentry, '%d')+1) AS daystop, SUM(stoptime) AS shutdown, COUNT(tb_trouble.tagsign) AS troublefrec FROM tb_vehicle, tb_trouble WHERE tb_vehicle.tagsign = tb_trouble.tagsign AND DATE_FORMAT(dateentry, '%Y-%m') = '$filterBulan' GROUP BY tb_trouble.tagsign");
        } elseif ($tagSort ==  'all') {
            $query = $this->db->query("SELECT tb_trouble.tagsign, type, kodebidang, remarks, dateentry, datefinish, SUM(DATE_FORMAT(datefinish, '%d')-DATE_FORMAT(dateentry, '%d')+1) AS daystop, SUM(stoptime) AS shutdown, COUNT(tb_trouble.tagsign) AS troublefrec FROM tb_vehicle, tb_trouble WHERE tb_vehicle.tagsign = tb_trouble.tagsign AND DATE_FORMAT(dateentry, '%Y-%m') = '$filterBulan' AND tb_vehicle.kodebidang = '$plantSort' GROUP BY tb_trouble.tagsign");
        } elseif ($plantSort == 'all') {
            $query = $this->db->query("SELECT tb_trouble.tagsign, type, kodebidang, remarks, dateentry, datefinish, SUM(DATE_FORMAT(datefinish, '%d')-DATE_FORMAT(dateentry, '%d')+1) AS daystop, SUM(stoptime) AS shutdown, COUNT(tb_trouble.tagsign) AS troublefrec FROM tb_vehicle, tb_trouble WHERE tb_vehicle.tagsign = tb_trouble.tagsign AND tb_trouble.tagsign = '$tagSort' AND DATE_FORMAT(dateentry, '%Y-%m') = '$filterBulan' GROUP BY tb_trouble.tagsign");
        } else {
            $query = $this->db->query("SELECT tb_trouble.tagsign, type, kodebidang, remarks, dateentry, datefinish, SUM(DATE_FORMAT(datefinish, '%d')-DATE_FORMAT(dateentry, '%d')+1) AS daystop, SUM(stoptime) AS shutdown, COUNT(tb_trouble.tagsign) AS troublefrec FROM tb_vehicle, tb_trouble WHERE tb_vehicle.tagsign = tb_trouble.tagsign AND tb_trouble.tagsign = '$tagSort' AND DATE_FORMAT(dateentry, '%Y-%m') = '$filterBulan' AND tb_vehicle.kodebidang = '$plantSort' GROUP BY tb_trouble.tagsign");
        }
        return $query;
    }
    public function getRange($filter)
    {
        $dateStart = date('yy-m-d', strtotime($filter['dateStart']));
        $dateFinish = date('yy-m-d', strtotime($filter['dateFinish']));
        $tagSort = $filter['tagsort'];
        $plantSort = $filter['plantsort'];
        if ($tagSort ==  'all' and $plantSort == 'all') {

            $query = $this->db->query("SELECT tb_trouble.tagsign, type, kodebidang, remarks, dateentry, SUM(stoptime) AS shutdown, COUNT(tb_trouble.tagsign) AS troublefrec FROM tb_vehicle, tb_trouble WHERE tb_vehicle.tagsign = tb_trouble.tagsign AND DATE_FORMAT(dateentry, '%Y-%m-%d') BETWEEN '$dateStart' AND '$dateFinish' GROUP BY tb_trouble.tagsign");
        } elseif ($tagSort ==  'all') {
            $query = $this->db->query("SELECT tb_trouble.tagsign, type, kodebidang, remarks, dateentry, SUM(stoptime) AS shutdown, COUNT(tb_trouble.tagsign) AS troublefrec FROM tb_vehicle, tb_trouble WHERE tb_vehicle.tagsign = tb_trouble.tagsign AND DATE_FORMAT(dateentry, '%Y-%m-%d') BETWEEN '$dateStart' AND '$dateFinish' AND tb_vehicle.kodebidang = '$plantSort' GROUP BY tb_trouble.tagsign");
        } elseif ($plantSort == 'all') {
            $query = $this->db->query("SELECT tb_trouble.tagsign, type, kodebidang, remarks, dateentry, SUM(stoptime) AS shutdown, COUNT(tb_trouble.tagsign) AS troublefrec FROM tb_vehicle, tb_trouble WHERE tb_vehicle.tagsign = tb_trouble.tagsign AND tb_trouble.tagsign = '$tagSort' AND DATE_FORMAT(dateentry, '%Y-%m-%d') BETWEEN '$dateStart' AND '$dateFinish' GROUP BY tb_trouble.tagsign");
        } else {
            $query = $this->db->query("SELECT tb_trouble.tagsign, type, kodebidang, remarks, dateentry, SUM(stoptime) AS shutdown, COUNT(tb_trouble.tagsign) AS troublefrec FROM tb_vehicle, tb_trouble WHERE tb_vehicle.tagsign = tb_trouble.tagsign AND tb_trouble.tagsign = '$tagSort' AND DATE_FORMAT(dateentry, '%Y-%m-%d') BETWEEN '$dateStart' AND '$dateFinish'AND tb_vehicle.kodebidang = '$plantSort' GROUP BY tb_trouble.tagsign");
        }
        return $query;
    }
    public function getTrouble()
    {
        $query = $this->db->query("SELECT tb_trouble.tagsign, type, kodebidang, partofwork  FROM tb_vehicle, tb_trouble WHERE tb_vehicle.tagsign = tb_trouble.tagsign GROUP BY tb_trouble.tagsign");
        return $query;
    }
}
