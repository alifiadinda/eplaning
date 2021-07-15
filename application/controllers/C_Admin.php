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
			$this->load->model('M_UpdateAkun');
		}else{	
			redirect('C_login');
		}
	}

/*=============================================================== INDEX PER HALAMAN ===============================================================*/
	public function index()
	{
		$data['data_rka'] = $this->M_admin->hitung_RKA();
		$data['data_draft'] = $this->M_admin->hitung_draft_DPA();
		$data['data_dpa'] = $this->M_admin->hitung_DPA();
		$data['data_akun'] = $this->M_admin->hitung_akun();
		$data['usulan'] = $this->M_admin->hitung_usulan();

		$this->load->view('admin/header');
		// $this->load->view('admin/sidebar');
		$this->load->view('admin/v_home', $data);
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
/*=============================================================== INDEX PER HALAMAN ===============================================================*/

/*=============================================================== MANAJEMEN AKUN ===============================================================*/

	public function viewAkun()
	{
		$data['akun'] = $this->M_admin->getAkun();
        $data['ruangan'] = $this->M_admin->getRuangan();
        // print_r($data['akun']);die();
        $this->load->view('admin/header');
        $this->load->view('admin/v_akun',$data);
        $this->load->view('admin/footer');
	}

	public function pendaftaran()
	{
		$data['ruangan'] = $this->M_admin->getRuangan();
        $this->load->view('admin/header');
        $this->load->view('admin/v_register',$data);
        $this->load->view('admin/footer');
	}

	public function daftarAkun()
	{
		$uuid       = str_replace('-','',$this->uuid->v4());
        $username   = $this->input->post('username');
        $password   = md5($this->input->post('password'));
        $nama       = $this->input->post('nama');
        $level      = $this->input->post('level');
        $ruangan    = $this->input->post('ruangan');
        // print_r($username);die();

        $cek = $this->M_admin->cekUsername($username);
        if($cek == true){
            $data = ['code' => 2];
        }else{
            $data = [ 'result'	=> $this->M_admin->tambahAkun($uuid, $username, $password, $nama, $level,$ruangan), 
            'code' => 1];
        }
        echo json_encode($data);
	}

	public function viewEdtAkun($id_akun)
	{
		$data['akun'] = $this->M_admin->getAkunById($id_akun);
        // var_dump($data['akun']);die();        
        $data['ruangan'] = $this->M_admin->getRuangan();
		echo json_encode($data);

	}

	public function edtAkun()
	{
		$id_akun	= $this->input->post('id_akun');
		$nama       = $this->input->post('nama');
        $level      = $this->input->post('level');
        $ruangan    = $this->input->post('ruangan');

        $data=[ 'result'	=> $this->M_admin->editAkun($id_akun, $nama, $level,$ruangan),
				'code'	=> 1];
		echo json_encode($data);
	}

	public function changePass()
    {
        $id = $this->input->post('changePass_id');
        $passnew = md5($this->input->post('passnew'));
        $passnew2 = md5($this->input->post('passnew2'));
        if($passnew != $passnew2){
        	$data=[ 'code'	=> 2];
        }else{   	
	        $data=[ 'result'=>$this->M_UpdateAkun->changePass($id,$passnew),
					'code'	=> 1];
        }
		echo json_encode($data);
    }

	public function hapusAkun($id_akun)
	{
		$this->M_admin->deleteAkun($id_akun,'akun');
		echo "<script>alert('Akun telah berhasil dihapus!')</script>";
		redirect('C_admin/viewAkun','refresh');
	}
/*=============================================================== MANAJEMEN AKUN ===============================================================*/

/*=============================================================== UPDATE CETAK ===============================================================*/
	public function cetak($id_rka,$id_detail='') {
		// $data['capaian'] = 100;
		// $data['sk_belanja'] = $this->where  .....($id_rka) get('sk_belanja')->row();
		$data['id_dpa'] = $id_rka;
        $data['sk_belanja'] = $this->db->where('id', $id_rka)->get('sk_belanja')->row();
		$data['RKA'] = $this->M_admin->getSatuRKA($id_rka);
		$data['detail_table'] = $this->getDetailBelanja($id_rka, $id_detail, true);
        $data['detail'] = $this->getDetailBelanja($id_rka, $id_detail);
        $ambil_sub_kegiatan = $this->db->query("
		SELECT sk_belanja.*
		FROM sk_belanja
		where sk_belanja.id = $id_rka
		")->result_array();

		
        $nama_pejabat = '';
        $nip = '';
        $jabatan ='';
		foreach ($ambil_sub_kegiatan as $data2) {
			if($data2['subkegiatan'] == 'Operasional Pelayanan RSUD' || $data2['subkegiatan'] == 'Pelayanan dan Penunjang Pelayanan BLUD'){
				$nama_pejabat = 'MEIFTA ETI WININDAR, S.ST,MM.';
				$nip = '19800520 200312 2 008';
				$jabatan = 'KASUBBAG TATA USAHA';
			}else if($data2['subkegiatan'] == 'Peningkatan Tata Kelola RSUD dan Fasilitas Pelayanan Kesehatan Tingkat daerah kabupaten/Kota'){
				$nama_pejabat = 'drg.TRI WAHYU HIDAYAT';
				$nip = '19650221 199803 1 001';
				$jabatan = 'KASIE PELAYANAN MEDIS DAN KEPERAWATAN';
			}else{
				$nama_pejabat = 'dr.ALDRIYANA YUSRAN';
				$nip = '19721227 200501 2 013';
				$jabatan = 'KASIE PELAYANAN PENUNJANG DAN SARANA PELAYANAN';
			}
		}

		$data['nama_pejabat'] = $nama_pejabat;
		$data['nip'] = $nip;
		$data['jabatan'] = $jabatan;


        if ($id_detail!='') {
            $data['detail'] = $this->getDetailBelanja($id_det, $id_detail);
            echo json_encode($data['detail']);
            exit();
        }

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

	 function getKodeRekeningParent($id_parent) {
        return $this->db->where('id_detail',$id_parent)->get('detail_belanja')->row()->kode_rekening;
    }

    function getRincian($id_dpa_detail){
        $this->db->where('id_dpa_detail', $id_dpa_detail);
        return $this->db->get('rincian')->row();
    }
/*=============================================================== UPDATE CETAK ===============================================================*/

	public function rekening()
	{
		$data['rekening'] = $this->M_admin->rekening();
		$this->load->view('admin/header');
		// $this->load->view('admin/sidebar');
		$this->load->view('admin/v_detail', $data);
		$this->load->view('admin/footer');
	}

/*=============================================================== USULAN ===============================================================*/

	public function getItemUsulan()
	{
		$data['itemUsulan'] = $this->M_admin->getItemUsulanAdmin();
		$data['detail'] = $this->M_admin->getDetail();
        $this->load->view('admin/header');
        $this->load->view('admin/v_usulan',$data);
        $this->load->view('admin/footer');	
	}

	public function getDetailRincian($id_rincian)
    {
        $data['getDetailRincian']    = $this->M_admin->getDetailRincian($id_rincian);
        echo json_encode($data);    
    }

	public function tambahUsulan()
	{
		$result="";
		$nama_usulan	= $this->input->post('nama_usulan');
		$spesifikasi 	= $this->input->post('spesifikasi');
		$satuan 		= $this->input->post('satuan');
		$harga_satuan 	= $this->input->post('harga_satuan');
		$kode_rekening 	= $this->input->post('kode_rekening');
		$status 		= $this->input->post('status');

		$data=[ 'result'	=> $this->M_admin->tambahUsulan($nama_usulan,$spesifikasi,$satuan,$harga_satuan,$kode_rekening,$status),
				'code'	=> 1];

		echo json_encode($data);
	}

	public function getDetailUsulan($id_usulan)
	{
		$data['getDetailUsulan']	= $this->M_admin->getDetailUsulan($id_usulan);
		echo json_encode($data);
	}

	public function getDetailUsulanUnit()
    {
        
        $data['getDetailUsulanUnit'] = $this->M_admin->getDetailUsulanUnit($this->session->kode_ruangan);
        $data['getItemUsulan']      = $this->M_admin->getItemUsulan();
        $this->load->view('admin/header');
        $this->load->view('admin/v_usulan_detail',$data);
        $this->load->view('admin/footer');
    }

	public function editUsulan()
	{
		$result="";
		$id_usulan		= $this->input->post('id_usulan');
		$nama_usulan	= $this->input->post('nama_usulan');
		$spesifikasi	= $this->input->post('spesifikasi');
		$satuan			= $this->input->post('satuan');
		$harga_satuan	= $this->input->post('harga_satuan');
		$kode_rekening	= $this->input->post('kode_rekening');
		$status			= $this->input->post('status');

		// print_r("Data Usulan: ".$id_usulan." | ".$nama_usulan." | ".$spesifikasi." | ".$satuan." | ".$harga_satuan." | ".$kode_rekening." | ".$status);

		$data=[ 'result'	=> $this->M_admin->editUsulan($id_usulan,$nama_usulan,$spesifikasi,$satuan,$harga_satuan,$kode_rekening,$status),
					'code'	=> 1];
		echo json_encode($data);
	}

	public function hapusUsulan($id_usulan)
	{
        // $id_usulan	= $this->input->post('id_usulan');
		$result 	= $this->M_admin->deleteUsulan($id_usulan);
		echo json_decode($result);
	}

/*=============================================================== USULAN ===============================================================*/

/*=============================================================== RINCIAN USULAN ===============================================================*/
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
        $result     = $this->M_admin->hapusRincian($id_rincian);
        echo json_decode($result);
    }
}
/*=============================================================== RINCIAN USULAN ===============================================================*/

?>