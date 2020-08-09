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
                <button type="button"  name="tambah" id="tambah"  data-toggle="modal" data-target="#modal-admin" class="btn-shadow btn btn-primary">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-plus-circle fa-w-20"></i>
                    </span>
                    Tambah
                </button>
            </div>              
        </div>     
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 p-4 mb-3 card">   
        <div class="table-action">
          <div class="text-right">
          </div>
        </div> 
        <div class="table-place-full">      
            <table class="table table-bordered nowrap table-striped table-hover" style="width:100%" id="t_admin">
                <thead class="thead-light">
                    <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Kontak</th>
                    <th scope="col" class="datatable-nosort">Level</th>
                    <th scope="col" class="text-center span2 datatable-nosort">Status</th>
                    <th scope="col" class="text-center span2 datatable-nosort">Aksi</th>
                    </tr>
                </thead>
                <tbody>                          
                </tbody>
            </table>
        </div>   
    </div>
</div>

<div class="modal fade mt-3" id="modal-admin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
	  <div class="modal-dialog modal-lg mt-5" role="document">
		<div class="modal-content">
			<div class="modal-header tit-up">
                <h4 class="modal-title" id="form-title"></h4>
            </div>
            <div class="buttonload modal-load">
                    <i class="fa fa-spinner fa-spin modal-load-spinner"></i>
            </div>
			<div class="modal-body customer-box">		
				<!-- Tab panes -->
				<form role="form" name="form-admin" id="form-admin" class="form-horizontal">
                <input type="hidden" id="id_user" name="id_user" readonly />
                <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                            <div class="col-sm-12">
                                <label>Nama Lengkap </label>
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                <label>NIK <span class="red"></span></label>
                                    <input type="text" class="form-control" name="nik" id="nik" placeholder="NIK" required data-parsley-type="number">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                <label>Email <span class="red"></span></label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="email@email.com" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                <label>Alamat <span class="red"></span></label>
                                    <textarea type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                    <label>Kontak</label>
                                        <input type="number" class="form-control" name="kontak" id="kontak" placeholder="Kontak" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Level </label>
                                        <select class="form-control col-lg-7 col-md-7 col-12" id="level" name="level">
                                            <?php
                                            $level=array('Administrator' =>'ad', 'Manager' => 'mn');
                                            foreach($level as $lvl => $value):
                                            echo '<option value="'.$value.'">'.$lvl.'</option>';
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                    <label>Username </label>
                                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                                    </div>
                                </div>    
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Aktif </label>
                                        <select class="form-control col-lg-7 col-md-7 col-12" id="aktif" name="aktif">
                                            <?php
                                            $aktif=array('Aktif' =>'1' ,'Tidak Aktif'=>'0');
                                            foreach($aktif as $akt => $value):
                                            echo '<option value="'.$value.'">'.$akt.'</option>';
                                            endforeach;
                                            ?>
                                        </select>
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
</div>

<div class="modal fade mt-3" id="modal-account" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
	  <div class="modal-dialog modal-lg mt-5" role="document">
		<div class="modal-content">
			<div class="modal-header tit-up">
				<h4 class="modal-title">Update Akun</h4>
			</div>
			<div class="modal-body customer-box">
                <div class="buttonload modal-load">
                        <i class="fa fa-spinner fa-spin modal-load-spinner"></i>
                </div>			
				<!-- Tab panes -->
				<form role="form" name="form_account" id="form_account" class="form-horizontal">
                <input type="hidden" id="id_user_a" name="id_user_a" readonly />
                    <div class="form-group">
						<div class="col-sm-12">
						  <label>Username</label>
							<input type="text" class="form-control" name="username_a" id="username_a" Placeholder="Username" required>
						</div>
                    </div>  
                    <div class="form-group">
						<div class="col-sm-12">
						  <label>Password</label>
							<input type="text" class="form-control" name="password1" id="password1" Placeholder="Password" required>
						</div>
                    </div> 
                    <div class="form-group">
						<div class="col-sm-12">
						  <label>Konfirmasi Password</label>
							<input type="text" class="form-control" name="password2" id="password2" Placeholder="Password" required data-parsley-equalto="#password1">
						</div>
                    </div> 
				</form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-md" name="simpan_account" id="simpan_account">
                    <i class="fa fa-save"></i> Simpan 
                </button>
                <button type="button" class="btn btn-danger btn-md" name="cancel_account" id="cancel_account" data-dismiss="modal">
                <i class="fa fa-ban"></i> Batal</button>
            </div>
		</div>
	  </div>
	</div>
</div>

<!-- Menampilkan Data -->
<script>
    $('document').ready(function(){
        $('.modal-load').hide();
        var ax_simpan;
        var ax_simpan_account;
        var table;
        table = $('#t_admin').DataTable({
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
                "url": "<?php echo site_url('a_admin/get_data_admin')?>",
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
            if($('#form-admin').parsley().validate()){
            var param = this;
            process1(param);
            var form = $('form')[0];
            var form_data = new FormData(form);
            ax_simpan = $.ajax({
                type    : 'POST',
                data    : form_data,
                contentType : false,
                processData : false,
                cache: false,
                async:true,
                url     : "<?php echo site_url('a_admin/simpan');?>",
                success : function(data) {
                process_done1(param,'<i class="fa fa-save"></i> Simpan');      
                Swal.fire('Sukses!',data,'success');
                table.ajax.reload( null, false );
                $('#modal-admin').modal('toggle');
                }
            });
            }else {
            return false();
            }

        });

        $("#simpan_account").click(function(e) {
            e.preventDefault();
            if($('#form_account').parsley().validate()){
            var param = this;
            process1(param);
            var form = $('#form_account').serialize();
            ax_simpan_account = $.ajax({
                type    : 'POST',
                data    : form,
                url     : "<?php echo site_url('a_admin/simpan_account');?>",
                success : function(data) {
                process_done1(param,'<i class="fa fa-save"></i> Simpan');    
                Swal.fire('Sukses!',data,'success');
                $('#modal-account').modal('toggle');
                }
            });
            }else {
            return false();
            }

        });

        $("#tambah").click(function() {
            $('#form-admin').parsley().reset();   
            $('#form-title').text('Tambah Data Admin');
            process_done1('#simpan','<i class="fa fa-save"></i> Simpan'); 
            $('#form-admin')[0].reset(); 
            $('#id_user').val(''); 
            $('#alamat').html(''); 
            $('.modal-load').hide();
        });

        $('#t_admin').on( 'click', 'tr .edit', function () {
            $('#form-admin').parsley().reset();   
            $('#form-title').text('Edit Data Admin');
            $('.modal-load').show();
            var id = $(this).data("id");
            $.ajax({
                type    : 'POST',
                data    : {id:id},
                url     : "<?php echo site_url('a_admin/cari_admin');?>",
                dataType: 'json',
                success : function(data) {
                var lvl=data.level;
                $('#id_user').val(data.id_user);
                $("#username").val(data.username);
                $("#nama").val(data.nama);
                $("#nik").val(data.nik);
                $("#email").val(data.email);
                $("#alamat").html(data.alamat);
                $("#kontak").val(data.kontak);
                $("#level").val(lvl);
                $("#aktif").val(data.aktif);
                $('.modal-load').hide();
                }
            });

            });

            $('#t_admin').on( 'click', 'tr .account', function () {   
                $('.modal-load').show();
                $('#form_account').parsley().reset();
                var id = $(this).data("id");
                $.ajax({
                type    : 'POST',
                data    : {id:id},
                url     : "<?php echo site_url('a_admin/cari_account');?>",
                dataType: 'json',
                success : function(data) {
                    $('#id_user_a').val(data.id_user);
                    $("#username_a").val(data.username);
                    $("#password1").val('');
                    $("#password2").val('');
                    $('.modal-load').hide();
                }
                });

            });

            $('#t_admin').on( 'click', 'tr .delete', function () {
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
                        url     : "<?php echo site_url('a_admin/hapus');?>",
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