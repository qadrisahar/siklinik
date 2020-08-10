
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
        <div class="text-right">
        </div>         
        </div>     
    </div>
</div>
<div class="row mb-5 card p-3">
<form role="form" name="form-pasien" id="form-pasien" class="form-horizontal" enctype="multipart/form-data">
                
                <div class="row">
                    <div class="buttonload modal-load-page">
                        <i class="fa fa-spinner fa-spin modal-load-spinner"></i>
                    </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>ID Pasien <span class="red"></span></label>
                                    <div class="row ml-0 p-0">
                                        <?php
                                        if($id_pasien==''){
                                        ?>
                                        <input type="text" class="form-control col-md-7 mr-1" name="id_pasien" id="id_pasien" placeholder="ID Pasien" required  data-parsley-errors-container="#id_pasien_error" readonly>
                                        <button type="button" class="btn btn-primary btn-md col-md-4" name="cari" id="cari">
                                            <i class="fa fa-search"></i> Cari
                                        </button>
                                        <?php
                                        }else{
                                        ?>
                                        <input type="text" class="form-control col-md-12 mr-1" name="id_pasien" id="id_pasien" placeholder="ID Pasien" value="<?= $id_pasien;?>" required  data-parsley-errors-container="#id_pasien_error" readonly>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div id="id_pasien_error"></div>
                                </div>

                            </div>
                            <div class="form-group">
                            <div class="col-sm-12">
                                <label>Nama </label>
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?= $nama;?>" required readonly>
                                </div>
                            </div>
                            <div class="form-group">
                            <div class="col-sm-12">
                                <label>NIK </label>
                                    <input type="text" class="form-control" name="nik" id="nik" placeholder="NIK" value="<?= $nik;?>" required readonly>
                                </div>
                            </div>
                            <div class="form-group">
                            <div class="col-sm-12">
                                <label>No. JKN </label>
                                    <input type="text" class="form-control" name="no_jkn" id="no_jkn" placeholder="No. JKN" value="<?= $no_jkn;?>" required readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Jenis Kelamin</label>
                                        <input type="text" class="form-control" name="jk" id="jk" placeholder="L/P" value="<?= $jenis_kelamin;?>" required readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                    <label>TTL <span class="red"></span></label>
                                        <input type="text" class="form-control" name="ttl" id="ttl" value="<?= $ttl;?>" placeholder="TTL" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Usia</label>
                                        <input type="text" class="form-control" name="usia" id="usia" value="<?= $usia;?>" placeholder="Usia" required readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                    <label>Alamat <span class="red"></span></label>
                                        <textarea type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" readonly><?= $alamat;?></textarea>
                                    </div>
                                </div>
                        </div>
                </div>
                <hr>
                <div class="row">
                        <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Layanan </label>
                                        <select class="form-control col-lg-9 col-md-9 col-12" id="id_layanan" name="id_layanan" required>
                                            <?php
                                            $pd=$this->db->select('id_layanan,layanan')->get('layanan');
                                            echo '<option value="">'.'--Pilih--'.'</option>';
                                            foreach($pd->result() as $dpd){
                                                echo '<option value="'.$dpd->id_layanan.'">'.$dpd->layanan.'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                        </div>
                </div>
				</form>
            <div class="modal-footer">
                <a href="<?=base_url()?>a_registrasi" class="btn btn-success btn-md">
                <i class="fa fa-arrow-left"></i> Daftar Registrasi</a>
                <button type="button" class="btn btn-primary btn-md" name="simpan" id="simpan">
                    <i class="fa fa-save"></i> Registrasi
                </button>
            </div>
</div>

<div class="modal fade mt-3" id="modal-pasien" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-xl mt-0" role="document">
        <div class="modal-content">
            <div class="modal-header tit-up">
                <h4 class="modal-title" id="form-title-pasien">Data Pasien</h4>
            </div>
            <div class="buttonload modal-load">
                <i class="fa fa-spinner fa-spin modal-load-spinner"></i>
        </div>
            <div class="modal-body customer-box">
                <!-- Tab panes -->
                <div class="table-responsive_">
                <table class="table table-bordered dt-responsive nowrap" style="width:100%" id="t_pasien">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col hidden-column">ID Pasien</th>
                            <th scope="col">Nama</th>
                            <th scope="col">NIK</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Alamat</th>
                            <th scope="col" class="text-center datatable-nosort">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-md" name="close" id="close">
                    <i class="fa fa-ban"></i> Close</button>
            </div>
        </div>
    </div>
</div>
</div>


<script>
    $('document').ready(function(){

        $(".modal-load-page").hide();

        $("#cari").click(function() {
        table = $('#t_pasien').DataTable({
            scrollCollapse: true,
            autoWidth: false,
            responsive:true,
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
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
                "url": "<?php echo site_url('a_data/get_data_pasien')?>",
                "type": "POST"
            },
            "columnDefs": [
            {
                "targets": "datatable-nosort",
                "orderable": false,
            }
            ],

        });

        $("#modal-pasien").modal('show');
        $(".modal-load").hide();
        
    });

    $('#t_pasien tbody').on( 'click', 'tr', function () {
        var id_pasien = $(this).closest('tr').find('td:eq(1)').text();
        var nama = $(this).closest('tr').find('td:eq(2)').text();
        var nik = $(this).closest('tr').find('td:eq(3)').text();
        var jk = $(this).closest('tr').find('td:eq(4)').text();
        var alamat = $(this).closest('tr').find('td:eq(5)').text();
        $("#id_pasien").val(id_pasien);
        $("#nama").val(nama);
        $("#nik").val(nik);
        $("#jk").val(jk);
        $("#alamat").val(alamat);
        $("#modal-pasien").modal('hide');
        $(".modal-load-page").show();
        $.ajax({
            type    : 'POST',
            data    : {x:id_pasien},
            url     : "<?php echo site_url('a_data/cari_detail_pasien');?>",
            dataType:'json',
            success : function(data) {
            $("#no_jkn").val(data.no_jkn);
            $("#ttl").val(data.ttl);
            $("#usia").val(data.usia);
            $(".modal-load-page").hide();
            }
        });
        
    } );

    $("#close").click(function() {
        $("#modal-pasien").modal('hide');
    });

        $("#simpan").click(function(e) {
            e.preventDefault();
            if($('#form-pasien').parsley().validate()){
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
                url     : "<?php echo site_url('a_registrasi/simpan');?>",
                success : function(data) {
                process_done1(param,'<i class="fa fa-save"></i> Simpan');      
                    Swal.fire({
                        title: "Sukses!",
                        text: "Data Sukses Disimpan",
                        type: "success",
                        timer: 2000
                    }).then((result) => {
                        location.replace("<?=base_url()?>cetak/antrian?x="+btoa(data));

                    });
                }
            });
            }else {
            return false();
            }

        });

            function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.fileName = input.files[0].name;
            reader.onload = function(e) {
                $('#img_show').attr('src', e.target.result);
                $('#img_show').removeClass('hide');
                $('#file_name').text(e.target.fileName);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#userfile").change(function() {
        readURL(this);
    });
    

    });
</script>
<script>
    $('#loading').hide();
</script>