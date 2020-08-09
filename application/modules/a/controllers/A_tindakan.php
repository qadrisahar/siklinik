<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class A_tindakan extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->dbforge();
				$this->load->model('m_tindakan_neks');
    }

		public function index()
			{
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='lginx' && $level=='mn'){
					$no_registrasi=base64_decode($this->input->get('id'));
					$d['title']='Tindakan <b>'.$no_registrasi.'</b>'; 
                    $d['icon']='pe-7s-plugin';   
					$d['content']='tindakan/view';
					$d['no_registrasi']=$no_registrasi;
					$d['database']=$this->db->database;
					$q=$this->db->where('no_registrasi',$no_registrasi)->get('registrasi');
					foreach($q->result() as $dt){
						$qp=$this->db->select('*')->where('id_pasien',$dt->id_pasien)->get('pasien');
						foreach($qp->result() as $dp){
							$d['nama_pasien']=$dp->nama;
							$d['ttl']=$dp->tempat_lahir.', '.todate2($dp->tgl_lahir);
							$d['jk_umur']=$dp->jenis_kelamin.'/'.hitung_umur($dp->tgl_lahir);
						}
						$d['w_insert']=datetime2($dt->w_insert);
						$d['jenis_layanan']=$this->db->select('layanan')->where('id_layanan',$dt->id_layanan)->get('layanan')->row()->layanan;
						$d['id_layanan']=$dt->id_layanan;
					}

                    $this->load->view('home',$d);
				}else {
				    redirect('login/logout');
				}

			}

			function get_tindakan()
	    {
			$id_layanan=$this->input->post('id');
			$database=$this->db->database;
			$tables=$this->db->query("SELECT t.TABLE_NAME AS myTables FROM INFORMATION_SCHEMA.TABLES AS t WHERE t.TABLE_SCHEMA = '$database' AND t.TABLE_NAME LIKE 'layanan_$id_layanan%' ")->result_array();    
			$output='';
			$i=1;
			foreach($tables as $key => $val) {
				$data_table=$val['myTables'];
				$param_replace='layanan_'.$id_layanan.'_';
				$data_table_show=str_replace('-',' ',str_replace($param_replace,'',$data_table));
				$output.='<tr>';
				$output.='<td class="text-center">'.$i++.'</td>';
				$output.='<td style="text-transform: capitalize;">'.($data_table_show).'</td>';
				$output.='<td class="text-center">'.'<a href="#" class="btn-action edit" data-id="'.$data_table.'" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-edit" aria-hidden="true"></i> Edit </a>
				<a href="'.base_url().'a_tindakan_detail?id='.$data_table.'&id2='.$id_layanan.'" class="btn-action btn-action-warning"><i class="fa fa-edit" aria-hidden="true"></i> Detail Data </a>
				<span class="btn-action btn-action-delete delete" data-id="'.$data_table.'"><i class="fa fa-trash" aria-hidden="true"></i> Hapus </span>'.'</td>';
				$output.='</tr>';
			}
			$table['table']=$output;
	        
	        echo json_encode($table);
	    }

			public function simpan()
				{
					$cek=$this->session->userdata('status');
					$level=$this->session->userdata('level');
					if($cek=='lginx' && $level=='mn'){
						    error_reporting(0);
								date_default_timezone_set('Asia/Makassar');
								$table=$this->input->get('param');
								$fields = $this->db->field_data($table);
								foreach ($fields as $field)
								{
								if($field->name=='no_registrasi' || $field->name=='w_insert' || $field->name=='w_update' || $field->name=='updated_by'){
									continue;
								}
								$dt[$field->name]=$this->input->post(''.$table.'_'.$field->name.'');
								}
								$no_registrasi=$this->input->post('no_registrasi');
								$dt['updated_by']=$this->session->userdata('id_user');
								$q_cek=$this->db->select('no_registrasi')->where('no_registrasi',$no_registrasi)->get($table)->num_rows();
								if($q_cek>0){
									$id['no_registrasi']=$no_registrasi;
									$dt['w_update']=date('Y-m-d H:i:s');
									$this->db->update($table,$dt,$id);
									echo "Data Sukses DiUpdate";
								}else{
									$dt['no_registrasi']=$no_registrasi;
									$dt['w_insert']=date('Y-m-d H:i:s');
									$this->db->insert($table,$dt);
									echo "Data Sukses DiSimpan";
								}
								
					}else {
						  redirect('login/logout');
					}

				}

				public function simpan_obat()
				{
					$cek=$this->session->userdata('status');
					$level=$this->session->userdata('level');
					if($cek=='lginx' && $level=='mn'){
						    error_reporting(0);
								date_default_timezone_set('Asia/Makassar');
								$key=$this->input->post('id');
								$kode_obat=$this->input->post('kode_obat');
								$type_stok=$this->input->post('type_stok');
								$harga_jual=RptoDb($this->input->post('harga_jual'));
								$jumlah= $this->input->post('jumlah');
								$keterangan= $this->input->post('keterangan');
								$no_registrasi= $this->input->post('no_registrasi');
								$isi= $this->input->post('isi');
								if($type_stok=='unit'){
									$stok_keluar=$jumlah*$isi;
								}else{
									$stok_keluar=$jumlah;
								}
								$total=$stok_keluar*$harga_jual;
								$dt['kode_obat'] = $kode_obat;
								$dt['jumlah'] =$stok_keluar;
								$dt['harga_jual'] =$harga_jual;
								$dt['total'] =$total;
								$dt['keterangan'] =$keterangan;
								$dt['no_registrasi'] =$no_registrasi;
								$dt['updated_by'] = $this->session->userdata('id_user');
								$dt['id'] = 'ID-'.uniqid();
								$dt['w_insert'] =date('Y-m-d H:i:s');
								$this->db->insert('layanan_obat',$dt);
								echo "Data Sukses DiSimpan";
					}else {
						  redirect('login/logout');
					}

				}

				public function simpan_tikhus()
				{
					$cek=$this->session->userdata('status');
					$level=$this->session->userdata('level');
					if($cek=='lginx' && $level=='mn'){
						    error_reporting(0);
								date_default_timezone_set('Asia/Makassar');
								$key=$this->input->post('id');
								$tindakan_khusus=$this->input->post('tindakan_khusus');
								$total=RptoDb($this->input->post('total_tikhus'));
								$no_registrasi= $this->input->post('no_registrasi');

								$dt['tindakan_khusus'] = $tindakan_khusus;
								$dt['total'] =$total;
								$dt['no_registrasi'] =$no_registrasi;
								$dt['updated_by'] = $this->session->userdata('id_user');
								$dt['id'] = 'ID-'.uniqid();
								$dt['w_insert'] =date('Y-m-d H:i:s');
								$this->db->insert('layanan_tindakan_khusus',$dt);
								echo "Data Sukses DiSimpan";
					}else {
						  redirect('login/logout');
					}

				}

				public function simpan_lainlain()
				{
					$cek=$this->session->userdata('status');
					$level=$this->session->userdata('level');
					if($cek=='lginx' && $level=='mn'){
						    error_reporting(0);
								date_default_timezone_set('Asia/Makassar');
								$key=$this->input->post('id');
								$lainlain=$this->input->post('lainlain');
								$total=RptoDb($this->input->post('total_lainlain'));
								$no_registrasi= $this->input->post('no_registrasi');

								$dt['lainlain'] = $lainlain;
								$dt['total'] =$total;
								$dt['no_registrasi'] =$no_registrasi;
								$dt['updated_by'] = $this->session->userdata('id_user');
								$dt['id'] = 'ID-'.uniqid();
								$dt['w_insert'] =date('Y-m-d H:i:s');
								$this->db->insert('layanan_lainlain',$dt);
								echo "Data Sukses DiSimpan";
					}else {
						  redirect('login/logout');
					}

				}


					public function hapus_obat()
						{
							error_reporting(0);
							$cek=$this->session->userdata('status');
							$level=$this->session->userdata('level');
							if($cek=='lginx' && $level=='mn'){
										$id['id'] = $this->input->post('id');
										$this->db->delete('layanan_obat',$id);
										echo "Data Sukses Dihapus";
							}else {
								  redirect('login/logout');
							}

						}


						public function hapus_tikhus()
						{
							error_reporting(0);
							$cek=$this->session->userdata('status');
							$level=$this->session->userdata('level');
							if($cek=='lginx' && $level=='mn'){
										$id['id'] = $this->input->post('id');
										$this->db->delete('layanan_tindakan_khusus',$id);
										echo "Data Sukses Dihapus";
							}else {
								  redirect('login/logout');
							}

						}

						public function hapus_lainlain()
						{
							error_reporting(0);
							$cek=$this->session->userdata('status');
							$level=$this->session->userdata('level');
							if($cek=='lginx' && $level=='mn'){
										$id['id'] = $this->input->post('id');
										$this->db->delete('layanan_lainlain',$id);
										echo "Data Sukses Dihapus";
							}else {
								  redirect('login/logout');
							}

						}

	}

	?>
