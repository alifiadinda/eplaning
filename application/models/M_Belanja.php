<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Belanja extends CI_Model {


    public function get_belanja(){

        $this->db->order_by('id');

        $query = $this->db->get('sk_belanja');
        return $query->result();
    }	


    public function create_belanja()
    {
        $data = array(
            'tanggal_sk'             => $this->input->post('tanggal_sk'),
            'program'                => $this->input->post('program'),
            'kegiatan'               => $this->input->post('kegiatan'),
            'subkegiatan'            => $this->input->post('subkegiatan'),
            'indikator'              => $this->input->post('indikator'),
            'target'                 => $this->input->post('target'),
            'status'                 => $this->input->post('status')
            // 'alokasi_tahun2021'          => $this->input->post('alokasi_tahun2021')
        );

        return $this->db->insert('sk_belanja', $data);
    }

    public function get_belanja_by_id($id)
    {
        $query = $this->db->get_where('sk_belanja', array('id' => $id));
        return $query->row();
    }

    public function get_belanja_by_id_rka($id_rka)
    {
        $query = $this->db->get_where('sk_belanja', array('id' => $id_rka));
        return $query->row();
    }

    public function update_belanja($data, $id) 
    {
        if ( !empty($data) && !empty($id) ){
            $update = $this->db->update( 'sk_belanja', $data, array('id'=>$id) );
            return $update ? true : false;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        if ( !empty($id) ){
            $delete = $this->db->delete('sk_belanja', array('id'=>$id) );
            return $delete ? true : false;
        } else {
            return false;
        }
    }

}
