<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class A_tindakan_eks extends CI_Controller {
	function __construct() {
        parent::__construct();
				$this->load->model('m_tindakan_eks');
    }

		public function index()
			{
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='lginx' && $level=='mn'){
					$d['title']='Telah Dieksekusi'; 
                    $d['icon']='pe-7s-drawer';   
                    $d['content']='tindakan_eks/view';  
                    $this->load->view('home',$d);
				}else {
				    redirect('login/logout');
				}

			}

			function get_tindakan_eks()
	    {

	        $list = $this->m_tindakan_eks->get_datatables();
	        $data = array();
	        $no = $this->input->post('start');
	        foreach ($list as $dt) {
                $no++;
	            $row = array();
	            $row[] = '<center>'.$no.'</center>';
				$row[] = $dt->no_registrasi;
				$row[] = '<center>'.$dt->no_antrian.'</center>';
				$row[] = $dt->id_pasien;
				$row[] = $dt->nama;
				$row[] = $dt->nik;
				$row[] = '<center>'.$dt->jenis_kelamin.'</center>';
				$row[] = '<center>'.hitung_umur($dt->tgl_lahir).'</center>';
				$row[] = $dt->layanan;				
				$row[] =  '<center>
					<a href="'.base_url().'a_detail_tindakan?id='.base64_encode($dt->no_registrasi).'" class="btn-action edit" data-id="'.$dt->no_registrasi.'"><i class="fa fa-eye" aria-hidden="true"></i> Detail </a>
				</center>';

	            $data[] = $row;
	        }

	        $output = array(
	            "draw" => $this->input->post('draw'),
	            "recordsTotal" => $this->m_tindakan_eks->count_all(),
	            "recordsFiltered" => $this->m_tindakan_eks->count_filtered(),
	            "data" => $data,
	        );
	        //output dalam format JSON
	        echo json_encode($output);
	    }



			public function cari_tindakan_eks()
				{
					$cek=$this->session->userdata('status');
					$level=$this->session->userdata('level');
					if($cek=='lginx' && $level=='mn'){
								$id['no_registrasi'] = $this->input->post('id');
								$q=$this->db->get_where('tindakan_eks',$id);
								foreach ($q->result() as $dt) {
                                    $d['id']=$dt->no_registrasi;
                                    $d['tindakan_eks']=$dt->tindakan_eks;
                                }
								echo json_encode($d);
					}else {
						  redirect('login/logout');
					}

				}
	}

	?>
