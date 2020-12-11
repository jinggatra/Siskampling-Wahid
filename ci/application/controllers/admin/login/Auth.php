<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('USERNAME', 'USERNAME', 'trim|required|valid_USERNAME');
        $this->form_validation->set_rules('PASSWORD', 'PASSWORD', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Admin';
            $this->load->view('administrator/login/templates/auth_header', $data);
            $this->load->view('administrator/login/login');
            $this->load->view('administrator/login/templates/auth_footer');
        } else {
            // validation success
            $this->_login();
        }
        
    }

    private function _login()
    {
        $email = $this->input->post('USERNAME');
        $password = $this->input->post('PASSWORD');



        $admin = $this->db->get_where('admin', ['USERNAME' => $USERNAME])->row_array();

        // jika adminnya ada
        if ($admin) {
            // jika adminnya aktif
            if ($admin['is_active'] == 1) {
                // cek passwordnya
                if (password_verify($PASSWORD, $USERNAME['PASSWORD'])) {
                    $data = [
                        'USERNAME' => $admin['USERNAME'],
                        'PASSWORD' => $admin['PASSWORD']
                    ];
                    $this->session->set_userdata($data);
                    redirect('admin');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Wrong password!</div>');
                    redirect('admin/login/auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                This email has not been activated!</div>');
                redirect('admin/login/auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email is not registered!</div>');
            redirect('admin/login/auth');
        }
    }

    public function registration()
    {
        // $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('USERNAME', 'USERNAME', 'required|trim|valid_USERNAME|is_unique[data_admin.USERNAME]', ['is_unique' => 'This email has already registered!']);
        $this->form_validation->set_rules('PASSWORD', 'PASSWORD', 'required|trim|min_length[5]', ['min_length' => 'Password too short!']);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Admin Registration';
            $this->load->view('administrator/login/templates/auth_header', $data);
            $this->load->view('administrator/login/registration');
            $this->load->view('administrator/login/templates/auth_footer');
        } else {
            $data = [
                // 'nama' => htmlspecialchars($this->input->post('nama', true)),
                'USERNAME' => htmlspecialchars($this->input->post('USERNAME', true)),
                'PASSWORD' => password_hash($this->input->post('PASSWORD'), PASSWORD_DEFAULT)
            ];

            $this->db->insert('admin', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation! Your account has been created. Please Login</div>');
            redirect('admin/login/auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('ID');
        // $this->session->unset_userdata('nama');
        $this->session->unset_userdata('USERNAME');
        // $this->session->unset_userdata('is_authenticated');
        $this->session->sess_destroy();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        redirect('admin/login/auth');
    }
}
