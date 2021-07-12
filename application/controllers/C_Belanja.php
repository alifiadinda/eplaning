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

    public function detail($id_dpa='', $id_detail='')
    {
        $data['id_dpa'] = $id_dpa;
        $data['sk_belanja'] = $this->db->where('id', $id_dpa)->get('sk_belanja')->row();
        $data['detail_table'] = $this->getDetailBelanja($id_dpa, $id_detail, true);
        $data['detail'] = $this->getDetailBelanja($id_dpa, $id_detail);

        if ($id_detail!='') {
            $data['detail'] = $this->getDetailBelanja($id_det, $id_detail);
            echo json_encode($data['detail']);
            exit();
        }

        $this->load->view('admin/header');
        $this->load->view('admin/v_detail', $data);
        $this->load->view('admin/footer');
    }

    public function detailSave()
    {
        $data = array(
            'id_dpa' => $this->input->post('id_dpa'),
            'id_detail_belanja' => $this->input->post('id_detail')
        );
        // save table rekening
        $insert = $this->db->insert('rekening', $data);
        if ($insert) {
            echo 1;exit;
        } else {
            echo 0;exit;
        }
    }

    function getDetailBelanja($id_dpa, $id_detail='', $view=false){
        if ($id_detail!='') {
            $this->db->order_by('db.kode_rekening');
            $result = $this->db->where('id_detail', $id_detail)
                    ->get('detail_belanja db')
                    ->result();
        } else {
            if ($view) {
                $this->db->join('rekening as r', 'r.id_detail_belanja = db.id_detail');
                $this->db->where('r.id_dpa', $id_dpa);
            }
            $this->db->order_by('db.kode_rekening');
            $result = $this->db->get('detail_belanja db')->result();
            $tampil_rekening = $this->db->get_where('detail_belanja', array('tampil_rekening' => '1'))->result();
            foreach ($tampil_rekening as $val) {
                $ada = $this->tambahTampilRekening($val, $id_dpa);
                if (!$ada) {
                    array_push($result, $val);
                }
            }

            // var_dump($result);die;
            // var_dump($this->db->last_query());die;
         //$result = $this->db->query('SELECT detail_belanja.* FROM detail_belanja WHERE LENGTH(regexp_replace(detail_belanja.kode_rekening, "[0-9]", "")) <= 3')->result();
        }

        foreach ($result as $key => $value) {
            $result[$key]->kode_rekening_parent = $value->parent ? $this->getKodeRekeningParent($value->parent) : '';
            
            $dpa_detail = $this->db
            ->where('id_dpa', $id_dpa)
            ->where('id_detail', $value->id_detail)->get('dpa_detail')->result();

            if ($dpa_detail) {
                foreach ($dpa_detail as $kk => $vv) {
                    $result[$key]->rincian[$kk] = $this->getRincian($vv->id_dpa_detail);
                }
            } else {
                $result[$key]->rincian = [];
            }
        }
        
        return $result;
    }

    function tambahTampilRekening($detail_belanja, $id_dpa)
    {
        $where = array(
            'id_dpa' => $id_dpa, 
            'id_detail_belanja' => $detail_belanja->id_detail,
        );

        $check = $this->db->get_where('rekening', $where)->row();

        if (is_null($check)) {
            $data = array(
                'id_dpa' => $id_dpa,
                'id_detail_belanja' => $detail_belanja->id_detail 
            );
            $this->db->insert('rekening', $data);

            return false;
        }

        return true;
    }

    function getKodeRekeningParent($id_parent) {
        return $this->db->where('id_detail',$id_parent)->get('detail_belanja')->row()->kode_rekening;
    }

    function getRincian($id_dpa_detail){
        $this->db->where('id_dpa_detail', $id_dpa_detail);
        return $this->db->get('rincian')->row();
    }

    public function save_rincian(){
        $id_dpa = $this->input->post('id_dpa');
        $alokasi = $this->input->post('alokasi');
        // $id_usulan = $this->input->post('id_usulan');
        // $kode_rekening = $this->input->post('kode_rekening');
        // $unit_pengusul = $this->input->post('unit_pengusul');
        $id_detail = $this->input->post('id_detail[]');
        $keterangan = $this->input->post('keterangan[]');
        $koefisien = $this->input->post('koefisien[]');
        $satuan = $this->input->post('satuan[]');
        $harga = $this->input->post('harga[]');
        $ppn = $this->input->post('ppn[]');
        $jumlah = $this->input->post('jumlah[]');

        $this->db->where('id',$id_dpa)->update('sk_belanja', [
            'alokasi_tahun2021'=> $alokasi
        ]);

        //$id_detail = $id_detail ? $id_detail : [];
        $this->bersihkanRincianDetail($id_dpa);
        $id_detail = $id_detail ? $id_detail : [];

        foreach ($id_detail as $key => $id_det) {
            $data['keterangan'] = $keterangan[$key];
            // $data['id_usulan'] = $id_usulan;
            // $data['kode_rekening'] = $kode_rekening;
            // $data['unit_pengusul'] = $unit_pengusul;
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
                'program'                => $this->input->post('program'),
                'kegiatan'               => $this->input->post('kegiatan'),
                'subkegiatan'            => $this->input->post('subkegiatan'),
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

     public function editdraft($id = NULL)
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
                'program'                => $this->input->post('program'),
                'kegiatan'               => $this->input->post('kegiatan'),
                'subkegiatan'            => $this->input->post('subkegiatan'),
                'tanggal_sk'             => $this->input->post('tanggal_sk'),
                'indikator'              => $this->input->post('indikator'),
                'target'                 => $this->input->post('target'),
                'alokasi_tahun2021'      => $this->input->post('alokasi_tahun2021'),
                'status'                 => $this->input->post('status')
            );

            $this->load->view('admin/header');
            
            if ($this->M_Belanja->update_belanja($post_data, $id)) {
                redirect('C_Admin/Draft');
            } else {
                redirect('C_Admin/Draft');
            }
            $this->load->view('admin/footer'); 

        }
    }

    public function deleterka($id){
        $data['page_title'] = 'Hapus';

        $this->load->model('M_Belanja');
        $this->M_Belanja->delete($id);

        redirect('C_Admin/RKA');
    }

    public function deletedraft($id){
        $data['page_title'] = 'Hapus';

        $this->load->model('M_Belanja');
        $this->M_Belanja->delete($id);

        redirect('C_Admin/Draft');
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

    public function get_data_tabel_usulan_dropdown(){
        $kode_rekening = $this->input->post('kode_rekening');
        $sql="Select rincian.* 
        from rincian 
        where kode_rekening = '$kode_rekening' AND id_dpa_detail is null";
        $query = $this->db->query($sql)->result();
        echo json_encode($query);
    }

    public function get_data_tabel_usulan_dropdown_detail(){

        $id_rincian = $this->input->post('id_rincian');

        $sql="Select rincian.* 
        from rincian 
        where id_dpa_detail is null
        and rincian.id_rincian = $id_rincian
        ";    
        $query = $this->db->query($sql)->row();

        echo json_encode($query);
    }

    public function update_rincian(){
        $id_rincian = $this->input->post('id_rincian');
        $id_dpa = $this->input->post('id_dpa');
        $id_detail = $this->input->post('id_detail');
        $alokasi = $this->input->post('alokasi');
        $id_dpa_detail = array();
        $pesan = '';

         $this->db->where('id',$id_dpa)->update('sk_belanja', [
            'alokasi_tahun2021'=> $alokasi
        ]);

        $id_dpa_detail_hapus = $this->input->post('id_dpa_detail_hapus');

        if (is_array($id_dpa_detail_hapus) > 0) {
            $hapus = $this->bersihkanRincianDetailUpdate($id_dpa_detail_hapus);
        }

        foreach ($id_detail as $k => $v) {
            $dpa_detail = array(
                'id_dpa' => (int)$id_dpa,
                'id_detail' => (int)$v,
                'jumlah' => 0,
            );

            $this->db->insert('dpa_detail', $dpa_detail);
            array_push($id_dpa_detail, $this->db->insert_id());
        }
        
        // jika berhasil di tambahkan ke dpa_detail
        if (count($id_dpa_detail) > 0) {
            foreach ($id_rincian as $k => $v) {
                $rincian = array(
                    'id_dpa_detail' => $id_dpa_detail[$k],
                );
                $id = array('id_rincian' => $v);
                $this->db->update('rincian', $rincian, $id);
                $pesan = 'berhasil update data';
            }
        } else {
            $pesan = 'berhasil update data';
        }
        if ($hapus) {
            $pesan = 'berhasil update data';
        }
        $this->session->set_flashdata('pesan_simpan', $pesan);
        redirect(site_url('c_belanja/detail/'.$id_dpa));
    }

    public function bersihkanRincianDetailUpdate($id_dpa_detail){
        foreach ($id_dpa_detail as $value) {
            $this->db->where('id_dpa_detail', $value)->update('rincian', ['id_dpa_detail'=> null]);
            $this->db->where('id_dpa_detail', $value)->delete('dpa_detail');
        }

        return true;
    }

    // phpnya yang ini
    public function update_sk_alokasi()
    {
        $alokasi = $this->input->post('alokasi');
        $id_dpa = $this->input->post('id_dpa');
        $this->db->where('id',$id_dpa)->update('sk_belanja', [
            'alokasi_tahun2021'=> $alokasi
        ]);

        return true;
    }

}