<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon-small bg-malibu-beach">
                <i class="<?php echo $icon;?> text-white"></i>
            </div>
            <div><?php echo $title; ?>
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block dropdown"></div>
        </div>
    </div>
</div>

<div class="row pl-4 pr-4">
    <div class="col-lg-4 col-md-4 col-sm-12 col-12 p-0 mb-0">
        <table class="mb-0 table table-borderless">
            <tbody>
                <tr>
                    <th scope="row">ID Pasien</th>
                    <td>
                        :
                    </td>
                    <td><?=$id_pasien?></td>
                </tr>
                <tr>
                    <th scope="row">Nama Pasien</th>
                    <td>
                        :
                    </td>
                    <td><?=$nama?></td>
                </tr>
                <tr>
                    <th scope="row">No. JKN</th>
                    <td>
                        :
                    </td>
                    <td><?=$no_jkn?></td>
                </tr>
                <tr>
                    <th scope="row">NIK</th>
                    <td>
                        :
                    </td>
                    <td><?=$nik?></td>
                </tr>
                <tr>
                    <th scope="row">Alamat</th>
                    <td>
                        :
                    </td>
                    <td><?=$alamat?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12 col-12 p-0 mb-0">
        <table class="mb-0 table table-borderless">
            <tbody>
                <tr>
                    <th scope="row">Tempat Lahir</th>
                    <td>
                        :
                    </td>
                    <td><?=$tempat_lahir?></td>
                </tr>
                <tr>
                    <th scope="row">Tanggal Lahir</th>
                    <td>
                        :
                    </td>
                    <td><?=$tgl_lahir?></td>
                </tr>
                <tr>
                    <th scope="row">Jenis Kelamin</th>
                    <td>
                        :
                    </td>
                    <td><?=$jenis_kelamin?></td>
                </tr>
                <tr>
                    <th scope="row">Telephone</th>
                    <td>
                        :
                    </td>
                    <td><?=$kontak?></td>
                </tr>
                <tr>
                    <th scope="row">Telephone Lainnya</th>
                    <td>
                        :
                    </td>
                    <td><?=$kontak_2?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12 col-12 p-0 mb-0">
        <table class="mb-0 table table-borderless">
            <tbody>
                <tr>
                    <th scope="row">Email</th>
                    <td>
                        :
                    </td>
                    <td><?=$email?></td>
                </tr>
                <tr>
                    <th scope="row">Pekerjaan</th>
                    <td>
                        :
                    </td>
                    <td><?=$pekerjaan?></td>
                </tr>
                <tr>
                    <th scope="row">Pendidikan</th>
                    <td>
                        :
                    </td>
                    <td><?=$pendidikan?></td>
                </tr>
                <tr>
                    <th scope="row">Keterangan</th>
                    <td>
                        :
                    </td>
                    <td><?=$keterangan?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div> <hr>

<div class="col-lg-12 col-md-12 col-sm-12 p-4 mb-3 card">  
        <div class="table-action mb-2">
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
                  <th scope="col" class="text-center">Status Bayar</th>
                </tr>
                </thead>
                <tbody>                          
                </tbody>
            </table>
        </div>   
    </div>

<script>
    $('document').ready(function(){

      var table;
      table = $('#t_registrasi').DataTable({
          scrollCollapse: true,
          autoWidth: false,
          Scrollx : true,
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
              "url": "<?php echo site_url('a_detail_pasien/get_detail_pasien')?>",
              "type": "POST",
              "data": {id_pasien: '<?=$this->input->get('id')?>'}
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
            url     : "<?php echo site_url('a_pendidikan/cari_pendidikan');?>",
            dataType: 'json',
            success : function(data) {
              $('#id').val(data.id);
              $('#pendidikan').val(data.pendidikan);
              $('.modal-load').hide();
            }
          });

        });

      $('#t_registrasi').on( 'click', 'tr .delete', function () {
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
                        url     : "<?php echo site_url('a_pendidikan/hapus');?>",
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