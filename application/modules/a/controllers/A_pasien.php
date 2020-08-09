<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class A_pasien extends CI_Controller {
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
                    $d['title']='Input Pasien'; 
					$d['icon']='pe-7s-plus';       	
					$d['content']='pasien/add';
					$this->load->view('home',$d);
				}else {
				    redirect('login/logout');
				}

            }
            
            function get_data_pasien()
	    {
	        $list = $this->m_users->get_datatables();
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
							<a href="#" class="btn-action edit" data-id="'.$dt->id_pasien.'" data-toggle="modal" data-target="#modal-admin"><i class="fa fa-edit" aria-hidden="true"></i> Edit </a>
														<a href="#" class="btn-action btn-action-warning account" data-id="'.$dt->id_pasien.'" data-toggle="modal" data-target="#modal-account"><i class="fa fa-key" aria-hidden="true"></i> Akun </a>
														<span class="btn-action btn-action-delete delete" data-id="'.$dt->id_pasien.'"><i class="fa fa-trash" aria-hidden="true"></i> Hapus </span>
														</center>';

	            $data[] = $row;
	        }

	        $output = array(
	            "draw" => $this->input->post('draw'),
	            "recordsTotal" => $this->m_users->count_all(),
	            "recordsFiltered" => $this->m_users->count_filtered(),
	            "data" => $data,
	        );
	        echo json_encode($output);
			}
		

	}

	?>
