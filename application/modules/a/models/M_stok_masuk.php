<?php

class M_stok_masuk extends CI_Model {

    var $table = 'stok_masuk sm'; //nama tabel dari database
    var $select = array('sm.id_stok_masuk', 'sm.kode_obat', 'o.nama_obat as nama_obat', 'kt.kategori as kategori', 'sm.order_date', 'sm.expired_date', 'sm.jumlah','sm.harga_beli','sm.harga_jual','o.isi','o.id_satuan','o.id_unit');
    var $column_order = array(null,'sm.kode_obat', 'o.nama_obat', 'kt.kategori', 'sm.order_date', 'sm.expired_date');
    var $column_search = array('sm.kode_obat','o.nama_obat','kt.kategori');
    var $order = array('sm.kode_obat' => 'asc');

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
      $this->db->from($this->table)
      ->join('obat o','o.kode_obat=sm.kode_obat')
      ->join('kategori_obat kt','kt.id_kategori=o.id_kategori')->order_by('sm.w_insert','desc');
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
        $q = $this->db->insert('stok_masuk',$dt);
        return $q;
    }

    public function update($dt,$id){
        $q = $this->db->update('stok_masuk',$dt,$id);
        return $q;
    }

    public function delete($id){
        $q = $this->db->delete('stok_masuk',$id);
        return $q;
    }

  }
