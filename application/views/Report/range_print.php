<!-- tabel utama -->
<div class="box">
    <div class="box-body table-responsive">
        <table class="table table-bordered text-center" border="1">
            <!-- <thead align="center"> -->
            <tr>
                <th rowspan="5" colspan="7">
                    <div class="contain">
                        <div>
                            <p>DATE RANGE REPORT OF VEHICLE PERFORMANCE</p>
                            <p align="center">
                                <?php
                                echo $dateStart . " s/d " . $dateFinish;
                                ?>
                            </p>
                        </div>
                    </div>
                </th>
                <th>Section</th>
                <th>SSW-3</th>
            </tr>
            <tr>
                <th>Approved By (M)</th>
                <th></th>
            </tr>
            <tr>
                <th>Checked By (JM)</th>
                <th></th>
            </tr>
            <tr>
                <th>Prepared By (SI)</th>
                <th></th>
            </tr>
            <tr>
                <th>Date</th>
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
                <th>Remarks</th>
            </tr>
            <?php
            $no = 0;
            $total = 0;
            $hitung = 0;
            if ($range != null) {
                $dateFinish = date('yy-m-d', strtotime($dateFinish));
                $dateStart = date('yy-m-d', strtotime($dateStart));
                $tgl1 = new DateTime($dateFinish);
                $tgl2 = new DateTime($dateStart);
                $oph = $tgl1->diff($tgl2)->days + 1;
                $oph = $oph * 24;

                foreach ($range as $r => $row) {

                    $no++;
            ?>
                    <tbody>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row->tagsign; ?></td>
                            <td><?php echo $row->type   ?></td>
                            <td><?php echo $row->kodebidang   ?></td>
                            <td><?php echo $oph ?></td>
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
                            <td><?php echo $row->remarks   ?></td>
                        </tr>
                    </tbody>
            <?php
                }
            }
            ?>
            <tr>
                <td></td>
                <td></td>
                <th>TOTAL</th>
                <td colspan="4"></td>
                <td>
                    <?php
                    echo number_format($total, 2) . " %";
                    ?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <th>AVERAGE</th>
                <td colspan="4"></td>
                <td>
                    <?php
                    if ($total == 0) {
                    } else {
                        echo number_format($total / $hitung, 2) . " %";
                    }

                    ?>
                </td>
            </tr>
            </thead>
        </table>
    </div>
</div>
<!-- tabel summary availability plant -->
<div class="box">
    <div class="box-body table-responsive">
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
                    <td>
                        <?php
                        if ($tagsort == 'all' and $plantsort == 'all') {
                            $query = $this->db->query("SELECT tb_trouble.tagsign, dateentry, SUM(stoptime) AS shutdown FROM tb_vehicle, tb_trouble WHERE tb_vehicle.tagsign = tb_trouble.tagsign AND DATE_FORMAT(dateentry, '%Y-%m-%d') BETWEEN '$dateStart' AND '$dateFinish' AND tb_vehicle.kodebidang = '$bidang' GROUP BY tb_trouble.tagsign");
                        } elseif ($tagsort == 'all') {
                            $query = $this->db->query("SELECT tb_trouble.tagsign, dateentry, SUM(stoptime) AS shutdown FROM tb_vehicle, tb_trouble WHERE tb_vehicle.tagsign = tb_trouble.tagsign AND DATE_FORMAT(dateentry, '%Y-%m-%d') BETWEEN '$dateStart' AND '$dateFinish' AND tb_vehicle.kodebidang = '$bidang' AND tb_vehicle.kodebidang = '$plantsort' GROUP BY tb_trouble.tagsign");
                        } elseif ($plantsort == 'all') {
                            $query = $this->db->query("SELECT tb_trouble.tagsign, dateentry, SUM(stoptime) AS shutdown FROM tb_vehicle, tb_trouble WHERE tb_vehicle.tagsign = tb_trouble.tagsign AND tb_trouble.tagsign = '$tagsort' AND DATE_FORMAT(dateentry, '%Y-%m-%d') BETWEEN '$dateStart' AND '$dateFinish' AND tb_vehicle.kodebidang = '$bidang' GROUP BY tb_trouble.tagsign");
                        } else {
                            $query = $this->db->query("SELECT tb_trouble.tagsign, dateentry, SUM(stoptime) AS shutdown FROM tb_vehicle, tb_trouble WHERE tb_vehicle.tagsign = tb_trouble.tagsign AND tb_trouble.tagsign = '$tagsort' AND DATE_FORMAT(dateentry, '%Y-%m-%d') BETWEEN '$dateStart' AND '$dateFinish' AND tb_vehicle.kodebidang = '$bidang' AND tb_vehicle.kodebidang = '$plantsort' GROUP BY tb_trouble.tagsign");
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
                    <td><?= number_format($total / $hitungPlant, 2) . " %" ?></td>
                </tr>
        </table>
    </div>
</div>
<?php
if (@$print == 1) { ?>
    <script>
        window.print();
    </script>
<?php
}
?>