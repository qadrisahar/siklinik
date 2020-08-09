<?php

class M_pasien extends CI_Model {

    public function create_id(){
        $date=date('Y-m-d');
        $y=date('Y');
        $m=date('m');
        $d=date('d');
        $row=$this->db->where("DATE(w_insert)='$date'")->get('pasien')->num_rows();
        if($row>0){
            $max_id=(int)$this->db->select('MAX(RIGHT(id_pasien,3)) as max_id')->where("DATE(w_insert)='$date'")->get('pasien')->row()->max_id;
            $id_pasien='P-'.$y.$m.$d.'-'.str_pad(($max_id+1), 3, '0', STR_PAD_LEFT);
        }else {
            $id_pasien='P-'.$y.$m.$d.'-001';
        }
        return $id_pasien;
    }

    public function insert($dt){
        $q = $this->db->insert('pasien',$dt);
        return $q;
    }

    public function update($dt,$id){
        $q = $this->db->update('pasien',$dt,$id);
        return $q;
    }

    public function delete($id){
        $q = $this->db->delete('pasien',$id);
        return $q;
    }

  }
