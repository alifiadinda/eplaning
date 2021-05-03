<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Admin extends CI_Model {

	public function getAkun()
	{
		$this->db->select('*');
		$this->db->from('akun');
		$this->db->join('ruangan', 'akun.kode_ruangan = ruangan.kode_ruangan');
		$query = $this->db->get();
		return $query->result();
	}

	public function hitung_akun()
	{
		$query = $this->db->get('akun');
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}
	public function hitung_RKA()
	{
		$query = $this->db->get_where('sk_belanja', array('status' => 'RKA'));
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}

	public function hitung_draft_DPA()
	{
		$query = $this->db->get_where('sk_belanja', array('status' => 'Draft DPA'));
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}

	public function hitung_DPA()
	{
		$query = $this->db->get_where('sk_belanja', array('status' => 'DPA'));
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}

	public function getRKA()
	{
		$get = $this->input->get();
		if (isset($get['kategori'])){
			$this->db->where('program',$get['kategori']);
		}
		if (isset($get['kegiatan'])){
			$this->db->where('kegiatan',$get['kegiatan']);
		}
		if (isset($get['tampil'])){
			$this->db->where('subkegiatan',$get['tampil']);
		}
		$this->db->where('status','rka');
		$query = $this->db->get('sk_belanja');
		return $query->result();
	}

	public function getSatuRKA($id_rka='')
	{
		$this->db->where('id',$id_rka);
		$this->db->where('status','rka');
		$query = $this->db->get('sk_belanja');
		return $query->row();
	}

	public function getSatuDraft($id_draft='')
	{
		$this->db->where('id',$id_draft);
		$this->db->where('status','Draft DPA');
		$query = $this->db->get('sk_belanja');
		return $query->row();
	}

	public function getSatuDPA($id_dpa='')
	{
		$this->db->where('id',$id_dpa);
		$this->db->where('status','DPA');
		$query = $this->db->get('sk_belanja');
		return $query->row();
	}

	public function getDraft()
	{
		$get = $this->input->get();
		if (isset($get['kategori'])){
			$this->db->where('program',$get['kategori']);
		}
		if (isset($get['kegiatan'])){
			$this->db->where('kegiatan',$get['kegiatan']);
		}
		if (isset($get['tampil'])){
			$this->db->where('subkegiatan',$get['tampil']);
		}
		$this->db->where('status','Draft DPA');
		$query = $this->db->get('sk_belanja');
		return $query->result();
	}

	public function getDPA()
	{
		$get = $this->input->get();
		if (isset($get['kategori'])){
			$this->db->where('program',$get['kategori']);
		}
		if (isset($get['kegiatan'])){
			$this->db->where('kegiatan',$get['kegiatan']);
		}
		if (isset($get['tampil'])){
			$this->db->where('subkegiatan',$get['tampil']);
		}
		$this->db->where('status','dpa');
		$query = $this->db->get('sk_belanja');
		return $query->result();
	}

	public function getSatuData($id_detail)
	{
		$this->db->where('id_detail',$id_detail);
		$result = $this->db->get('detail_belanja')->row();
		if ($result) {
			if ($result->butuh_rincian=='1') {
				$result->butuh_rincian = 'checked';
			}
		}
		return $result;
	}

	public function getDetail()
	{
		$query = $this->db->get('detail_belanja');
		return $query->result();
	}

/*=============================================================== MANAJEMEN AKUN ===============================================================*/
	public function getAkunById($id_akun)
	{
		$this->db->select('*');
		$this->db->from('akun');
		$this->db->join('ruangan', 'akun.kode_ruangan = ruangan.kode_ruangan');
		$this->db->where('id_akun', $id_akun);
		$query = $this->db->get();
		return $query->result();
	}

	public function getRuangan()
	{
		$this->db->order_by("nama_ruangan", "asc");
		$query = $this->db->get('ruangan');
		return $query->result();
	}

	public function tambahAkun($uuid, $username, $password, $nama, $level,$ruangan)
	{
		$data = array(
			'id_akun'	=> $uuid,
			'username'	=> $username, 
			'password' 	=> md5($password), 
			'nama'		=> $nama,
			'level'		=> $level,
			'kode_ruangan'	=> $ruangan,
		);
		$this->db->insert('akun', $data);
	}

	public function editAkun($id_akun,$nama,$level)
	{
		$data = array(
			'nama'			=> $nama,
			'level'			=> $level,
			'kode_ruangan'	=> $ruangan,
		);
		$this->db->where('id_akun', $id_akun);
		$this->db->update('akun', $data);
	}

	public function deleteAkun($id_akun)
	{
		$this->db->where('id_akun', $id_akun);
		$result = $this->db->delete('akun');
		return $result;
	}

	public function cekUsername($username)
	{
		$this->db->where('username', $username);
		$query = $this->db->get('akun');
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
/*=============================================================== MANAJEMEN AKUN ===============================================================*/
	

	public function rekening(){

        $this->db->order_by('id');

        $query = $this->db->get('detail_belanja');
        return $query->result();
    }	



/*=============================================================== USULAN ===============================================================*/

	public function getItemUsulan()
	{
		$this->db->select('*');
		$this->db->from('item_usulan');
		$this->db->where('status', 'aktif');
		$query = $this->db->get();
		return $query->result();
	}

	public function getPeriode($id_usulan)
	{
		$this->db->where('id_usulan', $id_usulan);
		$query = $this->db->get('usulan');
		return $query->result();
	}

	public function updateUsulan($id,$tgl_buka,$tgl_tutup)
	{
		$data = array(
			'tgl_buka'	=> $tgl_buka, 
			'tgl_tutup'	=> $tgl_tutup, 
		);
		$this->db->where('id_usulan', $id);
		$result = $this->db->update('usulan', $data);
		return $result;
	}

	public function deleteDetailUsulan($id_detail_usulan)
	{
		$this->db->where('id_detail_usulan', $id_detail_usulan);
		$result = $this->db->delete('detail_usulan');
		return $result;
	}

	public function deleteUsulan($id_usulan)
	{
		$this->db->where('id_usulan', $id_usulan);
		$result = $this->db->delete('usulan');
		return $result;
	}

	public function getDetailUsulan($id_usulan)
	{
		$this->db->select('*');
		$this->db->from('item_usulan');
		$this->db->where('id_usulan', $id_usulan);
		$query = $this->db->get();
		return $query->result();
	}

	public function getDetailUsulanUnit($unit_pengusul)
	{
		$this->db->select('*');
		$this->db->from('rincian');
		$this->db->where('unit_pengusul', $unit_pengusul);
		$this->db->order_by('tgl_diusulkan', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

/*=============================================================== USULAN ===============================================================*/

/*=============================================================== RINCIAN ===============================================================*/
	
	public function cekRincian($id_usulan,$awal,$akhir,$unit_pengusul)
	{
		$condition = array('id_usulan' => $id_usulan,'unit_pengusul' => $unit_pengusul, 'tgl_diusulkan >=' => $awal, 'tgl_diusulkan <=' => $akhir);
		$this->db->select('*');
		$this->db->from('rincian');
		$this->db->where($condition);
		// $this->db->where('unit_pengusul', $unit_pengusul);
		// $this->db->where('tgl_diusulkan >= ' => $awal);
		// $this->db->where('tgl_diusulkan <= ' => $akhir);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function tambahUsulan($id_usulan,$keterangan,$satuan,$harga,$kode_rekening,$koefisien,$jumlah,$unit_pengusul)
	{
		$data = array(
			'id_usulan'	=> $id_usulan,
			'keterangan'	=> $keterangan,
			'koefisien'		=> $koefisien, 
			'satuan'		=> $satuan, 
			'harga'	=> $harga, 
			'ppn'			=> "0",
			'jumlah'		=> $jumlah,
			'kode_rekening'	=> $kode_rekening, 
			'unit_pengusul'	=> $unit_pengusul,
		);
		$this->db->insert('rincian', $data);
	}


	public function updateJumlah($id_usulan,$awal,$akhir,$unit_pengusul,$koefisien,$jumlah)
	{
		$condition = array('id_usulan' => $id_usulan,'unit_pengusul' => $unit_pengusul, 'tgl_diusulkan >=' => $awal, 'tgl_diusulkan <=' => $akhir);
		$data = array(
			'koefisien'		=> $koefisien, 
			'jumlah'		=> $jumlah,
		);
		$this->db->where($condition);
		$result = $this->db->update('rincian', $data);
		return $result;
	}
/*=============================================================== RINCIAN ===============================================================*/

/* End of file ModelName.php */

}

?>