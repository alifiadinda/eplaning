<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class a_model extends CI_Model {

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
	
	public function login($username,$password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get('akun');
	}	

}

/* End of file ModelName.php */


?>