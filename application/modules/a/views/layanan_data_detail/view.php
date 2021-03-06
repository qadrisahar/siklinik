<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon-small bg-malibu-beach">
                <i class="<?php echo $icon;?> text-white">
                </i>
            </div>
            <div><?php echo $title; ?>       
              <div class="page-title-subheading"><?=$subtitle?>
              </div>          
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block dropdown"></div>              
        </div>     
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 p-4 mb-3 card">  
        <div class="table-action mb-2">
          <div class="text-right">
                <button type="button"  name="tambah" id="tambah"  data-toggle="modal" data-target="#modal-tambah" class="btn-shadow btn btn-success">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-plus-circle fa-w-20"></i>
                    </span>
                    Tambah
                </button>
          </div>
        </div> 
        <div class="table-place-full">      
            <table class="table table-bordered dt-responsive nowrap table-striped table-hover" style="width:100%" id="t_layanan">
                <thead class="thead-light">
                <tr>
                  <th scope="col" class="text-center">No</th>
                  <th scope="col" class="text-center">Detail Data Layanan</th>
                  <th scope="col" class="text-center">Data Type</th>
                  <th scope="col" class="text-center">Value</th>
                  <th scope="col" class="datatable-nosort text-center">Aksi</th>
                </tr>
                </thead>
                <tbody>                          
                </tbody>
            </table>
        </div>   
    </div>
</div>

<div class="modal fade mt-3" id="modal-tambah" role="dialog" aria-labelledby="modal-layanan" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal-layanan">Detail Data Layanan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
        <div class="buttonload modal-load">
                <i class="fa fa-spinner fa-spin modal-load-spinner"></i>
        </div>
      <div class="modal-body">
        <form name="form" id="form" enctype="multipart/form-data">
        <input type="hidden" id="id" name="id" value="" readonly>
        <input type="hidden" name="id_layanan" id="id_layanan" value="<?=base64_encode($id_layanan)?>" >
        <input type="hidden" name="id_layanan_data" id="id_layanan_data" value="<?=base64_encode($id_layanan_data)?>" >
        <div class="form-group">
          <label class="col-sm-12">Detail Data Layanan</label>
          <div class="col-sm-12 col-md-12">
            <input class="form-control" type="text" name="layanan_data_detail" id="layanan_data_detail" placeholder="Data Layanan" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-12">Type Data</label>
          <div class="col-sm-12 col-md-12">
          <select class="form-control col-lg-12 col-md-12 col-12" id="type" name="type" required>
                <?php
                $type=array('Text' =>'VARCHAR', 'Pilihan' => 'ENUM');
                foreach($type as $ty => $value):
                echo '<option value="'.$value.'">'.$ty.'</option>';
                endforeach;
                ?>
            </select>
           </div>
        </div>
        <div class="form-group pilihan">
          <label class="col-sm-12">Input Pilihan</label>
          <div class="col-sm-12 col-md-12">
            <input class="form-control" type="text" data-role="tagsinput" name="pilihan" id="pilihan" placeholder="Input Pilihan">
          </div>
        </div>
        <div class="form-group text">
          <label class="col-sm-12">Panjang Karakter</label>
          <div class="col-sm-12 col-md-12">
            <input class="form-control" type="number" name="panjang" id="panjang" placeholder="0">
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
</div>
  <!-- Simple Datatable End -->
  <script>
    $('document').ready(function(){
      table();
      $('.pilihan').hide();
      $('.text').show();
      $("#type").change(function() {
        if($('#type').val()=='VARCHAR'){
          $('.pilihan').hide();  
          $('.text').show();
        }else{
          $('.pilihan').show();
          $('.text').hide();
        }
      });

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
            url     : "<?php echo site_url('a_layanan_data_detail/simpan');?>",
            success : function(data) {
              process_done1(param,'<i class="fa fa-save"></i> Simpan');      
              Swal.fire('Sukses!',data,'success');
              table();
              $('#modal-tambah').modal('toggle');
            }
          });
        }else {
          return false();
        }

      });

      $("#tambah").click(function() {
        $('#form').parsley().reset();
        $('.pilihan').hide();  
        $('.text').show();
        $("#id").val('');
        $("#deskripsi").html('');
        $('#form')[0].reset(); 
        $('#pilihan').tagsinput('removeAll');
        $('.modal-load').hide(); 
      });

      $('#t_layanan').on( 'click', 'tr .edit', function () {
        $('.modal-load').show();
        $('#form').parsley().reset();
          var id = $(this).data("id");
          $.ajax({
            type    : 'POST',
            data    : {id:id,id2:'<?=base64_encode($id_layanan_data)?>',id3:'<?=base64_encode($id_layanan)?>'},
            url     : "<?php echo site_url('a_layanan_data_detail/cari_layanan_data_detail');?>",
            dataType: 'json',
            success : function(data) {
              $('#id').val(data.id);
              $('#layanan_data_detail').val(data.layanan_data_detail);
              $('#type').val(data.type);
              if(data.type=='VARCHAR'){
                $('.pilihan').hide();  
                $('.text').show();
              }else{
                $('.pilihan').show();
                $('.text').hide();
              }
              $('#pilihan').tagsinput('removeAll');
              $('#pilihan').tagsinput('add',data.pilihan);
              $('#panjang').val(data.panjang);
              $('.modal-load').hide();
            }
          });

        });

      $('#t_layanan').on( 'click', 'tr .delete', function () {
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
                        data    : {id:id,id2:'<?=base64_encode($id_layanan_data)?>'},
                        url     : "<?php echo site_url('a_layanan_data_detail/hapus');?>",
                        success : function(data) {
                            Swal.fire('Sukses!','Data tersebut berhasil dihapus.','success');
                            table();
                        },
                        error : function(){
                            Swal.fire("Eror", "Terjadi kesalahan", "error");
                        }
                    });
                }
                })   

        });

    });

    function table(){
      $.ajax({
            type    : 'POST',
            data    : {id:'<?=$id_layanan_data;?>',id2:'<?=$id_layanan?>'},
            url     : "<?php echo site_url('a_layanan_data_detail/get_layanan_data_detail');?>",
            dataType: 'json',
            success : function(data) {
              $('#t_layanan tbody').html(data.table);
            }
          });
    }

  </script>
  <script>
   $('#loading').hide();
  </script>
