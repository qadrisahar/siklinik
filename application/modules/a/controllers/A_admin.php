<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class A_admin extends CI_Controller {
	function __construct() {
        parent::__construct();
				$this->load->model('m_users');
    }

		public function index()
			{
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='lginx' && $level=='mn'){
                    $d['title']='Data Admin'; 
					$d['icon']='pe-7s-user';       	
					$d['content']='admin/view';
					$this->load->view('home',$d);
				}else {
				    redirect('login/logout');
				}

			}

			function get_data_admin()
	    {
	        $list = $this->m_users->get_datatables();
	        $data = array();
	        $no = $this->input->post('start');
	        foreach ($list as $dt) {
							if (!empty($dt->photo)){
							$photo= '<img src="'.base_url().'assets/img/admins/200x200/'.$dt->photo.'" class="photo-table"></img>';
							}else{
								$photo= '<div class="photo-table"><i class="fa fa-user"></i></div>';
							}
							if($dt->level=='ad'){
								$lvl='<span class="badge badge-primary">Administrator</span>';
							}else{
								$lvl='<span class="badge badge-warning">Manager</span>';
							}
							if($dt->aktif=='1'){
								$status='<span class="badge badge-success">Aktif</span>';
							}else{
								$status='<span class="badge badge-danger">Tidak Aktif</span>';
							}
					    $no++;
	            $row = array();
	            $row[] = '<center>'.$no.'<center>';
				$row[] = ''.$photo.'';
				  		$row[] = ''.$dt->nama_lengkap.'';
				  		$row[] = ''.$dt->nik.'';
				  		$row[] = ''.$dt->alamat.'';
				  		$row[] = ''.$dt->kontak.'';
				  		$row[] = ''.$lvl.'';
				  		$row[] = '<center>'.$status.'</center>';
							$row[] =  '<center>
							<a href="#" class="btn-action edit" data-id="'.$dt->id_user.'" data-toggle="modal" data-target="#modal-admin"><i class="fa fa-edit" aria-hidden="true"></i> Edit </a>
														<a href="#" class="btn-action btn-action-warning account" data-id="'.$dt->id_user.'" data-toggle="modal" data-target="#modal-account"><i class="fa fa-key" aria-hidden="true"></i> Akun </a>
														<span class="btn-action btn-action-delete delete" data-id="'.$dt->id_user.'"><i class="fa fa-trash" aria-hidden="true"></i> Hapus </span>
														</center>';

	            $data[] = $row;
	        }

	        $output = array(
	            "draw" => $this->input->post('draw'),
	            "recordsTotal" => $this->m_users->count_all(),
	            "recordsFiltered" => $this->m_users->count_filtered(),
	            "data" => $data,
	        );
	        echo json_encode($output);
			}
		



			public function cari_admin()
				{
					$cek=$this->session->userdata('status');
					$level=$this->session->userdata('level');
					if($cek=='lginx' && $level=='mn'){
								$id['id_user'] = $this->input->post('id');
								$q=$this->db->get_where('users',$id);
								$row=$q->num_rows();
								if($row>0){
									foreach ($q->result() as $dt) {
										$d['id_user']=$dt->id_user;
										$d['username']=$dt->username;
										$d['nama']=$dt->nama_lengkap;
										$d['nik']=$dt->nik;
										$d['email']=$dt->email;
										$d['alamat']=$dt->alamat;
										$d['kontak']=$dt->kontak;
										$d['level']=$dt->level;
										$d['aktif']=$dt->aktif;
									}
								}else {
									$d['id_user']='';
									$d['username']='';
									$d['nama']='';
									$d['nik']='';
									$d['email']='';
									$d['alamat']='';
									$d['kontak']='';
									$d['level']='';
									$d['aktif']='';
								}
								echo json_encode($d);
					}else {
						  redirect('login/logout');
					}

				}

				public function cari_account()
					{
						$cek=$this->session->userdata('status');
						$level=$this->session->userdata('level');
						if($cek=='lginx' && $level=='mn'){
									$id['id_user'] = $this->input->post('id');
									$q=$this->db->get_where('users',$id);
									$row=$q->num_rows();
									if($row>0){
										foreach ($q->result() as $dt) {
											$d['id_user']=$dt->id_user;
											$d['username']=$dt->username;
										}
									}else {
										$d['id']='';
										$d['username']='';
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
						    // error_reporting(0);
								date_default_timezone_set('Asia/Makassar');
								$key=$this->input->post('id_user');
								$id_provinsi=$this->db->select('id_provinsi')->where('id','identitas')->get('identitas')->row()->id_provinsi;
								$id['id_user'] = $key;
								$dt['id_provinsi'] = $id_provinsi;
								$dt['username'] = $this->input->post('username');
								$dt['nama_lengkap'] = $this->input->post('nama');
								$dt['nik'] = $this->input->post('nik');
								$dt['email'] = $this->input->post('email');
								$dt['kontak'] = $this->input->post('kontak');
								$dt['alamat'] = $this->input->post('alamat');
								$dt['level'] = $this->input->post('level');
								$dt['aktif'] = $this->input->post('aktif');
								$dt['updated_by'] = $this->session->userdata('id_user');

								$q=$this->db->get_where('users',$id)->num_rows();
									if($q>0){
										$dt['w_update'] =date('Y-m-d H:i:s');
										$this->m_users->update($dt,$id);
										echo "Data Sukses DiUpdate";
									}else {
										$dt['id_user'] = 'UR-'.uniqid();
									  $dt['password'] = md5($this->input->post('username'));
										$dt['w_insert'] =date('Y-m-d H:i:s');
										$this->m_users->insert($dt);
										echo "Data Sukses DiSimpan";
									}

								
					}else {
						  redirect('login/logout');
					}

				}

				public function simpan_account()
					{
						$cek=$this->session->userdata('status');
						$level=$this->session->userdata('level');
						if($cek=='lginx' && $level=='mn'){
							    error_reporting(0);
									date_default_timezone_set('Asia/Makassar');
									$key=$this->input->post('id_user_a');
									$id['id_user'] = $key;
									$dt['username'] = $this->input->post('username_a');
									$dt['password'] = md5($this->input->post('password1'));
									$this->m_users->update($dt,$id);
									echo "Data Sukses DiUpdate";
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
										$id['id_user'] = $this->input->post('id');
										$this->m_users->delete($id);
										echo "Data Sukses Dihapus";
							}else {
								  redirect('login/logout');
							}

						}

	}

	?>
