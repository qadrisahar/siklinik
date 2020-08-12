<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class A_detail_pasien extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->dbforge();
                $this->load->model('m_pasien');
                $this->load->model('m_registrasi_pasien');
    }

		public function index()
			{
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='lginx' && $level=='mn'){
					$id_pasien=base64_decode($this->input->get('id'));
					$pasien=$this->db->select('id_pasien')->where('id_pasien',$id_pasien)->get('pasien')->row()->id_pasien;
					$d['title']='Data Pasien <b>'.$pasien.'</b>'; 
                    $d['icon']='pe-7s-plugin';   
					$d['content']='pasien/detail';
                    $d['id_pasien']=$id_pasien;
                    $d['database']=$this->db->database;
					$q=$this->db->where('id_pasien',$id_pasien)->get('pasien');
					foreach($q->result() as $dt){
						$qp=$this->db->select('*')->where('id_pasien',$dt->id_pasien)->get('pasien');
						foreach($qp->result() as $dp){
							$d['nama']=$dp->nama;
							$d['no_jkn']=$dp->no_jkn;
							$d['nik']=$dp->nik;
							$d['tempat_lahir']=$dp->tempat_lahir;
							$d['tgl_lahir']=$dp->tgl_lahir;
							$d['kontak']=$dp->kontak;
							$d['jenis_kelamin']=$dp->jenis_kelamin;
							$d['kontak_2']=$dp->kontak_2;
							$d['alamat']=$dp->alamat;
							$d['email']=$dp->email;
							$d['keterangan']=$dp->keterangan;
						}
						$d['w_insert']=datetime2($dt->w_insert);
						$d['pekerjaan']=$this->db->select('pekerjaan')->where('id_pekerjaan',$dt->id_pekerjaan)->get('pekerjaan')->row()->pekerjaan;
						$d['pendidikan']=$this->db->select('pendidikan')->where('id_pendidikan',$dt->id_pendidikan)->get('pendidikan')->row()->pendidikan;
						$d['id_pekerjaan']=$dt->id_pekerjaan;
						$d['id_pendidikan']=$dt->id_pendidikan;
					}
                    $this->load->view('home',$d);
				}else {
				    redirect('login/logout');
				}

            }
            
            function get_detail_pasien()
            {
                $id_pasien=base64_decode($this->input->post('id_pasien'));
                $list = $this->m_registrasi_pasien->get_datatables($id_pasien);
                $data = array();
                $no = $this->input->post('start');
                foreach ($list as $dt) {
                    if($dt->bayar=='y'){
                        $bayar='<span class="badge badge-success">Terbayar</span>';
                    }else{
                        $bayar='<span class="badge badge-danger">Belum</span>';
                    }
                    
                    $no++;
                    $row = array();
                    $row[] = '<center>'.$no.'</center>';
                    $row[] = $dt->no_registrasi;
                    $row[] = '<center>'.$dt->no_antrian.'</center>';
                    $row[] = $dt->id_pasien;
                    $row[] = $dt->nama;
                    $row[] = $dt->nik;
                    $row[] = '<center>'.$dt->jenis_kelamin.'</center>';
                    $row[] = '<center>'.hitung_umur($dt->tgl_lahir).'</center>';
                    $row[] = $dt->layanan;
                    $row[] = '<center>'.$bayar.'</center>';
    
                    $data[] = $row;
                }
    
                $output = array(
                    "draw" => $this->input->post('draw'),
                    "recordsTotal" => $this->m_registrasi_pasien->count_all(),
                    "recordsFiltered" => $this->m_registrasi_pasien->count_filtered($id_pasien),
                    "data" => $data,
                );
                //output dalam format JSON
                echo json_encode($output);
            }
	}

	?>
