<?php
defined('BASEPATH') OR exit('No direct script access alowed');

class M_cetak_pasien extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function listing()
    {
        $this->db->select('*');
        $this->db->from('registrasi');
        $this->db->group_by('registrasi.no_registrasi');
        $this->db->order_by('no_registrasi', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    public function detail($no_registrasi)
    {
        $this->db->select('registrasi.*,
                            pasien.nama,
                            pasien.jenis_kelamin,
                            layanan.layanan');        
        $this->db->from('registrasi');
        $this->db->join('pasien', 'pasien.id_pasien = registrasi.id_pasien', 'left');
        $this->db->join('layanan', 'layanan.id_layanan = registrasi.id_layanan', 'left');
        $this->db->where('no_registrasi', $no_registrasi);
        // $this->db->group_by('registrasi.id_pasien');
        // $this->db->group_by('registrasi.id_layanan');
        // $this->db->group_by('registrasi.no_registrasi');
        $this->db->order_by('no_registrasi', 'asc');
        $query = $this->db->get();
        return $query->row();
    }
}