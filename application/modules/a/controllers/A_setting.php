<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class A_setting extends CI_Controller {
	function __construct() {
        parent::__construct();
				$this->load->model('m_setting');
    }

		public function index()
			{
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='lginx' && $level=='ad'){
                    $d['title']='Setting'; 
                    $d['icon']='pe-7s-settings';       
                    $d['content']='setting/view';
                    $this->load->view('home',$d);
				}else {
				    redirect('login/logout');
				}

			}

			public function cari_setting()
				{
					$cek=$this->session->userdata('status');
					$level=$this->session->userdata('level');
					if($cek=='lginx' && $level=='ad'){
								$id['id'] = 'setting';
								$q=$this->db->get_where('setting',$id);
								foreach ($q->result() as $dt) {
									$d['tgl_pemilu']=$dt->tgl_pemilu;
									$d['calon']=$dt->calon;
									$d['wakil']=$dt->wakil;
									$d['pemilih']=$dt->pemilih;
                                    $d['provinsi']=$dt->provinsi;
                                    $d['kabupaten']=$dt->kabupaten;
                                    $d['kecamatan']=$dt->kecamatan;
                                    $d['desa']=$dt->desa;
                                }
								echo json_encode($d);
					}else {
						  redirect('login/logout');
					}

				}			

			public function simpan()
				{
					$cek=$this->session->userdata('status');
					$level=$this->session->userdata('level');
					if($cek=='lginx' && $level=='ad'){
						    // error_reporting(0);
								date_default_timezone_set('Asia/Makassar');
								$id['id'] = 'setting';
								$dt['tgl_pemilu'] = $this->input->post('tgl_pemilu');
								$dt['calon'] = $this->input->post('calon');
								$dt['wakil'] = $this->input->post('wakil');
								$dt['pemilih'] = $this->input->post('pemilih');
								$dt['provinsi'] = $this->input->post('provinsi');
								$dt['kabupaten'] = $this->input->post('kabupaten');
								$dt['kecamatan'] = $this->input->post('kecamatan');
                                $dt['desa'] = $this->input->post('desa');
                                $dt['w_update']=date('Y-m-d H:i:s');
                                $dt['updated_by']=$this->session->userdata('id_user');
                                $this->m_setting->update($dt,$id);
					}else {
						  redirect('login/logout');
					}

				}
				

	}

	?>
