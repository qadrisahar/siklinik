<style>
   .list-unstyled{background-color: #cefaff;cursor: pointer;position: absolute;margin-top: 37px;z-index: 1;width: 100%;}
   .list-unstyled li{padding:12px;}
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
                <a href="<?=base_url().'a_stok_keluar/add'?>" class="btn-shadow btn btn-success">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-plus-circle fa-w-20"></i>
                    </span>
                    Tambah
                </a>
          </div>
        </div> 
        <div class="table-place-full">      
            <table class="table table-bordered dt-responsive nowrap table-striped table-hover" style="width:100%" id="t_stok_keluar">
                <thead class="thead-light">
                <tr>
                  <th scope="col" class="text-center">No</th>
                  <th scope="col" class="text-center">Kode Obat</th>
                  <th scope="col" class="text-center">Nama Obat</th>
                  <th scope="col" class="text-center">Kategori</th>
                  <th scope="col" class="text-center">Waktu Keluar</th>
                  <th scope="col" class="text-center">Keterangan</th>
                  <th scope="col" class="text-center">Jumlah</th>
                  <th scope="col" class="datatable-nosort text-center">Aksi</th>
                </tr>
                </thead>
                <tbody>                          
                </tbody>
            </table>
        </div>   
    </div>
</div>
  <!-- Simple Datatable End -->
  <script>
    $('document').ready(function(){

      var table;
      table = $('#t_stok_keluar').DataTable({
          scrollCollapse: true,
          autoWidth: false,
          responsive: false,
          "scrollX":true,
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
              "url": "<?php echo site_url('a_stok_keluar/get_stok_keluar')?>",
              "type": "POST"
          },
          "columnDefs": [
          {
              "targets": "datatable-nosort",
              "orderable": false,
          },
          ],

      });

      $('#cari_obat').keyup(function(){
          reset();
          var query = $(this).val();
          if(query != '')
          {
               $.ajax({
                    url:"<?php echo site_url('a_stok_keluar/cari_obat');?>",
                    method:"POST",
                    data:{query:query},
                    success:function(data)
                    {
                         $('#list_obat').fadeIn();
                         $('#list_obat').html(data);
                    }
               });
          }else {
            $('#list_obat').fadeOut();
          }
     });

     $(document).on('click', 'li', function(){
          var string=$(this).text();
          if (string=='Country Not Found'){
            $('#kode_obat').val('');
          }else{
            var explode= string.split(" - ");
            var kode_obat = explode[0];
            var nama_obat = explode[1];
            var kategori = explode[2];
            $('#kode_obat').val(kode_obat);
            $('#nama_obat').val(nama_obat);
            $('#kategori').val(kategori);
            $('#list_obat').fadeOut();
          }
     });

     function reset(){
       $('#kode_obat').val('');
       $('#nama_obat').val('');
       $('#kategori').val('');
     }

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
              table.ajax.reload( null, false );
              $('#modal-tambah').modal('toggle');
            }
          });
        }else {
          return false();
        }

      });

      $("#tambah").click(function() {
        $('#form').parsley().reset();
        $("#id").val('');
        $("#kode_obat").val('');
        $('#form')[0].reset(); 
        $('.modal-load').hide(); 
      });

      $('#t_stok_keluar').on( 'click', 'tr .delete', function () {
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
                        url     : "<?php echo site_url('a_stok_keluar/hapus');?>",
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
