<style type="text/css">
    .widget-page {
        box-shadow: 15px 19px 24px -11px #bbb9b9;
        border-radius: 37px;
        padding: 9px;
        margin: 1px;
        width: 100%;
}
.table_print tbody td {border-bottom:1px solid #c3c3c3 !important}

    @media print {
        body * {
            visibility: hidden;
        }
        
        #printArea, #printArea * {
            visibility: visible;
        }
        #printArea {
            position: absolute;
            left: 0;
            top: 0;
            width: 500px;
        }
        @page { margin-top: 0px;margin-bottom:0px; }
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
                <div class="form-row" id="printArea">
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
                                    <td> : <?=datetime2($antrian->w_insert);?></td>
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
            <a href="javascript:window.print();" class="btn btn-primary btn-sm"><i
                        class="fa fa-print"></i> Print (Ctrl+P)</a>
            </div>
    </div>
</div>
  <script>
   $('#loading').hide();
  </script>
