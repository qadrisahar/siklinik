
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
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <div class="col-sm-12">
                                <label>NIK <span class="red"></span></label>
                                    <input type="number" class="form-control" name="nik" id="nik" placeholder="NIK" required data-parsley-type="number">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                <label>No. JKN <span class="red"></span></label>
                                    <input type="number" class="form-control" name="no_jkn" id="no_jkn" placeholder="No. JKN" data-parsley-type="number">
                                </div>
                            </div>
                            <div class="form-group">
                            <div class="col-sm-12">
                                <label>Nama </label>
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" required>
                                </div>
                            </div>
                            <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Jenis Kelamin </label>
                                        <select class="form-control col-lg-7 col-md-7 col-12" id="jenis_kelamin" name="jenis_kelamin" required>
                                            <option value="">--Pilih--</option>
                                            <?php
                                            $jenis_kelamin=array('LAKI-LAKI' =>'L','PEREMPUAN'=>'P');
                                            foreach($jenis_kelamin as $jk => $value):
                                            echo '<option value="'.$value.'">'.$jk.'</option>';
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                    <label>Tempat Lahir <span class="red"></span></label>
                                        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                    <label>Tgl. Lahir <span class="red"></span></label>
                                        <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Tgl. Lahir" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                    <label>Alamat <span class="red"></span></label>
                                        <textarea type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                    <label>Telephone</label>
                                        <input type="number" class="form-control" name="kontak" id="kontak" placeholder="Kontak" required>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                    <label>Telephone Lainnya</label>
                                        <input type="number" class="form-control" name="kontak_2" id="kontak_2" placeholder="Kontak">
                                    </div>
                                </div>   
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Pendidikan Terakhir </label>
                                        <select class="form-control col-lg-9 col-md-9 col-12" id="id_pendidikan" name="id_pendidikan">
                                            <?php
                                            $pd=$this->db->select('id_pendidikan,pendidikan')->get('pendidikan');
                                            echo '<option value="">'.'--Pilih--'.'</option>';
                                            foreach($pd->result() as $dpd){
                                                echo '<option value="'.$dpd->id_pendidikan.'">'.$dpd->pendidikan.'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Pekerjaan </label>
                                        <select class="form-control col-lg-9 col-md-9 col-12" id="id_pekerjaan" name="id_pekerjaan">
                                            <?php
                                            $pkj=$this->db->select('id_pekerjaan,pekerjaan')->get('pekerjaan');
                                            echo '<option value="">'.'--Pilih--'.'</option>';
                                            foreach($pkj->result() as $dpkj){
                                                echo '<option value="'.$dpkj->id_pekerjaan.'">'.$dpkj->pekerjaan.'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-sm-12">
                                    <label>Email <span class="red"></span></label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="email@email.com">
                                    </div>
                                </div>
                        </div>
                </div>
                <hr>
                <div class="row">
                        <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                    <label>Keterangan <span class="red"></span></label>
                                        <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan">
                                    </div>
                                </div>
                        </div>
                </div>
				</form>
            <div class="modal-footer">
                <?php
                if($func=='reg'){
                ?>
                <a href="<?=base_url()?>a_registrasi" class="btn btn-success btn-md" name="cancel" id="cancel">
                <i class="fa fa-arrow-left"></i> Daftar Registrasi</a>
                <button type="button" class="btn btn-primary btn-md" name="simpan" id="simpan">
                    <i class="fa fa-save"></i> Simpan Untuk Registrasi
                </button>
                <?php
                }else{
                ?>
                <a href="<?=base_url()?>a_pasien" class="btn btn-success btn-md" name="cancel" id="cancel">
                <i class="fa fa-arrow-left"></i> Daftar pasien</a>
                <button type="button" class="btn btn-primary btn-md" name="simpan" id="simpan">
                    <i class="fa fa-save"></i> Simpan
                </button>
                <?php
                }
                ?>
            </div>
</div>


<script>
    $('document').ready(function(){
        <?php
        if($func=='reg'){
        ?>
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
                url     : "<?php echo site_url('a_pasien_baru/simpan');?>",
                success : function(data) {
                process_done1(param,'<i class="fa fa-save"></i> Simpan');      
                    Swal.fire({
                        title: "Sukses!",
                        text: 'Data Sukses Disimpan. Lanjut untuk registrasi',
                        type: "success",
                        timer: 2000
                    }).then((result) => {
                        location.replace('<?=base_url()?>a_registrasi/add?p='+data);

                    });
                }
            });
            }else {
            return false();
            }

        });
        <?php
        }else{
        ?>
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
                url     : "<?php echo site_url('a_pasien_baru/simpan');?>",
                success : function(data) {
                process_done1(param,'<i class="fa fa-save"></i> Simpan');      
                    Swal.fire({
                        title: "Sukses!",
                        text: data,
                        type: "success",
                        timer: 2000
                    }).then((result) => {
                        location.reload(true);

                    });
                }
            });
            }else {
            return false();
            }

        });
        <?php
        }
        ?>

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