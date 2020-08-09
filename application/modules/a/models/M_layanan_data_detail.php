<?php

class M_layanan_data_detail extends CI_Model {

    var $table = 'layanan_data_detail ldt'; //nama tabel dari database
    var $select = array('ldt.id_layanan_data_detail','ldt.id_layanan_data','ldt.id_layanan','ldt.layanan_data_detail');
    var $column_order = array(null,'ldt.layanan_data_detail');
    var $column_search = array('ldt.layanan_data_detail');
    var $order = array('ldt.layanan_data_detail' => 'asc');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_datatables($id_layanan_data)
    {
        $this->_get_datatables_query($id_layanan_data);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered($id_layanan_data)
    {
        $this->_get_datatables_query($id_layanan_data);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    private function _get_datatables_query($id_layanan_data)
    {
        $this->db->select($this->select);
        $this->db->from($this->table);
        $this->db->join('layanan_data ld','ld.id_layanan_data=ldt.id_layanan_data');
        $this->db->where('ldt.id_layanan_data',$id_layanan_data);

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
        $q = $this->db->insert('layanan_data_detail',$dt);
        return $q;
    }

    public function update($dt,$id){
        $q = $this->db->update('layanan_data_detail',$dt,$id);
        return $q;
    }

    public function delete($id){
        $q = $this->db->delete('layanan_data_detail',$id);
        return $q;
    }

  }
