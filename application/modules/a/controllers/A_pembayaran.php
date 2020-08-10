<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class A_pembayaran extends CI_Controller {
	function __construct() {
		parent::__construct();
    }

		public function index()
			{
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='lginx' && $level=='mn'){
					$no_registrasi=base64_decode($this->input->get('id'));
					$d['title']='Pembayaran <b>'.$no_registrasi.'</b>'; 
                    $d['icon']='pe-7s-plugin';   
					$d['content']='pembayaran/view';
					$d['no_registrasi']=$no_registrasi;
					$d['database']=$this->db->database;
					$q=$this->db->where('no_registrasi',$no_registrasi)->get('registrasi');
					foreach($q->result() as $dt){
						$qp=$this->db->select('*')->where('id_pasien',$dt->id_pasien)->get('pasien');
						foreach($qp->result() as $dp){
							$d['nama_pasien']=$dp->nama;
							$d['ttl']=$dp->tempat_lahir.', '.todate2($dp->tgl_lahir);
							$d['jk_umur']=$dp->jenis_kelamin.'/'.hitung_umur($dp->tgl_lahir);
						}
						$d['w_insert']=datetime2($dt->w_insert);
						$d['jenis_layanan']=$this->db->select('layanan')->where('id_layanan',$dt->id_layanan)->get('layanan')->row()->layanan;
						$d['id_layanan']=$dt->id_layanan;
					}

                    $this->load->view('home',$d);
				}else {
				    redirect('login/logout');
				}

			}

						public function proses_selesai()
						{
							error_reporting(0);
							$cek=$this->session->userdata('status');
							$level=$this->session->userdata('level');
							if($cek=='lginx' && $level=='mn'){
										$id['no_registrasi'] = $this->input->post('id');
										$dt['bayar']='n';
										$this->db->update('registrasi',$dt,$id);
										echo "Data Telah Diteruskan Ke Kasir";
							}else {
								  redirect('login/logout');
							}

						}

						public function cetak_kwitansi()
			{
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='lginx' && $level=='mn'){
					$no_kwitansi=base64_decode($this->input->get('id'));
					$d['title']='Cetak Kwitansi <b>'.$no_kwitansi.'</b>'; 
                    $d['icon']='pe-7s-print';   
					$d['content']='cetak/kwitansi';
					$d['no_kwitansi']=$no_kwitansi;
					$d['database']=$this->db->database;
                    $this->load->view('home',$d);
				}else {
				    redirect('login/logout');
				}

			}

	}

	?>
