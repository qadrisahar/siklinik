<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class A_satuan extends CI_Controller {
	function __construct() {
        parent::__construct();
				$this->load->model('m_satuan');
    }

		public function index()
			{
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='lginx' && $level=='mn'){
					$d['title']='Data Satuan Obat'; 
                    $d['icon']='pe-7s-file';   
                    $d['content']='satuan/view';
                    $this->load->view('home',$d);
				}else {
				    redirect('login/logout');
				}

			}

			function get_satuan()
	    {

	        $list = $this->m_satuan->get_datatables();
	        $data = array();
	        $no = $this->input->post('start');
	        foreach ($list as $dt) {
                $no++;
	            $row = array();
	            $row[] = '<center>'.$no.'</center>';
				$row[] = $dt->satuan;
				$row[] =  '<center>
					<a href="#" class="btn-action edit" data-id="'.$dt->id_satuan.'" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-edit" aria-hidden="true"></i> Edit </a>
					<span class="btn-action btn-action-delete delete" data-id="'.$dt->id_satuan.'"><i class="fa fa-trash" aria-hidden="true"></i> Hapus </span>
				</center>';

	            $data[] = $row;
	        }

	        $output = array(
	            "draw" => $this->input->post('draw'),
	            "recordsTotal" => $this->m_satuan->count_all(),
	            "recordsFiltered" => $this->m_satuan->count_filtered(),
	            "data" => $data,
	        );
	        //output dalam format JSON
	        echo json_encode($output);
	    }



			public function cari_satuan()
				{
					$cek=$this->session->userdata('status');
					$level=$this->session->userdata('level');
					if($cek=='lginx' && $level=='mn'){
								$id['id_satuan'] = $this->input->post('id');
								$q=$this->db->get_where('satuan',$id);
								foreach ($q->result() as $dt) {
                                    $d['id']=$dt->id_satuan;
                                    $d['satuan']=$dt->satuan;
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
								$id['id_satuan'] = $key;
								$dt['satuan'] = $this->input->post('satuan');
								$dt['updated_by'] = $this->session->userdata('id_user');

								$q=$this->db->get_where('satuan',$id)->num_rows();
								if($q>0){
									$dt['w_update'] =date('Y-m-d H:i:s');
									$this->m_satuan->update($dt,$id);
									echo "Data Sukses DiUpdate";
								}else {
									$dt['id_satuan'] = $this->input->post('satuan');
									$dt['w_insert'] =date('Y-m-d H:i:s');
									$this->m_satuan->insert($dt);
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
										$id['id_satuan'] = $this->input->post('id');
									    $this->m_satuan->delete($id);
										echo "Data Sukses Dihapus";
							}else {
								  redirect('login/logout');
							}

						}

	}

	?>
