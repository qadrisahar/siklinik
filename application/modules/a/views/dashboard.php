<?php
    $m=ltrim(date('m'), '0');
    $month=date('m');
    $year=date('Y');
    
?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon-small bg-malibu-beach">
                <i class="<?php echo $icon;?> text-white">
                </i>
            </div>
            <div><?php echo $title; ?>                
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block dropdown">
              
            </div>              
        </div>     
    </div>
</div>
<div class="row">
   <div class="col-lg-3 col-md-3">
      <div class="card mb-3 widget-content">
            <div class="widget-content-wrapper">
               <div class="widget-content-left">
                  <div class="widget-heading">Data Pasien</div>
                  <div class="widget-subheading">Total Pasien</div>
               </div>
               <div class="widget-content-right">
                  <div class="widget-numbers text-success"><span><?=$this->m_dashboard->total('pasien')?></span></div>
               </div>
            </div>
      </div>
   </div>
   <div class="col-lg-3 col-md-3">
      <div class="card mb-3 widget-content">
            <div class="widget-content-wrapper">
               <div class="widget-content-left">
                  <div class="widget-heading">Data Obat</div>
                  <div class="widget-subheading">Total Data Obat</div>
               </div>
               <div class="widget-content-right">
                  <div class="widget-numbers text-primary"><span><?=$this->m_dashboard->total('obat')?></span></div>
               </div>
            </div>
      </div>
   </div>
   <div class="col-lg-3 col-md-3">
      <div class="card mb-3 widget-content">
            <div class="widget-content-wrapper">
               <div class="widget-content-left">
                  <div class="widget-heading">Data Alkes</div>
                  <div class="widget-subheading">Total Data Alkes</div>
               </div>
               <div class="widget-content-right">
                  <div class="widget-numbers text-warning"><span><?=$this->m_dashboard->total('alkes')?></span></div>
               </div>
            </div>
      </div>
   </div>
   <div class="col-lg-3 col-md-3">
      <div class="card mb-3 widget-content">
            <div class="widget-content-wrapper">
               <div class="widget-content-left">
                  <div class="widget-heading">Data Layanan</div>
                  <div class="widget-subheading">Total Layanan</div>
               </div>
               <div class="widget-content-right">
                  <div class="widget-numbers text-danger"><span><?=$this->m_dashboard->total('layanan')?></span></div>
               </div>
            </div>
      </div>
   </div>
</div>
<div class="divider mt-0" style="margin-bottom: 30px;"></div>
<div class="main-card mb-3 card">
   <div class="no-gutters row">
      <div class="col-md-6">
            <div class="pt-0 pb-0 card-body">
               <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                        <div class="widget-content p-0">
                           <div class="widget-content-outer">
                              <div class="widget-content-wrapper">
                                    <div class="widget-content-left">
                                       <div class="widget-heading">Total Pembayaran</div>
                                       <div class="widget-subheading">Belum Dieksekusi</div>
                                    </div>
                                    <div class="widget-content-right">
                                       <div class="widget-numbers text-success">1896</div>
                                    </div>
                              </div>
                           </div>
                        </div>
                  </li>
                  <li class="list-group-item">
                        <div class="widget-content p-0">
                           <div class="widget-content-outer">
                              <div class="widget-content-wrapper">
                                    <div class="widget-content-left">
                                       <div class="widget-heading">Total Tindakan</div>
                                       <div class="widget-subheading">Belum Dieksekusi</div>
                                    </div>
                                    <div class="widget-content-right">
                                       <div class="widget-numbers text-primary">126</div>
                                    </div>
                              </div>
                           </div>
                        </div>
                  </li>
               </ul>
            </div>
      </div>
      <div class="col-md-6">
            <div class="pt-0 pb-0 card-body">
               <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                        <div class="widget-content p-0">
                           <div class="widget-content-outer">
                              <div class="widget-content-wrapper">
                                    <div class="widget-content-left">
                                       <div class="widget-heading">Stok Kritis Obat</div>
                                       <div class="widget-subheading">Total</div>
                                    </div>
                                    <div class="widget-content-right">
                                       <div class="widget-numbers text-danger">45</div>
                                    </div>
                              </div>
                           </div>
                        </div>
                  </li>
                  <li class="list-group-item">
                        <div class="widget-content p-0">
                           <div class="widget-content-outer">
                              <div class="widget-content-wrapper">
                                    <div class="widget-content-left">
                                       <div class="widget-heading">Stok Kritis Alkes</div>
                                       <div class="widget-subheading">Total</div>
                                    </div>
                                    <div class="widget-content-right">
                                       <div class="widget-numbers text-warning">3</div>
                                    </div>
                              </div>
                           </div>
                        </div>
                  </li>
               </ul>
            </div>
      </div>
   </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="widget-card">
            <div class="col-lg-12 col-md-12 pl-0 pr-0 mb-0">
                <div class="form-group row">
                    <label for="year" class="col-sm-1 col-form-label">Tahun</label>
                    <div class="col-sm-2">
                        <select class="form-control" id="year" name="year">
                            <?php
                                for($i=$year;$i>=2000;$i--){
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                }
                                ?>
                        </select>
                    </div>
                    <label for="month" class="col-sm-1 col-form-label">Bulan</label>
                    <div class="col-sm-2">
                        <select class="form-control" id="month" name="month">
                            <?php
                                for($i=1;$i<=12;$i++){
                                    if ($i==$month){$selected='selected';}else{$selected='';}
                                    echo '<option value="'.$i.'" '.$selected.'>'.toMonth($i).'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="ccol-sm-2 pl-3 pt-3 pt-md-0 pt-lg-0">
                        <button type="button" name="filter" id="filter" class="btn btn-info btn-md"><i
                                class="fa fa-check"></i> Check</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="divider mt-0" style="margin-bottom: 30px;"></div>
<div class="row mb-5">
    <div class="col-lg-12 col-md-12 pl-0 pr-0">
        <div class="widget-card" style="min-height: 300px;" id="data1">
        </div>
    </div>
</div>
<div class="divider mt-0" style="margin-bottom: 30px;"></div>
<div class="row mb-5">
    <div class="col-lg-12 col-md-12 pl-0 pr-0">
        <div class="widget-card" style="min-height: 300px;" id="data2">
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    data_dashboard();
    $("#filter").click(function(e) {
        e.preventDefault();
        data_dashboard();
    });
});

function data_dashboard() {
    var year = $("#year").val();
    var month = $("#month").val();
    var param = $("#filter");
    $.ajax({
        type: 'POST',
        data: {
            year: year,
            month: month
        },
        url: "<?php echo site_url('a_dashboard/check');?>",
        dataType: 'json',
        beforeSend: function() {
            process1(param);
            $("#data1,#data2").html('<div class="buttonload widget-load"><i class="fa fa-refresh fa-spin widget-load-spinner"></i></div>');
        },
        success: function(data) {
            $("#data1").html(data.data1);
            $("#data2").html(data.data2);
            process_done1(param, '<i class="fa fa-check"></i> Check');
        }
    });
}
</script>

  <script>
   $('#loading').hide();
  </script>
