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
        <h5 class="card-title">Filter</h5>
        <form class="">
            <div class="form-row">
                <div class="col-md-3">
                    <div class="position-relative form-group desa-filter-form">
                        <label for="" class="">Tgl Awal</label>
                        <input type="date" class="form-control" name="tgl_awal_filter" id="tgl_awal_filter" value="<?=date('Y-m-d')?>" placeholder="dd/mm/yyyy">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="position-relative form-group desa-filter-form">
                        <label for="" class="">Tgl Akhir</label>
                        <input type="date" class="form-control" name="tgl_akhir_filter" id="tgl_akhir_filter" value="<?=date('Y-m-d')?>" placeholder="dd/mm/yyyy">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="position-relative form-group">
                        <label for="" class="">Status Batal</label>
                        <select class="form-control" name="status_filter" id="status_filter">
                            <option value="">-- Semua --</option>
                            <option value="y">-- Ya --</option>
                            <option value="n">-- Tidak --</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-row">
            <button type="button" class="btn btn-primary mt-0" name="filter" id="filter"><i class="fa fa-filter"></i>
                        Filter</button>
            </div>
        </form>
</div>
    <div class="col-lg-12 col-md-12 col-sm-12 p-4 mb-3 card">  
        <div class="table-action mb-2">
          <div class="text-right">
                <a href="<?=base_url().'a_pasien_baru?func=reg'?>"  name="tambah" id="tambah"  class="btn-shadow btn btn-success">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-plus-circle fa-w-20"></i>
                    </span>
                    Tambah
                </a>
          </div>
        </div> 
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
                  <th scope="col" class="text-center">Status Batal</th>
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
          responsive: false,
          "scrollX": true,
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
              "url": "<?php echo site_url('a_registrasi/get_data_registrasi')?>",
              "type": "POST",
              "data": function(d) {
                    d.tgl_awal = btoa($("#tgl_awal_filter").val());
                    d.tgl_akhir = btoa($("#tgl_akhir_filter").val());
                    d.status = btoa($("#status_filter").val());
                    d.func = '<?=$func?>';
                }
          },
          "columnDefs": [
          {
              "targets": "datatable-nosort",
              "orderable": false,
          },
          ],

      });
      
      $("#filter").click(function() {
            var param = this;
            process1(param);
            table.ajax.reload(null, true);
            process_done1(param, '<i class="fa fa-filter"></i> Filter');
        });

        $('#t_registrasi').on( 'click', 'tr .cancel', function () {
          var id = $(this).data("id");
          Swal.fire({
                title: 'Anda yakin ingin mengubah status batal?',
                text: "Periksa kembali data tersebut!",
                type: 'warning',
                allowOutsideClick: false,
                showCancelButton: true,
                showLoaderOnConfirm: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Batalkan',
                cancelButtonText: 'Tidak'
                }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type    : 'POST',
                        data    : {id:id},
                        url     : "<?php echo site_url('a_registrasi/ubah_status');?>",
                        success : function(data) {
                            Swal.fire('Sukses!','Data tersebut berhasil diupdate.','success');
                            table.ajax.reload( null, false );
                        },
                        error : function(){
                            Swal.fire("Eror", "Terjadi kesalahan", "error");
                        }
                    });
                }
                })   

        });

        // $('#t_registrasi').on( 'click', 'tr .print', function () {
        //   var no_antrian = $(this).data("id");
        //   window.open("<?=base_url()?>cetak/pasien");

        // });

    });
  </script>
  <script>
   $('#loading').hide();
  </script>
