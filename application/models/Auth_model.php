<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    

    public function insertUser()
    {
        $data =[
            'name' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'image' => 'default.jpeg',
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role_id' => 1,
            'is_active' => 1,
            'date_created' => date_add('YYYY-MM-DD'),
        ];
        $this->db->insert('user', $data);
    }
}
