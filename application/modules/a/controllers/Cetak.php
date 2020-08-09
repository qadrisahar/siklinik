<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Cetak extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('m_cetak_pasien');
	}
	
        public function antrian()
        {
                $no_registrasi=base64_decode($this->input->get('x'));
                $antrian = $this->m_cetak_pasien->detail($no_registrasi);        
                $cek=$this->session->userdata('status');
                $level=$this->session->userdata('level');

                if($cek=='lginx' && $level='mn'){
                        $data = array(  'title'   => 'Cetak Nomor Antrian',
                                        'antrian' => $antrian, 
                                        'icon'    => 'pe-7s-print',
                                        'content'=>'cetak/pasien');
                        $this->load->view('home',$data);
                } else {
                        redirect('login/logout');
                }
        }
}

	?>
