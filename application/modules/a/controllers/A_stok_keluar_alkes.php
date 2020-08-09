<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class A_stok_keluar_alkes extends CI_Controller {
	function __construct() {
        parent::__construct();
				$this->load->model('m_stok_keluar_alkes');
    }

		public function index()
			{
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='lginx' && $level=='mn'){
					$d['title']='Stok Keluar Alkes'; 
                    $d['icon']='pe-7s-download';   
                    $d['content']='stok_keluar_alkes/view';
                    $this->load->view('home',$d);
				}else {
				    redirect('login/logout');
				}

			}

			public function add()
			{
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='lginx' && $level=='mn'){
					$d['title']='Tambah Stok Keluar Alkes'; 
                    $d['icon']='pe-7s-plus';   
                    $d['content']='stok_keluar_alkes/add';
                    $this->load->view('home',$d);
				}else {
				    redirect('login/logout');
				}

			}

			function get_stok_keluar_alkes()
	    {

	        $list = $this->m_stok_keluar_alkes->get_datatables();
	        $data = array();
	        $no = $this->input->post('start');
	        foreach ($list as $dt) {
				$sisaBagi=$dt->jumlah%$dt->isi;
				if($sisaBagi==0){
					$stok_satuan='';
				}else{
					$stok_satuan=$sisaBagi.' '.$dt->id_satuan;
				}
    			$hasilBagi=($dt->jumlah-$sisaBagi)/$dt->isi;
				$stok=$hasilBagi;
				if($dt->jumlah==0){
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
				$row[] = datetime($dt->w_insert);
                $row[] = $dt->keterangan;
                $row[] = $stok;
				$row[] =  '<center><span class="btn-action btn-action-delete delete" data-id="'.$dt->id_stok_keluar.'"><i class="fa fa-trash" aria-hidden="true"></i> Hapus </span></center>';

	            $data[] = $row;
	        }

	        $output = array(
	            "draw" => $this->input->post('draw'),
	            "recordsTotal" => $this->m_stok_keluar_alkes->count_all(),
	            "recordsFiltered" => $this->m_stok_keluar_alkes->count_filtered(),
	            "data" => $data,
	        );
	        //output dalam format JSON
	        echo json_encode($output);
		}
		
		

			public function simpan()
				{
					$cek=$this->session->userdata('status');
					$level=$this->session->userdata('level');
					if($cek=='lginx' && $level=='mn'){
						    error_reporting(0);
								date_default_timezone_set('Asia/Makassar');
								$key=$this->input->post('id');
								$kode_alkes=$this->input->post('kode_alkes');
								$type_stok=$this->input->post('type_stok');
								$jumlah= $this->input->post('jumlah');
								$keterangan= $this->input->post('keterangan');
								$isi= $this->input->post('isi');
								if($type_stok=='unit'){
									$stok_keluar=$jumlah*$isi;
								}else{
									$stok_keluar=$jumlah;
								}
								$id['id_stok_keluar'] = $key;
								$dt['kode_alkes'] = $kode_alkes;
								$dt['jumlah'] =$stok_keluar;
								$dt['keterangan'] =$keterangan;
								$dt['updated_by'] = $this->session->userdata('id_user');
								$dt['id_stok_keluar'] = 'ST-'.uniqid();
								$dt['w_insert'] =date('Y-m-d H:i:s');
								$this->m_stok_keluar_alkes->insert($dt);
								echo "Data Sukses DiSimpan";
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
										$id['id_stok_keluar'] = $this->input->post('id');
									    $this->m_stok_keluar_alkes->delete($id);
										echo "Data Sukses Dihapus";
							}else {
								  redirect('login/logout');
							}

						}

	}

	?>
