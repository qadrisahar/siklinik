<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class A_unit extends CI_Controller {
	function __construct() {
        parent::__construct();
				$this->load->model('m_unit');
    }

		public function index()
			{
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='lginx' && $level=='mn'){
					$d['title']='Data Unit Obat'; 
                    $d['icon']='pe-7s-drawer';   
                    $d['content']='unit/view';  
                    $this->load->view('home',$d);
				}else {
				    redirect('login/logout');
				}

			}

			function get_unit()
	    {

	        $list = $this->m_unit->get_datatables();
	        $data = array();
	        $no = $this->input->post('start');
	        foreach ($list as $dt) {
                $no++;
	            $row = array();
	            $row[] = '<center>'.$no.'</center>';
				$row[] = $dt->unit;
				$row[] =  '<center>
					<a href="#" class="btn-action edit" data-id="'.$dt->id_unit.'" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-edit" aria-hidden="true"></i> Edit </a>
					<span class="btn-action btn-action-delete delete" data-id="'.$dt->id_unit.'"><i class="fa fa-trash" aria-hidden="true"></i> Hapus </span>
				</center>';

	            $data[] = $row;
	        }

	        $output = array(
	            "draw" => $this->input->post('draw'),
	            "recordsTotal" => $this->m_unit->count_all(),
	            "recordsFiltered" => $this->m_unit->count_filtered(),
	            "data" => $data,
	        );
	        //output dalam format JSON
	        echo json_encode($output);
	    }



			public function cari_unit()
				{
					$cek=$this->session->userdata('status');
					$level=$this->session->userdata('level');
					if($cek=='lginx' && $level=='mn'){
								$id['id_unit'] = $this->input->post('id');
								$q=$this->db->get_where('unit',$id);
								foreach ($q->result() as $dt) {
                                    $d['id']=$dt->id_unit;
                                    $d['unit']=$dt->unit;
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
								$id['id_unit'] = $key;
								$dt['unit'] = $this->input->post('unit');
								$dt['updated_by'] = $this->session->userdata('id_user');

								$q=$this->db->get_where('unit',$id)->num_rows();
								if($q>0){
									$dt['w_update'] =date('Y-m-d H:i:s');
									$this->m_unit->update($dt,$id);
									echo "Data Sukses DiUpdate";
								}else {
									$dt['id_unit'] = $this->input->post('unit');;
									$dt['w_insert'] =date('Y-m-d H:i:s');
									$this->m_unit->insert($dt);
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
										$id['id_unit'] = $this->input->post('id');
									    $this->m_unit->delete($id);
										echo "Data Sukses Dihapus";
							}else {
								  redirect('login/logout');
							}

						}

	}

	?>
