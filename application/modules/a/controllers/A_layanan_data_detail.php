<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class A_layanan_data_detail extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->dbforge();
				$this->load->model('m_layanan_data_detail');
    }

		public function index()
			{
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='lginx' && $level=='mn'){
					$id_layanan=$this->input->get('id2');
					$id_layanan_data=$this->input->get('id');
					$param_replace='layanan_'.$id_layanan.'_';
					$layanan_data=str_replace('-',' ',str_replace($param_replace,'',$id_layanan_data));
					$layanan=$this->db->select('layanan')->where('id_layanan',$id_layanan)->get('layanan')->row()->layanan;
					$d['title']='Data Layanan <b>'.$layanan.'</b>'; 
					$d['subtitle']='Detail Data <b>'.strtoupper($layanan_data).'</b>'; 
                    $d['icon']='pe-7s-plugin';   
					$d['content']='layanan_data_detail/view';
                    $d['id_layanan']=$id_layanan;
                    $d['id_layanan_data']=$id_layanan_data;
                    $this->load->view('home',$d);
				}else {
				    redirect('login/logout');
				}

			}

			function field_enums($table = '', $field = '')
			{
				$enums = array();
				if ($table == '' || $field == '') return $enums;
				$CI =& get_instance();
				preg_match_all("/'(.*?)'/", $CI->db->query("SHOW COLUMNS FROM `{$table}` LIKE '{$field}'")->row()->Type, $matches);
				foreach ($matches[1] as $key => $value) {
					$enums[$value] = $value; 
				}
				return $enums;
			} 

			function get_layanan_data_detail()
            {
				$id_layanan_data=$this->input->post('id');
				$id_layanan=$this->input->post('id2');
				$fields = $this->db->field_data($id_layanan_data);
				$i=1;
				$output='';
				foreach ($fields as $field)
				{
					if($field->name=='no_registrasi' || $field->name=='w_insert' || $field->name=='w_update' || $field->name=='updated_by'){
						continue;
					}
					if($field->type=='varchar'){
						$type='Text';
						$value=$field->max_length;
					}else{
						$value='';
						$type='Pilihan';
						$enum= $this->field_enums($id_layanan_data,$field->name);
						foreach($enum as $key){ 
							$value.=$key.', ';
						}
						
					}
					$output.='<tr>';
					$output.='<td class="text-center">'.$i++.'</td>';
					$output.='<td style="text-transform: capitalize;">'.$field->name.'</td>';
					$output.='<td class="text-center">'.$type.'</td>';
					$output.='<td class="text-center">'.rtrim($value, ", ").'</td>';
					$output.='<td class="text-center">'.'<a href="#" class="btn-action edit" data-id="'.$field->name.'" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-edit" aria-hidden="true"></i> Edit </a>
					<span class="btn-action btn-action-delete delete" data-id="'.$field->name.'"><i class="fa fa-trash" aria-hidden="true"></i> Hapus </span>'.'</td>';
					$output.='</tr>';
						
				}
				$table['table']=$output;
				
				echo json_encode($table);
            }



			public function cari_layanan_data_detail()
				{
					$cek=$this->session->userdata('status');
					$level=$this->session->userdata('level');
					if($cek=='lginx' && $level=='mn'){
								$id = $this->input->post('id');
								$id_layanan_data = base64_decode($this->input->post('id2'));
								$id_layanan = base64_decode($this->input->post('id3'));
								$d['id']=$id;
								$d['layanan_data_detail']=$id;
								$database=$this->db->database;
								$q= $this->db->query("select COLUMN_NAME, CHARACTER_MAXIMUM_LENGTH , DATA_TYPE, COLUMN_TYPE from information_schema.columns where table_schema = '$database' AND table_name = '$id_layanan_data' AND COLUMN_NAME = '$id'");
								foreach ($q->result() as $dt)
								{
									$d['type']=$dt->DATA_TYPE;
									if($dt->DATA_TYPE=='varchar'){
										$d['type']='VARCHAR';
										$d['panjang']=$dt->CHARACTER_MAXIMUM_LENGTH;
										$d['pilihan']='';
									}else{
										$pilihan='';
										$enum= $this->field_enums($id_layanan_data,$id);
										foreach($enum as $key){ 
											$pilihan.=$key.',';
										}
										$d['type']='ENUM';
										$d['panjang']='';
										$d['pilihan']=rtrim($pilihan, ",");
									}
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
								$layanan=base64_decode($this->input->post('id_layanan'));
								$layanan_data=base64_decode($this->input->post('id_layanan_data'));
								$layanan_data_detail=strtolower(str_replace(' ','_',$this->input->post('layanan_data_detail')));
								$type=$this->input->post('type');
								if (!empty($key))
								{
									if($type=='VARCHAR'){
										$panjang=$this->input->post('panjang');
										$fields = array(
											$key => array('name' => $layanan_data_detail,'type' => $type,'constraint' => $panjang,'null' => TRUE)
										);
									}else{
										$pilihan='"'.$this->input->post('pilihan').'"';
										$pilihan=str_replace(',','","',$pilihan);
										$fields = array(
											$key => array('name' => $layanan_data_detail,'type' => 'ENUM('.strtoupper($pilihan).')','null' => TRUE)
										);
									}
	
									$this->dbforge->modify_column($layanan_data, $fields);

									//Log
									$dl['aksi'] = 'Update layanan data detail '.$key.', Tabel '.$layanan_data;
									$dl['updated_by'] = $this->session->userdata('id_user');
									$dl['w_insert']=date('Y-m-d H:i:s');
									$this->db->insert('layanan_log_exc',$dl);
									//End Log

									echo "Data Sukses DiUpdate";
								}else{
									if($type=='VARCHAR'){
										$panjang=$this->input->post('panjang');
										$fields = array(
											$layanan_data_detail => array('type' => $type,'constraint' => $panjang,'null' => TRUE)
										);
									}else{
										$pilihan='"'.$this->input->post('pilihan').'"';
										$pilihan=str_replace(',','","',$pilihan);
										$fields = array(
											$layanan_data_detail => array('type' => 'ENUM('.strtoupper($pilihan).')','null' => TRUE)
										);
									}
	
									$this->dbforge->add_column($layanan_data, $fields);
									
									//Log
									$dl['aksi'] = 'Tambah layanan data detail '.$layanan_data_detail.', Tabel '.$layanan_data ;
									$dl['updated_by'] = $this->session->userdata('id_user');
									$dl['w_insert']=date('Y-m-d H:i:s');
									$this->db->insert('layanan_log_exc',$dl);
									//End Log

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
								$id=$this->input->post('id');
								$table=base64_decode($this->input->post('id2'));
								$this->dbforge->drop_column($table, $id);

								//Log
								$dl['aksi'] = 'Hapus layanan data detail '.$id.', Tabel '.$table;
								$dl['updated_by'] = $this->session->userdata('id_user');
								$dl['w_insert']=date('Y-m-d H:i:s');
								$this->db->insert('layanan_log_exc',$dl);
								//End Log

								echo "Data Sukses Dihapus";
							}else {
								  redirect('login/logout');
							}

						}

	}

	?>
