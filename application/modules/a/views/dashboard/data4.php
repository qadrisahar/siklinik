<?php
$m=ltrim($month, '0');
?>
<div class="col-lg-8 col-md-12 pl-0 pr-0">
    <div id="bahan_meter" style="height: 400px;width:100%;"></div>
</div>
<div class="col-lg-4 col-md-12 pl-0 pr-0">
    <div class="row">
        <div class="col-12">
            <div class="widget-title">
                <h5>Bahan In Meter (<?=toMonth($m).' '.$year?>) </h5>
            </div>
        </div>
        <div class="col-12">
            <div class="widget-body">
                <table>
                    <thead>
                        <tr>
                            <th>Bahan</th>
                            <th>Qty</th>
                            <th class="text-right">HPP</th>
                        </tr>
                    </thead>
                    <?php
                                $q_bahan=$this->m_data->data_bahan_meter();
                                $tot_hpp_bahan_meter=0;
                                foreach($q_bahan as $dbh){
                                    $id_bahan_meter[$dbh->id_bahan]=$dbh->id_bahan;
                                    $nm_bahan[$dbh->id_bahan]=$dbh->nama_bahan;
                                    $m_meter_hpp[$dbh->id_bahan]=$this->db->select('(COALESCE(SUM(wd.hpp_bahan), 0)) as hpp')->join('invoice i','i.no_wo=wd.no_wo')->where("EXTRACT( YEAR_MONTH FROM i.`date` )='$year$month' AND i.cancel='n' AND wd.id_bahan='$dbh->id_bahan'")->get('wo_detail wd')->row()->hpp;
                                    $qty_bahan[$dbh->id_bahan]=$this->db->select('((COALESCE(SUM(wd.qty*(wd.width*wd.height)), 0))) as qty')->join('invoice i','i.no_wo=wd.no_wo')->where("EXTRACT( YEAR_MONTH FROM i.`date` )='$year$month' AND i.cancel='n' AND wd.id_bahan='$dbh->id_bahan'")->get('wo_detail wd')->row()->qty;
                                    echo '<tr>';
                                    echo '<td class="t_name">'.$nm_bahan[$dbh->id_bahan].'</td>
                                    <td class="t_name">'.$qty_bahan[$dbh->id_bahan].'</td>
                                    <td class="t_value">'.'Rp.'.toRp($m_meter_hpp[$dbh->id_bahan]).'</td>';
                                    echo '</tr>';
                                    $tot_hpp_bahan_meter+=$m_meter_hpp[$dbh->id_bahan];
                                }
                                ?>
                    <tfooter>
                        <tr>
                            <th colspan="2">Total</th>
                            <th class="text-right">Rp. <?=toRp($tot_hpp_bahan_meter)?></th>
                        </tr>
                    </tfooter>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<script>
Highcharts.chart('bahan_meter', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Chart Bahan In Meter (<?=toMonth($m).' '.$year?>)'
    },
    subtitle: {
        text: '<?= $this->db->select('company_name')->where('id','setting')->get('setting')->row()->company_name;?>'
    },
    xAxis: {
        categories: [
            <?php
            foreach($id_bahan_meter as $k_bahan_meter=>$v_bahan_meter){
                echo "'".$nm_bahan[$k_bahan_meter]."',";
            }
            ?>
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Meter'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">Qty : </td>' +
            '<td style="padding:0"><b>{point.y:.1f} Meter</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        <?php
         echo "name : 'Bahan In Meter',";
         echo "data : [";
         foreach($id_bahan_meter as $k_bahan_meter=>$v_bahan_meter){
            echo $qty_bahan[$k_bahan_meter].",";
         }
         echo "]";
            

        ?>
      
    }]
});
</script>