<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Admin extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status')==TRUE) 
		{
			$this->load->model('M_admin');
		}else{	
			redirect('C_login');
		}
	}


	public function index()
	{
		$this->load->view('admin/header');
		// $this->load->view('admin/sidebar');
		$this->load->view('admin/v_home');
		$this->load->view('admin/footer');
	}

	public function RKA()
	{
		$data['page_title'] = 'RKA'; 
		$data['RKA'] = $this->M_admin->getRKA();
		$this->load->view('admin/header');
		// $this->load->view('admin/sidebar');
		$this->load->view('admin/v_rka',$data);
		$this->load->view('admin/footer');
	}

	public function Draft()
	{
		$data['page_title'] = 'Draft DPA'; 
		$data['Draft'] = $this->M_admin->getDraft();
		$this->load->view('admin/header');
		// $this->load->view('admin/sidebar');
		$this->load->view('admin/v_draft',$data);
		$this->load->view('admin/footer');
	}

	public function DPA()
	{
		$data['page_title'] = 'DPA'; 
		$data['DPA'] = $this->M_admin->getDPA();
		$this->load->view('admin/header');
		// $this->load->view('admin/sidebar');
		$this->load->view('admin/v_dpa',$data);
		$this->load->view('admin/footer');
	}

	public function detail_belanja($id='')
	{
		$data['edit'] = $this->M_admin->getSatuData($id);
		$data['detail'] = $this->M_admin->getDetail();
		$this->load->view('admin/header');
		$this->load->view('admin/v_detail_belanja',$data);
		$this->load->view('admin/footer');
	}

	public function viewAkun()
	{
		$data['akun'] = $this->M_admin->getAkun();
		$this->load->view('admin/header');
		// $this->load->view('admin/sidebar');
		$this->load->view('admin/v_akun',$data);
		$this->load->view('admin/footer');
	}

	public function pendaftaran()
	{
		$this->load->view('admin/header');
		// $this->load->view('admin/sidebar');
		$this->load->view('admin/v_register');
		$this->load->view('admin/footer');
	}

	public function daftarAkun()
	{
		$uuid		= str_replace('-','',$this->uuid->v4());
		$username	= $this->input->post('username');
		$password	= $this->input->post('password');
		$nama		= $this->input->post('nama');
		$level		= $this->input->post('level');

		$this->M_admin->tambahAkun($uuid, $username, $password, $nama, $level);
		echo "<script>alert('Akun Berhasil Ditambahkan') </script>";
		redirect('C_admin/viewAkun','refresh');
	}

	public function viewEdtAkun($id_akun)
	{
		$data['akun'] = $this->M_admin->getAkunById($id_akun);
		// var_dump($data['akun']);die();
		$this->load->view('admin/header');
		// $this->load->view('admin/sidebar');
		$this->load->view('admin/v_edtAkun',$data);
		$this->load->view('admin/footer');
	}

	public function edtAkun($id_akun)
	{
		$nama		= $this->input->post('nama');
		$level		= $this->input->post('level');

		$this->M_admin->editAkun($id_akun, $nama, $level);
		echo "<script>alert('Data Akun Berhasil Diupdate') </script>";
		redirect('C_admin/viewAkun','refresh');
	}

	public function hapusAkun($id_akun)
	{
		$this->M_admin->deleteAkun($id_akun,'akun');
		echo "<script>alert('Akun telah berhasil dihapus!')</script>";
		redirect('C_admin/viewAkun','refresh');
	}

}

?>