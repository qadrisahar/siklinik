<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class A_data_stok_alkes extends CI_Controller {
	function __construct() {
        parent::__construct();
				$this->load->model('m_stok_alkes');
    }

		public function index()
			{
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='lginx' && $level=='mn'){
					$d['title']='Data Stok Alkes'; 
                    $d['icon']='pe-7s-note2';   
                    $d['content']='data_stok_alkes/view';
                    $this->load->view('home',$d);
				}else {
				    redirect('login/logout');
				}

			}

			function get_data_stok_alkes()
	    {

	        $list = $this->m_stok_alkes->get_datatables();
	        $data = array();
	        $no = $this->input->post('start');
	        foreach ($list as $dt) {
				$sisaBagi=$dt->stok%$dt->isi;
				if($sisaBagi==0){
					$stok_satuan='';
				}else{
					$stok_satuan=$sisaBagi.' '.$dt->id_satuan;
				}
    			$hasilBagi=($dt->stok-$sisaBagi)/$dt->isi;
				$stok=$hasilBagi;
				if($stok==0){
					$stok='<span class="badge badge-danger">Kosong</span>';
				}else{
					$stok=$stok.' '.$dt->id_unit.' '.$stok_satuan;
				}
                $no++;
	            $row = array();
	            $row[] = '<center>'.$no.'</center>';
                $row[] = $dt->kode_alkes;
                $row[] = $dt->nama_alkes;
                $row[] = $dt->kategori;
                $row[] = $stok;

	            $data[] = $row;
	        }

	        $output = array(
	            "draw" => $this->input->post('draw'),
	            "recordsTotal" => $this->m_stok_alkes->count_all(),
	            "recordsFiltered" => $this->m_stok_alkes->count_filtered(),
	            "data" => $data,
	        );
	        //output dalam format JSON
	        echo json_encode($output);
	    }

	}

	?>
