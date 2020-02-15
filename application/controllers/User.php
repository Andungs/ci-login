<?php


defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Profile';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function edit()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Edit Profile';

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
            # code...
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $upload_image = $_FILES['image']['name'];


            // cek apakah ada gambar yang di upload
            if ($upload_image) {

                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = '30722';
                $config['upload_path']          = 'assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];

                    if ($old_image != 'default.jpeg') {
                        unlink("assets/img/profile/" . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert" > Acoount Success Edit ! </div>');
            redirect('user');
        }
    }

    public function changePassword()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Change Password';

        $this->form_validation->set_rules('oldpassword', 'Old Password', 'required');
        $this->form_validation->set_rules('password1', 'password1', 'required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'password2', 'required|matches[password1]');
        $old_password = $this->input->post('oldpassword');
        $password1 = $this->input->post('password1');
        $password2 = $this->input->post('password2');
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/change-password', $data);
            $this->load->view('templates/footer', $data);
        } else {
            if (password_verify($old_password, $data['user']['password'])) {
                $email = $data['user']['email'];
                $this->db->set('password', password_hash($password1, PASSWORD_DEFAULT));
                $this->db->where('email', $email);
                $this->db->update('user');
                $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert" > Change Password Success ! </div>');
                redirect('user');
            }
        }
    }
}
