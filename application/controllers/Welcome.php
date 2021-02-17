<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	
	public function __construct()
	{
		parent::__construct();
		// if ($this->session->userdata('status')!=TRUE) 
		// {
		// 	redirect('v_login');
		// }
		$this->load->model('a_model');
		
	}
	

	public function index()
	{
		$this->load->view('v_login');
	}

	public function formDaftar()
	{
		$this->load->view('v_form');
		
	}

	public function daftarAkun()
	{
		$uuid = str_replace('-','',$this->uuid->v4());
		$username	= $this->input->post('username');
		$password	= $this->input->post('password');
		$nama		= $this->input->post('nama');
		$level		= $this->input->post('level');

		$this->a_model->tambahAkun($uuid, $username, $password, $nama, $level);
		echo "<script>alert('Akun Berhasil Ditambahkan') </script>";
		redirect('Welcome','refresh');
		
	}

	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('v_login');
		}else {
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			
			$cek = $this->a_model->login($username,$password);
			
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
				$this->load->view('home');
			} else {
				// $this->session->set_flashdata('wrong_info','ID Password Salah');
				// $this->load->view('v_login');
				echo 'salah akun';
			}
		}
	}
	
	public function logout()
		{
			$userdata = array('id_akun','status');
			$this->session->unset_userdata($userdata);
			echo "<script>alert('Logout Success') </script>";
			redirect('welcome','refresh');
		}
}
