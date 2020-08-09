<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Search_data extends CI_Controller {
	function __construct() {
        parent::__construct();
	}

	public function cari_obat()
		{
			$query=$this->input->post('query');
			$output = '';
			$q = $this->db->query("SELECT o.kode_obat,o.nama_obat,o.harga_beli,o.harga_jual,o.id_unit,o.id_satuan,o.isi,kt.kategori FROM obat o LEFT JOIN kategori_obat kt ON kt.id_kategori=o.id_kategori WHERE (kode_obat LIKE '%".$query."%') OR nama_obat LIKE '%".$query."%'");
			$row=$q->num_rows();
			$output = '<ul class="list-unstyled" tabindex="-1" role="listbox" aria-labelledby="no">';
		if($row > 0)
		{
						$i=1;
						foreach ($q->result() as $dt) {
				$output .= '<li id="no_'.$i++.'" role="option" data-hj="'.toRp($dt->harga_jual).'" data-hb="'.toRp($dt->harga_beli).'" data-unit="'.$dt->id_unit.'" data-isi="'.$dt->isi.' '.$dt->id_satuan.'"><b>'.$dt->kode_obat.'</b>/'.$dt->nama_obat.'/'.$dt->kategori.'</li>';
						}
		}
		else
		{
			$output .= '<li>Obat tidak ditemukan</li>';
		}
		$output .= '</ul>';
		echo $output;

		}

		function data_obat_tindakan()
	    {
			$no_registrasi=$this->input->post('no_registrasi');
			$this->db->select('lo.id,lo.kode_obat,o.nama_obat,kt.kategori,lo.keterangan,lo.jumlah,lo.harga_jual,lo.total,o.id_satuan');
			$this->db->from('layanan_obat lo')
			->join('obat o','o.kode_obat=lo.kode_obat')
			->join('kategori_obat kt','kt.id_kategori=o.id_kategori')->where('lo.no_registrasi',$no_registrasi)->order_by('lo.w_insert','desc');
			$tables=$this->db->get();
			$output='';
			$i=1;
			$total=0;
			foreach($tables->result() as $dt) {
				$total+=$dt->total;
				$output.='<tr>';
				$output.='<td class="text-center">'.$i++.'</td>';
				$output.='<td>'.$dt->kode_obat.'</td>';
				$output.='<td>'.$dt->nama_obat.'</td>';
				$output.='<td>'.$dt->kategori.'</td>';
				$output.='<td>'.$dt->keterangan.'</td>';
				$output.='<td>'.$dt->jumlah.' '.$dt->id_satuan.'</td>';
				$output.='<td>'.toRp($dt->total).'</td>';
				$output.='<td class="text-center">'.'<span class="btn-action btn-action-delete delete-obat" data-id="'.$dt->id.'"><i class="fa fa-trash" aria-hidden="true"></i> Hapus </span>'.'</td>';
				$output.='</tr>';
			}
			$table['table']=$output;
			$table['total']=toRp($total);
	        
	        echo json_encode($table);
		}
		
		function data_tikhus_tindakan()
	    {
			$no_registrasi=$this->input->post('no_registrasi');
			$this->db->select('id,tindakan_khusus,total');
			$this->db->from('layanan_tindakan_khusus')->where('no_registrasi',$no_registrasi)->order_by('w_insert','desc');
			$tables=$this->db->get();
			$output='';
			$i=1;
			$total=0;
			foreach($tables->result() as $dt) {
				$total+=$dt->total;
				$output.='<tr>';
				$output.='<td class="text-center">'.$i++.'</td>';
				$output.='<td>'.$dt->tindakan_khusus.'</td>';
				$output.='<td>'.toRp($dt->total).'</td>';
				$output.='<td class="text-center">'.'<span class="btn-action btn-action-delete delete-tikhus" data-id="'.$dt->id.'"><i class="fa fa-trash" aria-hidden="true"></i> Hapus </span>'.'</td>';
				$output.='</tr>';
			}
			$table['table']=$output;
			$table['total']=toRp($total);
	        
	        echo json_encode($table);
		}
		
		function data_lainlain_tindakan()
	    {
			$no_registrasi=$this->input->post('no_registrasi');
			$this->db->select('id,lainlain,total');
			$this->db->from('layanan_lainlain')->where('no_registrasi',$no_registrasi)->order_by('w_insert','desc');
			$tables=$this->db->get();
			$output='';
			$i=1;
			$total=0;
			foreach($tables->result() as $dt) {
				$total+=$dt->total;
				$output.='<tr>';
				$output.='<td class="text-center">'.$i++.'</td>';
				$output.='<td>'.$dt->lainlain.'</td>';
				$output.='<td>'.toRp($dt->total).'</td>';
				$output.='<td class="text-center">'.'<span class="btn-action btn-action-delete delete-lainlain" data-id="'.$dt->id.'"><i class="fa fa-trash" aria-hidden="true"></i> Hapus </span>'.'</td>';
				$output.='</tr>';
			}
			$table['table']=$output;
			$table['total']=toRp($total);
	        
	        echo json_encode($table);
	    }


}

	?>
