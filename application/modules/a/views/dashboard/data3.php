<?php
$m=ltrim($month, '0');
?>
<div class="col-lg-8 col-md-12 pl-0 pr-0">
    <div id="sales_by_day" style="height: 400px;width:100%;"></div>
</div>
<div class="col-lg-4 col-md-12 pl-0 pr-0">
    <div class="row">
        <div class="col-12">
            <div class="widget-title">
                <h5>Sales By Day (<?=toMonth($m).' '.$year?>) </h5>
            </div>
        </div>
        <div class="col-12">
            <div class="widget-body">
                <table>
                    <thead>
                        <tr>
                            <th>Day</th>
                            <th class="text-right">Sales</th>
                        </tr>
                    </thead>
                    <?php
                                $day=array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');
                                $tot_sales_by_day=0;
                                foreach($day as $k_day=>$v_day){
                                    $m_sales_day[$v_day]=$this->db->select('COALESCE(SUM(i.total), 0) as sales')->where("EXTRACT( YEAR_MONTH FROM i.`date` )='$year$month' AND DAYNAME(i.`date` )='$v_day' AND i.cancel='n'")->get('invoice i')->row()->sales;
                                    echo '<tr>';
                                    echo '<td class="t_name">'.$v_day.'</td>
                                    <td class="t_value">'.'Rp.'.toRp($m_sales_day[$v_day]).'</td>';
                                    echo '</tr>';
                                    $tot_sales_by_day+=$m_sales_day[$v_day];
                                }
                                ?>
                    <tfooter>
                        <tr>
                            <th>Total</th>
                            <th class="text-right">Rp. <?=toRp($tot_sales_by_day)?></th>
                        </tr>
                    </tfooter>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<script>
Highcharts.chart('sales_by_day', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Sales By Day (<?=toMonth($m).' '.$year?>)'
    },
    subtitle: {
        text: '<?= $this->db->select('company_name')->where('id','setting')->get('setting')->row()->company_name;?>'
    },
    xAxis: {
        categories: [
            <?php
            foreach($day as $k_day=>$v_day){
                echo "'".$v_day."',";
            }
            ?>
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Sales (Rp.)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">Sales : </td>' +
            '<td style="padding:0"><b>Rp.{point.y:.1f}</b></td></tr>',
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
         echo "name : 'Day',";
         echo "data : [";
         foreach($day as $k_day=>$v_day){
            echo $m_sales_day[$v_day].",";
         }
         echo "]";
            

        ?>
      
    }]
});
</script>