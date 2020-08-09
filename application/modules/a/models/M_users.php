<?php

class M_users extends CI_Model {

    var $table = 'users a'; //nama tabel dari database
    var $select = array('a.id_user', 'a.username','a.nama_lengkap','a.alamat','a.nik','a.email','a.kontak','a.level','a.aktif','a.photo');
    var $column_order = array(null,'a.username','a.nama_lengkap','a.alamat','a.level');
    var $column_search = array('a.username','a.nama_lengkap','a.alamat','a.nik','a.kontak');
    var $order = array('a.nama_lengkap' => 'asc');

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
        // $this->db->from($this->table)->where('level','ad');
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
        $q = $this->db->insert('users',$dt);
        return $q;
    }

    public function update($dt,$id){
        $q = $this->db->update('users',$dt,$id);
        return $q;
    }

    public function delete($id){
        $q = $this->db->delete('users',$id);
        return $q;
    }

  }
