<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_home extends CI_Controller {
	function __construct() {
        parent::__construct();
			  $this->load->database('default');
    }

	public function index()
	{
		$cek=$this->session->userdata('status');
		$level=$this->session->userdata('level');
		if($cek=='lginx' && ($level=='ad' || $level=='ds' || $level=='kc' || $level=='kb')){
			$d['nama'] = $this->session->userdata('nama');
			if($level=='ad'){
				$d['content']='dashboard';
			}elseif($level=='ds'){
				$d['content']='dashboard';
			}
			$this->load->view('home',$d);
		}else {
			redirect('login/logout');
		}
	}

	public function dashboard()
			{
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='lginx' && $level=='ad'){
                    $d['title']='Dashboard'; 
                    $d['icon']='pe-7s-display1';       
					$this->load->view('v_home',$d);
				}else {
				    redirect('login/logout');
				}

			}

}
