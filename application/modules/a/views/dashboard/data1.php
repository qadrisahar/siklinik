<?php
$m=ltrim($month, '0');
$m_pembayaran=$this->db->select('COALESCE(SUM(i.total), 0) as pembayaran')->where("EXTRACT( YEAR_MONTH FROM i.`w_insert` )='$year$month' AND i.cancel='n' ")->get('pembayaran i')->row()->pembayaran;
$m_pemasukan=$m_pembayaran;
$m_pengeluaran=0;
$m_profit=$m_pemasukan-$m_pengeluaran;
?>
<style>
table{font-size: 14px !important;width:100%;}
td.value {
    font-weight: 700;
    font-size: 22px;
    text-align:right;
}
</style>
<div class="col-lg-12 col-md-12 col-12">
    <div class="row">
        <div class="col-12">
            <div class="widget-title">
                <h5>Financial (<?=toMonth($m).' '.$year?>) </h5>
            </div>
        </div>
        <div class="col-md-4">
            <div class="widget-body">
                <table>
                    <tr>
                        <td class="name" width="40%">Total Pengeluaran</td>
                        <td class="value text-danger" width="70%"><?= 'Rp.'.toRp($m_pengeluaran)?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <div class="widget-body">
                <table>
                    <tr>
                        <td class="name" width="40%">Total Pemasukan</td>
                        <td class="value text-warning" width="70%"><?= 'Rp.'.toRp($m_pemasukan)?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <div class="widget-body">
                <table>
                    <tr>
                        <td class="name" width="40%">Profit</td>
                        <td class="value text-success" width="70%"><?= 'Rp.'.toRp($m_profit)?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="col-lg-12 col-md-12 col-12 pl-0 pr-0">
    <div id="financial_per_month" style="height: 400px;width:100%;"></div>
</div>
<script type="text/javascript">
Highcharts.chart('financial_per_month', {

title: {
    text: 'Pemasukan Hari ke Hari (<?=toMonth($m).' '.$year?>)'
},

subtitle: {
    text: '<?= 'Bidan Andalanta'?>'
},
xAxis: {
    categories: [
        <?php
        $count=date("t");
        for ($i=1; $i <= $count ; $i++) { 
            echo "'".$i."',";
        }
        ?>
        ]
},

yAxis: {
    title: {
        text: 'Pemasukan'
    }
},
legend: {
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'middle'
},

plotOptions: {
    series: {
        label: {
            connectorAllowed: false
        }
    }
},

series: [
        <?php
            echo "{";
            echo "name : '".'Pemasukan'."',";
            echo "data : [";
            for ($i=1; $i <= $count ; $i++) { 
                $date=date("Y").'-'.date("m").'-'.$i;
                $m_pembayaran=$this->db->select('COALESCE(SUM(i.total), 0) as pembayaran')->where("DATE(i.`w_insert` )='$date' AND i.cancel='n' ")->get('pembayaran i')->row()->pembayaran;
                $m_pemasukan=$m_pembayaran;
                $tot_omst=$m_pemasukan;
                echo "".$tot_omst.",";
            }
            echo "]";
            echo "},";
        ?>
],

responsive: {
    rules: [{
        condition: {
            maxWidth: 500
        },
        chartOptions: {
            legend: {
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'bottom'
            }
        }
    }]
}

});
</script>