<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Halaman Data Jaga Malam';
		$data['mahasiswa'] = $this->M_mahasiswa->SemuaData();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('templates/index', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_data()
	{
		$data['title'] = 'Halaman Tambah Warga';
		$data['mahasiswa'] = $this->M_mahasiswa->SemuaData();
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
		$this->M_mahasiswa->proses_tambah_data();
		$this->session->set_flashdata('pesan' , '<div class="alert alert-success" role="alert">
			 Data baru berhasil Ditambahkan!
			</div>');
		redirect('Home');
	}

	public function hapus_data($id)
	{
		$this->M_mahasiswa->hapus_data($id);
		$this->session->set_flashdata('pesan' , '<div class="alert alert-success" role="alert">
			 Data berhasil Dihapus!
			</div>');
		redirect('Home');
	}

	public function edit_data($id)
	{
		$data['title'] = 'Halaman Edit Mahasiswa';
		$data['mahasiswa'] = $this->M_mahasiswa->ambil_id_mahasiswa($id);
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('home/edit_data', $data);
		$this->load->view('templates/footer');
	}

	public function proses_edit_data($id)
	{
		$this->M_mahasiswa->proses_edit_data($id);
		$this->session->set_flashdata('pesan' , '<div class="alert alert-success" role="alert">
			 Data berhasil Diedit!
			</div>');
		redirect('Home');
	}
}
