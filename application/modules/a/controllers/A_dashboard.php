<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_dashboard extends CI_Controller {
    function __construct() {
    parent::__construct();
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

}

