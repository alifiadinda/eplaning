<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class C_Karu extends CI_Controller {

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
        $this->load->view('karu/header');
        //$this->load->view('karu/sidebar');
        $this->load->view('karu/v_home');
		$this->load->view('karu/footer');
    }

}

/* End of file C_Karu.php */


?>