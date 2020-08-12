<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class A_pembayaran extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('m_pembayaran');
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
						$ql=$this->db->select('layanan,harga')->where('id_layanan',$dt->id_layanan)->get('layanan')->row();
						$d['jenis_layanan']=$ql->layanan;
						$d['harga_layanan']=$ql->harga;
						$d['id_layanan']=$dt->id_layanan;
						$d['tgl_masuk']=todate2($dt->tgl_masuk);
						$d['tgl_keluar']=todate2($dt->tgl_keluar);
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
										$no_registrasi=$this->input->post('id');
										$total=RptoDb($this->input->post('total'));
										$id['no_registrasi'] = $no_registrasi;
										$dr['bayar']='y';

										$no_pembayaran=$this->m_pembayaran->create_id();
										$dt['no_pembayaran'] = $no_pembayaran;
										$dt['no_registrasi'] = $no_registrasi;
										$dt['total'] = $total;
										$dt['updated_by'] = $this->session->userdata('id_user');
										$dt['w_insert'] =date('Y-m-d H:i:s');
										$this->m_pembayaran->insert($dt);
										$this->db->update('registrasi',$dr,$id);
										$output['id']=$no_pembayaran;
										$output['id2']=$no_registrasi;
										echo json_encode($output);
							}else {
								  redirect('login/logout');
							}

						}

			public function cetak_kwitansi()
			{
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='lginx' && $level=='mn'){
					$no_pembayaran=base64_decode($this->input->get('id'));
					$no_registrasi=base64_decode($this->input->get('id2'));
					$d['title']='Cetak Kwitansi <b>'.$no_pembayaran.'</b>'; 
                    $d['icon']='pe-7s-print';   
					$d['content']='cetak/kwitansi';
					$d['no_pembayaran']=$no_pembayaran;
					$d['no_registrasi']=$no_registrasi;
					$d['d_pmb']=$this->db->select('total,DATE(w_insert) as tgl')->where('no_pembayaran',$no_pembayaran)->get('pembayaran')->row();
					$q=$this->db->select('id_pasien,tgl_masuk,tgl_keluar,id_layanan')->where('no_registrasi',$no_registrasi)->get('registrasi');
					foreach($q->result() as $dt){
						$qp=$this->db->select('nama,alamat,tgl_lahir')->where('id_pasien',$dt->id_pasien)->get('pasien');
						foreach($qp->result() as $dp){
							$d['nama_pasien']=$dp->nama;
							$d['alamat']=$dp->alamat;
							$d['umur']=hitung_umur($dp->tgl_lahir);
						}
						$d['tgl_masuk']=tgl_indo($dt->tgl_masuk);
						$d['tgl_keluar']=tgl_indo($dt->tgl_keluar);
						$ql=$this->db->select('layanan,harga')->where('id_layanan',$dt->id_layanan)->get('layanan')->row();
						$d['jenis_layanan']=$ql->layanan;
						$d['harga_layanan']=$ql->harga;
					}
					$d['tikhus']=$this->db->select('tindakan_khusus,total')->where('no_registrasi',$no_registrasi)->get('layanan_tindakan_khusus')->result();
					$d['obat']=$this->db->select('lo.total,lo.keterangan,lo.jumlah,o.nama_obat')->join('obat o','o.kode_obat=lo.kode_obat')->where('lo.no_registrasi',$no_registrasi)->get('layanan_obat lo')->result();
                    $d['alkes']=$this->db->select('lo.total,lo.keterangan,lo.jumlah,o.nama_alkes')->join('alkes o','o.kode_alkes=lo.kode_alkes')->where('lo.no_registrasi',$no_registrasi)->get('layanan_alkes lo')->result();
					$d['lab']=$this->db->select('laboratorium,total')->where('no_registrasi',$no_registrasi)->get('layanan_lab')->result();
					$d['lainlain']=$this->db->select('lainlain,total')->where('no_registrasi',$no_registrasi)->get('layanan_lainlain')->result();
					$this->load->view('home',$d);
				}else {
				    redirect('login/logout');
				}

			}

	}

	?>
