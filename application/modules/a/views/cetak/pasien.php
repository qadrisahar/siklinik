<style type="text/css">
    .widget-page {
        box-shadow: 15px 19px 24px -11px #bbb9b9;
        border-radius: 37px;
        padding: 9px;
        margin: 1px;
        width: 100%;
}
</style>

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
    </div>
    </div>
        <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 p-4 mb-6 card">
            <form class="">
                <div class="form-row" id="cetak_antrian">
                    <div class="col-md-12">
                        <div class="form-row row-center">
                            <span><b>Klinik Bidan Andalanta</b></span>
                        </div>
                        <div class="form-row row-center">
                            <span>Alamat</span>
                        </div>
                        <div class="form-row row-center">
                            <span>No. Telepon</span>
                        </div><br>
                        <div class="form-row row-center" id="data">
                            <table width="300" style="margin-left:80px;">
                                <tr>
                                    <td>No. Registrasi</td>
                                    <td> : <?=$antrian->no_registrasi?></td>
                                </tr>
                                <tr>
                                    <td>No. Pasien</td>
                                    <td> : <?=$antrian->id_pasien?></td>
                                </tr>
                                <tr>
                                    <td>Layanan</td>
                                    <td> : <?=$antrian->layanan?></td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td> : <?=$antrian->nama?></td>
                                </tr>
                                <tr>
                                    <td>Waktu</td>
                                    <td> : <?=date('d-m-Y', strtotime($antrian->w_insert));?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="position-relative form-group desa-filter-form">
                            <div class="form-row row-center">
                                <div class="col-md-3">
                                    <div class="position-relative form-group widget-page text-center">
                                        <h1><b><?=$antrian->no_antrian?></b></h1>
                                    </div>
                                </div>
                            </div>
                        </div><br>

                    </div>
                </div>
            </form>

            <div class="form-row row-center">
                <button target="target_blank" type="button" class="btn btn-primary mt-0" onclick="printDiv()"><i class="fa fa-print"></i>
                    Cetak</button>
            </div>
    </div>
</div>
    <script> 
        function printDiv() { 
            var divContents = document.getElementById("cetak_antrian").innerHTML; 
            var a = window.open('', '', 'height=500, width=500'); 
            a.document.write('<html>'); 
            a.document.write('<body style="text-align:center">'); 
            a.document.write(divContents); 
            a.document.write('</body></html>'); 
            a.document.close(); 
            a.print(); 
        } 
    </script> 
  <script>
   $('#loading').hide();
  </script>
