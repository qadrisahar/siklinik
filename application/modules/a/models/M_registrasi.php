<?php

class M_registrasi extends CI_Model {

    var $table = 'registrasi r'; //nama tabel dari database
    var $select = array('r.no_registrasi','r.no_antrian','p.id_pasien','p.nama','p.nik','p.jenis_kelamin','ly.layanan','p.tgl_lahir','r.cancel');
    var $column_order = array(null,'p.id_pasien','r.no_antrian','p.nama','p.nik','ly.layanan');
    var $column_search = array('p.id_pasien','r.no_antrian','p.nama','p.nik','ly.layanan');
    var $order = array('p.nama' => 'asc');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_datatables($status_filter,$tgl_awal_filter,$tgl_akhir_filter)
    {
        $this->_get_datatables_query($status_filter,$tgl_awal_filter,$tgl_akhir_filter);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered($status_filter,$tgl_awal_filter,$tgl_akhir_filter)
    {
        $this->_get_datatables_query($status_filter,$tgl_awal_filter,$tgl_akhir_filter);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    private function _get_datatables_query($status_filter,$tgl_awal_filter,$tgl_akhir_filter)
    {
        $where='';
        if(!empty($status_filter)){
            $where.=" AND cancel='$status_filter'";
        }
        $this->db->select($this->select);
        $this->db->from($this->table);
        $this->db->join('pasien p','p.id_pasien=r.id_pasien');
        $this->db->join('layanan ly','ly.id_layanan=r.id_layanan');
        $this->db->where("DATE(r.w_insert) BETWEEN '$tgl_awal_filter' AND '$tgl_akhir_filter' $where");
        $i = 0;

        foreach ($this->column_search as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if($i===0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if(isset($_POST['order']))
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function create_id(){
        $date=date('Y-m-d');
        $y=date('Y');
        $m=date('m');
        $d=date('d');
        $row=$this->db->where("DATE(w_insert)='$date'")->get('registrasi')->num_rows();
        if($row>0){
            $max_id=(int)$this->db->select('MAX(RIGHT(no_registrasi,3)) as max_id')->where("DATE(w_insert)='$date'")->get('registrasi')->row()->max_id;
            $no_registrasi='REG-'.$y.$m.$d.'-'.str_pad(($max_id+1), 3, '0', STR_PAD_LEFT);
        }else {
            $no_registrasi='REG-'.$y.$m.$d.'-001';
        }
        return $no_registrasi;
    }

    public function insert($dt){
        $q = $this->db->insert('registrasi',$dt);
        return $q;
    }

    public function update($dt,$id){
        $q = $this->db->update('registrasi',$dt,$id);
        return $q;
    }

    public function delete($id){
        $q = $this->db->delete('registrasi',$id);
        return $q;
    }

  }
