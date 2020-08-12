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
<div class="row pl-4 pr-4">
 <div class="col-lg-6 col-md-6 col-sm-12 col-12 p-0 mb-0">
 <table class="mb-0 table table-borderless">
      <tbody>
      <tr>
          <th scope="row">No. Registrasi</th>
          <td> : </td>
          <td><?=$no_registrasi?></td>
      </tr>
      <tr>
          <th scope="row">Nama Pasien</th>
          <td> : </td>
          <td><?=$nama_pasien?></td>
      </tr>
      <tr>
          <th scope="row">TTL</th>
          <td> : </td>
          <td><?=$ttl?></td>
      </tr>
      <tr>
          <th scope="row">JK/Umur</th>
          <td> : </td>
          <td><?=$jk_umur?></td>
      </tr>
      </tbody>
  </table>
 </div>
 <div class="col-lg-6 col-md-6 col-sm-12 col-12 p-0 mb-0">
 <table class="mb-0 table table-borderless">
      <tbody>
      <tr>
          <th scope="row">Waktu Registrasi</th>
          <td> : </td>
          <td><?=$w_insert?></td>
      </tr>
      <tr>
          <th scope="row">Jenis Layanan</th>
          <td> : </td>
          <td><?=$jenis_layanan?></td>
      </tr>
      <tr>
          <th scope="row">Tgl Masuk</th>
          <td> : </td>
          <td><?=$tgl_masuk?></td>
      </tr>
      <tr>
          <th scope="row">Tgl Keluar</th>
          <td> : </td>
          <td><?=$tgl_keluar?></td>
      </tr>
      </tbody>
  </table>
 </div>
</div>
<hr>
<div class="row pr-4 text-right">
  <div class="col-12">
        <button type="button" class="btn btn-warning btn-md" name="done" id="done">
            <i class="fa fa-check-circle"></i> Pembayaran Selesai
        </button>
  </div>
</div>
<hr>
<div class=" pr-4 pl-4">
<?php
error_reporting(0);
  $param_replace='layanan_'.$id_layanan.'_';
  $qtb=$this->db->query("SELECT t.TABLE_NAME AS myTables FROM INFORMATION_SCHEMA.TABLES AS t WHERE t.TABLE_SCHEMA = '$database' AND t.TABLE_NAME LIKE 'layanan_$id_layanan%' ");   
  $tab_id=array();
  $tab_show=array();
  $no=array();
  $i=1;
  foreach($qtb->result() as $tb){
    $no[$tb->myTables]=$i++;
    $tab_id[$tb->myTables]=$tb->myTables;
    $tab_show[$tb->myTables]=str_replace('-',' ',str_replace($param_replace,'',$tb->myTables));
    
  }
?>
  <div class="col-lg-12 col-md-12 col-sm-12 p-0 mb-0">
      <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
          <li class="nav-item">
              <a role="tab" class="nav-link active" id="tab_obat" data-toggle="tab" href="#tab_content_obat" aria-selected="false">
                  <span>OBAT</span>
              </a>
          </li>
          <li class="nav-item">
              <a role="tab" class="nav-link" id="tab_alkes" data-toggle="tab" href="#tab_content_alkes" aria-selected="false">
                  <span>BAHAN DAN ALKES</span>
              </a>
          </li>
          <li class="nav-item">
              <a role="tab" class="nav-link" id="tab_tikhus" data-toggle="tab" href="#tab_content_tikhus" aria-selected="false">
                  <span>TINDAKAN KHUSUS</span>
              </a>
          </li>
          <li class="nav-item">
              <a role="tab" class="nav-link" id="tab_lab" data-toggle="tab" href="#tab_content_lab" aria-selected="false">
                  <span>LABORATORIUM</span>
              </a>
          </li>
          <li class="nav-item">
              <a role="tab" class="nav-link" id="tab_lainlain" data-toggle="tab" href="#tab_content_lainlain" aria-selected="false">
                  <span>LAIN LAIN</span>
              </a>
          </li>
      </ul>
  </div>
</div>
<div class="row pr-4 pl-4">
    <div class="col-lg-12 col-md-12 col-sm-12 p-4 mb-3 card">  
        <div class="tab-content">
        <div class="tab-pane tabs-animation fade show active" id="tab_content_obat" role="tabpanel">
                <div class="table-action mb-2">
                    <div class="text-right">
                      <button type="button"  name="tambah-obat" id="tambah-obat"  data-toggle="modal" data-target="#modal-tambah-obat" class="btn-shadow btn btn-success">
                          <span class="btn-icon-wrapper pr-2 opacity-7">
                              <i class="fa fa-plus-circle fa-w-20"></i>
                          </span>
                          Tambah
                      </button>
                    </div>
                </div> 
                <div class="table-place-full">      
                    <table class="table table-bordered dt-responsive nowrap table-striped table-hover" style="width:100%" id="t_obat">
                        <thead class="thead-light">
                        <tr>
                          <th scope="col" class="text-center">No</th>
                          <th scope="col" class="text-center">Kode Obat</th>
                          <th scope="col" class="text-center">Nama Obat</th>
                          <th scope="col" class="text-center">Kategori</th>
                          <th scope="col" class="text-center">Keterangan</th>
                          <th scope="col" class="text-center">Jumlah</th>
                          <th scope="col" class="text-center">Total</th>
                          <th scope="col" class="datatable-nosort text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>                          
                        </tbody>
                    </table>
                </div>  
                <div class="row justify-content-end">
                  <label class="col-sm-2 mt-2 text-right">Total Biaya Obat</label>
                  <div class="col-md-3 col-sm-3">
                  <input class="form-control text-right font-weight-bold" type="text" name="total_obat" id="total_obat" value="0" placeholder="0" readonly>
                  </div>
                </div> 
        </div>
        <div class="tab-pane tabs-animation fade" id="tab_content_alkes" role="tabpanel">
                <div class="table-action mb-2">
                    <div class="text-right">
                      <button type="button"  name="tambah-alkes" id="tambah-alkes"  data-toggle="modal" data-target="#modal-tambah-alkes" class="btn-shadow btn btn-success">
                          <span class="btn-icon-wrapper pr-2 opacity-7">
                              <i class="fa fa-plus-circle fa-w-20"></i>
                          </span>
                          Tambah
                      </button>
                    </div>
                </div> 
                <div class="table-place-full">      
                    <table class="table table-bordered dt-responsive nowrap table-striped table-hover" style="width:100%" id="t_alkes">
                        <thead class="thead-light">
                        <tr>
                          <th scope="col" class="text-center">No</th>
                          <th scope="col" class="text-center">Kode</th>
                          <th scope="col" class="text-center">Nama</th>
                          <th scope="col" class="text-center">Kategori</th>
                          <th scope="col" class="text-center">Keterangan</th>
                          <th scope="col" class="text-center">Jumlah</th>
                          <th scope="col" class="text-center">Total</th>
                          <th scope="col" class="datatable-nosort text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>                          
                        </tbody>
                    </table>
                </div> 
                <div class="row justify-content-end">
                  <label class="col-sm-2 mt-2 text-right">Total Biaya Alkes</label>
                  <div class="col-md-3 col-sm-3">
                  <input class="form-control text-right font-weight-bold" type="text" name="total_alkes" id="total_alkes" value="0" placeholder="0" readonly>
                  </div>
                </div>   
        </div>
        <div class="tab-pane tabs-animation fade" id="tab_content_tikhus" role="tabpanel">
                <div class="table-action mb-2">
                    <div class="text-right">
                      <button type="button"  name="tambah-tikhus" id="tambah-tikhus"  data-toggle="modal" data-target="#modal-tambah-tikhus" class="btn-shadow btn btn-success">
                          <span class="btn-icon-wrapper pr-2 opacity-7">
                              <i class="fa fa-plus-circle fa-w-20"></i>
                          </span>
                          Tambah
                      </button>
                    </div>
                </div> 
                <div class="table-place-full">      
                    <table class="table table-bordered dt-responsive nowrap table-striped table-hover" style="width:100%" id="t_tikhus">
                        <thead class="thead-light">
                        <tr>
                          <th scope="col" class="text-center">No</th>
                          <th scope="col" class="text-center">Tindakan Khusus</th>
                          <th scope="col" class="text-center">Total</th>
                          <th scope="col" class="datatable-nosort text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>                          
                        </tbody>
                    </table>
                </div>   
                <div class="row justify-content-end">
                  <label class="col-sm-2 mt-2 text-right">Total Biaya</label>
                  <div class="col-md-3 col-sm-3">
                  <input class="form-control text-right font-weight-bold" type="text" name="total_tikhus" id="total_tikhus" value="0" placeholder="0" readonly>
                  </div>
                </div> 
        </div>
        <div class="tab-pane tabs-animation fade" id="tab_content_lab" role="tabpanel">
                <div class="table-action mb-2">
                    <div class="text-right">
                      <button type="button"  name="tambah-lab" id="tambah-lab"  data-toggle="modal" data-target="#modal-tambah-lab" class="btn-shadow btn btn-success">
                          <span class="btn-icon-wrapper pr-2 opacity-7">
                              <i class="fa fa-plus-circle fa-w-20"></i>
                          </span>
                          Tambah
                      </button>
                    </div>
                </div> 
                <div class="table-place-full">      
                    <table class="table table-bordered dt-responsive nowrap table-striped table-hover" style="width:100%" id="t_lab">
                        <thead class="thead-light">
                        <tr>
                          <th scope="col" class="text-center">No</th>
                          <th scope="col" class="text-center">Laboratorium</th>
                          <th scope="col" class="text-center">Total</th>
                          <th scope="col" class="datatable-nosort text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>                          
                        </tbody>
                    </table>
                </div>  
                <div class="row justify-content-end">
                  <label class="col-sm-2 mt-2 text-right">Total Biaya</label>
                  <div class="col-md-3 col-sm-3">
                  <input class="form-control text-right font-weight-bold" type="text" name="total_lab" id="total_lab" value="0" placeholder="0" readonly>
                  </div>
                </div>  
        </div>
        <div class="tab-pane tabs-animation fade" id="tab_content_lainlain" role="tabpanel">
                <div class="table-action mb-2">
                    <div class="text-right">
                      <button type="button"  name="tambah-lainlain" id="tambah-lainlain"  data-toggle="modal" data-target="#modal-tambah-lainlain" class="btn-shadow btn btn-success">
                          <span class="btn-icon-wrapper pr-2 opacity-7">
                              <i class="fa fa-plus-circle fa-w-20"></i>
                          </span>
                          Tambah
                      </button>
                    </div>
                </div> 
                <div class="table-place-full">      
                    <table class="table table-bordered dt-responsive nowrap table-striped table-hover" style="width:100%" id="t_lainlain">
                        <thead class="thead-light">
                        <tr>
                          <th scope="col" class="text-center">No</th>
                          <th scope="col" class="text-center">Nama</th>
                          <th scope="col" class="text-center">Total</th>
                          <th scope="col" class="datatable-nosort text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>                          
                        </tbody>
                    </table>
                </div>  
                <div class="row justify-content-end">
                  <label class="col-sm-2 mt-2 text-right">Total Biaya</label>
                  <div class="col-md-3 col-sm-3">
                  <input class="form-control text-right font-weight-bold" type="text" name="total_lainlain" id="total_lainlain" value="0" placeholder="0" readonly>
                  </div>
                </div>  
        </div>
        <hr>
        <div class="row justify-content-end mt-3">
            <label class="col-sm-3 text-right mt-2">Biaya <?=$jenis_layanan?></label>
            <div class="col-md-3 col-sm-3">
            <input class="form-control text-right font-weight-bold" type="text" name="jasa" id="jasa" placeholder="0" value="<?=toRp($harga_layanan)?>" readonly>
            </div>
        </div>
        <div class="row justify-content-end mt-3">
            <label class="col-sm-3 text-right mt-2">Grand Total</label>
            <div class="col-md-3 col-sm-3">
            <input class="form-control text-right font-weight-bold" type="text" name="grand_total" id="grand_total" placeholder="0" value="0" readonly style="font-size: 26px;">
            </div>
        </div> 
      </div> 
    </div>
</div>

<div class="modal fade mt-3" id="modal-tambah-obat" role="dialog" aria-labelledby="modal-obat" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal-obat">Data Obat</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
        <div class="buttonload modal-load">
                <i class="fa fa-spinner fa-spin modal-load-spinner"></i>
        </div>
      <div class="modal-body">
        <form name="form-obat" id="form-obat" enctype="multipart/form-data">
        <div class="row pl-5 pr-5">
          <div class="col-md-12 mb-12 pl-2 pr-2">
                <label for="validationCustomUsername">Cari Obat</label>
                <div class="input-group" id="no">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="pe-7s-search"></i></span>
                    </div>
                    <input type="text" class="form-control" name="cari_obat" id="cari_obat" placeholder="Cari Dengan Keyword Kode Obat atau Nama Obat" aria-describedby="inputGroupPrepend" data-parsley-errors-container="#cari_error" required>
                </div>
                <div id="cari_error"></div>
                <div id="list_obat"></div>
                
            </div><br>
        </div>
        <hr>
        <div class="row">
        <input type="hidden" class="form-control" name="harga_jual" id="harga_jual" required readonly>
            <div class="col-md-6">
                <div class="form-group">
                  <label class="col-sm-12">Kode Obat</label>
                  <div class="col-sm-12 col-md-12">
                    <input class="form-control" type="text" name="kode_obat" id="kode_obat" placeholder="Kode Obat" required readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-12">Nama Obat</label>
                  <div class="col-sm-12 col-md-12">
                    <input class="form-control" type="text" name="nama_obat" id="nama_obat" placeholder="Nama Obat" required readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-12">Kategori</label>
                  <div class="col-md-12 col-sm-12">
                  <input class="form-control" type="text" name="kategori" id="kategori" placeholder="Kategori" required readonly>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                  <label>Unit <span class="red"></span></label>
                      <input type="text" class="form-control" name="unit" id="unit" required readonly>
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-sm-12">
                  <label>Isi Per Unit<span class="red"></span></label>
                      <input type="text" class="form-control" name="isi" id="isi" required readonly>
                  </div>
              </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                    <div class="col-sm-12">
                    <label>Keterangan<span class="red"></span></label>
                        <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" required>
                    </div>
                </div>
                <div class="form-group row pl-3 pr-3">
                    <div class="col-sm-6">
                    <label>Jumlah</label>
                        <input class="form-control" type="number" name="jumlah" id="jumlah" value="1" data-parsley-min="1" required>
                    </div>
                    <div class="col-sm-6">
                    <label>Type Stok</label>
                        <select class="form-control" name="type_stok" id="type_stok">
                            <option value="satuan">Satuan</option>
                            <option value="unit">Unit</option>
                        </select>
                    </div>
                </div>   
            </div>
        </div>
        
        
        </form>
      </div>
      <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-md" name="simpan_obat" id="simpan_obat">
              <i class="fa fa-save"></i> Simpan 
          </button>
          <button type="button" class="btn btn-danger btn-md" name="cancel" id="cancel" data-dismiss="modal">
          <i class="fa fa-ban"></i> Batal</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade mt-3" id="modal-tambah-alkes" role="dialog" aria-labelledby="modal-alkes" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal-alkes">Data Alkes</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
        <div class="buttonload modal-load">
                <i class="fa fa-spinner fa-spin modal-load-spinner"></i>
        </div>
      <div class="modal-body">
        <form name="form-alkes" id="form-alkes" enctype="multipart/form-data">
        <div class="row pl-5 pr-5">
          <div class="col-md-12 mb-12 pl-2 pr-2">
                <label for="validationCustomUsername">Cari Alkes</label>
                <div class="input-group" id="no">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="pe-7s-search"></i></span>
                    </div>
                    <input type="text" class="form-control" name="cari_alkes" id="cari_alkes" placeholder="Cari Dengan Keyword Kode Alkes atau Nama Alkes" aria-describedby="inputGroupPrepend" data-parsley-errors-container="#cari_error" required>
                </div>
                <div id="cari_error"></div>
                <div id="list_alkes"></div>
                
            </div><br>
        </div>
        <hr>
        <div class="row">
        <input type="hidden" class="form-control" name="harga_jual_alkes" id="harga_jual_alkes" required readonly>
            <div class="col-md-6">
                <div class="form-group">
                  <label class="col-sm-12">Kode Alkes</label>
                  <div class="col-sm-12 col-md-12">
                    <input class="form-control" type="text" name="kode_alkes" id="kode_alkes" placeholder="Kode Alkes" required readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-12">Nama Alkes</label>
                  <div class="col-sm-12 col-md-12">
                    <input class="form-control" type="text" name="nama_alkes" id="nama_alkes" placeholder="Nama Alkes" required readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-12">Kategori</label>
                  <div class="col-md-12 col-sm-12">
                  <input class="form-control" type="text" name="kategori_alkes" id="kategori_alkes" placeholder="Kategori" required readonly>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                  <label>Unit <span class="red"></span></label>
                      <input type="text" class="form-control" name="unit_alkes" id="unit_alkes" required readonly>
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-sm-12">
                  <label>Isi Per Unit<span class="red"></span></label>
                      <input type="text" class="form-control" name="isi_alkes" id="isi_alkes" required readonly>
                  </div>
              </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                    <div class="col-sm-12">
                    <label>Keterangan<span class="red"></span></label>
                        <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" required>
                    </div>
                </div>
                <div class="form-group row pl-3 pr-3">
                    <div class="col-sm-6">
                    <label>Jumlah</label>
                        <input class="form-control" type="number" name="jumlah" id="jumlah" value="1" data-parsley-min="1" required>
                    </div>
                    <div class="col-sm-6">
                    <label>Type Stok</label>
                        <select class="form-control" name="type_stok" id="type_stok">
                            <option value="satuan">Satuan</option>
                            <option value="unit">Unit</option>
                        </select>
                    </div>
                </div>   
            </div>
        </div>
        
        
        </form>
      </div>
      <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-md" name="simpan_alkes" id="simpan_alkes">
              <i class="fa fa-save"></i> Simpan 
          </button>
          <button type="button" class="btn btn-danger btn-md" name="cancel" id="cancel" data-dismiss="modal">
          <i class="fa fa-ban"></i> Batal</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade mt-3" id="modal-tambah-tikhus" role="dialog" aria-labelledby="modal-tikhus" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal-tikhus">Data Tindakan Khusus</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
        <div class="buttonload modal-load">
                <i class="fa fa-spinner fa-spin modal-load-spinner"></i>
        </div>
      <div class="modal-body">
        <form name="form-tikhus" id="form-tikhus" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                  <label class="col-sm-12">Tindakan Khusus</label>
                  <div class="col-sm-12 col-md-12">
                    <input class="form-control" type="text" name="tindakan_khusus" id="tindakan_khusus" placeholder="Tindakana Khusus" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-12">Total</label>
                  <div class="col-sm-12 col-md-12">
                    <input class="form-control" type="text" name="total_tikhus" id="total_tikhus" onkeyup="javascript:this.value=autoseparator(this.value);" placeholder="0" required>
                  </div>
                </div>
            </div>
        </div>
        
        
        </form>
      </div>
      <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-md" name="simpan_tikhus" id="simpan_tikhus">
              <i class="fa fa-save"></i> Simpan 
          </button>
          <button type="button" class="btn btn-danger btn-md" data-dismiss="modal">
          <i class="fa fa-ban"></i> Batal</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade mt-3" id="modal-tambah-lab" role="dialog" aria-labelledby="modal-lab" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal-lab">Data Laboratorium</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
        <div class="buttonload modal-load">
                <i class="fa fa-spinner fa-spin modal-load-spinner"></i>
        </div>
      <div class="modal-body">
        <form name="form-lab" id="form-lab" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                  <label class="col-sm-12">Laboratorium</label>
                  <div class="col-sm-12 col-md-12">
                    <input class="form-control" type="text" name="laboratorium" id="laboratorium" placeholder="Laboratorium" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-12">Total</label>
                  <div class="col-sm-12 col-md-12">
                    <input class="form-control" type="text" name="total_lab" id="total_lab" onkeyup="javascript:this.value=autoseparator(this.value);" placeholder="0" required>
                  </div>
                </div>
            </div>
        </div>
        
        
        </form>
      </div>
      <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-md" name="simpan_lab" id="simpan_lab">
              <i class="fa fa-save"></i> Simpan 
          </button>
          <button type="button" class="btn btn-danger btn-md" data-dismiss="modal">
          <i class="fa fa-ban"></i> Batal</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade mt-3" id="modal-tambah-lainlain" role="dialog" aria-labelledby="modal-lainlain" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal-lainlain">Data Lain Lain</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
        <div class="buttonload modal-load">
                <i class="fa fa-spinner fa-spin modal-load-spinner"></i>
        </div>
      <div class="modal-body">
        <form name="form-lainlain" id="form-lainlain" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                  <label class="col-sm-12">Nama</label>
                  <div class="col-sm-12 col-md-12">
                    <input class="form-control" type="text" name="lainlain" id="lainlain" placeholder="Lain-Lain" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-12">Total</label>
                  <div class="col-sm-12 col-md-12">
                    <input class="form-control" type="text" name="total_lainlain" id="total_lainlain" onkeyup="javascript:this.value=autoseparator(this.value);" placeholder="0" required>
                  </div>
                </div>
            </div>
        </div>
        
        
        </form>
      </div>
      <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-md" name="simpan_lainlain" id="simpan_lainlain">
              <i class="fa fa-save"></i> Simpan 
          </button>
          <button type="button" class="btn btn-danger btn-md" data-dismiss="modal">
          <i class="fa fa-ban"></i> Batal</button>
      </div>
    </div>
  </div>
</div>


  <!-- Simple Datatable End -->
  <script>
    $('document').ready(function(){
      table_obat();
      table_alkes();
      table_tikhus();
      table_lainlain();
      table_lab();
      grand_total();
      <?php
      foreach($tab_id as $k_tab => $v_tab )
      {
      ?>
          $("#simpan_<?=$k_tab?>").click(function(e) {
            e.preventDefault();
            if($('#form-<?=$k_tab?>').parsley().validate()){
              var param = this;
                process1(param);
              var form = $("#form-<?=$k_tab?>")[0];
              var form_data = new FormData(form);
              $.ajax({
                type    : 'POST',
                data    : form_data,
                contentType : false,
                processData : false,
                cache: false,
                async:true,
                url     : "<?php echo site_url('a_tindakan/simpan?param='.$k_tab);?>",
                success : function(data) {
                  process_done1(param,'<i class="fa fa-save"></i> Update <?=strtoupper($tab_show[$k_tab])?>');      
                  Swal.fire('Sukses!',data,'success');
                }
              });
            }else {
              return false();
            }

          });
      <?php
      }
      ?>

        $("#simpan_obat").click(function(e) {
            e.preventDefault();
            if($('#form-obat').parsley().validate()){
              var param = this;
                process1(param);
              var form = $("#form-obat")[0];
              var form_data = new FormData(form);
			        form_data.append("no_registrasi", '<?=$no_registrasi?>');
              $.ajax({
                type    : 'POST',
                data    : form_data,
                contentType : false,
                processData : false,
                cache: false,
                async:true,
                url     : "<?php echo site_url('a_tindakan/simpan_obat');?>",
                success : function(data) {
                  table_obat();
                  process_done1(param,'<i class="fa fa-save"></i> Simpan');      
                  Swal.fire('Sukses!',data,'success');
                  $('#modal-tambah-obat').modal('hide');
                }
              });
            }else {
              return false();
            }

          });

          $("#simpan_alkes").click(function(e) {
            e.preventDefault();
            if($('#form-alkes').parsley().validate()){
              var param = this;
                process1(param);
              var form = $("#form-alkes")[0];
              var form_data = new FormData(form);
			        form_data.append("no_registrasi", '<?=$no_registrasi?>');
              $.ajax({
                type    : 'POST',
                data    : form_data,
                contentType : false,
                processData : false,
                cache: false,
                async:true,
                url     : "<?php echo site_url('a_tindakan/simpan_alkes');?>",
                success : function(data) {
                  table_alkes();
                  process_done1(param,'<i class="fa fa-save"></i> Simpan');      
                  Swal.fire('Sukses!',data,'success');
                  $('#modal-tambah-alkes').modal('hide');
                }
              });
            }else {
              return false();
            }

          });

          $("#simpan_tikhus").click(function(e) {
            e.preventDefault();
            if($('#form-tikhus').parsley().validate()){
              var param = this;
                process1(param);
              var form = $("#form-tikhus")[0];
              var form_data = new FormData(form);
			        form_data.append("no_registrasi", '<?=$no_registrasi?>');
              $.ajax({
                type    : 'POST',
                data    : form_data,
                contentType : false,
                processData : false,
                cache: false,
                async:true,
                url     : "<?php echo site_url('a_tindakan/simpan_tikhus');?>",
                success : function(data) {
                  table_tikhus();
                  process_done1(param,'<i class="fa fa-save"></i> Simpan');      
                  Swal.fire('Sukses!',data,'success');
                  $('#modal-tambah-tikhus').modal('hide');
                }
              });
            }else {
              return false();
            }

          });

          $("#simpan_lab").click(function(e) {
            e.preventDefault();
            if($('#form-lab').parsley().validate()){
              var param = this;
                process1(param);
              var form = $("#form-lab")[0];
              var form_data = new FormData(form);
			        form_data.append("no_registrasi", '<?=$no_registrasi?>');
              $.ajax({
                type    : 'POST',
                data    : form_data,
                contentType : false,
                processData : false,
                cache: false,
                async:true,
                url     : "<?php echo site_url('a_tindakan/simpan_lab');?>",
                success : function(data) {
                  table_lab();
                  process_done1(param,'<i class="fa fa-save"></i> Simpan');      
                  Swal.fire('Sukses!',data,'success');
                  $('#modal-tambah-lab').modal('hide');
                }
              });
            }else {
              return false();
            }

          });

          $("#simpan_lainlain").click(function(e) {
            e.preventDefault();
            if($('#form-lainlain').parsley().validate()){
              var param = this;
                process1(param);
              var form = $("#form-lainlain")[0];
              var form_data = new FormData(form);
			        form_data.append("no_registrasi", '<?=$no_registrasi?>');
              $.ajax({
                type    : 'POST',
                data    : form_data,
                contentType : false,
                processData : false,
                cache: false,
                async:true,
                url     : "<?php echo site_url('a_tindakan/simpan_lainlain');?>",
                success : function(data) {
                  table_lainlain();
                  process_done1(param,'<i class="fa fa-save"></i> Simpan');      
                  Swal.fire('Sukses!',data,'success');
                  $('#modal-tambah-lainlain').modal('hide');
                }
              });
            }else {
              return false();
            }

          });

      $("#tambah-obat").click(function() {
        $('#form-obat').parsley().reset();
        $('#form-obat')[0].reset(); 
        $('.modal-load').hide(); 
      });

      $("#tambah-alkes").click(function() {
        $('#form-alkes').parsley().reset();
        $('#form-alkes')[0].reset(); 
        $('.modal-load').hide(); 
      });

      $("#tambah-tikhus").click(function() {
        $('#form-tikhus').parsley().reset();
        $('#form-tikhus')[0].reset(); 
        $('.modal-load').hide(); 
      });

      $("#tambah-lab").click(function() {
        $('#form-lab').parsley().reset();
        $('#form-lab')[0].reset(); 
        $('.modal-load').hide(); 
      });

      $("#tambah-lainlain").click(function() {
        $('#form-lainlain').parsley().reset();
        $('#form-lainlain')[0].reset(); 
        $('.modal-load').hide(); 
      });

      $('#t_obat').on( 'click', 'tr .delete-obat', function () {
          var id = $(this).data("id");
          Swal.fire({
                title: 'Anda yakin ingin menghapus data ini?',
                text: "Periksa kembali data tersebut!",
                type: 'warning',
                allowOutsideClick: false,
                showCancelButton: true,
                showLoaderOnConfirm: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Tidak'
                }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type    : 'POST',
                        data    : {id:id},
                        url     : "<?php echo site_url('a_tindakan/hapus_obat');?>",
                        success : function(data) {
                            Swal.fire('Sukses!','Data tersebut berhasil dihapus.','success');
                            table_obat();
                        },
                        error : function(){
                            Swal.fire("Eror", "Terjadi kesalahan", "error");
                        }
                    });
                }
                })   

        });

        $('#t_alkes').on( 'click', 'tr .delete-alkes', function () {
          var id = $(this).data("id");
          Swal.fire({
                title: 'Anda yakin ingin menghapus data ini?',
                text: "Periksa kembali data tersebut!",
                type: 'warning',
                allowOutsideClick: false,
                showCancelButton: true,
                showLoaderOnConfirm: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Tidak'
                }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type    : 'POST',
                        data    : {id:id},
                        url     : "<?php echo site_url('a_tindakan/hapus_alkes');?>",
                        success : function(data) {
                            Swal.fire('Sukses!','Data tersebut berhasil dihapus.','success');
                            table_alkes();
                        },
                        error : function(){
                            Swal.fire("Eror", "Terjadi kesalahan", "error");
                        }
                    });
                }
                })   

        });

        $('#t_tikhus').on( 'click', 'tr .delete-tikhus', function () {
          var id = $(this).data("id");
          Swal.fire({
                title: 'Anda yakin ingin menghapus data ini?',
                text: "Periksa kembali data tersebut!",
                type: 'warning',
                allowOutsideClick: false,
                showCancelButton: true,
                showLoaderOnConfirm: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Tidak'
                }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type    : 'POST',
                        data    : {id:id},
                        url     : "<?php echo site_url('a_tindakan/hapus_tikhus');?>",
                        success : function(data) {
                            Swal.fire('Sukses!','Data tersebut berhasil dihapus.','success');
                            table_tikhus();
                        },
                        error : function(){
                            Swal.fire("Eror", "Terjadi kesalahan", "error");
                        }
                    });
                }
                })   

        });

        $('#t_lab').on( 'click', 'tr .delete-lab', function () {
          var id = $(this).data("id");
          Swal.fire({
                title: 'Anda yakin ingin menghapus data ini?',
                text: "Periksa kembali data tersebut!",
                type: 'warning',
                allowOutsideClick: false,
                showCancelButton: true,
                showLoaderOnConfirm: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Tidak'
                }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type    : 'POST',
                        data    : {id:id},
                        url     : "<?php echo site_url('a_tindakan/hapus_lab');?>",
                        success : function(data) {
                            Swal.fire('Sukses!','Data tersebut berhasil dihapus.','success');
                            table_lab();
                        },
                        error : function(){
                            Swal.fire("Eror", "Terjadi kesalahan", "error");
                        }
                    });
                }
                })   

        });

        $('#t_lainlain').on( 'click', 'tr .delete-lainlain', function () {
          var id = $(this).data("id");
          Swal.fire({
                title: 'Anda yakin ingin menghapus data ini?',
                text: "Periksa kembali data tersebut!",
                type: 'warning',
                allowOutsideClick: false,
                showCancelButton: true,
                showLoaderOnConfirm: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Tidak'
                }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type    : 'POST',
                        data    : {id:id},
                        url     : "<?php echo site_url('a_tindakan/hapus_lainlain');?>",
                        success : function(data) {
                            Swal.fire('Sukses!','Data tersebut berhasil dihapus.','success');
                            table_lainlain();
                        },
                        error : function(){
                            Swal.fire("Eror", "Terjadi kesalahan", "error");
                        }
                    });
                }
                })   

        });

        $('#done').click(function(){
          Swal.fire({
                title: 'Anda yakin ingin menyelasaikan proses ini?',
                text: "Periksa kembali data tersebut!",
                type: 'warning',
                allowOutsideClick: false,
                showCancelButton: true,
                showLoaderOnConfirm: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Proses',
                cancelButtonText: 'Tidak'
                }).then((result) => {
                if (result.value) {
                   var total=$("#grand_total").val();
                    $.ajax({
                        type    : 'POST',
                        data    : {id:'<?=$no_registrasi?>',total:total},
                        url     : "<?php echo site_url('a_pembayaran/proses_selesai');?>",
                        dataType : 'json',
                        success : function(data) {
                            Swal.fire({
                                  title: "Sukses!",
                                  text: "Data Selesai DiProses",
                                  type: "success",
                                  timer: 2000
                              }).then((result) => {
                                location.replace("<?=base_url()?>a_pembayaran/cetak_kwitansi?id="+btoa(data.id)+"&id2="+btoa(data.id2));
                              });
                        },
                        error : function(){
                            Swal.fire("Eror", "Terjadi kesalahan", "error");
                        }
                    });
                }
                }) 

        });


    });

    function table_obat(){
      $.ajax({
            type    : 'POST',
            data    : {no_registrasi:'<?=$no_registrasi?>'},
            url     : "<?php echo site_url('search_data/data_obat_tindakan');?>",
            dataType: 'json',
            success : function(data) {
              $('#t_obat tbody').html(data.table);
              $("#total_obat").val(data.total);
              grand_total();
            }
          });
    }

    function table_alkes(){
      $.ajax({
            type    : 'POST',
            data    : {no_registrasi:'<?=$no_registrasi?>'},
            url     : "<?php echo site_url('search_data/data_alkes_tindakan');?>",
            dataType: 'json',
            success : function(data) {
              $('#t_alkes tbody').html(data.table);
              $("#total_alkes").val(data.total);
              grand_total();
            }
          });
    }

    function table_tikhus(){
      $.ajax({
            type    : 'POST',
            data    : {no_registrasi:'<?=$no_registrasi?>'},
            url     : "<?php echo site_url('search_data/data_tikhus_tindakan');?>",
            dataType: 'json',
            success : function(data) {
              $('#t_tikhus tbody').html(data.table);
              $("#total_tikhus").val(data.total);
              grand_total();
            }
          });
    }

    function table_lab(){
      $.ajax({
            type    : 'POST',
            data    : {no_registrasi:'<?=$no_registrasi?>'},
            url     : "<?php echo site_url('search_data/data_lab_tindakan');?>",
            dataType: 'json',
            success : function(data) {
              $('#t_lab tbody').html(data.table);
              $("#total_lab").val(data.total);
              grand_total();
            }
          });
    }

    function table_lainlain(){
      $.ajax({
            type    : 'POST',
            data    : {no_registrasi:'<?=$no_registrasi?>'},
            url     : "<?php echo site_url('search_data/data_lainlain_tindakan');?>",
            dataType: 'json',
            success : function(data) {
              $('#t_lainlain tbody').html(data.table);
              $("#total_lainlain").val(data.total);
              grand_total();
            }
          });
    }

    function grand_total(){
      var total_obat=parseInt(removeSeparator($("#total_obat").val()));
      var total_alkes=parseInt(removeSeparator($("#total_alkes").val()));
      var total_tikhus=parseInt(removeSeparator($("#total_tikhus").val()));
      var total_lab=parseInt(removeSeparator($("#total_lab").val()));
      var total_lainlain=parseInt(removeSeparator($("#total_lainlain").val()));
      var total=total_obat+total_tikhus+total_lainlain+total_alkes+total_lab+<?=$harga_layanan?>;
      $("#grand_total").val(autoseparator(total));
    }
  </script>
  <script>
   $('#loading').hide();
  </script>
