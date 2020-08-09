<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class A_identitas extends CI_Controller {
	function __construct() {
        parent::__construct();
				$this->load->model('m_identitas');
    }

		public function index()
			{
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='lginx' && $level=='ad'){
                    $d['title']='Identitas Polisi'; 
                    $d['icon']='pe-7s-display2';       
					$this->load->view('identitas/view',$d);
				}else {
				    redirect('login/logout');
				}

			}

			public function cari_identitas()
				{
					$cek=$this->session->userdata('status');
					$level=$this->session->userdata('level');
					if($cek=='lginx' && $level=='ad'){
								$id['id'] = 'identitas';
								$q=$this->db->get_where('identitas',$id);
								$provinsi_show='';
								$kabupaten_show='';
								foreach ($q->result() as $dt) {
									$provinsi=$this->db->select('nama')->where('id',$dt->id_provinsi)->get('provinsi');
									if(($provinsi->num_rows())>0){
										$provinsi_show.='<option value="'.$dt->id_provinsi.'" selected>'.$provinsi->row()->nama.'</option>';
									}
									$kabupaten=$this->db->select('nama')->where('id',$dt->id_kabupaten)->get('kabupaten');					
									if(($kabupaten->num_rows())>0){
										$kabupaten_show.='<option value="'.$dt->id_kabupaten.'" selected>'.$kabupaten->row()->nama.'</option>';
									}
									$d['nama']=$dt->nama;
                                    $d['id_kabupaten']=$kabupaten_show;
                                    $d['id_provinsi']=$provinsi_show;
                                    $d['telepone']=$dt->telp;
                                    $d['alamat']=$dt->alamat;
                                    $d['email']=$dt->email;
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
								$id['id'] = 'identitas';
								$dt['nama'] = $this->input->post('nama');
								$dt['id_kabupaten'] = $this->input->post('id_kabupaten');
								$dt['id_provinsi'] = $this->input->post('id_provinsi');
								$dt['telp'] = $this->input->post('telepone');
								$dt['alamat'] = $this->input->post('alamat');
								$dt['email'] = $this->input->post('email');
                                $this->m_identitas->update($dt,$id);
					}else {
						  redirect('login/logout');
					}

				}
				

	}

	?>
