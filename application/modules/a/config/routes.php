<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*Login*/
$route['login'] = 'a/login';
$route['login/cek_login'] = 'a/login/cek_login';
$route['login/logout'] = 'a/login/logout';
/*End Login*/

$route['a_home'] = 'a/a_home';
$route['a_dashboard'] = 'a/a_dashboard';
$route['a_dashboard/check'] = 'a/a_dashboard/check';

/*Search Data*/
$route['search_data/cari_obat'] = 'a/search_data/cari_obat';
$route['search_data/cari_alkes'] = 'a/search_data/cari_alkes';
$route['search_data/data_obat_tindakan'] = 'a/search_data/data_obat_tindakan';
$route['search_data/data_alkes_tindakan'] = 'a/search_data/data_alkes_tindakan';
$route['search_data/data_tikhus_tindakan'] = 'a/search_data/data_tikhus_tindakan';
$route['search_data/data_lab_tindakan'] = 'a/search_data/data_lab_tindakan';
$route['search_data/data_lainlain_tindakan'] = 'a/search_data/data_lainlain_tindakan';
/*End Search Data*/

/*Data*/
$route['a_data'] = 'a/a_data';
$route['a_data/get_data_pasien'] = 'a/a_data/get_data_pasien';
$route['a_data/cari_detail_pasien'] = 'a/a_data/cari_detail_pasien';
/*End Data*/


/*Data Profil*/
$route['a_profil'] = 'a/a_profil';
$route['a_profil/update_profil'] = 'a/a_profil/update_profil';
$route['a_profil/update_akun'] = 'a/a_profil/update_akun';
$route['a_profil/update_image'] = 'a/a_profil/update_image';
/*End Data Profil*/

/*Pasien Baru*/
$route['a_pasien_baru'] = 'a/a_pasien_baru';
$route['a_pasien_baru/simpan'] = 'a/a_pasien_baru/simpan';
/*End Pasien Baru*/

/*Registrasi*/
$route['a_registrasi'] = 'a/a_registrasi';
$route['a_registrasi/get_data_registrasi'] = 'a/a_registrasi/get_data_registrasi';
$route['a_registrasi/simpan'] = 'a/a_registrasi/simpan';
$route['a_registrasi/add'] = 'a/a_registrasi/add';
$route['a_registrasi/ubah_status'] = 'a/a_registrasi/ubah_status';
/*End Registrasi*/


/*Admin*/
$route['a_admin'] = 'a/a_admin';
$route['a_admin/get_data_admin'] = 'a/a_admin/get_data_admin';
$route['a_admin/simpan'] = 'a/a_admin/simpan';
$route['a_admin/simpan_account'] = 'a/a_admin/simpan_account';
$route['a_admin/cari_admin'] = 'a/a_admin/cari_admin';
$route['a_admin/cari_account'] = 'a/a_admin/cari_account';
$route['a_admin/hapus'] = 'a/a_admin/hapus';
/*End Admin*/

/*Data Target*/
$route['a_setting'] = 'a/a_setting';
$route['a_setting/cari_setting'] = 'a/a_setting/cari_setting';
$route['a_setting/simpan'] = 'a/a_setting/simpan';
/*End Data Target*/

/*Cetak*/
$route['cetak/kartu_timses'] = 'a/cetak/kartu_timses';
/*End Cetak*/

/*Statistik PR*/
$route['a_statistik_pr'] = 'a/a_statistik_pr';
$route['a_statistik_pr/view'] = 'a/a_statistik_pr/view';
/*End statistik PR*/

/* layanan*/
$route['a_layanan'] = 'a/a_layanan';
$route['a_layanan/get_layanan'] = 'a/a_layanan/get_layanan';
$route['a_layanan/simpan'] = 'a/a_layanan/simpan';
$route['a_layanan/cari_layanan'] = 'a/a_layanan/cari_layanan';
$route['a_layanan/hapus'] = 'a/a_layanan/hapus';
/*End  layanan*/


/*Data layanan*/
$route['a_layanan_data'] = 'a/a_layanan_data';
$route['a_layanan_data/get_layanan_data'] = 'a/a_layanan_data/get_layanan_data';
$route['a_layanan_data/simpan'] = 'a/a_layanan_data/simpan';
$route['a_layanan_data/cari_layanan_data'] = 'a/a_layanan_data/cari_layanan_data';
$route['a_layanan_data/hapus'] = 'a/a_layanan_data/hapus';
/*End Data layanan*/

/*Detail Data layanan*/
$route['a_layanan_data_detail'] = 'a/a_layanan_data_detail';
$route['a_layanan_data_detail/get_layanan_data_detail'] = 'a/a_layanan_data_detail/get_layanan_data_detail';
$route['a_layanan_data_detail/simpan'] = 'a/a_layanan_data_detail/simpan';
$route['a_layanan_data_detail/cari_layanan_data_detail'] = 'a/a_layanan_data_detail/cari_layanan_data_detail';
$route['a_layanan_data_detail/hapus'] = 'a/a_layanan_data_detail/hapus';
/*End Detail Data layanan*/

/*Data kategori*/
$route['a_kategori'] = 'a/a_kategori';
$route['a_kategori/get_kategori'] = 'a/a_kategori/get_kategori';
$route['a_kategori/simpan'] = 'a/a_kategori/simpan';
$route['a_kategori/cari_kategori'] = 'a/a_kategori/cari_kategori';
$route['a_kategori/hapus'] = 'a/a_kategori/hapus';
/*End Data kategori*/

/*Data obat*/
$route['a_obat'] = 'a/a_obat';
$route['a_obat/get_obat'] = 'a/a_obat/get_obat';
$route['a_obat/simpan'] = 'a/a_obat/simpan';
$route['a_obat/cari_obat'] = 'a/a_obat/cari_obat';
$route['a_obat/hapus'] = 'a/a_obat/hapus';
/*End Data obat*/

/*Data satuan*/
$route['a_satuan'] = 'a/a_satuan';
$route['a_satuan/get_satuan'] = 'a/a_satuan/get_satuan';
$route['a_satuan/simpan'] = 'a/a_satuan/simpan';
$route['a_satuan/cari_satuan'] = 'a/a_satuan/cari_satuan';
$route['a_satuan/hapus'] = 'a/a_satuan/hapus';
/*End Data satuan*/

/*Data pendidikan*/
$route['a_pendidikan'] = 'a/a_pendidikan';
$route['a_pendidikan/get_pendidikan'] = 'a/a_pendidikan/get_pendidikan';
$route['a_pendidikan/simpan'] = 'a/a_pendidikan/simpan';
$route['a_pendidikan/cari_pendidikan'] = 'a/a_pendidikan/cari_pendidikan';
$route['a_pendidikan/hapus'] = 'a/a_pendidikan/hapus';
/*End Data pendidikan*/

/*Data pekerjaan*/
$route['a_pekerjaan'] = 'a/a_pekerjaan';
$route['a_pekerjaan/get_pekerjaan'] = 'a/a_pekerjaan/get_pekerjaan';
$route['a_pekerjaan/simpan'] = 'a/a_pekerjaan/simpan';
$route['a_pekerjaan/cari_pekerjaan'] = 'a/a_pekerjaan/cari_pekerjaan';
$route['a_pekerjaan/hapus'] = 'a/a_pekerjaan/hapus';
/*End Data pekerjaan*/

/*Data Stok*/
$route['a_data_stok'] = 'a/a_data_stok';
$route['a_data_stok/get_data_stok'] = 'a/a_data_stok/get_data_stok';
/*End Data Stok*/

/*Data stok_awal*/
$route['a_stok_awal'] = 'a/a_stok_awal';
$route['a_stok_awal/get_stok_awal'] = 'a/a_stok_awal/get_stok_awal';
$route['a_stok_awal/simpan'] = 'a/a_stok_awal/simpan';
$route['a_stok_awal/cari_stok_awal'] = 'a/a_stok_awal/cari_stok_awal';
$route['a_stok_awal/hapus'] = 'a/a_stok_awal/hapus';
/*End Data stok_awal*/

/*Data Stok Masuk*/
$route['a_stok_masuk'] = 'a/a_stok_masuk';
$route['a_stok_masuk/add'] = 'a/a_stok_masuk/add';
$route['a_stok_masuk/get_stok_masuk'] = 'a/a_stok_masuk/get_stok_masuk';
$route['a_stok_masuk/simpan'] = 'a/a_stok_masuk/simpan';
$route['a_stok_masuk/cari_stok_masuk'] = 'a/a_stok_masuk/cari_stok_masuk';
$route['a_stok_masuk/hapus'] = 'a/a_stok_masuk/hapus';
/*End Data Stok Masuk*/

/*Data Stok Keluar*/
$route['a_stok_keluar'] = 'a/a_stok_keluar';
$route['a_stok_keluar/add'] = 'a/a_stok_keluar/add';
$route['a_stok_keluar/get_stok_keluar'] = 'a/a_stok_keluar/get_stok_keluar';
$route['a_stok_keluar/simpan'] = 'a/a_stok_keluar/simpan';
$route['a_stok_keluar/cari_stok_keluar'] = 'a/a_stok_keluar/cari_stok_keluar';
$route['a_stok_keluar/hapus'] = 'a/a_stok_keluar/hapus';
/*End Data Stok Keluar*/

/*Cetak*/
$route['cetak/pasien'] = 'a/cetak/pasien';
$route['cetak/pasien'] = 'a/cetak/pasien';
$route['cetak/antrian'] = 'a/cetak/antrian';
/*End Cetak*/

/*Data unit*/
$route['a_unit'] = 'a/a_unit';
$route['a_unit/get_unit'] = 'a/a_unit/get_unit';
$route['a_unit/simpan'] = 'a/a_unit/simpan';
$route['a_unit/cari_unit'] = 'a/a_unit/cari_unit';
$route['a_unit/hapus'] = 'a/a_unit/hapus';
/*End Data unit*/

/*Tindakan Belum Dieksekusi*/
$route['a_tindakan_neks'] = 'a/a_tindakan_neks';
$route['a_tindakan_neks/get_tindakan_neks'] = 'a/a_tindakan_neks/get_tindakan_neks';
$route['a_tindakan_neks/cari_tindakan_neks'] = 'a/a_tindakan_neks/cari_tindakan_neks';
/*End Tindakan Belum Dieksekusi*/

/*Tindakan Dieksekusi*/
$route['a_tindakan_eks'] = 'a/a_tindakan_eks';
$route['a_tindakan_eks/get_tindakan_eks'] = 'a/a_tindakan_eks/get_tindakan_eks';
$route['a_tindakan_eks/cari_tindakan_eks'] = 'a/a_tindakan_eks/cari_tindakan_eks';
/*End Tindakan Dieksekusi*/

/* tindakan*/
$route['a_tindakan'] = 'a/a_tindakan';
$route['a_tindakan/get_tindakan'] = 'a/a_tindakan/get_tindakan';
$route['a_tindakan/simpan'] = 'a/a_tindakan/simpan';
$route['a_tindakan/simpan_obat'] = 'a/a_tindakan/simpan_obat';
$route['a_tindakan/simpan_alkes'] = 'a/a_tindakan/simpan_alkes';
$route['a_tindakan/simpan_tikhus'] = 'a/a_tindakan/simpan_tikhus';
$route['a_tindakan/simpan_lab'] = 'a/a_tindakan/simpan_lab';
$route['a_tindakan/simpan_lainlain'] = 'a/a_tindakan/simpan_lainlain';
$route['a_tindakan/hapus_obat'] = 'a/a_tindakan/hapus_obat';
$route['a_tindakan/hapus_alkes'] = 'a/a_tindakan/hapus_alkes';
$route['a_tindakan/hapus_tikhus'] = 'a/a_tindakan/hapus_tikhus';
$route['a_tindakan/hapus_lab'] = 'a/a_tindakan/hapus_lab';
$route['a_tindakan/hapus_lainlain'] = 'a/a_tindakan/hapus_lainlain';
$route['a_tindakan/hapus'] = 'a/a_tindakan/hapus';
$route['a_tindakan/proses_to_kasir'] = 'a/a_tindakan/proses_to_kasir';
/*End  tindakan*/

/* pembayaran*/
$route['a_pembayaran'] = 'a/a_pembayaran';
$route['a_pembayaran/proses_selesai'] = 'a/a_pembayaran/proses_selesai';
$route['a_pembayaran/cetak_kwitansi'] = 'a/a_pembayaran/cetak_kwitansi';
/*End  pembayaran*/


/*Data kategori alkes*/
$route['a_kategori_alkes'] = 'a/a_kategori_alkes';
$route['a_kategori_alkes/get_kategori_alkes'] = 'a/a_kategori_alkes/get_kategori_alkes';
$route['a_kategori_alkes/simpan'] = 'a/a_kategori_alkes/simpan';
$route['a_kategori_alkes/cari_kategori_alkes'] = 'a/a_kategori_alkes/cari_kategori_alkes';
$route['a_kategori_alkes/hapus'] = 'a/a_kategori_alkes/hapus';
/*End Data kategori alkes*/

/*Data satuan alkes*/
$route['a_satuan_alkes'] = 'a/a_satuan_alkes';
$route['a_satuan_alkes/get_satuan_alkes'] = 'a/a_satuan_alkes/get_satuan_alkes';
$route['a_satuan_alkes/simpan'] = 'a/a_satuan_alkes/simpan';
$route['a_satuan_alkes/cari_satuan_alkes'] = 'a/a_satuan_alkes/cari_satuan_alkes';
$route['a_satuan_alkes/hapus'] = 'a/a_satuan_alkes/hapus';
/*End Data satuan alkes*/

/*Data unit alkes*/
$route['a_unit_alkes'] = 'a/a_unit_alkes';
$route['a_unit_alkes/get_unit_alkes'] = 'a/a_unit_alkes/get_unit_alkes';
$route['a_unit_alkes/simpan'] = 'a/a_unit_alkes/simpan';
$route['a_unit_alkes/cari_unit_alkes'] = 'a/a_unit_alkes/cari_unit_alkes';
$route['a_unit_alkes/hapus'] = 'a/a_unit_alkes/hapus';
/*End Data unit alkes*/

/*Data obat_alkes*/
$route['a_alkes'] = 'a/a_alkes';
$route['a_alkes/get_alkes'] = 'a/a_alkes/get_alkes';
$route['a_alkes/simpan'] = 'a/a_alkes/simpan';
$route['a_alkes/cari_alkes'] = 'a/a_alkes/cari_alkes';
$route['a_alkes/hapus'] = 'a/a_alkes/hapus';
/*End Data obat_alkes*/

/*Data Stok Alkes*/
$route['a_data_stok_alkes'] = 'a/a_data_stok_alkes';
$route['a_data_stok_alkes/get_data_stok_alkes'] = 'a/a_data_stok_alkes/get_data_stok_alkes';
/*End Data Stok Alkes*/

/*Data Stok Masuk Alkes*/
$route['a_stok_masuk_alkes'] = 'a/a_stok_masuk_alkes';
$route['a_stok_masuk_alkes/add'] = 'a/a_stok_masuk_alkes/add';
$route['a_stok_masuk_alkes/get_stok_masuk_alkes'] = 'a/a_stok_masuk_alkes/get_stok_masuk_alkes';
$route['a_stok_masuk_alkes/simpan'] = 'a/a_stok_masuk_alkes/simpan';
$route['a_stok_masuk_alkes/cari_stok_masuk_alkes'] = 'a/a_stok_masuk_alkes/cari_stok_masuk_alkes';
$route['a_stok_masuk_alkes/hapus'] = 'a/a_stok_masuk_alkes/hapus';
/*End Data Stok Masuk Alkes*/

/*Data Stok Keluar Alkes*/
$route['a_stok_keluar_alkes'] = 'a/a_stok_keluar_alkes';
$route['a_stok_keluar_alkes/add'] = 'a/a_stok_keluar_alkes/add';
$route['a_stok_keluar_alkes/get_stok_keluar_alkes'] = 'a/a_stok_keluar_alkes/get_stok_keluar_alkes';
$route['a_stok_keluar_alkes/simpan'] = 'a/a_stok_keluar_alkes/simpan';
$route['a_stok_keluar_alkes/cari_stok_keluar_alkes'] = 'a/a_stok_keluar_alkes/cari_stok_keluar_alkes';
$route['a_stok_keluar_alkes/hapus'] = 'a/a_stok_keluar_alkes/hapus';
/*End Data Stok Keluar Alkes*/

/*Pembayaran Belum Dieksekusi*/
$route['a_pembayaran_neks'] = 'a/a_pembayaran_neks';
$route['a_pembayaran_neks/get_pembayaran_neks'] = 'a/a_pembayaran_neks/get_pembayaran_neks';
$route['a_pembayaran_neks/cari_pembayaran_neks'] = 'a/a_pembayaran_neks/cari_pembayaran_neks';
/*End Pembayaran Belum Dieksekusi*/

/*Data Pasien*/
$route['a_data_pasien'] = 'a/a_data_pasien';
$route['a_data_pasien/get_data_pasien'] = 'a/a_data_pasien/get_data_pasien';
$route['a_data_pasien/simpan'] = 'a/a_data_pasien/simpan';
$route['a_data_pasien/cari_data_pasien'] = 'a/a_data_pasien/cari_data_pasien';
$route['a_data_pasien/hapus'] = 'a/a_data_pasien/hapus';
/*End Data Pasien*/

/*Data Pasien*/
$route['a_detail_pasien'] = 'a/a_detail_pasien';
$route['a_detail_pasien/get_detail_pasien'] = 'a/a_detail_pasien/get_detail_pasien';
$route['a_detail_pasien/cari_detail_pasien'] = 'a/a_detail_pasien/cari_detail_pasien';
/*End Data Pasien*/


/*Data stok kritis alkes*/
$route['a_stok_kritis_alkes'] = 'a/a_stok_kritis_alkes';
$route['a_stok_kritis_alkes/get_stok_kritis_alkes'] = 'a/a_stok_kritis_alkes/get_stok_kritis_alkes';
/*End Data stok kritis alkes*/

/*Data stok kritis obat*/
$route['a_stok_kritis_obat'] = 'a/a_stok_kritis_obat';
$route['a_stok_kritis_obat/get_stok_kritis_obat'] = 'a/a_stok_kritis_obat/get_stok_kritis_obat';
/*End Data stok kritis obat*/
