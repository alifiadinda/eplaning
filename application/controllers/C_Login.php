<?php

    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class C_Login extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            $this->load->model('M_Login');
        }
        

        public function index()
        {
    		$this->load->view('v_login');        
        }

        public function login()
        {
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            
            if($this->form_validation->run() === FALSE){
                // echo "<script>alert('Informasi Akun Tidak Ditemukan') </script>";
                $this->load->view('v_login');
            }else {
                $username = $this->input->post('username');
                $password = md5($this->input->post('password'));
                
                $cek = $this->M_Login->login($username,$password);
                
                if ($cek->num_rows() == 1) {
                    $value = $cek->row();

                    $userdata = array(
                        'id_akun' 	=> $value->id_akun,
                        'nama'		=> $value->nama,
                        'username' 	=> $value->username, 
                        'password' 	=> $value->password, 
                        'level'		=> $value->level,
                        'status' 	=> TRUE,
                    );

                    $this->session->set_userdata($userdata);
                    if($value->level == 'Admin'){
                        redirect('C_Admin','refresh');
                    }else if($value->level == 'Karu'){
                        redirect('C_Karu','refresh');
                    }else{
                        redirect('C_Kasubid','refresh');
                    }
                } else {
                    // echo "salah akun";
                    echo "<script>alert('Informasi Akun Tidak Ditemukan') </script>";
			        redirect('C_Login','refresh');
                }
            }
        }

        public function logout()
		{
			$userdata = array('id_akun','status');
			$this->session->unset_userdata($userdata);
			echo "<script>alert('Logout Success') </script>";
			redirect('C_Login','refresh');
		}
    
    }
    
    /* End of file Controllername.php */
    

?>