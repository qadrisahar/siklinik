<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class A_pasien_baru extends CI_Controller {
	function __construct() {
        parent::__construct();
				$this->load->model('m_pasien');
                $this->load->library('image_lib');
    }

		public function index()
			{
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='lginx' && $level='mn'){
					$func=$this->input->get('func');
                    $d['title']='Input Pasien'; 
					$d['icon']='pe-7s-plus';       	
					$d['content']='pasien/add';
					$d['func']=$func;       	
					$this->load->view('home',$d);
				}else {
				    redirect('login/logout');
				}

			}

			public function simpan()
				{
					$cek=$this->session->userdata('status');
					$level=$this->session->userdata('level');
					if($cek=='lginx' && $level='mn'){
								date_default_timezone_set('Asia/Makassar');

								$id_pasien=$this->m_pasien->create_id();
								$nik=$this->input->post('nik');
								$nama=$this->input->post('nama');
								$jenis_kelamin=$this->input->post('jenis_kelamin');
								$alamat=$this->input->post('alamat');

								$dt['id_pasien'] = $id_pasien;
								$dt['nik'] = $nik;
								$dt['no_jkn'] = $this->input->post('no_jkn');
								$dt['nama'] = $nama;
								$dt['kontak'] = $this->input->post('kontak');
								$dt['kontak_2'] = $this->input->post('kontak_2');
								$dt['tempat_lahir'] = $this->input->post('tempat_lahir');
								$dt['tgl_lahir'] = $this->input->post('tgl_lahir');
								$dt['jenis_kelamin'] = $jenis_kelamin;
								$dt['alamat'] = $alamat;
								$dt['id_pekerjaan'] = $this->input->post('id_pekerjaan');
								$dt['id_pendidikan'] = $this->input->post('id_pendidikan');
								$dt['email'] = $this->input->post('email');
								$dt['keterangan'] = $this->input->post('keterangan');
								$dt['updated_by'] = $this->session->userdata('id_user');
								$dt['w_insert'] =date('Y-m-d H:i:s');
								$this->m_pasien->insert($dt);
								echo base64_encode($id_pasien);

								
					}else {
						  redirect('login/logout');
					}

				}

	}

	?>
