<style type="text/css">
.right{text-align:right;}
.center{text-align:center;}
    .widget-page {
        box-shadow: 15px 19px 24px -11px #bbb9b9;
        border-radius: 37px;
        padding: 9px;
        margin: 1px;
        width: 100%;
}
.separator-w-20{width:20px}
.s-style{
    font-weight: 600;
    font-size: 17px;
    font-style: italic;
}
table tr td{vertical-align: top;}
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
            width: 210mm;
            margin:20px;
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
                <div style="margin-bottom: 81px;">
                <div class="form-row" id="printArea">
                    <table style="border-bottom: 3px solid #484f57;margin-bottom: 20px;">
                    <tr>
                    <td width="30%"><img class="logo pl-4" src="<?php echo base_url();?>assets/images/logo/logo.png" style="width:100%"></img></td>
                    <td width="70%">
                        <center>
                        <h2 style="font-weight: 800;">BIDAN PRAKTEK MANDIRI</h2>
                        <h5 style="margin-bottom: 0px;">Hj. A. NANI NURCAHYANI, S.ST </h5>
                        <h6>Jalan Paccerakkang Ruko Poros YPPKG, Daya (0411) 514 504</h6>
                        </center>
                    </td>
                    </tr>
                    </table>
                    <?php

                    ?>
                    <table style="margin-bottom: 20px; width:100%">
                    <tr>
                        <td><h6><b><u>LAMPIRAN KWITANSI</u></b></h6></td>
                    </tr>
                    <tr>
                        <td><h6><?=$no_pembayaran?></h6></td>
                    </tr>
                    </table>

                    </table>
                    <table style="margin-bottom: 20px;width:70%">
                    <tr>
                        <td colspan="3">Perincian pembayaran untuk keperluan Instalasi</td>
                    </tr>
                    <tr>
                        <td width="25%">Nama</td><td> : </td><td><?=$nama_pasien?></td>
                    </tr>
                    <tr>
                        <td width="25%">Umur</td><td> : </td><td><?=$umur?></td>
                    </tr>
                    <tr>
                        <td width="25%">Alamat</td><td> : </td><td><?=$alamat?></td>
                    </tr>
                    </table>

                    <table style="margin-bottom: 20px; width:30%" border="0">
                    <tr style="height: 22px;">
                        <td colspan="3">  </td>
                    </tr>
                    <tr>
                        <td width="40%">Masuk Tanggal</td><td class="center" width="3%"> : </td><td class="right" width="30%"><?=$tgl_masuk?></td>
                    </tr>
                    <tr>
                        <td width="40%">Keluar Tanggal</td><td class="center" width="3%"> : </td><td class="right" width="30%"><?=$tgl_keluar?></td>
                    </tr>
                    </table>

                    <table style="margin-bottom: 0px;width:100%;" border="0">
                    <tr>
                        <td colspan="5">Rincian Biaya :</td>
                    </tr>
                    </table>
                    
                    <table style="margin-bottom: 20px;width:100%;" border="0">
                    <tr class="big-point">
                        <td width="5%" class="right">1.</td><td width="3%" class="separator-w-20"></td><td width="70%" colspan="2"><b>Jasa <?=$jenis_layanan?></b></td><td class="right">Rp.</td><td class="right"><?=toRp($harga_layanan)?></td>
                    </tr>
                    <!-- Tindakan Khusus -->
                    <tr>
                        <td width="5%" class="right">4.</td><td width="3%" class="separator-w-20"></td><td colspan="4">Tindakan Khusus</td>
                    </tr>
                    <?php
                    foreach($tikhus as $tk){
                    ?>
                    <tr>
                        <td width="5%" class="right"> </td><td width="3%" class="separator-w-20"></td><td class="center">-</td><td><?=$tk->tindakan_khusus?></td><td class="right">Rp.</td><td class="right"><?=toRp($tk->total)?></td>
                    </tr>
                    <?php
                    }
                    ?>
                    <!-- End Tindakan Khusus -->

                    <!-- Obat-obatan -->
                    <tr>
                        <td width="5%" class="right">5.</td><td width="3%" class="separator-w-20"></td><td colspan="4">Obat-obatan</td>
                    </tr>
                    <?php
                    foreach($obat as $ob){
                    ?>
                    <tr>
                        <td width="5%" class="right"> </td><td width="3%" class="separator-w-20"></td><td class="center">-</td><td><?=$ob->nama_obat.'('.$ob->jumlah.')@'.$ob->keterangan;?></td><td class="right">Rp.</td><td class="right"><?=toRp($ob->total)?></td>
                    </tr>
                    <?php
                    }
                    ?>
                    <!-- End Obat-obatan -->

                    <!-- Bahan dan Alat -->
                    <tr>
                        <td width="5%" class="right">6.</td><td width="3%" class="separator-w-20"></td><td colspan="4">Bahan dan Alat</td>
                    </tr>
                    <?php
                    foreach($alkes as $ak){
                    ?>
                    <tr>
                        <td width="5%" class="right"> </td><td width="3%" class="separator-w-20"></td><td class="center">-</td><td><?=$ak->nama_alkes.'('.$ak->jumlah.')@'.$ak->keterangan;?></td><td class="right">Rp.</td><td class="right"><?=toRp($ak->total)?></td>
                    </tr>
                    <?php
                    }
                    ?>
                    <!-- End Bahan dan Alat -->

                    <!-- Laboratorium-->
                    <tr>
                        <td width="5%" class="right">7.</td><td width="3%" class="separator-w-20"></td><td colspan="4">Laboratorium</td>
                    </tr>
                    <?php
                    foreach($lab as $lb){
                    ?>
                    <tr>
                        <td width="5%" class="right"> </td><td width="3%" class="separator-w-20"></td><td class="center">-</td><td><?=$lb->laboratorium?></td><td class="right">Rp.</td><td class="right"><?=toRp($lb->total)?></td>
                    </tr>
                    <?php
                    }
                    ?>
                    <!-- End Laboratorium-->

                    <!-- Lain-lain -->
                    <tr>
                        <td width="5%" class="right">8.</td><td width="3%" class="separator-w-20"></td><td colspan="4">Lain-Lain</td>
                    </tr>
                    <?php
                    foreach($lainlain as $ll){
                    ?>
                    <tr>
                        <td width="5%" class="right"> </td><td width="3%" class="separator-w-20"></td><td class="center">-</td><td><?=$ll->lainlain?></td><td class="right">Rp.</td><td class="right"><?=toRp($ll->total)?></td>
                    </tr>
                    <?php
                    }
                    ?>
                    <!-- End Lain-lain -->

                    <!-- Total -->
                    <tr class="s-style" style="border-top: 2px solid;border-bottom: 2px solid;">
                        <td width="5%" class="right" colspan="4"> Total </td><td class="right">Rp.</td><td class="right"><?=toRp($d_pmb->total)?></td>
                    </tr>
                    <!-- End Total -->
                    <!-- Total -->
                    <tr class="s-style">
                        <td width="5%" colspan="7"> Terbilang : <?=strtoupper(terbilang($d_pmb->total))?> </td>
                    </tr>
                    <!-- End Total -->

                    </table>

                    </table>
                    <table style="margin-bottom: 20px;width:100%" border="0">
                    <tr class="center">
                        <td width="60%"></td>
                        <td width="40%">Makassar,<?=tgl_indo($d_pmb->tgl)?><br>Yang Menerima,<br><br><br><br><br><br>....................................................</td>
                    </tr>
                    </table>
                    
                    
                </div>
                <div class="form-row row-center">
                <a href="javascript:window.print();" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Print (Ctrl+P)</a>
                </div>
                </div>
  <script>
   $('#loading').hide();
  </script>
