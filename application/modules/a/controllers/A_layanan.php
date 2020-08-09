<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class A_layanan extends CI_Controller {
	function __construct() {
        parent::__construct();
				$this->load->model('m_layanan');
    }

		public function index()
			{
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='lginx' && $level=='mn'){
					$d['title']='Pengaturan Layanan'; 
                    $d['icon']='pe-7s-plugin';   
					$d['content']='layanan/view';
                    $this->load->view('home',$d);
				}else {
				    redirect('login/logout');
				}

			}

			function get_layanan()
	    {

	        $list = $this->m_layanan->get_datatables();
	        $data = array();
	        $no = $this->input->post('start');
	        foreach ($list as $dt) {
                $no++;
	            $row = array();
	            $row[] = '<center>'.$no.'</center>';
				$row[] = $dt->layanan;
				$row[] =  '<center>
					<a href="#" class="btn-action edit" data-id="'.$dt->id_layanan.'" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-edit" aria-hidden="true"></i> Edit </a>
					<a href="'.base_url().'a_layanan_data?id='.base64_encode($dt->id_layanan).'" class="btn-action btn-action-warning"><i class="fa fa-edit" aria-hidden="true"></i> Data Layanan </a>
					<span class="btn-action btn-action-delete delete" data-id="'.$dt->id_layanan.'"><i class="fa fa-trash" aria-hidden="true"></i> Hapus </span>
				</center>';

	            $data[] = $row;
	        }

	        $output = array(
	            "draw" => $this->input->post('draw'),
	            "recordsTotal" => $this->m_layanan->count_all(),
	            "recordsFiltered" => $this->m_layanan->count_filtered(),
	            "data" => $data,
	        );
	        //output dalam format JSON
	        echo json_encode($output);
	    }



			public function cari_layanan()
				{
					$cek=$this->session->userdata('status');
					$level=$this->session->userdata('level');
					if($cek=='lginx' && $level=='mn'){
								$id['id_layanan'] = $this->input->post('id');
								$q=$this->db->get_where('layanan',$id);
								foreach ($q->result() as $dt) {
                                    $d['id']=$dt->id_layanan;
                                    $d['layanan']=$dt->layanan;
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
								$id['id_layanan'] = $key;
								$dt['layanan'] = $this->input->post('layanan');
								$dt['updated_by'] = $this->session->userdata('id_user');

								$q=$this->db->get_where('layanan',$id)->num_rows();
								if($q>0){
									$dt['w_update'] =date('Y-m-d H:i:s');
									$this->m_layanan->update($dt,$id);

									//Log
									$dl['aksi'] = 'Update layanan '.$key.' menjadi '.$this->input->post('layanan');
									$dl['updated_by'] = $this->session->userdata('id_user');
									$dl['w_insert']=date('Y-m-d H:i:s');
									$this->db->insert('layanan_log_exc',$dl);
									//End Log
									echo "Data Sukses DiUpdate";
								}else {
									$dt['id_layanan'] = strtolower(str_replace(' ','-',$this->input->post('layanan')));
									$dt['w_insert'] =date('Y-m-d H:i:s');
									$this->m_layanan->insert($dt);

									//Log
									$dl['aksi'] = 'Tambah layanan '.$this->input->post('layanan');
									$dl['updated_by'] = $this->session->userdata('id_user');
									$dl['w_insert']=date('Y-m-d H:i:s');
									$this->db->insert('layanan_log_exc',$dl);
									//End Log

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

										date_default_timezone_set('Asia/Makassar');
										$id['id_layanan'] = $this->input->post('id');
										$this->m_layanan->delete($id);
										
										//Log
										$dl['aksi'] = 'Hapus layanan '.$this->input->post('id');
										$dl['updated_by'] = $this->session->userdata('id_user');
										$dl['w_insert']=date('Y-m-d H:i:s');
										$this->db->insert('layanan_log_exc',$dl);
										//End Log

										echo "Data Sukses Dihapus";
							}else {
								  redirect('login/logout');
							}

						}

	}

	?>
