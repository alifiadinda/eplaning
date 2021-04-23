<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_Login extends CI_Model {
	
	public function login($username,$password)
	{
		$this->db->select('*');
		$this->db->from('akun');
		$this->db->join('ruangan', 'akun.kode_ruangan = ruangan.kode_ruangan');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get();
	}

}

/* End of file ModelName.php */


?>