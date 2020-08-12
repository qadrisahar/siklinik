<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class A_data_pasien extends CI_Controller {
	function __construct() {
        parent::__construct();
				$this->load->model('m_data_pasien');
    }

		public function index()
			{
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='lginx' && $level=='mn'){
					$d['title']='Data Pasien'; 
                    $d['icon']='pe-7s-user';   
                    $d['content']='data_pasien/view';  
                    $this->load->view('home',$d);
				}else {
				    redirect('login/logout');
				}

			}

			function get_data_pasien()
	    {

	        $list = $this->m_data_pasien->get_datatables();
	        $data = array();
	        $no = $this->input->post('start');
	        foreach ($list as $dt) {
                $no++;
	            $row = array();
	            $row[] = '<center>'.$no.'<center>';
				  		$row[] = ''.$dt->id_pasien.'';
				  		$row[] = ''.$dt->nama.'';
				  		$row[] = ''.$dt->nik.'';
				  		$row[] = ''.$dt->jenis_kelamin.'';
				  		$row[] = ''.$dt->alamat.'';
							$row[] =  '<center>
							<a href="#" class="btn-action edit" data-id="'.$dt->id_pasien.'" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-edit" aria-hidden="true"></i> Edit </a>
							<a href="'.base_url().'a_detail_pasien?id='.base64_encode($dt->id_pasien).'" class="btn-action btn-action-warning"><i class="fa fa-eye" aria-hidden="true"></i> Detail Pasien </a>
							<span class="btn-action btn-action-delete delete" data-id="'.$dt->id_pasien.'"><i class="fa fa-trash" aria-hidden="true"></i> Hapus </span>
							</center>';

	            $data[] = $row;
	        }

	        $output = array(
	            "draw" => $this->input->post('draw'),
	            "recordsTotal" => $this->m_data_pasien->count_all(),
	            "recordsFiltered" => $this->m_data_pasien->count_filtered(),
	            "data" => $data,
	        );
	        //output dalam format JSON
	        echo json_encode($output);
	    }



			public function cari_data_pasien()
				{
					$cek=$this->session->userdata('status');
					$level=$this->session->userdata('level');
					if($cek=='lginx' && $level=='mn'){
								$id['id_pasien'] = $this->input->post('id');
								$q=$this->db->get_where('pasien',$id);
								foreach ($q->result() as $dt) {
                                    $d['id']=$dt->id_pasien;
                                    $d['nama']=$dt->nama;
                                    $d['nik']=$dt->nik;
                                    $d['jenis_kelamin']=$dt->jenis_kelamin;
                                    $d['alamat']=$dt->alamat;
                                    $d['email']=$dt->email;
                                    $d['tempat_lahir']=$dt->tempat_lahir;
                                    $d['tgl_lahir']=$dt->tgl_lahir;
                                    $d['kontak']=$dt->kontak;
                                    $d['kontak_2']=$dt->kontak_2;
                                    $d['keterangan']=$dt->keterangan;
                                    $d['no_jkn']=$dt->no_jkn;
                                    $d['id_pekerjaan']=$dt->id_pekerjaan;
                                    $d['id_pendidikan']=$dt->id_pendidikan;
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
					if($cek=='lginx' && $level=='mn'){
						    error_reporting(0);
								date_default_timezone_set('Asia/Makassar');
								$key=$this->input->post('id');
								$id['id_pasien'] = $key;
								$dt['nama'] = $this->input->post('nama');
								$dt['nik'] = $this->input->post('nik');
								$dt['no_jkn'] = $this->input->post('no_jkn');
								$dt['jenis_kelamin'] = $this->input->post('jenis_kelamin');
								$dt['alamat'] = $this->input->post('alamat');
								$dt['email'] = $this->input->post('email');
								$dt['tempat_lahir'] = $this->input->post('tempat_lahir');
								$dt['tgl_lahir'] = $this->input->post('tgl_lahir');
								$dt['kontak'] = $this->input->post('kontak');
								$dt['kontak_2'] = $this->input->post('kontak_2');
								$dt['id_pekerjaan'] = $this->input->post('id_pekerjaan');
								$dt['id_pendidikan'] = $this->input->post('id_pendidikan');
								$dt['keterangan'] = $this->input->post('keterangan');
								$dt['updated_by'] = $this->session->userdata('id_user');

								$q=$this->db->get_where('pasien',$id)->num_rows();
								if($q>0){
									$dt['w_update'] =date('Y-m-d H:i:s');
									$this->m_data_pasien->update($dt,$id);
									echo "Data Sukses DiUpdate";
								}else {
                                    $dt['id_pasien'] = $id_pasien;
									$dt['w_insert'] =date('Y-m-d H:i:s');
									$this->m_data_pasien->insert($dt);
									echo "Data Sukses DiSimpan";
								}
					}else {
						  redirect('login/logout');
					}

				}


					public function hapus()
						{
							error_reporting(0);
							$cek=$this->session->userdata('status');
							$level=$this->session->userdata('level');
							if($cek=='lginx' && $level=='mn'){
										$id['id_pasien'] = $this->input->post('id');
									    $this->m_data_pasien->delete($id);
										echo "Data Sukses Dihapus";
							}else {
								  redirect('login/logout');
							}

						}

	}

	?>
