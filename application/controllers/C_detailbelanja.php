<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_DetailBelanja extends CI_Controller {

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

	public function save()
	{
		$id_detail = $this->input->post('id_detail');
		$kode_rekening = $this->input->post('kode_rekening');
		$uraian = $this->input->post('uraian');
		$parent = $this->input->post('parent');
		$butuh_rincian = $this->input->post('butuh_rincian');
		$tampil_rekening = $this->input->post('tampil_rekening');

		$data = [
			'kode_rekening' => $kode_rekening,
			'uraian' => $uraian,
			'parent' => $parent,
		];
		if ($butuh_rincian) {
			$data['butuh_rincian'] = '1';
		}else{
			$data['butuh_rincian'] = '0';
		}


		if ($tampil_rekening) {
			$data['tampil_rekening'] = '1';
		}else{
			$data['tampil_rekening'] = '0';
		}

		// print_r($data['tampil_rekening']);

		// die();

		if ($id_detail!='') {
			// update
			$this->db->where('id_detail', $id_detail);
			$result = $this->db->update('detail_belanja', $data);
		} else {
			// create
			$result = $this->db->insert('detail_belanja', $data);
		}

		redirect(site_url('c_admin/detail_belanja'));
	}

	public function delete($id_detail){
		$this->db->where('id_detail', $id_detail);
		$result = $this->db->delete('detail_belanja');
		redirect(site_url('c_admin/detail_belanja'));
	}

}