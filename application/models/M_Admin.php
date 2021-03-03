<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Admin extends CI_Model {

	public function getAkun()
	{
		$query = $this->db->get('akun');
		return $query->result();
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

	public function getAkunById($id_akun)
	{
		$this->db->select();
		$this->db->where('id_akun', $id_akun);
		$query=$this->db->get('akun');
		return $query->result();
	}

	public function tambahAkun($id_akun, $username, $password, $nama, $level)
	{
		$data = array(
			'id_akun'	=> $id_akun,
			'username'	=> $username, 
			'password' 	=> md5($password), 
			'nama'		=> $nama,
			'level'		=> $level,
		);
		$this->db->insert('akun', $data);
	}

	public function editAkun($id_akun,$nama,$level)
	{
		$data = array(
			'nama'		=> $nama,
			'level'		=> $level,
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

}

/* End of file ModelName.php */


?>