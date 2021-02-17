<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_Login extends CI_Model {
	
	public function login($username,$password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get('akun');
	}

}

/* End of file ModelName.php */


?>