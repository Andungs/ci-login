<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Auth_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {

            redirect('user');
        }

        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required');

        // cek validasi gagal
        if ($this->form_validation->run() == false) {
            # code...
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $user = $this->db->get_where('user', ['email' => $email])->row_array();

            // cek user ada 
            if ($user != NULL) {
                // cek user active
                if ($user['is_active'] == 1) {
                    if (password_verify($password, $user['password'])) {
                        // data session
                        $data = [
                            'email' => $user['email'],
                            'role_id' => $user['role_id']
                        ];
                        // set session 
                        $this->session->set_userdata($data);
                        if ($user['role_id'] == 1) {
                            redirect('admin');
                        } else {
                            redirect('input');
                        }
                    } else {
                        $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert" > Password Salah! </div>');
                        redirect('auth');
                    }
                } else {
                    $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert" > Acoount Not activated </div>');

                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert" > Akun Tidak Terdaftar! </div>');
                redirect('auth');
            }
        }
    }

    public function registration()
    {
        if ($this->session->userdata('email')) {

            redirect('user');
        }
        $data['title'] = 'Registration Page';
        $this->form_validation->set_rules('name', 'Name', 'required|min_length[3]');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password1', 'Password', 'required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'required|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $this->Auth_model->insertUser();
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert" > Akun Sukses Registrasi </div>');
            redirect(base_url());
        }
    }

    public function logout()
    {

        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert" >Sukses Keluar ! </div>');
        redirect('auth');
    }

    public function blocked()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'My Profile';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('auth/blocked');
        $this->load->view('templates/footer', $data);
    }

    public function forgetPassword()
    {
        $data['title']  = 'Forget Password';
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $email = $this->input->post('email');

        if ($this->form_validation->run() ==  FALSE) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/forget-password', $data);
            $this->load->view('templates/auth_footer');
        } else {
            $user = $this->db->get_where('user', ['email' => $email])->row_array();
            if ($user != NULL) {
                $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert" > Check Email For reset password </div>');
                redirect('auth', 'refresh');
            } else {
                $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert" >Account Not Found!</div>');
                redirect('auth/forgetPassword');
            }
        }
    }
}
