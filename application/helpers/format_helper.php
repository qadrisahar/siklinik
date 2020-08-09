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
