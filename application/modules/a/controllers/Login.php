<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	    function __construct() {
        	parent::__construct();
			$this->load->model('m_login');
			$this->load->library('encrypt');
        }
		public function index(){
			$this->load->view('login');
		}

		function cek_login(){

			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('password','Password','required');

			$this->form_validation->set_error_delimiters('<div style="color:rgb(255, 104, 104);margin-top: -14px;margin-bottom: 8px;text-align: center;">', '</div>');
  			$this->form_validation->set_message('required', '*Masukkan %s');


			if($this->form_validation->run() == false){
				$this->load->view('login');
			}else {
					$where = array(
					'username' => $username,
					'password' => md5($password),
						'aktif' 	=> '1'
					);
					$q= $this->db->get_where('users',$where);
					$cek=$q->num_rows();
					if($cek > 0){
							foreach ($q->result() as $dt) {
								$level=$dt->level;
								$data_session = array(
							'username' => $dt->username,
								'nama' => $dt->nama_lengkap,
							'status' => "lginx",
								'level' => $level,
								'id_user'=>$dt->id_user,
								'cover'=>$dt->cover,
								'id_provinsi'=>$dt->id_provinsi,
								'id_kabupaten'=>$dt->id_kabupaten,
								'id_kecamatan'=>$dt->id_kecamatan,
								'id_desa'=>$dt->id_desa,
								'photo'=>$dt->photo
							);
							}
							$this->session->set_userdata($data_session);
							if($level=='ad'){
								redirect(base_url("a_dashboard"));
							}elseif($level=='mn'){
								redirect(base_url("a_dashboard"));
							}elseif($level=='kc'){
								redirect(base_url("a_dashboard_kc"));
							}elseif($level=='kb'){
								redirect(base_url("a_dashboard_kb"));
							}
					}else{
							$this->session->set_flashdata('f_error','Username dan password tidak valid');
								redirect('login');
					}
			}


		 }

		public function logout()
		{
			$this->session->sess_destroy();
			echo "<script>window.location.href='".base_url()."login';</script>";
		}

	}

	?>
