<style>
    .widget-page{
        box-shadow: 15px 19px 24px -11px #bbb9b9;
        border-radius: 37px;
        padding: 9px;
        margin: 1px;
        width: 100%;
    }
    .widget-page h1{
        font-weight: 900;
        color: #eb7a06;
        font-size: 33pt;
    }
    .table-resume h5{
        font-size: 16px;
        margin-bottom: 2px;
    }


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
        <div class="text-right">
                <button type="button"  name="tambah" id="tambah"  data-toggle="modal" data-target="#modal-import" class="btn-shadow btn btn-success">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-file-excel fa-w-20"></i>
                    </span>
                    Import Excel
                </button>
        </div>         
        </div>     
    </div>
</div>
<div class="row mb-5">
<div class="col-lg-12 col-md-12 col-sm-12 p-4 mb-3 card">
        <h5 class="card-title">Filter</h5>
        <form class="">
            <div class="form-row">
                <div class="col-md-3">
                    <div class="position-relative form-group status-form">
                        <label for="status_filter" class="">Status Pendukung</label>
                        <select class="form-control status" name="status_filter" id="status_filter"
                            style="width:100%" data-parsley-errors-container="#status_error">
                            <option value="" selected>-- Semua --</option>
                            <option value="n">Bukan Pendukung</option>
                            <option value="y">Pendukung</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="position-relative form-group statusd-form">
                        <label for="statusd_filter" class="">Status Daftar</label>
                        <select class="form-control statusd" name="statusd_filter" id="statusd_filter"
                            style="width:100%" data-parsley-errors-container="#statusd_error">
                            <option value="" selected>-- Semua --</option>
                            <option value="n">Tidak Terdaftar</option>
                            <option value="y">Terdaftar</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="position-relative form-group kabupaten-filter-form">
                        <label for="kabupaten_filter" class="">Kabupaten</label>
                        <select class="form-control kabupaten-filter" name="kabupaten_filter" id="kabupaten_filter"
                            style="width:100%" data-parsley-errors-container="#kabupaten_filter_error">
                            <option value="">-- Pilih Kabupaten --</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="position-relative form-group kecamatan-filter-form">
                        <label for="kecamatan_filter" class="">Kecamatan</label>
                        <select class="form-control kecamatan-filter" name="kecamatan_filter" id="kecamatan_filter"
                            style="width:100%" data-parsley-errors-container="#kecamatan_filter_error">
                            <option value="">-- Pilih Kecamatan --</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="position-relative form-group desa-filter-form">
                        <label for="desa_filter" class="">Desa/Kelurahan</label>
                        <select class="form-control desa-filter" name="desa_filter" id="desa_filter"
                            style="width:100%" data-parsley-errors-container="#desa_filter_error">
                            <option value="">-- Pilih Desa/Kelurahan --</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-row">
            <button type="button" class="btn btn-primary mt-0" name="filter" id="filter"><i class="fa fa-filter"></i>
                        Filter</button>
            </div>
            <div class="form-row row-center">
                <div class="col-md-3">
                    <div class="position-relative form-group widget-page text-center">
                        <h5>Jumlah Pemilih</h5>
                        <h1 id="total_head"></h1>
                        
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="position-relative form-group widget-page text-center">
                        <h5>Target Tercapai</h5>
                        <h1 class="text-success" id="target_tercapai"></h1>
                        
                    </div>
                </div>
            </div>
        </form>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 p-4 mb-3 card">   
    <div class="table-action mb-2">
        <div class="text-right">
                <button type="button"  name="tambah" id="tambah"  data-toggle="modal" data-target="#modal-pemilih" class="btn-shadow btn btn-primary">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-plus-circle fa-w-20"></i>
                    </span>
                    Tambah
                </button>
        </div>
    </div> 
    <div class="table-place-full">      
        <table class="table table-bordered nowrap table-striped table-hover" style="width:100%" id="t_pemilih">
            <thead class="thead-light">
                <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col">Foto</th>
                <th scope="col">NIK</th>
                <th scope="col">No.KK</th>
                <th scope="col">Nama</th>
                <th scope="col">JK</th>
                <th scope="col">Kontak</th>
                <th scope="col">Kabupaten</th>
                <th scope="col">Kecamatan</th>
                <th scope="col">Desa</th>
                <th scope="col" class="text-center span2 datatable-nosort">Status Daftar</th>
                <th scope="col" class="text-center span2 datatable-nosort">Status Pendukung</th>
                <th scope="col" class="text-center span2 datatable-nosort">Aksi</th>
                </tr>
            </thead>
            <tbody>                          
            </tbody>
        </table>
        <hr>
        <div class="table-resume mt-3">
            <h5>Total Pendukung : <strong><span class="text-success" id="pendukung">0</span></strong> </h5>
            <h5>Total Bukan Pendukung : <strong><span class="text-danger" id="b_pendukung">0</span></strong> </h5>
            <h5>Total Terdaftar : <strong><span class="text-success" id="terdaftar">0</span></strong> </h5>
            <h5>Total Tidak Terdaftar : <strong><span class="text-danger" id="b_terdaftar">0</span></strong> </h5>
            <h5>Total Pemilih : <strong><span id="total">0</span></strong> </h5>
        </div>
    </div>   
</div>
</div>

<div class="modal fade mt-3" id="modal-pemilih" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
	  <div class="modal-dialog modal-xxl mt-0" role="document">
		<div class="modal-content">
			<div class="modal-header tit-up">
                <h4 class="modal-title" id="form-title"></h4>
            </div>
            <div class="buttonload modal-load">
                    <i class="fa fa-spinner fa-spin modal-load-spinner"></i>
            </div>
			<div class="modal-body customer-box">	
                		
				<!-- Tab panes -->
				<form role="form" name="form-pemilih" id="form-pemilih" class="form-horizontal" enctype="multipart/form-data">
                <input type="hidden" id="id_pemilih" name="id_pemilih" readonly />
                <div class="row">
                    <div class="col-md-12 ml-3">
                        <div class="form-group row">
                            <label for="id_kabupaten" class="col-sm-2 col-form-label">Kabupaten</label>
                            <div class="col-sm-3 kabupaten-form">
                                    <select class="form-control kabupaten" name="id_kabupaten" id="id_kabupaten" required
                                        style="width:100%" data-parsley-errors-container="#kabupaten_error">
                                        <option value="">-- Kabupaten --</option>
                                    </select>
                                    <div id="kabupaten_error"></div>
                            </div>
                            <label for="id_kecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
                            <div class="col-sm-3 kecamatan-form">
                                    <select class="form-control kecamatan" name="id_kecamatan" id="id_kecamatan" required
                                        style="width:100%" data-parsley-errors-container="#kecamatan_error">
                                        <option value="">-- Kecamatan --</option>
                                    </select>
                                    <div id="kecamatan_error"></div>
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label for="id_desa" class="col-sm-2 col-form-label">Desa Kelurahan</label>
                            <div class="col-sm-3 desa-form">
                                    <select class="form-control desa" name="id_desa" id="id_desa" required
                                        style="width:100%" data-parsley-errors-container="#desa_error">
                                        <option value="">-- Pilih Desa/Kelurahan --</option>
                                    </select>
                                    <div id="desa_error"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                        <div class="col-md-3 col-sm-12">
                            <div class="form-group">
                            <div class="col-sm-12">
                                <label>Nama </label>
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                <label>NIK <span class="red"></span></label>
                                    <input type="number" class="form-control" name="nik" id="nik" placeholder="NIK" required data-parsley-type="number">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                <label>NO.KK <span class="red"></span></label>
                                    <input type="number" class="form-control" name="no_kk" id="no_kk" placeholder="NO.KK" required data-parsley-type="number">
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
                                <div class="form-group">
                                    <div class="col-sm-12">
                                    <label>Status Perkawinan <span class="red"></span></label>
                                    <select class="form-control col-lg-7 col-md-7 col-12" id="status_perkawinan" name="status_perkawinan">
                                    <?php
                                    $sp=array('BELUM KAWIN' => 'B' , 'KAWIN' => 'S', 'PERNAH KAWIN' => 'P' );
                                    foreach($sp as $dsp => $vsp):
                                    echo '<option value="'.$vsp.'">'.$dsp.'</option>';
                                    endforeach;
                                    ?>
                                    </select>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                    <label>Tempat Lahir <span class="red"></span></label>
                                        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                    <label>Tgl. Lahir <span class="red"></span></label>
                                        <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Tgl. Lahir">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                    <label>RT <span class="red"></span></label>
                                    <input type="text" class="form-control" name="alamat_rt" id="alamat_rt" placeholder="RT" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                    <label>RW <span class="red"></span></label>
                                    <input type="text" class="form-control" name="alamat_rw" id="alamat_rw" placeholder="RW" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                    <label>Alamat <span class="red"></span></label>
                                        <textarea type="text" class="form-control" name="alamat_jln" id="alamat_jln" placeholder="Alamat" required></textarea>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                    <label>Kontak</label>
                                        <input type="number" class="form-control" name="kontak" id="kontak" placeholder="Kontak" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Disabilitas </label>
                                        <select class="form-control col-lg-7 col-md-7 col-12" id="disabilitas" name="disabilitas">
                                        <?php
                                        $ds=array('TIDAK' => '0' , 'TUNA DAKSA' => '1', 'TUNA NETRA' => '2', 'TUNA RUNGU/WICARA' => '3', 'TUNA GRAHITA' => '4', 'DISABILITAS LAINNYA' => '5');
                                        foreach($ds as $dds => $vds):
                                        echo '<option value="'.$vds.'">'.$dds.'</option>';
                                        endforeach;
                                        ?>
                                        </select>
                                    </div>
                                </div>    
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Pendukung </label>
                                        <select class="form-control col-lg-9 col-md-9 col-12" id="status_pendukung" name="status_pendukung">
                                            <?php
                                            $status=array('PENDUKUNG'=>'y','BUKAN PENDUKUNG' =>'n');
                                            foreach($status as $stat => $value):
                                            echo '<option value="'.$value.'">'.$stat.'</option>';
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Terdaftar </label>
                                        <select class="form-control col-lg-9 col-md-9 col-12" id="status_daftar" name="status_daftar">
                                            <?php
                                            $status_d=array('TIDAK TERDAFTAR'=>'n','TERDAFTAR' =>'y');
                                            foreach($status_d as $statd => $value):
                                            echo '<option value="'.$value.'">'.$statd.'</option>';
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                    <label>Hobby <span class="red"></span></label>
                                        <input type="text" class="form-control" name="hobby" id="hobby" placeholder="Hobby">
                                    </div>
                                </div>

                        </div>
                        <div class="col-md-3 col-sm-12">
                                
                        <div class="form-group">
                                    <div class="col-sm-12">
                                    <label>Facebook <span class="red"></span></label>
                                        <input type="text" class="form-control" name="sosmed_fb" id="sosmed_fb" placeholder="Facebook">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                    <label>Instagram <span class="red"></span></label>
                                        <input type="text" class="form-control" name="sosmed_instagram" id="sosmed_instagram" placeholder="Instagram">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Foto </label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="userfile" name="userfile" accept="image/*">
                                            <label class="custom-file-label text-md-left text-left" for="customFile">Pilih file</label>
                                        </div>
                                        <img src="" id="img_show" class="avatar img-thumbnail mb-2 ml-2 mt-2 hide" alt="Photo" style="height:150px;width:150px;object-fit: contain;">
                
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

<div class="modal fade mt-3" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
	  <div class="modal-dialog modal-xl mt-5" role="document">
		<div class="modal-content">
			<div class="modal-header tit-up">
                <h4 class="modal-title" id="form-title">Detail Pemilih</h4>
			</div>
            <div class="buttonload modal-load">
                        <i class="fa fa-spinner fa-spin modal-load-spinner"></i>
            </div>
			<div class="modal-body customer-box">			
				<!-- Tab panes -->
                <div class="row">
                    <div class="col-md-12 ml-3">
                        <table width="100%">
                        <tbody><tr>
                        <td width="10%"><label for="" class="col-form-label">Kabupaten</label></td>
                        <td width="1%"> : </td>
                        <td width="10%"> <b id="xid_kabupaten"></b></td>
                        <td width="10%"><label for="" class="col-form-label">Kecamatan</label></td>
                        <td width="1%"> : </td>
                        <td width="10%"> <b id="xid_kecamatan"></b></td>
                        <td width="10%"><label for="" class="col-form-label">Desa Kelurahan</label></td>
                        <td width="1%"> : </td>
                        <td width="30%"> <b id="xid_desa"></b></td>
                        </tr>
                        </tbody></table>
                    </div>
                </div>
                <hr>
				<div class="row">
                        <div class="col-md-3 col-sm-12">
                            <div class="form-group">
                            <div class="col-sm-12">
                                <label>Nama </label>
                                    <h6><b id="xnama"></b></h6>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                <label>NIK <span class="red"></span></label>
                                <h6><b id="xnik"></b></h6>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                <label>NO.KK <span class="red"></span></label>
                                <h6><b id="xno_kk"></b></h6>
                                </div>
                            </div>
                            <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Jenis Kelamin </label>
                                        <h6><b id="xjenis_kelamin"></b></h6>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                    <label>Status Perkawinan <span class="red"></span></label>
                                    <h6><b id="xstatus_perkawinan"></b></h6>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                    <label>Tempat Lahir <span class="red"></span></label>
                                    <h6><b id="xtempat_lahir"></b></h6>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                    <label>Tgl. Lahir <span class="red"></span></label>
                                    <h6><b id="xtgl_lahir"></b></h6>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                    <label>RT <span class="red"></span></label>
                                    <h6><b id="xalamat_rt"></b></h6>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                    <label>RW <span class="red"></span></label>
                                    <h6><b id="xalamat_rw"></b></h6>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                    <label>Alamat <span class="red"></span></label>
                                    <h6><b id="xalamat_jln"></b></h6>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                    <label>Kontak</label>
                                        <h6><b id="xkontak"></b></h6>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Disabilitas </label>
                                        <h6><b id="xdisabilitas"></b></h6>
                                    </div>
                                </div>    
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Status Pendukung </label>
                                        <h6><b id="xstatus_pendukung"></b></h6>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Status Daftar </label>
                                        <h6><b id="xstatus_daftar"></b></h6>
                                    </div>
                                </div>

                        </div>
                        <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                    <label>Hobby</label>
                                        <h6><b id="xhobby"></b></h6>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Facebook </label>
                                        <h6><b id="xsosmed_fb"></b></h6>
                                    </div>
                                </div>    
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Instagram </label>
                                        <h6><b id="xsosmed_instagram"></b></h6>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Foto </label><br>
                                        <img src="" id="ximg_show" class="avatar img-thumbnail mb-2 ml-2 mt-2 hide" alt="Photo" style="height: 150px;width: 150px;object-fit: contain;">
                
                                    </div>
                                </div>

                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-md" name="cancel" id="cancel" data-dismiss="modal">
                <i class="fa fa-ban"></i> Close</button>
            </div>
		</div>
	  </div>
	</div>
</div>

<div class="modal fade mt-3" id="modal-import" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
	  <div class="modal-dialog modal-md mt-0" role="document">
		<div class="modal-content">
			<div class="modal-header tit-up">
                <h4 class="modal-title" id="form-title">Import File Excel</h4>
			</div>
			<div class="modal-body customer-box">	
                <div class="buttonload modal-load">
                        <i class="fa fa-spinner fa-spin modal-load-spinner"></i>
                </div>		
				<!-- Tab panes -->
                <form id="form-import" class="form-horizontalt" enctype="multipart/form-data">
				 <div class="row">
                    <div class="col-md-12 ml-3">
                        <div class="form-group row">
                            <label for="userfile" class="col-sm-3 col-form-label">Cari File</label>
                            <div class="custom-file col-sm-6">
                                <input type="file" class="custom-file-input" id="userfile-excel" name="userfile-excel" accept=".xls,.xlsx" required>
                                <label class="custom-file-label text-md-left text-left" for="customFile">Pilih file</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="userfile" class="col-sm-3 col-form-label"></label>
                            <div class="custom-file col-sm-6">
                                <p id="file_name_excel"></p>
                            </div>
                        </div>
                    </div>
                </div>
				</form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-md" name="import_excel" id="import_excel">
                    <i class="fa fa-upload"></i> Import
                </button>
                <button type="button" class="btn btn-danger btn-md" name="" id="" data-dismiss="modal">
                <i class="fa fa-ban"></i> Close</button>
            </div>
		</div>
	  </div>
	</div>
</div>

<script>
    $('document').ready(function(){

        $('.modal-load').hide();
        var ax_simpan;
        var ax_simpan_account;
        var table;
        table = $('#t_pemilih').DataTable({
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
                "url": "<?php echo site_url('a_pemilih_pr/get_data_pemilih')?>",
                "type": "POST",
                "data": function(d) {
                    d.status = btoa($("#status_filter").val());
                    d.status_daftar = btoa($("#statusd_filter").val());
                    d.kabupaten = btoa($("#kabupaten_filter").val());
                    d.kecamatan = btoa($("#kecamatan_filter").val());
                    d.desa = btoa($("#desa_filter").val());
                },
                "dataSrc": function (json) {
                    $("#pendukung").html(json.pendukung);
                    $("#b_pendukung").html(json.b_pendukung);
                    $("#terdaftar").html(json.terdaftar);
                    $("#b_terdaftar").html(json.b_terdaftar);
                    $("#total").html(json.total);
                    $("#total_head").html(json.total);
                    $("#target_tercapai").html(json.target_tercapai);
                    return json.data;
                },

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


        $("#simpan").click(function(e) {
            e.preventDefault();
            if($('#form-pemilih').parsley().validate()){
            var param = this;
            process1(param);
            var form = $('form')[1];
            var form_data = new FormData(form);
            ax_simpan = $.ajax({
                type    : 'POST',
                data    : form_data,
                contentType : false,
                processData : false,
                cache: false,
                async:true,
                url     : "<?php echo site_url('a_pemilih_pr/simpan');?>",
                success : function(data) {
                process_done1(param,'<i class="fa fa-save"></i> Simpan');      
                Swal.fire('Sukses!',data,'success');
                table.ajax.reload( null, false );
                $('#modal-pemilih').modal('toggle');
                }
            });
            }else {
            return false();
            }

        });


        $("#tambah").click(function() {
            $('#form-pemilih').parsley().reset();   
            $('#form-title').text('Tambah Data Pemilih');
            process_done1('#simpan','<i class="fa fa-save"></i> Simpan'); 
            $('#form-pemilih')[0].reset(); 
            $('#id_pemilih').val(''); 
            $('#img_show').addClass('hide');
            $('#id_desa').val('').trigger('change');
            $('#id_kecamatan').val('').trigger('change');
            $('#id_kabupaten').val('').trigger('change');
            $('#alamat').val(''); 
            $('.modal-load').hide();
        });

        $('#t_pemilih').on( 'click', 'tr .edit', function () {
            $('#form-pemilih').parsley().reset();   
            $('#form-title').text('Edit Data Pemilih');
            $('.modal-load').show();
            var id = $(this).data("id");
            $.ajax({
                type    : 'POST',
                data    : {id:id},
                url     : "<?php echo site_url('a_pemilih_pr/cari_pemilih');?>",
                dataType: 'json',
                success : function(data) {
                $('#id_pemilih').val(data.id_pemilih);
                $("#id_kabupaten").append(data.id_kabupaten);
                $("#id_kecamatan").append(data.id_kecamatan);
                $("#id_desa").append(data.id_desa);
                $("#no_kk").val(data.no_kk);
                $("#nik").val(data.nik);
                $("#nama").val(data.nama);
                $("#tempat_lahir").val(data.tempat_lahir);
                $("#tgl_lahir").val(data.tgl_lahir);
                $("#alamat_jln").val(data.alamat_jln);
                $("#alamat_rt").val(data.alamat_rt);
                $("#alamat_rw").val(data.alamat_rw);
                $("#kontak").val(data.kontak);
                $("#status_perkawinan").val(data.status_perkawinan);
                $("#jenis_kelamin").val(data.jenis_kelamin);
                $("#disabilitas").val(data.disabilitas);
                $("#status_pendukung").val(data.status_pendukung);
                $("#status_daftar").val(data.status_daftar);
                $("#hobby").val(data.hobby);
                $("#sosmed_fb").val(data.sosmed_fb);
                $("#sosmed_instagram").val(data.sosmed_instagram);
                $('#userfile').val('');
                $('#img_show').removeClass('hide');
                $("#img_show").attr('src',''+data.photo+'');
                
                $('.modal-load').hide();
                }
            });

            });

            $('#t_pemilih').on( 'click', 'tr .detail', function () {
            $('#form-pemilih').parsley().reset();   
            $('#form-title').text('Detail Data Pemilih');
            $('.modal-load').show();
            var id = $(this).data("id");
            $.ajax({
                type    : 'POST',
                data    : {id:id},
                url     : "<?php echo site_url('a_pemilih_pr/detail');?>",
                dataType: 'json',
                success : function(data) {
                $('#xid_pemilih').val(data.id_pemilih);
                $('#xid_kabupaten').html(data.id_kabupaten);
                $('#xid_kecamatan').html(data.id_kecamatan);
                $('#xid_desa').html(data.id_desa);
                $("#xno_kk").html(data.no_kk);
                $("#xnik").html(data.nik);
                $("#xnama").html(data.nama);
                $("#xtempat_lahir").html(data.tempat_lahir);
                $("#xtgl_lahir").html(data.tgl_lahir);
                $("#xalamat_jln").html(data.alamat_jln);
                $("#xalamat_rt").html(data.alamat_rt);
                $("#xalamat_rw").html(data.alamat_rw);
                $("#xkontak").html(data.kontak);
                $("#xstatus_perkawinan").html(data.status_perkawinan);
                $("#xjenis_kelamin").html(data.jenis_kelamin);
                $("#xdisabilitas").html(data.disabilitas);
                $("#xstatus_pendukung").html(data.status_pendukung);
                $("#xstatus_daftar").html(data.status_daftar);
                $("#xhobby").html(data.hobby);
                $("#xsosmed_fb").html(data.sosmed_fb);
                $("#xsosmed_instagram").html(data.sosmed_instagram);
                $('#ximg_show').removeClass('hide');
                $("#ximg_show").attr('src',''+data.photo+'');
                
                $('.modal-load').hide();
                }
            });

            });

            $('#t_pemilih').on( 'click', 'tr .delete', function () {
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
                        url     : "<?php echo site_url('a_pemilih_pr/hapus');?>",
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

            $('#import_excel').click(function(evt){
            evt.preventDefault();
            if($('#form-import').parsley().validate()){
              var form = $('form')[2];
              var formData = new FormData(form);
                var param = this;
                process1(param);
              $(":submit").attr('disabled', true);
              $.ajax({
                     type : 'POST',
                     url : "<?php echo site_url('a_import_data/import_excel');?>",
                     data : formData,
                     cache : false,
                     contentType : false,
                     processData : false,
                     success:function(data) {
                         if(data=='1'){
                            Swal.fire('Sukses!','Data Sukses DiUpload','success');
                            $("#modal-import").modal('hide');
                            table.ajax.reload(null, true);

                         }else{
                            Swal.fire("Error", data, "error");
                         }

                         process_done1(param,'<i class="fa fa-file-excel"></i> Import Excel'); 
                         $(":submit").attr('disabled', false);

                      },
                      error:function() {
                        Swal.fire("Error", "Terjadi Kesalahan. Periksa Kembali File Yang diUpload !", "error");
                            process_done1(param,'<i class="fa fa-file-excel"></i> Import Excel'); 
                         $(":submit").attr('disabled', false);

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

    function readURLExcel(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.fileName = input.files[0].name;
            reader.onload = function(e) {
                $('#file_name_excel').text(e.target.fileName);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#userfile-excel").change(function() {
        readURLExcel(this);
    });

                    

    });
</script>
<script>
    $('#loading').hide();
</script>