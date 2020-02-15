<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Input extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }


    public function index()
    {
        $data['title'] = 'TNKB SAMSAT';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/auth_header', $data);
        $this->load->view('input/index', $data);
        $this->load->view('templates/auth_footer');
    }
}

/* End of file Input.php */
