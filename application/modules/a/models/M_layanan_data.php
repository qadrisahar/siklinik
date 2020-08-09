<?php

class M_layanan_data extends CI_Model {

    var $table = 'layanan_data ld'; //nama tabel dari database
    var $select = array('ld.id_layanan_data','ld.id_layanan','ly.layanan as layanan','ld.layanan_data');
    var $column_order = array(null,'ld.layanan_data');
    var $column_search = array('ld.layanan_data');
    var $order = array('ld.layanan_data' => 'asc');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_datatables($id_layanan)
    {
        $this->_get_datatables_query($id_layanan);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered($id_layanan)
    {
        $this->_get_datatables_query($id_layanan);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    private function _get_datatables_query($id_layanan)
    {
        $this->db->select($this->select);
        $this->db->from($this->table);
        $this->db->join('layanan ly','ly.id_layanan=ld.id_layanan');
        $this->db->where('ld.id_layanan',$id_layanan);

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
    }

    public function insert($dt){
        $q = $this->db->insert('layanan_data',$dt);
        return $q;
    }

    public function update($dt,$id){
        $q = $this->db->update('layanan_data',$dt,$id);
        return $q;
    }

    public function delete($id){
        $q = $this->db->delete('layanan_data',$id);
        return $q;
    }

  }
