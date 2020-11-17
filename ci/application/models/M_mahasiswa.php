<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_mahasiswa extends CI_Model
{
    public function SemuaData()
    {
        return $this->db->get('mahasiswa')->result_array();
    }

    public function proses_tambah_data()
    {
    	$data = [

    		"nama" => $this->input->post('nama', true),
    		"nim" => $this->input->post('nim', true),
    		"alamat" => $this->input->post('alamat', true),
    	];

    	$this->db->insert('mahasiswa', $data);
    }

    public function hapus_data($id)
    {
        $this->db->where('id' ,$id);
        $this->db->delete('mahasiswa');
    }

    public function ambil_id_mahasiswa($id)
    {
        return $this->db->get_where('mahasiswa', ['id' => $id])->row_array();
    }

    public function proses_edit_data()
    {
        $data = [
            "nama" => $this->input->post('nama'),
            "nim" => $this->input->post('nim'),
            "alamat" => $this->input->post('alamat'),
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('mahasiswa' , $data);
    }
}
