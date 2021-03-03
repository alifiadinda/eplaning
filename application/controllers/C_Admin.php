<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Admin extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status')==TRUE) 
		{
			$this->load->model('M_admin');
			$this->load->model('M_Belanja');
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


	// UPDATE CETAK
	public function cetak($id_rka) {
		// $data['capaian'] = 100;
		// $data['sk_belanja'] = $this->where  .....($id_rka) get('sk_belanja')->row();
		$data['id_dpa'] = $id_rka;
        $data['sk_belanja'] = $this->db->where('id', $id_rka)->get('sk_belanja')->row();
		$data['RKA'] = $this->M_admin->getSatuRKA($id_rka);

        //$data['detail'] = $this->getDetailBelanja($id_dpa);
		$data['detail'] = $this->getDetailBelanja($id_rka);

		$this->load->view('admin/v_cetak_rka',$data);
	}

	public function cetakdraft($id_draft) {
		// $data['capaian'] = 100;
		// $data['sk_belanja'] = $this->where  .....($id_rka) get('sk_belanja')->row();
		$data['id_dpa'] = $id_draft;
        $data['sk_belanja'] = $this->db->where('id', $id_draft)->get('sk_belanja')->row();
		$data['Draft'] = $this->M_admin->getSatuDraft($id_draft);

        //$data['detail'] = $this->getDetailBelanja($id_dpa);
		$data['detail'] = $this->getDetailBelanja($id_draft);

		$this->load->view('admin/v_cetak_draft',$data);
	}

	public function cetakdpa($id_dpa) {
		// $data['capaian'] = 100;
		// $data['sk_belanja'] = $this->where  .....($id_rka) get('sk_belanja')->row();
		$data['id_dpa'] = $id_dpa;
        $data['sk_belanja'] = $this->db->where('id', $id_dpa)->get('sk_belanja')->row();
		$data['DPA'] = $this->M_admin->getSatuDPA($id_dpa);

        //$data['detail'] = $this->getDetailBelanja($id_dpa);
		$data['detail'] = $this->getDetailBelanja($id_dpa);

		$this->load->view('admin/v_cetak_dpa',$data);
	}

	function getDetailBelanja($id_dpa){
		$this->db->order_by('db.kode_rekening');
		$result = $this->db->get('detail_belanja db')->result();
		foreach ($result as $key => $value) {
			$result[$key]->kode_rekening_parent = $value->parent ? $this->getKodeRekeningParent($value->parent) : '';

			$dpa_detail = $this->db
			->where('id_dpa', $id_dpa)
			->where('id_detail', $value->id_detail)->get('dpa_detail')->row();
			if ($dpa_detail) {
				$result[$key]->rincian = $this->getRincian($dpa_detail->id_dpa_detail);
			} else {
				$result[$key]->rincian = [];
			}
		}
		return $result;
	}

	function getKodeRekeningParent($id_parent) {
		return $this->db->where('id_detail',$id_parent)->get('detail_belanja')->row()->kode_rekening;
	}

	function getRincian($id_dpa_detail){
		$this->db->where('id_dpa_detail', $id_dpa_detail);
		return $this->db->get('rincian')->result();
	}
	// UPDATE CETAK

}

?>