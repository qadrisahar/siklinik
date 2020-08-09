<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class A_pendidikan extends CI_Controller {
	function __construct() {
        parent::__construct();
				$this->load->model('m_pendidikan');
    }

		public function index()
			{
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='lginx' && $level=='mn'){
					$d['title']='Data Pendidikan'; 
                    $d['icon']='pe-7s-file';   
                    $d['content']='pendidikan/view';
                    $this->load->view('home',$d);
				}else {
				    redirect('login/logout');
				}

			}

			function get_pendidikan()
	    {

	        $list = $this->m_pendidikan->get_datatables();
	        $data = array();
	        $no = $this->input->post('start');
	        foreach ($list as $dt) {
                $no++;
	            $row = array();
	            $row[] = '<center>'.$no.'</center>';
				$row[] = $dt->pendidikan;
				$row[] =  '<center>
					<a href="#" class="btn-action edit" data-id="'.$dt->id_pendidikan.'" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-edit" aria-hidden="true"></i> Edit </a>
					<span class="btn-action btn-action-delete delete" data-id="'.$dt->id_pendidikan.'"><i class="fa fa-trash" aria-hidden="true"></i> Hapus </span>
				</center>';

	            $data[] = $row;
	        }

	        $output = array(
	            "draw" => $this->input->post('draw'),
	            "recordsTotal" => $this->m_pendidikan->count_all(),
	            "recordsFiltered" => $this->m_pendidikan->count_filtered(),
	            "data" => $data,
	        );
	        //output dalam format JSON
	        echo json_encode($output);
	    }



			public function cari_pendidikan()
				{
					$cek=$this->session->userdata('status');
					$level=$this->session->userdata('level');
					if($cek=='lginx' && $level=='mn'){
								$id['id_pendidikan'] = $this->input->post('id');
								$q=$this->db->get_where('pendidikan',$id);
								foreach ($q->result() as $dt) {
                                    $d['id']=$dt->id_pendidikan;
                                    $d['pendidikan']=$dt->pendidikan;
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
								$id['id_pendidikan'] = $key;
								$dt['pendidikan'] = $this->input->post('pendidikan');
								$dt['updated_by'] = $this->session->userdata('id_user');

								$q=$this->db->get_where('pendidikan',$id)->num_rows();
								if($q>0){
									$dt['w_update'] =date('Y-m-d H:i:s');
									$this->m_pendidikan->update($dt,$id);
									echo "Data Sukses DiUpdate";
								}else {
									$dt['id_pendidikan'] = 'PND-'.uniqid();
									$dt['w_insert'] =date('Y-m-d H:i:s');
									$this->m_pendidikan->insert($dt);
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
										$id['id_pendidikan'] = $this->input->post('id');
									    $this->m_pendidikan->delete($id);
										echo "Data Sukses Dihapus";
							}else {
								  redirect('login/logout');
							}

						}

	}

	?>
