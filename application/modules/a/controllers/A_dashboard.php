<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_dashboard extends CI_Controller {
    function __construct() {
    parent::__construct();
    $this->load->model('m_dashboard');
}

public function index()
{
    $cek=$this->session->userdata('status');
    $level=$this->session->userdata('level');
    if($cek=='lginx' && $level=='mn'){
        error_reporting(0);
        date_default_timezone_set('Asia/Makassar');
        $d['title']='Dashboard'; 
        $d['icon']='pe-7s-display1'; 
        $d['content']='dashboard'; 

        $this->load->view('home',$d);
    }else {
        redirect('login/logout');
    }
}

public function check()
	{
		$cek=$this->session->userdata('status');
		$level=$this->session->userdata('level');
		if($cek=='lginx' && $level=='mn'){
			$d1['year']=$this->input->post('year');
            $d1['month']=sprintf('%02d', $this->input->post('month'));
            
            $d['data1']=$this->load->view('dashboard/data1',$d1,TRUE);
            $d['data2']=$this->load->view('dashboard/data2',$d1,TRUE);

			echo json_encode($d);
		}else {
			redirect('login/logout');
		}
	}

}

