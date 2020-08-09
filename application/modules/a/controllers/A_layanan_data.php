<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class A_layanan_data extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->dbforge();
				$this->load->model('m_layanan_data');
    }

		public function index()
			{
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='lginx' && $level=='mn'){
					$id_layanan=base64_decode($this->input->get('id'));
					$layanan=$this->db->select('layanan')->where('id_layanan',$id_layanan)->get('layanan')->row()->layanan;
					$d['title']='Data Layanan <b>'.$layanan.'</b>'; 
                    $d['icon']='pe-7s-plugin';   
					$d['content']='layanan_data/view';
                    $d['id_layanan']=$id_layanan;
                    $this->load->view('home',$d);
				}else {
				    redirect('login/logout');
				}

			}

			function get_layanan_data()
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
				<a href="'.base_url().'a_layanan_data_detail?id='.$data_table.'&id2='.$id_layanan.'" class="btn-action btn-action-warning"><i class="fa fa-edit" aria-hidden="true"></i> Detail Data </a>
				<span class="btn-action btn-action-delete delete" data-id="'.$data_table.'"><i class="fa fa-trash" aria-hidden="true"></i> Hapus </span>'.'</td>';
				$output.='</tr>';
			}
			$table['table']=$output;
	        
	        echo json_encode($table);
	    }



			public function cari_layanan_data()
				{
					$cek=$this->session->userdata('status');
					$level=$this->session->userdata('level');
					if($cek=='lginx' && $level=='mn'){
								$id = $this->input->post('id');
								$d['id']=$id;
								$exp=explode('_',$id);
                                $d['layanan_data']=$exp[2];
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
								$id_layanan=$this->input->post('id_layanan');
								$layanan_data=strtolower(str_replace(' ','-',$this->input->post('layanan_data')));
								$table_name='layanan_'.$id_layanan.'_'.$layanan_data;
								if ($this->db->table_exists($key) )
								{
									$this->dbforge->rename_table($key, $table_name);
									//Log
									$dl['aksi'] = 'Update layanan data '.$key.' menjadi '.$table_name;
									$dl['updated_by'] = $this->session->userdata('id_user');
									$dl['w_insert']=date('Y-m-d H:i:s');
									$this->db->insert('layanan_log_exc',$dl);
									//End Log
									echo "Data Sukses DiUpdate";
								}
								else
								{
									$fields = array(
										'no_registrasi' => array(
												'type' => 'VARCHAR',
												'constraint' => '30'
										),
										'w_insert' => array(
												'type' =>'DATETIME'
										),
										'w_update' => array(
												'type' =>'DATETIME'
										),
										'updated_by' => array(
												'type' => 'VARCHAR',
												'constraint' => '30'
										)
										 
									);
									$this->dbforge->add_key('no_registrasi', TRUE);
									$this->dbforge->add_field($fields);
									$this->dbforge->create_table($table_name, TRUE);

									//Log
									$dl['aksi'] = 'Tambah layanan data '.$table_name;
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

										date_default_timezone_set('Asia/Makassar');
										$id = $this->input->post('id');
										$this->dbforge->drop_table($id,TRUE);
										//Log
										$dl['aksi'] = 'Hapus layanan data '.$id;
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
