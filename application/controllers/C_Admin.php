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

/*=============================================================== INDEX PER HALAMAN ===============================================================*/
	public function index()
	{
		$data['data_rka'] = $this->M_admin->hitung_RKA();
		$data['data_draft'] = $this->M_admin->hitung_draft_DPA();
		$data['data_dpa'] = $this->M_admin->hitung_DPA();
		$data['data_akun'] = $this->M_admin->hitung_akun();

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
            echo "<script>alert('Username telah terdaftar. Gunakan username yang lain') </script>";
            redirect('C_admin/viewAkun','refresh');
        }else{
            $this->M_admin->tambahAkun($uuid, $username, $password, $nama, $level,$ruangan);
            echo "<script>alert('Akun baru telah berhasil ditambahkan') </script>";
            redirect('C_admin/viewAkun','refresh');
        }
	}

	public function viewEdtAkun($id_akun)
	{
		$data['akun'] = $this->M_admin->getAkunById($id_akun);
        $data['ruangan'] = $this->M_admin->getRuangan();
        // var_dump($data['akun']);die();
        $this->load->view('admin/header');
        $this->load->view('admin/v_edtAkun',$data);
        $this->load->view('admin/footer');
	}

	public function edtAkun($id_akun)
	{
		$nama       = $this->input->post('nama');
        $level      = $this->input->post('level');
        $ruangan    = $this->input->post('ruangan');

        $this->M_admin->editAkun($id_akun, $nama, $level,$ruangan);
        echo "<script>alert('Data Akun Berhasil Diupdate') </script>";
        redirect('C_admin/viewAkun','refresh');
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

        //$data['detail'] = $this->getDetailBelanja($id_dpa);
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

/*=============================================================== USULAN ===============================================================*/

	public function getUsulan()
	{
		$data['usulan'] = $this->M_admin->getUsulan();
        $this->load->view('admin/header');
        $this->load->view('admin/v_usulan',$data);
        $this->load->view('admin/footer');	
	}

	public function tambahUsulan()
	{
		$result="";
		$tgl_buka 	= $this->input->post('tgl_buka');
		$tgl_tutup 	= $this->input->post('tgl_tutup');

		if($tgl_buka > $tgl_tutup){
				$data =['code' => 2]; // error tgl tutup lebih besar
		}else{
			$data=[ 'result'	=> $this->M_admin->tambahUsulan($tgl_buka,$tgl_tutup),
						'code'	=> 1];
		}

		echo json_encode($data);
	}

	public function updateUsulan()
	{
		$result="";
		$id			= $this->input->post('u_id_usulan');
		$tgl_buka 	= $this->input->post('u_tgl_buka');
		$tgl_tutup 	= $this->input->post('u_tgl_tutup');

		if($tgl_buka > $tgl_tutup){
				$data =['code' => 2]; // error tgl tutup lebih besar
		}else{
			$data=[ 'result'	=> $this->M_admin->updateUsulan($id,$tgl_buka,$tgl_tutup),
					'code'	=> 1];
		}

		echo json_encode($data);
	}

	public function hapusUsulan($id_usulan)
	{
        // $id_usulan	= $this->input->post('id_usulan');
		$result 	= $this->M_admin->deleteUsulan($id_usulan);
		echo json_decode($result);
	}

	public function getDetailUsulan($id_usulan)
	{
		$data['getDetailUsulan']	= $this->M_admin->getDetailUsulan($id_usulan);
		echo json_encode($data);	
	}

	public function getItemUsulan()
	{
		$data['getItemUsulan']		= $this->M_admin->getItemUsulan();
		echo json_encode($data);	
	}
/*=============================================================== USULAN ===============================================================*/

/*=============================================================== DETAIL USULAN ===============================================================*/
	
	public function getDetailUsulanUnit($id_usulan)
	{
		
		$data['usulan'] = $this->M_admin->getPeriode($id_usulan);
 		$data['getDetailUsulanUnit'] = $this->M_admin->getDetailUsulanUnit($id_usulan,$this->session->kode_ruangan);
		$data['getItemUsulan']		= $this->M_admin->getItemUsulan();
		$this->load->view('admin/header');
        $this->load->view('admin/v_usulan_detail',$data);
        $this->load->view('admin/footer');
	}

	public function tambahDetailUsulan()
	{
		$result="";
		$rincian_barang	= $this->input->post('rincian_barang');
		$volume 		= $this->input->post('volume');
		$satuan 		= $this->input->post('satuan');
		$harga 			= $this->input->post('harga');
		$existing 		= $this->input->post('existing');
		$alasan 		= $this->input->post('alasan');
		$jumlah 		= $this->input->post('jumlah');
		$id_usulan 		= $this->input->post('id_usulan');
		$unit_pengusul 	= $this->session->kode_ruangan;

		$data=[ 'result'	=> $this->M_admin->tambahDetailUsulan($rincian_barang,$volume,$satuan,$harga,$existing,$alasan,$jumlah,$id_usulan,$unit_pengusul),
				'code'	=> 1];

		echo json_encode($data);
	}



	public function hapusDetailUsulan($id_detail_usulan)
	{
		$result 	= $this->M_admin->deleteDetailUsulan($id_detail_usulan);
		echo json_decode($result);
	}
/*=============================================================== DETAIL USULAN ===============================================================*/

}

?>