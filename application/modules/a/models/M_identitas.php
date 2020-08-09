<?php

class M_identitas extends CI_Model {

    public function update($dt,$id){
        $q = $this->db->update('identitas',$dt,$id);
        return $q;
    }

  }
