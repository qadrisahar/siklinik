<?php

class M_stok_kritis_alkes extends CI_Model {

    var $table = 'stok_alkes sl'; //nama tabel dari database
    var $select = array('sl.kode_alkes', 'sl.stok', 'kt.kategori as kategori', 'o.isi', 'o.nama_alkes as nama_alkes', 'st.satuan as satuan', 'o.id_unit', 'o.id_satuan');
    var $column_order = array(null,'sl.kode_alkes', 'sl.stok', 'kt.kategori as kategori');
    var $column_search = array('sl.stok', 'sl.kode_alkes', 'kt.kategori');
    var $order = array('sl.kode_alkes' => 'asc');

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
        ->join('alkes o','o.kode_alkes=sl.kode_alkes')
        ->join('satuan_alkes st','st.id_satuan=o.id_satuan')
        ->join('kategori_alkes kt','kt.id_kategori=o.id_kategori');
        $i = 0;
        $this->db->where("(sl.stok/o.isi) <= 10");

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

  }
