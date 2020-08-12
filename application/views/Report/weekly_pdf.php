        <table border="1">
            <tr>
                <th rowspan="5" colspan="7">
                    <p>WEEKLY REPORT OF VEHICLE PERFORMANCE</p>
                    <p align="center">
                        <?php
                        echo $batas . " s/d " . $hariini;
                        ?>
                    </p>
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
            foreach ($weekly as $w => $row) {

                $no++;
            ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row->tagsign; ?></td>
                    <td><?php echo $row->type   ?></td>
                    <td><?php echo $row->kodebidang   ?></td>
                    <td><?php echo 168; ?></td>
                    <td><?php echo $row->shutdown ?></td>
                    <td><?php echo $row->troublefrec ?></td>
                    <td>
                        <?php
                        $availability = (((168 - $row->shutdown) / 168) * 100);
                        $total = $total + $availability;
                        echo $availability = number_format($availability, 2) . " %";
                        $hitung++;
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
        </table>
        <br>
        <!-- tabel summary availability plant -->
        <br>
        <table border="1">
            <tr>
                <th>GRAND TOTAL AVAILABILITY</th>
                <th colspan="2">PLANT</th>
                <th>AVAILABILITY</th>
            </tr>
            <?php
            $batas = date('yy-m-d', strtotime($batas));
            $hariini = date('yy-m-d', strtotime($hariini));
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
                            $query = $this->db->query("SELECT tb_trouble.tagsign, dateentry, SUM(stoptime) AS shutdown FROM tb_vehicle, tb_trouble WHERE tb_vehicle.tagsign = tb_trouble.tagsign AND DATE_FORMAT(dateentry, '%Y-%m-%d') BETWEEN '$batas' AND '$hariini' AND tb_vehicle.kodebidang = '$bidang' GROUP BY tb_trouble.tagsign");
                        } elseif ($tagsort == 'all') {
                            $query = $this->db->query("SELECT tb_trouble.tagsign, dateentry, SUM(stoptime) AS shutdown FROM tb_vehicle, tb_trouble WHERE tb_vehicle.tagsign = tb_trouble.tagsign AND DATE_FORMAT(dateentry, '%Y-%m-%d') BETWEEN '$batas' AND '$hariini' AND tb_vehicle.kodebidang = '$bidang' AND tb_vehicle.kodebidang = '$plantsort' GROUP BY tb_trouble.tagsign");
                        } elseif ($plantsort == 'all') {
                            $query = $this->db->query("SELECT tb_trouble.tagsign, dateentry, SUM(stoptime) AS shutdown FROM tb_vehicle, tb_trouble WHERE tb_vehicle.tagsign = tb_trouble.tagsign AND tb_trouble.tagsign = '$tagsort' AND DATE_FORMAT(dateentry, '%Y-%m-%d') BETWEEN '$batas' AND '$hariini' AND tb_vehicle.kodebidang = '$bidang' GROUP BY tb_trouble.tagsign");
                        } else {
                            $query = $this->db->query("SELECT tb_trouble.tagsign, dateentry, SUM(stoptime) AS shutdown FROM tb_vehicle, tb_trouble WHERE tb_vehicle.tagsign = tb_trouble.tagsign AND tb_trouble.tagsign = '$tagsort' AND DATE_FORMAT(dateentry, '%Y-%m-%d') BETWEEN '$batas' AND '$hariini' AND tb_vehicle.kodebidang = '$bidang' AND tb_vehicle.kodebidang = '$plantsort' GROUP BY tb_trouble.tagsign");
                        }

                        $hitung = 0;
                        $totalAvb = 0;
                        foreach ($query->result() as $q => $row) {
                            $shutdown = $row->shutdown;
                            $avb = (((168 - $shutdown) / 168) * 100);
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