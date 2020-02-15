<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }


    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Dashbord';
        $data['users'] = $this->db->get('user')->result_array();
        $data['r2sudahCetak'] = $this->db->get_where('roda_dua', ['Keterangan' => 1])->result_array();
        $data['r2belumCetak'] = $this->db->get_where('roda_dua', ['Keterangan' => 0])->result_array();
        $data['r4sudahCetak'] = $this->db->get_where('roda_empat', ['Keterangan' => 1])->result_array();
        $data['r4belumCetak'] = $this->db->get_where('roda_empat', ['Keterangan' => 0])->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function role()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Role';
        $data['userRole'] = $this->db->get('user_role')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer', $data);
    }
    public function roleAccess($roleId)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Role Access';
        $data['role'] = $this->db->get_where('user_role', ['id' => $roleId])->row_array();

        $this->db->where(' id!=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/roleAccess', $data);
        $this->load->view('templates/footer', $data);
    }
    public function changeAccess()
    {
        $role_id = $this->input->post('roleId');
        $menu_id = $this->input->post('menuId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            # code...
            $this->db->insert('user_access_menu', $data);
        } else {
            # code...
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert" > Role Change !</div>');
    }
}
