<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class A_stok_masuk_alkes extends CI_Controller {
	function __construct() {
        parent::__construct();
				$this->load->model('m_stok_masuk_alkes');
    }

		public function index()
			{
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='lginx' && $level=='mn'){
					$d['title']='Stok Masuk Alkes'; 
                    $d['icon']='pe-7s-download';   
                    $d['content']='stok_masuk_alkes/view';
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
					$d['title']='Tambah Stok Masuk Alkes'; 
                    $d['icon']='pe-7s-plus';   
                    $d['content']='stok_masuk_alkes/add';
                    $this->load->view('home',$d);
				}else {
				    redirect('login/logout');
				}

			}

			function get_stok_masuk_alkes()
	    {

	        $list = $this->m_stok_masuk_alkes->get_datatables();
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
				$row[] = date('d-m-Y',strtotime($dt->order_date));
				$row[] = date('d-m-Y',strtotime($dt->expired_date));
                $row[] = toRp($dt->harga_beli);
                $row[] = toRp($dt->harga_jual);
                $row[] = $stok;
				$row[] =  '<center><span class="btn-action btn-action-delete delete" data-id="'.$dt->id_stok_masuk.'"><i class="fa fa-trash" aria-hidden="true"></i> Hapus </span></center>';

	            $data[] = $row;
	        }

	        $output = array(
	            "draw" => $this->input->post('draw'),
	            "recordsTotal" => $this->m_stok_masuk_alkes->count_all(),
	            "recordsFiltered" => $this->m_stok_masuk_alkes->count_filtered(),
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
								$isi= $this->input->post('isi');
								if($type_stok=='unit'){
									$stok_masuk=$jumlah*$isi;
								}else{
									$stok_masuk=$jumlah;
								}
								$harga_beli=RptoDb($this->input->post('harga_beli'));
								$harga_jual=RptoDb($this->input->post('harga_jual'));
								$id['id_stok_masuk'] = $key;
								$dt['kode_alkes'] = $kode_alkes;
								$dt['harga_beli'] = $harga_beli;
								$dt['harga_jual'] = $harga_jual;
								$dt['order_date'] = $this->input->post('order_date');
								$dt['expired_date'] = $this->input->post('expired_date');
								$dt['jumlah'] =$stok_masuk;
								$dt['updated_by'] = $this->session->userdata('id_user');
								$dt['id_stok_masuk'] = 'ST-'.uniqid();
								$dt['w_insert'] =date('Y-m-d H:i:s');
								$this->m_stok_masuk_alkes->insert($dt);
								$harga_jual_old=$this->db->select('harga_jual')->where('kode_alkes',$kode_alkes)->get('alkes')->row()->harga_jual;
								if($harga_jual>$harga_jual_old){
								  $idm['kode_alkes']=$kode_alkes;
								  $dm['harga_beli'] = $harga_beli;
								  $dm['harga_jual'] = $harga_jual;
								  $this->db->update('alkes',$dm,$idm);
								}
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
										$id['id_stok_masuk'] = $this->input->post('id');
									    $this->m_stok_masuk_alkes->delete($id);
										echo "Data Sukses Dihapus";
							}else {
								  redirect('login/logout');
							}

						}

	}

	?>
