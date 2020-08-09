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
        <div class="table-place-full ">      
            <table class="table table-bordered dt-responsive nowrap table-striped table-hover" style="width:100%" id="t_registrasi">
                <thead class="thead-light">
                <tr>
                  <th scope="col" class="text-center">No</th>
                  <th scope="col" class="text-center">No. Registrasi</th>
                  <th scope="col" class="text-center">No. Antrian</th>
                  <th scope="col" class="text-center">ID Pasien</th>
                  <th scope="col" class="text-center">Nama</th>
                  <th scope="col" class="text-center">NIK</th>
                  <th scope="col" class="text-center">Jenis Kelamin</th>
                  <th scope="col" class="text-center">Usia</th>
                  <th scope="col" class="text-center">Layanan</th>
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
      table = $('#t_registrasi').DataTable({
          scrollCollapse: true,
          autoWidth: false,
          scrollX: true,
          responsive: false,
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
              "url": "<?php echo site_url('a_pembayaran_neks/get_pembayaran_neks')?>",
              "type": "POST"
          },
          "columnDefs": [
          {
              "targets": "datatable-nosort",
              "orderable": false,
          },
          ],

      });

      $('#t_registrasi').on( 'click', 'tr .edit', function () {
        $('.modal-load').show();
        $('#form').parsley().reset();
          var id = $(this).data("id");
          $.ajax({
            type    : 'POST',
            data    : {id:id},
            url     : "<?php echo site_url('a_unit/cari_unit');?>",
            dataType: 'json',
            success : function(data) {
              $('#id').val(data.id);
              $('#unit').val(data.unit);
              $('.modal-load').hide();
            }
          });

        });

    });
  </script>
  <script>
   $('#loading').hide();
  </script>
