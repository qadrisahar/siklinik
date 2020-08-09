<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class A_tindakan_neks extends CI_Controller {
	function __construct() {
        parent::__construct();
				$this->load->model('m_tindakan_neks');
    }

		public function index()
			{
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='lginx' && $level=='mn'){
					$d['title']='Data Tindakan Belum Dieksekusi'; 
                    $d['icon']='pe-7s-drawer';   
                    $d['content']='tindakan_neks/view';  
                    $this->load->view('home',$d);
				}else {
				    redirect('login/logout');
				}

			}

			function get_tindakan_neks()
	    {

	        $list = $this->m_tindakan_neks->get_datatables();
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
					<a href="'.base_url().'a_tindakan?id='.base64_encode($dt->no_registrasi).'" class="btn-action edit" data-id="'.$dt->no_registrasi.'"><i class="fa fa-edit" aria-hidden="true"></i> Eksekusi </a>
				</center>';

	            $data[] = $row;
	        }

	        $output = array(
	            "draw" => $this->input->post('draw'),
	            "recordsTotal" => $this->m_tindakan_neks->count_all(),
	            "recordsFiltered" => $this->m_tindakan_neks->count_filtered(),
	            "data" => $data,
	        );
	        //output dalam format JSON
	        echo json_encode($output);
	    }



			public function cari_tindakan_neks()
				{
					$cek=$this->session->userdata('status');
					$level=$this->session->userdata('level');
					if($cek=='lginx' && $level=='mn'){
								$id['no_registrasi'] = $this->input->post('id');
								$q=$this->db->get_where('tindakan_neks',$id);
								foreach ($q->result() as $dt) {
                                    $d['id']=$dt->no_registrasi;
                                    $d['tindakan_neks']=$dt->tindakan_neks;
                                }
								echo json_encode($d);
					}else {
						  redirect('login/logout');
					}

				}
	}

	?>
