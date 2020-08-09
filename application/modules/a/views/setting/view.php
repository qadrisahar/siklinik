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
    <form name="form" id="form" enctype="multipart/form-data">

    <div class="form-group row">
        <label class="col-sm-12 col-md-3 col-form-label">Tgl. Pemilu</label>
        <div class="col-sm-12 col-md-9">
          <input class="form-control" type="date" name="tgl_pemilu" id="tgl_pemilu" placeholder="0" required>
        </div>
      </div>
<div class="form-group row">
        <label class="col-sm-12 col-md-3 col-form-label">Calon</label>
        <div class="col-sm-12 col-md-9">
          <input class="form-control" type="text" name="calon" id="calon" placeholder="Calon" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-12 col-md-3 col-form-label">Wakil</label>
        <div class="col-sm-12 col-md-9">
          <input class="form-control" type="text" name="wakil" id="wakil" placeholder="Wakil" required>
        </div>
      </div>
    <div class="form-group row">
        <label class="col-sm-12 col-md-3 col-form-label">Target Keseluruhan Pemilih</label>
        <div class="col-sm-12 col-md-9">
          <input class="form-control" type="number" name="pemilih" id="pemilih" placeholder="0" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-12 col-md-3 col-form-label">Target Default Provinsi(%)</label>
        <div class="col-sm-12 col-md-9">
        <input class="form-control" type="number" maxlength="3" max="100" name="provinsi" id="provinsi" placeholder="0%" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-12 col-md-3 col-form-label">Target Default Kabupaten(%)</label>
        <div class="col-sm-12 col-md-9">
        <input class="form-control" type="number" maxlength="3" max="100" name="kabupaten" id="kabupaten" placeholder="0%" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-12 col-md-3 col-form-label">Target Default Kecamatan(%)</label>
        <div class="col-sm-12 col-md-9">
        <input class="form-control" type="number" maxlength="3" max="100" name="kecamatan" id="kecamatan" placeholder="0%" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-12 col-md-3 col-form-label">Target Default Desa/Kelurahan(%)</label>
        <div class="col-sm-12 col-md-9">
        <input class="form-control" type="number" maxlength="3" max="100" name="desa" id="desa" placeholder="0%" required>
        </div>
      </div>
      
      <div class="btn-list text-center">
        <button type="button" name="reset" id="reset" class="btn btn-info"><i class="fa fa-circle-o"></i> Reset</button>
        <button type="button" class="btn btn-primary" name="simpan" id="simpan"><i class="fa fa-check-circle"></i> Simpan</button>
      </div>

    </form>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
      cari_data();


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
            url     : "<?php echo site_url('a_setting/simpan');?>",
            success : function(data) {
              process_done1(param,'<i class="fa fa-save"></i> Simpan');    
              Swal.fire('Sukses!',data,'success');
            }
          });
        }else {
          return false();
        }

      });

      $("#reset").click(function(){
        $(':input').val('');
        $('#id_kabupaten').val('').trigger('change');
        $('#id_provinsi').val('').trigger('change');
      });

    });

    function cari_data(){
      $.ajax({
        type    : 'POST',
        url     : "<?php echo site_url('a_setting/cari_setting');?>",
        dataType: "json",
        success : function(data) {
          $('#tgl_pemilu').val(data.tgl_pemilu);
          $("#calon").val(data.calon);
          $("#wakil").val(data.wakil);
          $("#pemilih").val(data.pemilih);
          $('#provinsi').val(data.provinsi);
          $('#kabupaten').val(data.kabupaten);
          $('#kecamatan').val(data.kecamatan);
          $("#desa").val(data.desa);
        }
      });
    }
  </script>
  <script>
   $('#loading').hide();
  </script>
