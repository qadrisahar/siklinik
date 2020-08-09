<?php

class M_setting extends CI_Model {

    public function update($dt,$id){
        $q = $this->db->update('setting',$dt,$id);
        return $q;
    }

  }
