<div class="box">
    <div class="box-body table-responsive">
        <figure class="highcharts-figure">
            <div id="grafik-troubleFrec"></div>
        </figure>
    </div>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<!-- trouble Frequency -->
<script>
    Highcharts.chart('grafik-troubleFrec', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Monthly Trouble Frequence'
        },
        subtitle: {
            text: ' '
        },
        xAxis: {
            // categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            categories: <?php
                        $data = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
                        echo  json_encode($data) ?>
        },
        yAxis: {
            title: {
                text: 'Trouble Freq'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        // series: [{
        //     name: 'Tokyo',
        //     data: [7.0, 6.9, 9.5, 14.5, 18.4, 21.5, ]
        // }, {
        //     name: 'London',
        //     data: [3.9, 4.2, 5.7, 0, 11.9, 15.2, ]
        // }]


        series: [
            <?php foreach ($plant as $p => $row) {
                $plant = $row->kodebidang;
                $today = date('m');
                for ($i = 0; $i < $bulan; $i++) {

                    $number = date('m', strtotime('+' . $i . ' month', strtotime($today)));
                    $filterBulan = $tahun . "-" . $number;
                    if ($tagsort == 'all' and $plantsort == 'all') {
                        $query = $this->db->query("SELECT tb_trouble.tagsign, kodebidang, dateentry,COUNT(tb_trouble.tagsign) AS troublefrec FROM tb_vehicle, tb_trouble WHERE tb_vehicle.tagsign = tb_trouble.tagsign AND DATE_FORMAT(dateentry, '%Y-%m') = '$filterBulan' AND tb_vehicle.kodebidang = '$plant' GROUP BY tb_trouble.tagsign");
                    } elseif ($tagsort == 'all') {
                        $query = $this->db->query("SELECT tb_trouble.tagsign, kodebidang, dateentry,COUNT(tb_trouble.tagsign) AS troublefrec FROM tb_vehicle, tb_trouble WHERE tb_vehicle.tagsign = tb_trouble.tagsign AND DATE_FORMAT(dateentry, '%Y-%m') = '$filterBulan' AND tb_vehicle.kodebidang = '$plant' AND tb_vehicle.kodebidang = '$plantsort' GROUP BY tb_trouble.tagsign");
                    } elseif ($plantsort == 'all') {
                        $query = $this->db->query("SELECT tb_trouble.tagsign, kodebidang, dateentry,COUNT(tb_trouble.tagsign) AS troublefrec FROM tb_vehicle, tb_trouble WHERE tb_vehicle.tagsign = tb_trouble.tagsign AND tb_trouble.tagsign = '$tagsort' AND DATE_FORMAT(dateentry, '%Y-%m') = '$filterBulan' AND tb_vehicle.kodebidang = '$plant' GROUP BY tb_trouble.tagsign");
                    } else {
                        $query = $this->db->query("SELECT tb_trouble.tagsign, kodebidang, dateentry,COUNT(tb_trouble.tagsign) AS troublefrec FROM tb_vehicle, tb_trouble WHERE tb_vehicle.tagsign = tb_trouble.tagsign AND tb_trouble.tagsign = '$tagsort' AND DATE_FORMAT(dateentry, '%Y-%m') = '$filterBulan' AND tb_vehicle.kodebidang = '$plant' AND tb_vehicle.kodebidang = '$plantsort' GROUP BY tb_trouble.tagsign");
                    }
                    $totalFrec = 0;
                    foreach ($query->result() as $q => $value) {
                        $totalFrec = $totalFrec + intval($value->troublefrec);
                    }
                    $frec[$i] = $totalFrec;
                }
            ?> {
                    name: <?= json_encode($plant) ?>,

                    data: <?= json_encode($frec) ?>

                },
            <?php } ?>
        ]
    });
</script>
<!-- /trouble Frequency -->