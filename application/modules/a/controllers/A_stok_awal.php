<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class A_stok_awal extends CI_Controller {
	function __construct() {
        parent::__construct();
				$this->load->model('m_stok_awal');
    }

		public function index()
			{
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='lginx' && $level=='mn'){
					$d['title']='Stok Awal'; 
                    $d['icon']='pe-7s-note';   
                    $d['content']='stok_awal/view';
                    $this->load->view('home',$d);
				}else {
				    redirect('login/logout');
				}

			}

			function get_stok_awal()
			{

	        $list = $this->m_stok_awal->get_datatables();
	        $data = array();
	        $no = $this->input->post('start');
	        foreach ($list as $dt) {
                $no++;
	            $row = array();
	            $row[] = '<center>'.$no.'</center>';
                $row[] = $dt->nama_obat.' ('.$dt->miligram.')';
                $row[] = $dt->total_obat.' '.$dt->type_obat;
                $row[] = 'Rp. '.number_format((float)$dt->harga_modal,0,',','.');
                $row[] = 'Rp. '.number_format((float)$dt->harga_jual,0,',','.');
                $row[] = date('d-m-Y', strtotime($dt->order_date));
                $row[] = date('d-m-Y', strtotime($dt->expired_date));
				$row[] =  '<center>
					<a href="#" class="btn-action edit" data-id="'.$dt->id_stok_awal.'" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-edit" aria-hidden="true"></i> Edit </a>
					<span class="btn-action btn-action-delete delete" data-id="'.$dt->id_stok_awal.'"><i class="fa fa-trash" aria-hidden="true"></i> Hapus </span>
				</center>';

	            $data[] = $row;
	        }

	        $output = array(
	            "draw" => $this->input->post('draw'),
	            "recordsTotal" => $this->m_stok_awal->count_all(),
	            "recordsFiltered" => $this->m_stok_awal->count_filtered(),
	            "data" => $data,
	        );
	        //output dalam format JSON
	        echo json_encode($output);
	    }

			public function cari_stok_awal()
				{
					$cek=$this->session->userdata('status');
					$level=$this->session->userdata('level');
					if($cek=='lginx' && $level=='mn'){
								$id['id_stok_awal'] = $this->input->post('id');
								$q=$this->db->get_where('stok_awal',$id);
								foreach ($q->result() as $dt) {
                                    $d['id']=$dt->id_stok_awal;
                                    $d['nama_obat']=$dt->nama_obat;
                                    $d['miligram']=$dt->miligram;
                                    $d['type_obat']=$dt->type_obat;
                                    $d['unit']=$dt->unit;
                                    $d['jumlah_unit']=$dt->jumlah_unit;
                                    $d['jumlah_obat_unit']=$dt->jumlah_obat_unit;
                                    $d['total_obat']=$dt->total_obat;
                                    $d['harga_beli']=$dt->harga_beli;
                                    $d['harga_modal']=$dt->harga_modal;
                                    $d['harga_jual']=$dt->harga_jual;
                                    $d['order_date']=$dt->order_date;
                                    $d['expired_date']=$dt->expired_date;
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
								$id['id_stok_awal'] = $key;
                                $dt['nama_obat'] = $this->input->post('nama_obat');
                                $dt['miligram'] = $this->input->post('miligram');
                                $dt['type_obat'] = $this->input->post('type_obat');
                                $dt['unit'] = $this->input->post('unit');
                                $dt['jumlah_unit'] = $this->input->post('jumlah_unit');
                                $dt['jumlah_obat_unit'] = $this->input->post('jumlah_obat_unit');
                                $dt['total_obat'] = $this->input->post('total_obat');
                                $dt['harga_beli'] = $this->input->post('harga_beli');
                                $dt['harga_modal'] = $this->input->post('harga_modal');
                                $dt['harga_jual'] = $this->input->post('harga_jual');
                                $dt['order_date'] = $this->input->post('order_date');
                                $dt['expired_date'] = $this->input->post('expired_date');
								$dt['updated_by'] = $this->session->userdata('id_user');

								$q=$this->db->get_where('stok_awal',$id)->num_rows();
								if($q>0){
									$dt['w_update'] =date('Y-m-d H:i:s');
									$this->m_stok_awal->update($dt,$id);
									echo "Data Sukses DiUpdate";
								}else {
									$dt['id_stok_awal'] = 'ST-'.uniqid();
									$dt['w_insert'] =date('Y-m-d H:i:s');
									$this->m_stok_awal->insert($dt);
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
										$id['id_stok_awal'] = $this->input->post('id');
									    $this->m_stok_awal->delete($id);
										echo "Data Sukses Dihapus";
							}else {
								  redirect('login/logout');
							}

						}

	}

	?>
