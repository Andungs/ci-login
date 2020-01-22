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
        $data['title'] = 'Login Page';
        $this->load->view('templates/header', $data);
        $this->load->view('auth/login');
        $this->load->view('templates/header');
    }

    public function registration()
    {
        $data['title'] = 'Registration Page';
        $this->form_validation->set_rules('name', 'Name', 'required|min_length[8]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password1', 'Password', 'required|min_length[6]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'required|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/header');
        } else {
            $this->Auth_model->insertUser();
            $this->session->set_flashdata('flash', 'successful registration please login!');
            redirect(base_url());
        }
    }
}
