<!-- tabel utama -->
<table class="table table-bordered text-center" border="1">
    <!-- <thead align="center"> -->
    <tr>
        <th rowspan="5" colspan="7">
            <p>MONTHLY REPORT OF VEHICLE PERFORMANCE</p>
            <p align="center">
                <?php
                $bulanini = $tahun . "-" . $bulan;
                echo date('F-Y', strtotime($bulanini));
                ?>
            </p>
        </th>


        <th colspan="2" align="left">Section</th>
        <th>SSW-3</th>
    </tr>
    <tr>
        <th colspan="2" align="left">Approved By (M)</th>
        <th></th>
    </tr>
    <tr>
        <th colspan="2" align="left">Checked By (JM)</th>
        <th></th>
    </tr>
    <tr>
        <th colspan="2" align="left">Prepared By (SI)</th>
        <th></th>
    </tr>
    <tr>
        <th colspan="2" align="left">Date</th>
        <th></th>
    </tr>
    <tr>
        <th>No</th>
        <th>Tag Sign</th>
        <th>Type</th>
        <th>Plant</th>
        <th>Operation Hours Available (A)</th>
        <th>Shut Down Time at VS (Hours)(C)</th>
        <th>Trouble Frequency (Times)(D)</th>
        <th>Availability AV = A-C/A %</th>
        <th>MTBF(Day)</th>
        <th>Remarks</th>
    </tr>
    <?php
    $no = 0;
    $total = 0;
    $hitung = 0;
    foreach ($monthly as $m => $row) {

        $no++;
    ?>
        <tr align="center">
            <td><?php echo $no; ?></td>
            <td align="left"><?php echo $row->tagsign; ?></td>
            <td><?php echo $row->type   ?></td>
            <td><?php echo $row->kodebidang   ?></td>
            <td>
                <?php
                $kalender = CAL_GREGORIAN;
                $jharibulan = cal_days_in_month($kalender, $bulan, $tahun);
                $oph = $jharibulan * 24;
                echo $oph;
                ?>
            </td>
            <td><?php echo $row->shutdown ?></td>
            <td><?php echo $row->troublefrec ?></td>
            <td>
                <?php
                $availability = ((($oph - $row->shutdown) / $oph) * 100);
                $total = $total + $availability;
                echo $availability = number_format($availability, 2) . " %";
                $hitung++;
                ?>
            </td>
            <td>
                <?php
                if ($row->daystop < 0) {
                    $daystop = $row->daystop + $jharibulan;
                } else {
                    $daystop = $row->daystop;
                }
                $mtbf = number_format($jharibulan / $daystop, 2);
                echo $mtbf;
                ?>
            </td>
            <td><?php echo $row->remarks   ?></td>
        </tr>
    <?php
    }
    ?>
    <tr>
        <td></td>
        <td></td>
        <th align="left">TOTAL</th>
        <td colspan="4"></td>
        <td align="center">
            <?php
            echo number_format($total, 2) . " %";
            ?>
        </td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <th align="left">AVERAGE</th>
        <td colspan="4"></td>
        <td align="center">
            <?php
            if ($total == 0) {
            } else {
                echo number_format($total / $hitung, 2) . " %";
            }

            ?>
        </td>
        <td></td>
        <td></td>
    </tr>
</table>
<br>
<!-- tabel summary availability plant -->
<br>
<table class="table table-bordered text-center" border="1">
    <tr>
        <th>GRAND TOTAL AVAILABILITY</th>
        <th colspan="2">PLANT</th>
        <th>AVAILABILITY</th>
    </tr>
    <?php
    $total = 0;
    $hitungPlant = 0;
    foreach ($plant as $p => $row) {
        $bidang = $row->kodebidang;
        $hitungPlant++;
    ?>
        <tr>
            <td></td>
            <td><?= $bidang ?></td>
            <td>:</td>
            <td align="center">
                <?php
                $filterBulan = $tahun . "-" . $bulan;
                if ($tagsort == 'all' and $plantsort == 'all') {
                    $query = $this->db->query("SELECT tb_trouble.tagsign, dateentry, SUM(stoptime) AS shutdown FROM tb_vehicle, tb_trouble WHERE tb_vehicle.tagsign = tb_trouble.tagsign AND DATE_FORMAT(dateentry, '%Y-%m') = '$filterBulan'  AND tb_vehicle.kodebidang = '$bidang' GROUP BY tb_trouble.tagsign");
                } elseif ($tagsort == 'all') {
                    $query = $this->db->query("SELECT tb_trouble.tagsign, dateentry, SUM(stoptime) AS shutdown FROM tb_vehicle, tb_trouble WHERE tb_vehicle.tagsign = tb_trouble.tagsign AND DATE_FORMAT(dateentry, '%Y-%m') = '$filterBulan' AND tb_vehicle.kodebidang = '$bidang' AND tb_vehicle.kodebidang = '$plantsort' GROUP BY tb_trouble.tagsign");
                } elseif ($plantsort == 'all') {
                    $query = $this->db->query("SELECT tb_trouble.tagsign, dateentry, SUM(stoptime) AS shutdown FROM tb_vehicle, tb_trouble WHERE tb_vehicle.tagsign = tb_trouble.tagsign AND tb_trouble.tagsign = '$tagsort' AND DATE_FORMAT(dateentry, '%Y-%m') = '$filterBulan' AND tb_vehicle.kodebidang = '$bidang' GROUP BY tb_trouble.tagsign");
                } else {
                    $query = $this->db->query("SELECT tb_trouble.tagsign, dateentry, SUM(stoptime) AS shutdown FROM tb_vehicle, tb_trouble WHERE tb_vehicle.tagsign = tb_trouble.tagsign AND tb_trouble.tagsign = '$tagsort' AND DATE_FORMAT(dateentry, '%Y-%m') = '$filterBulan' AND tb_vehicle.kodebidang = '$bidang' AND tb_vehicle.kodebidang = '$plantsort' GROUP BY tb_trouble.tagsign");
                }

                $hitung = 0;
                $totalAvb = 0;
                foreach ($query->result() as $q => $row) {
                    $shutdown = $row->shutdown;
                    $avb = ((($oph - $shutdown) / $oph) * 100);
                    $totalAvb = $totalAvb + $avb;
                    $hitung++;
                }
                if ($hitung == 0) {
                    $avb = 100;
                    $total = $total + $avb;
                    echo $avb . " %";
                } else {
                    $totalAvb = $totalAvb / $hitung;
                    $total = $total + $totalAvb;
                    echo number_format($totalAvb, 2) . " %";
                }
                ?>
            </td>
        <?php
    }
        ?>

        <tr>
            <th>TOTAL AVERAGE AVAILABILITY</th>
            <td></td>
            <td>:</td>
            <td align="center"><?= number_format($total / $hitungPlant, 2) . " %" ?></td>
        </tr>
</table>
<br><br>
<table class="table table-bordered text-center" border="1" style="margin:0px">
    <!-- <thead align="center"> -->
    <tr>
        <th rowspan="5" colspan="8">
            <p>TROUBLE FREQUENCY</p>
            <p align="center">
                <?php
                $bulanini = $tahun . "-" . $bulan;
                echo "MONTH : " . date('F Y', strtotime($bulanini));
                ?>
            </p>
        </th>


        <th colspan="2" align="left">Section</th>
        <th colspan="2">SSW-3</th>
        <th>PT AUTO PADU</th>
    </tr>
    <tr>
        <th colspan="2" align="left">Approved By (M)</th>
        <th colspan="2"></th>
        <th></th>
    </tr>
    <tr>
        <th colspan="2" align="left">Checked By (JM)</th>
        <th colspan="2"></th>
        <th></th>
    </tr>
    <tr>
        <th colspan="2" align="left">Prepared By (SI)</th>
        <th colspan="2"></th>
        <th></th>
    </tr>
    <tr>
        <th colspan="2" align="left">Date</th>
        <th colspan="2"></th>
        <th></th>
    </tr>
    <tr>
        <th>No</th>
        <th>Tag Sign</th>
        <th>Type</th>
        <th>Plant</th>
        <th>Engine</th>
        <th>Transmisi</th>
        <th>Brake</th>
        <th>Hydraulic</th>
        <th>Steering</th>
        <th>Body & Chasis</th>
        <th>Attachment</th>
        <th>Electrical</th>
        <th>Total</th>
    </tr>
    <?php
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
    foreach ($monthly as $m => $row) {

        $no++;
    ?>
        <tr align="center">
            <?php

            ?>
            <td><?php echo $no; ?></td>
            <td align="left">
                <?php
                $tagSign = $row->tagsign;
                echo $tagSign;
                ?>
            </td>
            <td><?php echo $row->type   ?></td>
            <td><?php echo $row->kodebidang   ?></td>
            <?php
            $filterBulan = $tahun . "-" . $bulan;
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
            ?>
            <td><?= $engine; ?></td>
            <td><?= $transmisi; ?></td>
            <td><?= $brake; ?></td>
            <td><?= $hydraulic; ?></td>
            <td><?= $steering; ?></td>
            <td><?= $bodychasis; ?></td>
            <td><?= $attachment; ?></td>
            <td><?= $electrical; ?></td>
            <td><?= $engine + $transmisi + $brake + $hydraulic + $steering + $bodychasis + $attachment + $electrical; ?></td>
        </tr>
    <?php
    }
    ?>
    <tr>
        <th align="left" colspan="4">TOTAL</th>
        <td align="center"><?= $tengine; ?></td>
        <td align="center"><?= $ttransmisi; ?></td>
        <td align="center"><?= $tbrake; ?></td>
        <td align="center"><?= $thydraulic; ?></td>
        <td align="center"><?= $tsteering; ?></td>
        <td align="center"><?= $tbodychasis; ?></td>
        <td align="center"><?= $tattachment; ?></td>
        <td align="center"><?= $telectrical; ?></td>
        <td align="center"><?= $tengine + $ttransmisi + $tbrake + $thydraulic + $tsteering + $tbodychasis + $tattachment + $telectrical; ?></td>
    </tr>
</table>