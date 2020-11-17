<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Halaman Data Jaga Malam';
		$data['tb_jadwal'] = $this->T_tb_jadwal->SemuaData();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('templates/index', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_data()
	{
		$data['title'] = 'Halaman Tambah Warga';
		$data['tb_jadwal'] = $this->T_tb_jadwal->SemuaData();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('home/tambah_data', $data);
		$this->load->view('templates/footer');
	}

	public function kontak()
	{
		$data['title'] = 'Kontak';
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('home/kontak', $data);
		$this->load->view('templates/footer');
	}

	public function Login()
	{
		$data['title'] = 'Login';
		
		// $this->load->view('templates/header', $data);
		// $this->load->view('templates/sidebar');
		// $this->load->view('templates/topbar');
		$this->load->view('home/login', $data);
		// $this->load->view('templates/footer');
	}

	public function proses_tambah_data()
	{
		$this->T_tbl_jadwal->proses_tambah_data();
		$this->session->set_flashdata('pesan' , '<div class="alert alert-success" role="alert">
			 Data baru berhasil Ditambahkan!
			</div>');
		redirect('Home');
	}

	public function hapus_data($id)
	{
		$this->T_tbl_jadwal->hapus_data($id);
		$this->session->set_flashdata('pesan' , '<div class="alert alert-success" role="alert">
			 Data berhasil Dihapus!
			</div>');
		redirect('Home');
	}

	public function edit_data($id)
	{
		$data['title'] = 'Halaman Edit Mahasiswa';
		$data['tb_jadwal'] = $this->T_tb_jadwal->ambil_id_tb_jadwal($id);
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('home/edit_data', $data);
		$this->load->view('templates/footer');
	}

	public function proses_edit_data($id)
	{
		$this->T_tb_jadwal->proses_edit_data($id);
		$this->session->set_flashdata('pesan' , '<div class="alert alert-success" role="alert">
			 Data berhasil Diedit!
			</div>');
		redirect('Home');
	}
}
