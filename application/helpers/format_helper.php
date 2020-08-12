<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function toRp($angka)
{
 $rp = number_format($angka,0,',','.');
 return $rp;
}

function RptoDb($angka)
{
 $db = (int)str_replace('.', '', $angka);
 return $db;
}

function datetime($datetime)
{
  $datetime = DateTime::createFromFormat('Y-m-d H:i:s', $datetime);
  return $datetime->format('d-m-Y H:i:s');
}

function datetime2($datetime)
{
  $datetime = DateTime::createFromFormat('Y-m-d H:i:s', $datetime);
  return $datetime->format('d/m/Y H:i:s');
}

function tosql($tgl)
{
  if(empty($tgl)){
    return null;
  }else{
    $x = explode('-',$tgl);
    return $x[2].'-'.$x[1].'-'.$x[0];
  }
}

function tosql2($tgl)
{
  $tgl = DateTime::createFromFormat('d/m/Y', $tgl);
  return $tgl->format('Y-m-d');
}

function exp1($s)
{
  if(empty($s)){
    return null;
  }else{
    $x = explode('-',$s);
    return $x[1];
  }
}

function todate($tgl)
{
  $tgl = DateTime::createFromFormat('Y-m-d', $tgl);
  return $tgl->format('d-m-Y');
}

function todate2($tgl)
{
  $tgl = DateTime::createFromFormat('Y-m-d', $tgl);
  return $tgl->format('d/m/Y');
}

function FourD($angka)
{
 $fd = round($angka,4);
 return $fd;
}

function hitung_umur($tanggal_lahir){
	$birthDate = new DateTime($tanggal_lahir);
	$today = new DateTime("today");
	if ($birthDate > $today) { 
	    exit("0 tahun 0 bulan 0 hari");
	}
	$y = $today->diff($birthDate)->y;
	$m = $today->diff($birthDate)->m;
	$d = $today->diff($birthDate)->d;
	return $y." tahun ".$m." bulan ".$d." hari";
}

function penyebut($nilai) {
  $nilai = abs($nilai);
  $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
  $temp = "";
  if ($nilai < 12) {
    $temp = " ". $huruf[$nilai];
  } else if ($nilai <20) {
    $temp = penyebut($nilai - 10). " belas";
  } else if ($nilai < 100) {
    $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
  } else if ($nilai < 200) {
    $temp = " seratus" . penyebut($nilai - 100);
  } else if ($nilai < 1000) {
    $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
  } else if ($nilai < 2000) {
    $temp = " seribu" . penyebut($nilai - 1000);
  } else if ($nilai < 1000000) {
    $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
  } else if ($nilai < 1000000000) {
    $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
  } else if ($nilai < 1000000000000) {
    $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
  } else if ($nilai < 1000000000000000) {
    $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
  }     
  return $temp;
}

function terbilang($nilai) {
  if($nilai<0) {
    $hasil = "minus ". trim(penyebut($nilai));
  } else {
    $hasil = trim(penyebut($nilai));
  }     		
  return $hasil;
}

function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

function toMonth($m)
{
  $bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
  );
  return $bulan[$m];
}
