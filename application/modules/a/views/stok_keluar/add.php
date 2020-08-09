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
    <div class="col-lg-12 col-md-12 col-sm-12 p-4 mb-3 card">  
        <form name="form" id="form" enctype="multipart/form-data">
            <input type="hidden" id="id" name="id" value="" readonly>
            <div class="col-md-12 mb-12">
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
            <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                <div class="col-sm-12">
                    <label>Kode Obat </label>
                        <input type="text" class="form-control" name="kode_obat" id="kode_obat" required readonly>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                    <label>Nama Obat<span class="red"></span></label>
                        <input type="text" class="form-control" name="nama_obat" id="nama_obat" required readonly>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                    <label>Kategori <span class="red"></span></label>
                        <input type="text" class="form-control" name="kategori" id="kategori" required readonly>
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
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <div class="col-sm-12">
                    <label>Keterangan<span class="red"></span></label>
                        <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" required>
                    </div>
                </div>
                <div class="form-group row pl-3 pr-3">
                    <div class="col-sm-6">
                    <label>Jumlah Item Keluar</label>
                        <input class="form-control" type="number" name="jumlah" id="jumlah" value="0" data-parsley-min="1" required>
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
        </form>
    </div>
        <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-md" name="simpan" id="simpan">
                    <i class="fa fa-save"></i> Simpan 
                </button>
                <button type="button" class="btn btn-danger btn-md" name="cancel" id="cancel" data-dismiss="modal">
                <i class="fa fa-ban"></i> Batal</button>
        </div>
    </div>
</div>

  <!-- Simple Datatable End -->
  <script>
    $('document').ready(function(){

      $("#simpan").click(function(e) {
        e.preventDefault();
        if($('#form').parsley().validate()){
          var param = this;
            process1(param);
          var form = $('form')[0];
          var form_data = new FormData(form);
          $.ajax({
            type    : 'POST',
            data    : form_data,
            contentType : false,
            processData : false,
            cache: false,
            async:true,
            url     : "<?php echo site_url('a_stok_keluar/simpan');?>",
            success : function(data) {
              process_done1(param,'<i class="fa fa-save"></i> Simpan');      
              Swal.fire('Sukses!',data,'success');
              location.replace('<?=base_url().'a_stok_keluar'?>');
              $('#modal-tambah').modal('toggle');
            }
          });
        }else {
          return false();
        }

      });

     
    });
  </script>
  <script>
   $('#loading').hide();
  </script>
