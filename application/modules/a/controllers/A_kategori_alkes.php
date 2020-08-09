<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class A_kategori_alkes extends CI_Controller {
	function __construct() {
        parent::__construct();
				$this->load->model('m_kategori_alkes');
    }

		public function index()
			{
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='lginx' && $level=='mn'){
					$d['title']='Kategori Alkes'; 
                    $d['icon']='pe-7s-file';   
                    $d['content']='kategori_alkes/view';
                    $this->load->view('home',$d);
				}else {
				    redirect('login/logout');
				}

			}

			function get_kategori_alkes ()
	    {

	        $list = $this->m_kategori_alkes->get_datatables();
	        $data = array();
	        $no = $this->input->post('start');
	        foreach ($list as $dt) {
                $no++;
	            $row = array();
	            $row[] = '<center>'.$no.'</center>';
				$row[] = $dt->kategori;
				$row[] =  '<center>
					<a href="#" class="btn-action edit" data-id="'.$dt->id_kategori.'" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-edit" aria-hidden="true"></i> Edit </a>
					<span class="btn-action btn-action-delete delete" data-id="'.$dt->id_kategori.'"><i class="fa fa-trash" aria-hidden="true"></i> Hapus </span>
				</center>';

	            $data[] = $row;
	        }

	        $output = array(
	            "draw" => $this->input->post('draw'),
	            "recordsTotal" => $this->m_kategori_alkes->count_all(),
	            "recordsFiltered" => $this->m_kategori_alkes->count_filtered(),
	            "data" => $data,
	        );
	        //output dalam format JSON
	        echo json_encode($output);
	    }



			public function cari_kategori_alkes()
				{
					$cek=$this->session->userdata('status');
					$level=$this->session->userdata('level');
					if($cek=='lginx' && $level=='mn'){
								$id['id_kategori'] = $this->input->post('id');
								$q=$this->db->get_where('kategori_alkes',$id);
								foreach ($q->result() as $dt) {
                                    $d['id']=$dt->id_kategori;
                                    $d['kategori']=$dt->kategori;
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
								$id['id_kategori'] = $key;
								$dt['kategori'] = $this->input->post('kategori');
								$dt['updated_by'] = $this->session->userdata('id_user');

								$q=$this->db->get_where('kategori_alkes',$id)->num_rows();
								if($q>0){
									$dt['w_update'] =date('Y-m-d H:i:s');
									$this->m_kategori_alkes->update($dt,$id);
									echo "Data Sukses DiUpdate";
								}else {
									$dt['id_kategori'] = 'KT-'.uniqid();
									$dt['w_insert'] =date('Y-m-d H:i:s');
									$this->m_kategori_alkes->insert($dt);
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
										$id['id_kategori'] = $this->input->post('id');
									    $this->m_kategori_alkes->delete($id);
										echo "Data Sukses Dihapus";
							}else {
								  redirect('login/logout');
							}

						}

	}

	?>
