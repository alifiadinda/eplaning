<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class C_Kasubid extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status')==TRUE) 
		{
			// $this->load->model('M_admin');
		}else{	
			redirect('C_login');
		}
    }

    public function index()
    {
        $this->load->view('kasubid/header');
        //$this->load->view('kasubid/sidebar');
        $this->load->view('kasubid/v_home');
		$this->load->view('kasubid/footer');
    }

}

/* End of file C_Kasubid.php */


?>