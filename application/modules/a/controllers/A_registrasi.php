<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class A_registrasi extends CI_Controller {
	function __construct() {
        parent::__construct();
				$this->load->model('m_registrasi');
	}
	
	public function index()
			{
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='lginx' && $level='mn'){
					$func=$this->input->get('func');
                    $d['title']='Daftar Registrasi'; 
					$d['icon']='pe-7s-menu';       	
					$d['content']='registrasi/view';
					$d['func']=$func;
					$this->load->view('home',$d);
				}else {
				    redirect('login/logout');
				}

			}

		public function add()
			{
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='lginx' && $level='mn'){
					$id_pasien=$this->input->get('p');
					if($id_pasien=='0'){
						$id_pasien='';
						$nama='';
						$nik='';
						$no_jkn='';
						$jenis_kelamin='';
						$usia='';
						$ttl='';
						$alamat='';
					}else{
						$id_pasien=base64_decode($id_pasien);
						$q=$this->db->where('id_pasien',$id_pasien)->get('pasien');
						foreach($q->result() as $dt){
							$nama=$dt->nama;
							$nik=$dt->nik;
							$no_jkn=$dt->no_jkn;
							$jenis_kelamin=$dt->jenis_kelamin;
							$usia=hitung_umur($dt->tgl_lahir);
							$ttl=$dt->tempat_lahir.', '.todate2($dt->tgl_lahir);
							$alamat=$dt->alamat;
						}

					}
					$d['id_pasien']=$id_pasien;
					$d['nama']=$nama;
					$d['nik']=$nik;
					$d['no_jkn']=$no_jkn;
					$d['jenis_kelamin']=$jenis_kelamin;
					$d['usia']=$usia;
					$d['ttl']=$ttl;
					$d['alamat']=$alamat;

                    $d['title']='Registrasi Pasien'; 
					$d['icon']='pe-7s-note';       	
					$d['content']='registrasi/add';
					$this->load->view('home',$d);
				}else {
				    redirect('login/logout');
				}

			}

			

			function get_data_registrasi()
	    {

			$func=$this->input->post('func');
			$status_filter=base64_decode($this->input->post('status'));
			$tgl_awal_filter=base64_decode($this->input->post('tgl_awal'));
			$tgl_akhir_filter=base64_decode($this->input->post('tgl_akhir'));
	        $list = $this->m_registrasi->get_datatables($status_filter,$tgl_awal_filter,$tgl_akhir_filter);
	        $data = array();
	        $no = $this->input->post('start');
	        foreach ($list as $dt) {
				if($dt->cancel=='y'){
					$cancel='<span class="badge badge-danger">Batal</span>';
				}else{
					$cancel='<span class="badge badge-success">Tidak</span>';
				}
				if($func=='cancel'){
					$aksi='<center>
						<a href="#" class="btn-action detail" data-id="'.$dt->no_registrasi.'" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-eye" aria-hidden="true"></i> Detail </a>
						<span class="btn-action btn-action-delete cancel" data-id="'.$dt->no_registrasi.'"><i class="fa fa-trash" aria-hidden="true"></i> Batalkan </span>
					</center>';
				}else{
					$aksi='<center>
						<a href="#" class="btn-action detail" data-id="'.$dt->no_registrasi.'" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-eye" aria-hidden="true"></i> Detail </a>
						<a href="'.base_url().'cetak/antrian?x='.base64_encode($dt->no_registrasi).'" class="btn-action btn-action-warning print" data-id="'.$dt->no_registrasi.'"><i class="fa fa-print" aria-hidden="true"></i> Cetak </a>
					</center>';
				}
                $no++;
	            $row = array();
	            $row[] = '<center>'.$no.'</center>';
				$row[] = $dt->no_registrasi;
				$row[] = '<center>'.$dt->no_antrian.'</center>';
				$row[] = $dt->id_pasien;
				$row[] = $dt->nama;
				$row[] = $dt->nik;
				$row[] = '<center>'.$dt->jenis_kelamin.'</center>';
				$row[] = '<center>'.hitung_umur($dt->tgl_lahir).'</center>';
				$row[] = $dt->layanan;
				$row[] = '<center>'.$cancel.'</center>';
				$row[] =  $aksi;

	            $data[] = $row;
	        }

	        $output = array(
	            "draw" => $this->input->post('draw'),
	            "recordsTotal" => $this->m_registrasi->count_all(),
	            "recordsFiltered" => $this->m_registrasi->count_filtered($status_filter,$tgl_awal_filter,$tgl_akhir_filter),
	            "data" => $data,
	        );
	        //output dalam format JSON
	        echo json_encode($output);
		}
		
			public function simpan()
				{
					$cek=$this->session->userdata('status');
					$level=$this->session->userdata('level');
					if($cek=='lginx' && $level='mn'){
								date_default_timezone_set('Asia/Makassar');

								$no_registrasi=$this->m_registrasi->create_id();
								$id_pasien=$this->input->post('id_pasien');
								$id_layanan=$this->input->post('id_layanan');
								$art=explode('-',$no_registrasi);
								$dt['no_registrasi'] = $no_registrasi;
								$dt['id_pasien'] = $id_pasien;
								$dt['id_layanan'] = $id_layanan;
								$dt['no_antrian'] = $art[2];
								$dt['updated_by'] = $this->session->userdata('id_user');
								$dt['w_insert'] =date('Y-m-d H:i:s');
								$this->m_registrasi->insert($dt);
								echo $no_registrasi;								
					}else {
							redirect('login/logout');
					}

				}

				public function ubah_status()
						{
							// error_reporting(0);
							$cek=$this->session->userdata('status');
							$level=$this->session->userdata('level');
							if($cek=='lginx' && $level=='mn'){
								$id['no_registrasi'] = $this->input->post('id');
								$dt['cancel'] = 'y';
								$this->m_registrasi->update($dt,$id);
								echo "Data Sukses Diupdate";
							}else {
								  redirect('login/logout');
							}

						}

	}

	?>