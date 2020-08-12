<?php
$m=ltrim($month, '0');
$q_mcn=$this->db->select('id_layanan,layanan')->get('layanan')->result();
foreach($q_mcn as $dt){
    $id_layanan[$dt->id_layanan]=$dt->id_layanan;
    $nm_layanan[$dt->id_layanan]=$dt->layanan;
}
?>
<div class="row">
<div class="col-lg-8 col-md-12 pl-0 pr-0">
    <div id="percentage_layanan" style="height: 400px;width:100%;"></div>
</div>
<div class="col-lg-4 col-md-12 pl-0 pr-0">
    <div class="row">
        <div class="col-12">
            <div class="widget-title">
                <h6>Pemasukan per Layanan (<?=toMonth($m).' '.$year?>) </h6>
            </div>
        </div>
        <div class="col-12">
            <div class="widget-body">
                <table>
                    <thead>
                        <tr>
                            <th>Layanan</th><th class="text-right">Pemasukan</th>
                        </tr>
                    </thead>
                    <?php
                    $tot_sales_layanan=0;
                    foreach($id_layanan as $k_layanan=>$v_layanan){
                        $m_sales[$k_layanan]=0;
                        echo '<tr>';
                        echo '<td class="t_name">'.$nm_layanan[$k_layanan].'</td>
                        <td class="t_value text-right">'.'Rp.'.toRp($m_sales[$k_layanan]).'</td>';
                        echo '</tr>';
                        $tot_sales_layanan+=$m_sales[$k_layanan];
                    }
                    ?>
                    <tfooter>
                        <tr>
                            <th colspan="">Total</th><th class="text-right">Rp. <?=toRp($tot_sales_layanan)?></th>
                        </tr>
                    </tfooter>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
Highcharts.chart('percentage_layanan', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Persensates Pemasukan per Layanan (<?=toMonth($m).' '.$year?>)'
    },
    subtitle: {
        text: '<?= "Bidan Andanata"?>'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %<br>Sales: {point.y}'
            }
        }
    },
    series: [{
        name: 'Sales',
        colorByPoint: true,
        data: [
            <?php
            foreach($id_layanan as $k_layanan=>$v_layanan){
                    echo "{";
                    echo "name : '".$nm_layanan[$k_layanan]."',";
                    echo "y : ".$m_sales[$k_layanan]."";
                    echo "},";
            }
            ?>
            ]
    }]
});
</script>