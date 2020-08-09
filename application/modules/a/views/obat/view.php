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
            <table class="table table-bordered dt-responsive nowrap table-striped table-hover" style="width:100%" id="t_obat">
                <thead class="thead-light">
                <tr>
                  <th scope="col" class="text-center">No</th>
                  <th scope="col" class="text-center">Kode Obat</th>
                  <th scope="col" class="text-center">Nama Obat</th>
                  <th scope="col" class="text-center">Kategori</th>
                  <th scope="col" class="text-center">Unit</th>
                  <th scope="col" class="text-center">Isi Per Unit</th>
                  <th scope="col" class="text-center">Hrg. Beli/Satuan</th>
                  <th scope="col" class="text-center">Hrg. Jual/Satuan</th>
                  <th scope="col" class="datatable-nosort text-center">Aksi</th>
                </tr>
                </thead>
                <tbody>                          
                </tbody>
            </table>
        </div>   
    </div>
</div>

<div class="modal fade mt-3" id="modal-tambah" role="dialog" aria-labelledby="modal-obat" aria-hidden="true" data-backdrop="static">
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
        <form name="form" id="form" enctype="multipart/form-data">
        <input type="hidden" id="id" name="id" value="" readonly>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <label class="col-sm-12">Kode Obat</label>
                  <div class="col-sm-12 col-md-12">
                    <input class="form-control" type="text" name="kode_obat" id="kode_obat" placeholder="Kode Obat" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-12">Nama Obat</label>
                  <div class="col-sm-12 col-md-12">
                    <input class="form-control" type="text" name="nama_obat" id="nama_obat" placeholder="Nama Obat" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-12">Kategori</label>
                  <div class="col-md-12 col-sm-12">
                    <select class="form-control col-lg-12 col-md-12 col-12" id="id_kategori" name="id_kategori" required>
                        <option value="">Pilih Kategori</option>
                        <?php
                        $qktg=$this->db->get('kategori_obat');
                        foreach($qktg->result() as $ktg):
                        echo '<option value="'.$ktg->id_kategori.'">'.$ktg->kategori.'</option>';
                        endforeach;
                        ?>
                    </select>
                  </div>
                </div>
                  <div class="form-group">
                    <label class="col-sm-12">Unit</label>
                    <div class="col-md-12 col-sm-12">
                      <select class="form-control col-lg-12 col-md-12 col-12" id="id_unit" name="id_unit" required>
                          <option value="">Pilih Unit</option>
                          <?php
                          $qu=$this->db->get('unit');
                          foreach($qu->result() as $u):
                          echo '<option value="'.$u->id_unit.'">'.$u->unit.'</option>';
                          endforeach;
                          ?>
                      </select>
                    </div>
                  </div>
            </div>
            <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-12">Isi Per Unit</label>
                    <div class="col-sm-12 col-md-12">
                      <input class="form-control" type="number" name="isi" id="isi" placeholder="Isi Per Unit" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-12">Satuan</label>
                    <div class="col-md-12 col-sm-12">
                      <select class="form-control col-lg-12 col-md-12 col-12" id="id_satuan" name="id_satuan" required>
                          <option value="">Pilih Satuan</option>
                          <?php
                          $qstn=$this->db->get('satuan');
                          foreach($qstn->result() as $stn):
                          echo '<option value="'.$stn->id_satuan.'">'.$stn->satuan.'</option>';
                          endforeach;
                          ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-12">Harga Beli Per Satuan</label>
                    <div class="col-sm-12 col-md-12">
                      <input class="form-control" type="text" name="harga_beli" id="harga_beli" onkeyup="javascript:this.value=autoseparator(this.value);" placeholder="0" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-12">Harga Jual Per Satuan</label>
                    <div class="col-sm-12 col-md-12">
                      <input class="form-control" type="text" name="harga_jual" id="harga_jual" onkeyup="javascript:this.value=autoseparator(this.value);" placeholder="0" required>
                    </div>
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
</div>
  <!-- Simple Datatable End -->
  <script>
    $('document').ready(function(){

      var table;
      table = $('#t_obat').DataTable({
          scrollCollapse: true,
          autoWidth: false,
          responsive: true,
          "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
          "language": {
            "info": "_START_-_END_ of _TOTAL_ entries",
            searchPlaceholder: "Search"
          },
          "destroy": true,
          "processing": true,
          "serverSide": true,
          "stateSave": true,
          "order": [],

          "ajax": {
              "url": "<?php echo site_url('a_obat/get_obat')?>",
              "type": "POST"
          },
          "columnDefs": [
          {
              "targets": "datatable-nosort",
              "orderable": false,
          },
          ],

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
            url     : "<?php echo site_url('a_obat/simpan');?>",
            success : function(data) {
              process_done1(param,'<i class="fa fa-save"></i> Simpan'); 
              if(data=='E202'){
                Swal.fire('Error!','Kode obat sudah ada. Silahkah gunakan kode yang lain','error');
              }else{
                Swal.fire('Sukses!',data,'success');
                table.ajax.reload( null, false );
                $('#modal-tambah').modal('toggle');
              }     
              
            }
          });
        }else {
          return false();
        }

      });

      $("#tambah").click(function() {
        $('#form').parsley().reset();
        $("#id").val('');
        $("#deskripsi").html('');
        $('#form')[0].reset(); 
        $('#kode_obat').prop('readonly',false);
        $('.modal-load').hide(); 
      });

      $('#t_obat').on( 'click', 'tr .edit', function () {
        $('.modal-load').show();
        $('#form').parsley().reset();
          var id = $(this).data("id");
          $.ajax({
            type    : 'POST',
            data    : {id:id},
            url     : "<?php echo site_url('a_obat/cari_obat');?>",
            dataType: 'json',
            success : function(data) {
              $('#id').val(data.id);
              $('#nama_obat').val(data.nama_obat);
              $('#kode_obat').val(data.kode_obat);
              $('#kode_obat').prop('readonly',true);
              $('#id_kategori').val(data.id_kategori);
              $('#id_satuan').val(data.id_satuan);
              $('#isi').val(data.isi);
              $('#id_unit').val(data.id_unit);
              $('#harga_beli').val(data.harga_beli);
              $('#harga_jual').val(data.harga_jual);
              $('.modal-load').hide();
            }
          });

        });

      $('#t_obat').on( 'click', 'tr .delete', function () {
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
                        url     : "<?php echo site_url('a_obat/hapus');?>",
                        success : function(data) {
                            Swal.fire('Sukses!','Data tersebut berhasil dihapus.','success');
                            table.ajax.reload( null, false );
                        },
                        error : function(){
                            Swal.fire("Eror", "Terjadi kesalahan", "error");
                        }
                    });
                }
                })   

        });

    });
  </script>
  <script>
   $('#loading').hide();
  </script>
