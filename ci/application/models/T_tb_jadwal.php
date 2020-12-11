<?php
defined('BASEPATH') or exit('No direct script access allowed');

class T_tb_jadwal extends CI_Model
{
    public function SemuaData()
    {
        return $this->db->get('tb_jadwal')->result_array();
    }

    public function proses_tambah_data()
    {
    	$data = [

    		"nama" => $this->input->post('nama', true),
    		"hari" => $this->input->post('hari', true),
        "nama_desa" => $this->input->post('nama_desa', true),
        "tgl_jaga" => $this->input->post('tanggal_jaga', true),
    	];

    	$this->db->insert('tb_jadwal', $data);
    }

    public function hapus_data($id)
    {
        $this->db->where('id' ,$id);
        $this->db->delete('tb_jadwal');
    }

    public function ambil_id_tb_jadwal($id)
    {
        return $this->db->get_where('tb_jadwal', ['id' => $id])->row_array();
    }

    public function proses_edit_data()
    {
        $data = [
            "nama" => $this->input->post('nama'),
            "hari" => $this->input->post('hari'),
            "nama_desa" => $this->input->post('nama_desa'),
            "tgl_jaga" => $this->input->post('tgl_jaga'),
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tb_jadwal' , $data);
    }
}
