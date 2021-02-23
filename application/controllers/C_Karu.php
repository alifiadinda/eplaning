<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class C_Karu extends CI_Controller {

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
        $this->load->view('karu/header');
        //$this->load->view('karu/sidebar');
        $this->load->view('karu/v_home');
		$this->load->view('karu/footer');
    }

    public function RKA()
    {
        $data['page_title'] = 'RKA'; 
        $data['RKA'] = $this->M_admin->getRKA();
        $this->load->view('karu/header');
        // $this->load->view('admin/sidebar');
        $this->load->view('karu/v_rka',$data);
        $this->load->view('karu/footer');
    }

    public function Draft()
    {
        $data['page_title'] = 'Draft DPA'; 
        $data['Draft'] = $this->M_admin->getDraft();
        $this->load->view('karu/header');
        // $this->load->view('admin/sidebar');
        $this->load->view('karu/v_draft',$data);
        $this->load->view('karu/footer');
    }

    public function DPA()
    {
        $data['page_title'] = 'DPA'; 
        $data['DPA'] = $this->M_admin->getDPA();
        $this->load->view('karu/header');
        // $this->load->view('admin/sidebar');
        $this->load->view('karu/v_dpa',$data);
        $this->load->view('karu/footer');
    }

    public function detail_belanja($id='')
    {
        $data['edit'] = $this->M_admin->getSatuData($id);
        $data['detail'] = $this->M_admin->getDetail();
        $this->load->view('karu/header');
        $this->load->view('karu/v_detail_belanja',$data);
        $this->load->view('karu/footer');
    }

     public function Belanja()
    {
        $this->load->model('M_Belanja');
        $this->load->library('form_validation');
        $data['belanja'] = $this->M_Belanja->get_belanja();

        $this->form_validation->set_rules('program', 'program', 'required',
            array(
                'required'      => 'Mohon pilih %s'
            ));
        $this->form_validation->set_rules('kegiatan', 'kegiatan', 'required',
            array(
                'required'      => 'Mohon pilih %s'
            ));
        $this->form_validation->set_rules('subkegiatan', 'subkegiatan', 'required',
            array(
                'required'      => 'Mohon pilih %s'
            ));

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('karu/header');
            $this->load->view('karu/v_belanja',$data);
            $this->load->view('karu/footer');
        } else {
            $data['program'] = $this->input->post('kategori');
            $data['kegiatan'] = $this->input->post('kegiatan');
            $data['subkegiatan'] = $this->input->post('tampil');
            // print_r($data['program']);
            $this->load->view('karu/header');
            $this->load->view('karu/v_belanja',$data);
            $this->load->view('karu/footer');
        }

    }

     public function detail($id_dpa='')
    {
        $data['id_dpa'] = $id_dpa;
        $data['sk_belanja'] = $this->db->where('id', $id_dpa)->get('sk_belanja')->row();

        $data['detail'] = $this->getDetailBelanja($id_dpa);

        $this->load->view('karu/header');
        $this->load->view('karu/v_detail', $data);
        $this->load->view('karu/footer');
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

    public function save_rincian(){
        $id_dpa = $this->input->post('id_dpa');
        $id_detail = $this->input->post('id_detail[]');
        $keterangan = $this->input->post('keterangan[]');
        $koefisien = $this->input->post('koefisien[]');
        $satuan = $this->input->post('satuan[]');
        $harga = $this->input->post('harga[]');
        $ppn = $this->input->post('ppn[]');
        $jumlah = $this->input->post('jumlah[]');

        $unique = array_unique($id_detail);
        foreach ($unique as $key => $uniq) {
            $this->bersihkanRincianDetail($id_dpa, $uniq);
        }

        foreach ($id_detail as $key => $id_det) {
            $data['keterangan'] = $keterangan[$key];
            $data['koefisien'] = $koefisien[$key];
            $data['satuan'] = $satuan[$key];
            $data['harga'] = $harga[$key];
            $data['ppn'] = $ppn[$key];
            $data['jumlah'] = $jumlah[$key];

            $id_dpa_detail = $this->cekDpaDetail($id_dpa, $id_det);
            $data['id_dpa_detail'] = $id_dpa_detail;
            $this->db->insert('rincian', $data);
        }

        // print_r($this->input->post());
        redirect(site_url('c_karu/detail/'.$id_dpa));
    }

    public function cekDpaDetail($id_dpa, $id_detail){
        $this->db->where('id_dpa', $id_dpa);
        $this->db->where('id_detail', $id_detail);
        $ada = $this->db->get('dpa_detail')->row();
        if (!$ada) {
            $this->db->insert('dpa_detail', [
                'id_dpa'=>$id_dpa,
                'id_detail'=>$id_detail,
            ]);
            return $this->db->insert_id();
        } else {
            return $ada->id_dpa_detail;
        }
    }

    public function bersihkanRincianDetail($id_dpa, $id_detail){
        $ada = $this->db->where('id_dpa', $id_dpa)->where('id_detail', $id_detail)->get('dpa_detail')->row();
        if ($ada) {
            $this->db->where('id_dpa_detail', $ada->id_dpa_detail)->delete('rincian');
            $this->db->where('id_dpa_detail', $ada->id_dpa_detail)->delete('dpa_detail');
        }
    }

    public function create()
    {

        $data['page_title'] = 'Tambah Sub Kegiatan Belanja';

        $this->load->library('form_validation');
        $this->load->model('M_Belanja');
        $data['belanja'] = $this->M_Belanja->get_belanja();

        $data['program'] = $this->input->post('kategori');
        $data['kegiatan'] = $this->input->post('kegiatan');
        $data['subkegiatan'] = $this->input->post('tampil');
        //if ($this->form_validation->run() === FALSE)
        //{
            $this->load->view('karu/header');
            $this->load->view('karu/v_belanja',$data);
            $this->load->view('karu/footer');
        //} else {
        $this->M_Belanja->create_belanja();
        redirect('C_Karu/RKA');
        //}
    }

     public function edit($id = NULL)
    {
        $data['page_title'] = 'Edit Sub Kegiatan Belanja';
        $this->load->library('form_validation');
        $this->load->model('M_Belanja');

        $data['belanja'] = $this->M_Belanja->get_belanja_by_id($id);

        if ( empty($id) || !$data['belanja'] ) redirect('C_Karu/Belanja');

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('indikator', 'Indikator', 'required',
            array('required' => 'Mohon Isi %s'));
        $this->form_validation->set_rules('target', 'Target', 'required',
            array('required' => 'Mohon Isi %s'));


        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('karu/header');
            $this->load->view('admin/edit_belanja',$data);
            $this->load->view('karu/footer');
        } else {

            $post_data = array(
                'program'                => $this->input->post('program'),
                'tanggal_sk'             => $this->input->post('tanggal_sk'),
                'indikator'              => $this->input->post('indikator'),
                'target'                 => $this->input->post('target'),
                'alokasi_tahun2021'      => $this->input->post('alokasi_tahun2021'),
                'status'                 => $this->input->post('status')
            );

            $this->load->view('karu/header');
            
            if ($this->M_Belanja->update_belanja($post_data, $id)) {
                redirect('C_Karu/RKA');
            } else {
                redirect('C_Karu/RKA');
            }
            $this->load->view('karu/footer'); 

        }
    }

    public function delete($id){
        $data['page_title'] = 'Hapus';

        $this->load->model('M_Belanja');
        $this->M_Belanja->delete($id);

        redirect('C_Karu/Belanja');
    }




}

/* End of file C_Karu.php */


?>