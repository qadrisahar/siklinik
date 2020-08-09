<?php

class M_unit_alkes extends CI_Model {

    var $table = 'unit_alkes u'; //nama tabel dari database
    var $select = array('u.id_unit', 'u.unit');
    var $column_order = array(null,'u.unit');
    var $column_search = array('u.unit');
    var $order = array('u.unit' => 'asc');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    private function _get_datatables_query()
    {
        $this->db->select($this->select);
        $this->db->from($this->table);
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

    public function insert($dt){
        $q = $this->db->insert('unit_alkes',$dt);
        return $q;
    }

    public function update($dt,$id){
        $q = $this->db->update('unit_alkes',$dt,$id);
        return $q;
    }

    public function delete($id){
        $q = $this->db->delete('unit_alkes',$id);
        return $q;
    }

  }
