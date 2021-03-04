<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Belanja extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        if ($this->session->userdata('status')==TRUE) 
        {
            $this->load->model('M_admin');
        }else{  
            redirect('C_login');
        }
    }
    

    public function index()
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
            $this->load->view('admin/header');
            $this->load->view('admin/v_belanja',$data);
            $this->load->view('admin/footer');
        } else {
            $data['program'] = $this->input->post('kategori');
            $data['kegiatan'] = $this->input->post('kegiatan');
            $data['subkegiatan'] = $this->input->post('tampil');
            // print_r($data['program']);
            $this->load->view('admin/header');
            $this->load->view('admin/v_belanja',$data);
            $this->load->view('admin/footer');
        }

    }

    public function detail($id_dpa='')
    {
        $data['id_dpa'] = $id_dpa;
        $data['sk_belanja'] = $this->db->where('id', $id_dpa)->get('sk_belanja')->row();

        $data['detail'] = $this->getDetailBelanja($id_dpa);

        $this->load->view('admin/header');
        $this->load->view('admin/v_detail', $data);
        $this->load->view('admin/footer');
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
        redirect(site_url('c_belanja/detail/'.$id_dpa));
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

   public function bersihkanRincianDetail($id_dpa){
        $ada = $this->db->where('id_dpa', $id_dpa)->get('dpa_detail')->result();
        foreach ($ada as $key => $value) {
            $this->db->where('id_dpa_detail', $value->id_dpa_detail)->delete('rincian');
            $this->db->where('id_dpa_detail', $value->id_dpa_detail)->delete('dpa_detail');
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
            $this->load->view('admin/header');
            $this->load->view('admin/v_belanja',$data);
            $this->load->view('admin/footer');
        //} else {
        $this->M_Belanja->create_belanja();
        redirect('C_Admin/RKA');
        //}
    }

    public function edit($id = NULL)
    {
        $data['page_title'] = 'Edit Sub Kegiatan Belanja';
        $this->load->library('form_validation');
        $this->load->model('M_Belanja');

        $data['belanja'] = $this->M_Belanja->get_belanja_by_id($id);

        if ( empty($id) || !$data['belanja'] ) redirect('C_Belanja');

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('indikator', 'Indikator', 'required',
            array('required' => 'Mohon Isi %s'));
        $this->form_validation->set_rules('target', 'Target', 'required',
            array('required' => 'Mohon Isi %s'));


        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('admin/header');
            $this->load->view('admin/edit_belanja',$data);
            $this->load->view('admin/footer');
        } else {

            $post_data = array(
                'tanggal_sk'             => $this->input->post('tanggal_sk'),
                'indikator'              => $this->input->post('indikator'),
                'target'                 => $this->input->post('target'),
                'alokasi_tahun2021'      => $this->input->post('alokasi_tahun2021'),
                'status'                 => $this->input->post('status')
            );

            $this->load->view('admin/header');
            
            if ($this->M_Belanja->update_belanja($post_data, $id)) {
                redirect('C_Admin/RKA');
            } else {
                redirect('C_Admin/RKA');
            }
            $this->load->view('admin/footer'); 

        }
    }

    public function delete($id){
        $data['page_title'] = 'Hapus';

        $this->load->model('M_Belanja');
        $this->M_Belanja->delete($id);

        redirect('C_Belanja');
    }

   public function ajukan_draftdpa($id){
        $this->load->model('M_Belanja');

            $post_data = array(
                'status_karu'             => 1
            );
            
            if ($this->M_Belanja->update_belanja($post_data, $id)) {
                redirect('C_Karu/RKA');
            } else {
                redirect('C_Karu/RKA');
            }
            $this->load->view('karu/footer'); 
    }
    
    public function ajukan_draftdpa_kasub($id){
        $this->load->model('M_Belanja');

            $post_data = array(
                'status'             => "Draft DPA"
            );
            
            if ($this->M_Belanja->update_belanja($post_data, $id)) {
                redirect('C_Kasubid/RKA');
            } else {
                redirect('C_Kasubid/RKA');
            }
            $this->load->view('kasubid/footer'); 
    }

    public function ajukan_dpa($id){
        $this->load->model('M_Belanja');

            $post_data = array(
                'status_karu_dpa'             => 1
            );
            
            if ($this->M_Belanja->update_belanja($post_data, $id)) {
                redirect('C_Karu/Draft');
            } else {
                redirect('C_Karu/Draft');
            }
            $this->load->view('karu/footer'); 
    }
    
    public function ajukan_dpa_kasubid($id){
        $this->load->model('M_Belanja');

            $post_data = array(
                'status'             => "DPA"
            );
            
            if ($this->M_Belanja->update_belanja($post_data, $id)) {
                redirect('C_Kasubid/Draft');
            } else {
                redirect('C_Kasubid/Draft');
            }
            $this->load->view('kasubid/footer'); 
    }


}