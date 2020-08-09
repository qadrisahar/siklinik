<?php

class M_dashboard extends CI_Model {

    public function total($tbl){
        $q = $this->db->get($tbl)->num_rows();
        return $q;
    }

  }
