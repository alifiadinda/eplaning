<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class C_UpdateAkun extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status')==TRUE) 
		{
			$this->load->model('M_UpdateAkun');
		}else{	
			redirect('C_login');
		}
    }

    public function changePass()
    {
        $id = $this->session->id_akun;
        $passold = md5($this->input->post('passold'));
        $passnew = md5($this->input->post('passnew'));
        $passnew2 = md5($this->input->post('passconf'));
        $getpass = $this->M_UpdateAkun->getPass($id);
        $getpass2=$getpass[0]['password'];
        
        if ($passold != $getpass2) {
            echo "<script>alert('Password lama yang dimasukkan salah') </script>";
        }else if ($passnew != $passnew2) {
            echo "<script>alert('Konfirmasi password baru tidak sesuai') </script>";
        }else{
            echo "<script>alert('password berhasil diubah') </script>";
            $this->M_UpdateAkun->changePass($id,$passnew);
        }
        if($this->session->level == 'Admin'){
            redirect('C_Admin', 'refresh');
        }else if($this->session->level == 'Karu'){
            redirect('C_Karu', 'refresh');
        }else{
            redirect('C_Kasubid', 'refresh');
        }

    }

}

/* End of file C_UpdateAkun.php */


?>