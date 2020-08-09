<style>
  body{
      margin:0px;
  }

  .content{
    display: flex;
    flex-wrap: wrap;
  }
  .card{
    width: 330px;
    height: 211px;
    background-color: #ece006;
    margin: 20px;
    border-radius: 9px;
    box-shadow: 0px 0px 6px 1px #b7b7b7;
    position: relative;
    display: flex;
    flex-wrap: wrap;
  }
  .card h5{
    margin-top: 16px !important;
    margin-bottom: 5px;
  }
  .card p{
    margin-top: 1px;
    font-size: 12px;
  }

  .card .header {
    display: flex;
    width: 100%;
    height: 0px;
    position: relative;
  }

  .card .header  .logo img{
    width: 63px;
    margin: 6px 6px 6px 18px;
  }

  .card .header  .title{width: 100%;}

  .card .body {
    display: flex;
    width: 100%;
    margin-top: 54px;
    position: relative;
  }

  .card .body .foto img{
    width: 73px;
    margin: 0px 6px 6px 18px;
    height: 80px;
    object-fit: contain;
  }

  .card .body .data table{
    font-size: 9px;
    line-height: 7px;
  }

  .card .footer {
    display: flex;
    width: 100%;
    margin-top: 0px;
    position: relative;
    margin-left: 40px;
  }

  .card .footer p{
    font-size: 8px;
  }

  </style>
<body style="background-color: #fff;">
<div class="content">
<?php
$calon=$this->db->select('calon')->where('id','setting')->get('setting')->row()->calon;
$wakil=$this->db->select('wakil')->where('id','setting')->get('setting')->row()->wakil;
$where='';
if(!empty($kabupaten)){
    $where.=" AND p.id_kabupaten='$kabupaten'";
}

if(!empty($kecamatan)){
    $where.=" AND p.id_kecamatan='$kecamatan'";
}

if(!empty($desa)){
    $where.=" AND p.id_desa='$desa'";
}

if(!empty($jabatan)){
    $where.=" AND a.jabatan='$jabatan'";
}

if(!empty($level)){
    $where.=" AND a.level='$level'";
}

$this->db->select('a.nik,p.nama,p.alamat_jln as alamat,a.email,p.kontak,a.aktif,a.photo,j.jabatan,ds.nama as desa,kc.nama as kecamatan,kb.nama as kabupaten');
$this->db->from('anggota a')
->join('pemilih p','p.nik=a.nik')
->join('desa ds','ds.id=p.id_desa')
->join('kecamatan kc','kc.id=p.id_kecamatan')
->join('kabupaten kb','kb.id=p.id_kabupaten')
->join('jabatan j','j.id_jabatan=a.jabatan')
->where("a.level!='xx' $where");
$q=$this->db->get();
foreach($q->result() as $dt){
    if (!empty($dt->photo)){
        $photo= '<img src="'.base_url().'assets/img/anggota/200x200/'.$dt->photo.'" class="photo-table"></img>';
        }else{
            $photo= '<img src="'.base_url().'assets/images/user.png">';
        }
?>
<div class="card" style="width: 330px;height: 211px;background-color: #ece006;margin: 20px;border-radius: 9px;box-shadow: 0px 0px 6px 1px #b7b7b7;position: relative;display: flex;flex-wrap: wrap;">
  <div class="header">
      <div class="logo">
      <img src="<?=base_url()?>assets/img/logo/logo-min.png" width="90px">
      </div>
      <div class="title">
      <h5>KARTU TANDA ANGGOTA</h5>
      <p>PARTAI GOLKAR SULAWESI UTARA</p>
      </div>
  </div>
  <div class="body">
      <div class="foto">
      <?=$photo?>
      </div>
      <div class="data">
      <table>
          <tr>
          <td>Nama</td><td>:</td><td><?=$dt->nama?></td>
          </tr>
          <tr>
          <td>NIK</td><td>:</td><td><?=$dt->nik?></td>
          </tr>
          <tr>
          <td>Desa/Kelurahan</td><td>:</td><td> <?=$dt->desa?></td>
          </tr>
          <tr>
          <td>Kecamatan</td><td>:</td><td> <?=$dt->kecamatan?></td>
          </tr>
          <tr>
          <td>Kabupaten</td><td>:</td><td> <?=$dt->kabupaten?></td>
          </tr>
      </table>
      </div>
      

  </div>
  <div class="footer">
      <p>
      CALON : <b><?=$calon?></b><br>
      WAKIL : <b><?=$wakil?></b>
      </p>
  </div>
</div>

<?php
}
?>
</div>
</body>
