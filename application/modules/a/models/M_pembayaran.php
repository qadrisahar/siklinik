<?php

class M_pembayaran extends CI_Model {

    public function create_id(){
        $date=date('Y-m-d');
        $y=date('Y');
        $m=date('m');
        $d=date('d');
        $row=$this->db->where("DATE(w_insert)='$date'")->get('pembayaran')->num_rows();
        if($row>0){
            $max_id=(int)$this->db->select('MAX(LEFT(no_pembayaran,3)) as max_id')->where("DATE(w_insert)='$date'")->get('pembayaran')->row()->max_id;
            $no_pembayaran=str_pad(($max_id+1), 3, '0', STR_PAD_LEFT).'/KWT/BPM A.NANI/'.$d.'/'.$m.'/'.$y;
        }else {
            $no_pembayaran='001/KWT/BPM A.NANI/'.$d.'/'.$m.'/'.$y;
        }
        return $no_pembayaran;
    }

    public function insert($dt){
        $q = $this->db->insert('pembayaran',$dt);
        return $q;
    }

    public function update($dt,$id){
        $q = $this->db->update('pembayaran',$dt,$id);
        return $q;
    }

    public function delete($id){
        $q = $this->db->delete('pembayaran',$id);
        return $q;
    }

  }
