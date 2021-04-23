<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_UpdateAkun extends CI_Model {

    public function getPass($id)
    {
        $this->db->select('password');
        $this->db->where('id_akun', $id);
        $query=$this->db->get('akun');
        return $query->result_array();
    }

    public function changePass($id,$passnew)
    {
        $data = array( 'password'=>$passnew );

        $this->db->where('id_akun', $id);
        $result = $this->db->update('akun', $data);
        return $result;
    }

    public function editAkun($id_akun,$nama)
    {
        $data = array(
            'nama'          => $nama,
        );
        $this->db->where('id_akun', $id_akun);
        $this->db->update('akun', $data);
    }

}

/* End of file M_UpdateAkun.php */


?>