<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class A_alkes extends CI_Controller {
	function __construct() {
        parent::__construct();
				$this->load->model('m_alkes');
    }

		public function index()
			{
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='lginx' && $level=='mn'){
					$d['title']='Data Alkes'; 
                    $d['icon']='pe-7s-keypad';   
                    $d['content']='alkes/view';
                    $this->load->view('home',$d);
				}else {
				    redirect('login/logout');
				}

			}

			function get_alkes()
	    {

	        $list = $this->m_alkes->get_datatables();
	        $data = array();
	        $no = $this->input->post('start');
	        foreach ($list as $dt) {
                $no++;
	            $row = array();
				$row[] = '<center>'.$no.'</center>';
				$row[] = $dt->kode_alkes;
				$row[] = $dt->nama_alkes;
				$row[] = $dt->kategori;
				$row[] = $dt->unit;
				$row[] = $dt->isi.'/'.$dt->satuan;
				$row[] = 'Rp. '.toRp($dt->harga_beli);
				$row[] = 'Rp. '.toRp($dt->harga_jual);
				$row[] =  '<center>
					<a href="#" class="btn-action edit" data-id="'.$dt->id_alkes.'" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-edit" aria-hidden="true"></i> Edit </a>
					<span class="btn-action btn-action-delete delete" data-id="'.$dt->id_alkes.'"><i class="fa fa-trash" aria-hidden="true"></i> Hapus </span>
				</center>';

	            $data[] = $row;
	        }

	        $output = array(
	            "draw" => $this->input->post('draw'),
	            "recordsTotal" => $this->m_alkes->count_all(),
	            "recordsFiltered" => $this->m_alkes->count_filtered(),
	            "data" => $data,
	        );
	        //output dalam format JSON
	        echo json_encode($output);
	    }



			public function cari_alkes()
				{
					$cek=$this->session->userdata('status');
					$level=$this->session->userdata('level');
					if($cek=='lginx' && $level=='mn'){
								$id['id_alkes'] = $this->input->post('id');
								$q=$this->db->get_where('alkes',$id);
								foreach ($q->result() as $dt) {
                                    $d['id']=$dt->id_alkes;
									$d['nama_alkes']=$dt->nama_alkes;
									$d['kode_alkes']=$dt->kode_alkes;
									$d['id_kategori']=$dt->id_kategori;
									$d['id_satuan']=$dt->id_satuan;
									$d['isi']=$dt->isi;
									$d['id_unit']=$dt->id_unit;
									$d['harga_beli']=toRp($dt->harga_beli);
									$d['harga_jual']=toRp($dt->harga_jual);
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
								$kode=$this->input->post('kode_alkes');
								$id['id_alkes'] = $key;
								$dt['nama_alkes'] = $this->input->post('nama_alkes');
								$dt['kode_alkes'] = $this->input->post('kode_alkes');
								$dt['id_kategori'] = $this->input->post('id_kategori');
								$dt['id_satuan'] = $this->input->post('id_satuan');
								$dt['id_unit'] = $this->input->post('id_unit');
								$dt['isi'] = $this->input->post('isi');
								$dt['harga_beli'] = RptoDb($this->input->post('harga_beli'));
								$dt['harga_jual'] = RptoDb($this->input->post('harga_jual'));
								$dt['updated_by'] = $this->session->userdata('id_user');

								$q=$this->db->get_where('alkes',$id)->num_rows();
								if($q>0){
									$dt['w_update'] =date('Y-m-d H:i:s');
									$this->m_alkes->update($dt,$id);
									echo "Data Sukses DiUpdate";
								}else {
									$idk['kode_alkes']=$kode;
									$qcek_kode=$this->db->select('kode_alkes')->get_where('alkes',$idk)->num_rows();
									if($qcek_kode>0){
										echo "E202";
									}else{
										$dt['id_alkes'] = 'OB-'.uniqid();
										$dt['w_insert'] =date('Y-m-d H:i:s');
										$this->m_alkes->insert($dt);
										echo "Data Sukses DiSimpan";
									}
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
										$id['id_alkes'] = $this->input->post('id');
									    $this->m_alkes->delete($id);
										echo "Data Sukses Dihapus";
							}else {
								  redirect('login/logout');
							}

						}

	}

	?>
