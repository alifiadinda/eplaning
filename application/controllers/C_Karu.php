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
        $data['data_rka'] = $this->M_admin->hitung_RKA();
        $data['data_draft'] = $this->M_admin->hitung_draft_DPA();
        $data['data_dpa'] = $this->M_admin->hitung_DPA();

        $this->load->view('karu/header');
        // $this->load->view('admin/sidebar');
        $this->load->view('karu/v_home', $data);
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

        $this->load->view('karu/header');
        $this->load->view('karu/v_detail', $data);
        $this->load->view('karu/footer');
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
            // var_dump($result);die;
            // var_dump($this->db->last_query());die;
         //$result = $this->db->query('SELECT detail_belanja.* FROM detail_belanja WHERE LENGTH(regexp_replace(detail_belanja.kode_rekening, "[0-9]", "")) <= 3')->result();
        }

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
        $alokasi = $this->input->post('alokasi');
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
            $this->load->view('karu/edit_belanja',$data);
            $this->load->view('karu/footer');
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

            $this->load->view('karu/header');
            
            if ($this->M_Belanja->update_belanja($post_data, $id)) {
                redirect('C_Karu/RKA');
            } else {
                redirect('C_Karu/RKA');
            }
            $this->load->view('karu/footer'); 

        }
    }

      public function editdraft($id = NULL)
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
            $this->load->view('karu/edit_belanja',$data);
            $this->load->view('karu/footer');
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

            $this->load->view('karu/header');
            
            if ($this->M_Belanja->update_belanja($post_data, $id)) {
                redirect('C_Karu/Draft');
            } else {
                redirect('C_Karu/Draft');
            }
            $this->load->view('karu/footer'); 

        }
    }

      public function deleterka($id){
        $data['page_title'] = 'Hapus';

        $this->load->model('M_Belanja');
        $this->M_Belanja->delete($id);

        redirect('C_Karu/RKA');
    }

    public function deletedraft($id){
        $data['page_title'] = 'Hapus';

        $this->load->model('M_Belanja');
        $this->M_Belanja->delete($id);

        redirect('C_Karu/Draft');
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
            $pesan = 'gagal update data';
        }
        if ($hapus) {
            $pesan = 'berhasil update data';
        }
        $this->session->set_flashdata('pesan_simpan', $pesan);
        redirect(site_url('c_karu/detail/'.$id_dpa));
    }


/*=============================================================== USULAN ===============================================================*/

    public function getDetailUsulan($id_usulan)
    {
        $data['getDetailUsulan']    = $this->M_admin->getDetailUsulan($id_usulan);
        echo json_encode($data);    
    }
    
    public function getDetailUsulanUnit()
    {
        
        $data['getDetailUsulanUnit'] = $this->M_admin->getDetailUsulanUnit($this->session->kode_ruangan);
        $data['getItemUsulan']      = $this->M_admin->getItemUsulan();
        $this->load->view('karu/header');
        $this->load->view('karu/v_usulan',$data);
        $this->load->view('karu/footer');
    }

    public function getDetailRincian($id_rincian)
    {
        $data['getDetailRincian']    = $this->M_admin->getDetailRincian($id_rincian);
        echo json_encode($data);    
    }

    public function tambahRincian()
    {
        $result="";
        $id_usulan      = $this->input->post('id_usulan');
        $nama_usulan    = $this->input->post('nama_usulan');
        $spesifikasi    = $this->input->post('spesifikasi');
        $satuan         = $this->input->post('satuan');
        $harga          = $this->input->post('harga');
        $kode_rekening  = $this->input->post('kode_rekening');
        $koefisien      = $this->input->post('koefisien');
        $jumlah         = $this->input->post('jumlah');
        $unit_pengusul  = $this->session->kode_ruangan;

        $awal = date('Y-m-d',strtotime('first day of january this year'));
        $akhir = date('Y-m-d',strtotime('last day of december this year'));
        // print_r($awal.' || '.$akhir);die();

        $cekRincian = $this->M_admin->cekRincian($id_usulan,$awal,$akhir,$unit_pengusul);
        if($cekRincian == TRUE){
            $data=[ 'code'  => 2];
        }else{
            $data=[ 'result'    => $this->M_admin->tambahRincian($id_usulan,$nama_usulan,$spesifikasi,$satuan,$harga,$kode_rekening,$koefisien,$jumlah,$unit_pengusul),
                'code'  => 1];
        }
        echo json_encode($data);
    }

    public function updateJumlah()
    {
        $result="";
        $id_rincian     = $this->input->post('edt_id_rincian');
        $id_usulan      = $this->input->post('edt_id_usulan');
        $tgl_diusulkan  = $this->input->post('edt_tgl_diusulkan');
        $harga          = $this->input->post('edt_harga');
        $koefisien      = $this->input->post('edt_koefisien');
        $jumlah         = $this->input->post('edt_jumlah');
        $unit_pengusul  = $this->session->kode_ruangan;

        $awal = date('Y-m-d',strtotime('first day of january this year'));
        $akhir = date('Y-m-d',strtotime('last day of december this year'));

        if($awal<=$tgl_diusulkan && $tgl_diusulkan<=$akhir){
            $data=[ 'result'    =>  $this->M_admin->updateJumlah($id_rincian,$id_usulan,$awal,$akhir,$unit_pengusul,$koefisien,$jumlah),
                'code'  => 1];
        }else{
            $data=[ 'code'  => 2];
        }
        echo json_encode($data);
    }


    public function hapusRincian($id_rincian)
    {
        // $id_rincian   = $this->input->post('id_rincian');
        $result     = $this->M_admin->hapusRincian($id_rincian);
        echo json_decode($result);
    }
/*=============================================================== USULAN ===============================================================*/

}

/* End of file C_Karu.php */


?>