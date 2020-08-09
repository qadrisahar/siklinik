<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class A_obat extends CI_Controller {
	function __construct() {
        parent::__construct();
				$this->load->model('m_obat');
    }

		public function index()
			{
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='lginx' && $level=='mn'){
					$d['title']='Data Obat'; 
                    $d['icon']='pe-7s-keypad';   
                    $d['content']='obat/view';
                    $this->load->view('home',$d);
				}else {
				    redirect('login/logout');
				}

			}

			function get_obat()
	    {

	        $list = $this->m_obat->get_datatables();
	        $data = array();
	        $no = $this->input->post('start');
	        foreach ($list as $dt) {
                $no++;
	            $row = array();
				$row[] = '<center>'.$no.'</center>';
				$row[] = $dt->kode_obat;
				$row[] = $dt->nama_obat;
				$row[] = $dt->kategori;
				$row[] = $dt->unit;
				$row[] = $dt->isi.'/'.$dt->satuan;
				$row[] = 'Rp. '.toRp($dt->harga_beli);
				$row[] = 'Rp. '.toRp($dt->harga_jual);
				$row[] =  '<center>
					<a href="#" class="btn-action edit" data-id="'.$dt->id_obat.'" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-edit" aria-hidden="true"></i> Edit </a>
					<span class="btn-action btn-action-delete delete" data-id="'.$dt->id_obat.'"><i class="fa fa-trash" aria-hidden="true"></i> Hapus </span>
				</center>';

	            $data[] = $row;
	        }

	        $output = array(
	            "draw" => $this->input->post('draw'),
	            "recordsTotal" => $this->m_obat->count_all(),
	            "recordsFiltered" => $this->m_obat->count_filtered(),
	            "data" => $data,
	        );
	        //output dalam format JSON
	        echo json_encode($output);
	    }



			public function cari_obat()
				{
					$cek=$this->session->userdata('status');
					$level=$this->session->userdata('level');
					if($cek=='lginx' && $level=='mn'){
								$id['id_obat'] = $this->input->post('id');
								$q=$this->db->get_where('obat',$id);
								foreach ($q->result() as $dt) {
                                    $d['id']=$dt->id_obat;
									$d['nama_obat']=$dt->nama_obat;
									$d['kode_obat']=$dt->kode_obat;
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
								$kode=$this->input->post('kode_obat');
								$id['id_obat'] = $key;
								$dt['nama_obat'] = $this->input->post('nama_obat');
								$dt['kode_obat'] = $this->input->post('kode_obat');
								$dt['id_kategori'] = $this->input->post('id_kategori');
								$dt['id_satuan'] = $this->input->post('id_satuan');
								$dt['id_unit'] = $this->input->post('id_unit');
								$dt['isi'] = $this->input->post('isi');
								$dt['harga_beli'] = RptoDb($this->input->post('harga_beli'));
								$dt['harga_jual'] = RptoDb($this->input->post('harga_jual'));
								$dt['updated_by'] = $this->session->userdata('id_user');

								$q=$this->db->get_where('obat',$id)->num_rows();
								if($q>0){
									$dt['w_update'] =date('Y-m-d H:i:s');
									$this->m_obat->update($dt,$id);
									echo "Data Sukses DiUpdate";
								}else {
									$idk['kode_obat']=$kode;
									$qcek_kode=$this->db->select('kode_obat')->get_where('obat',$idk)->num_rows();
									if($qcek_kode>0){
										echo "E202";
									}else{
										$dt['id_obat'] = 'OB-'.uniqid();
										$dt['w_insert'] =date('Y-m-d H:i:s');
										$this->m_obat->insert($dt);
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
										$id['id_obat'] = $this->input->post('id');
									    $this->m_obat->delete($id);
										echo "Data Sukses Dihapus";
							}else {
								  redirect('login/logout');
							}

						}

	}

	?>
