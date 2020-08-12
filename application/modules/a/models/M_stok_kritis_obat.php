<?php

class M_stok_kritis_obat extends CI_Model {

    var $table = 'stok s'; //nama tabel dari database
    var $select = array('s.kode_obat', 'o.nama_obat as nama_obat', 'kt.kategori as kategori', 'st.satuan as satuan', 's.stok','o.id_satuan','o.id_unit','o.isi');
    var $column_order = array(null,'s.kode_obat');
    var $column_search = array('s.kode_obat');
    var $order = array('s.kode_obat' => 'asc');

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
        ->join('obat o','o.kode_obat=s.kode_obat')
        ->join('kategori_obat kt','kt.id_kategori=o.id_kategori')
        ->join('satuan st','st.id_satuan=o.id_satuan');
        $this->db->where("(s.stok/o.isi) <= 10");
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
}
