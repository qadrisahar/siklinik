<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class A_data extends CI_Controller {
	function __construct() {
        parent::__construct();
				$this->load->model('m_data_pasien');
    }
            
            function get_data_pasien()
	    {
	        $list = $this->m_data_pasien->get_datatables();
	        $data = array();
	        $no = $this->input->post('start');
	        foreach ($list as $dt) {
					    $no++;
	            $row = array();
	            $row[] = '<center>'.$no.'<center>';
				  		$row[] = ''.$dt->id_pasien.'';
				  		$row[] = ''.$dt->nama.'';
				  		$row[] = ''.$dt->nik.'';
				  		$row[] = ''.$dt->jenis_kelamin.'';
				  		$row[] = ''.$dt->alamat.'';
                          $row[] =  '<center>
                          <span class="btn-action btn-action select" data-id="'.$dt->id_pasien.'"><i class="fa fa-check" aria-hidden="true"></i> Pilih </span>
                      </center>';

	            $data[] = $row;
	        }

	        $output = array(
	            "draw" => $this->input->post('draw'),
	            "recordsTotal" => $this->m_data_pasien->count_all(),
	            "recordsFiltered" => $this->m_data_pasien->count_filtered(),
	            "data" => $data,
	        );
	        echo json_encode($output);
            }
            
            public function cari_detail_pasien()
				{
					$cek=$this->session->userdata('status');
					$level=$this->session->userdata('level');
					if($cek=='lginx' && $level=='mn'){
								$id['id_pasien'] = $this->input->post('x');
								$q=$this->db->select('tempat_lahir,tgl_lahir,no_jkn')->get_where('pasien',$id);
								foreach ($q->result() as $dt) {
                                    $d['no_jkn']=$dt->no_jkn;
									$d['ttl']=$dt->tempat_lahir.', '.todate2($dt->tgl_lahir);
									$d['usia']=hitung_umur($dt->tgl_lahir);

                                }
								echo json_encode($d);
					}else {
						  redirect('login/logout');
					}

				}
		

	}

	?>
