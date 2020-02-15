<?php


defined('BASEPATH') or exit('No direct script access allowed');

class data extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }


    public function roda_Dua()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Roda Dua';
        $data['data'] = $this->db->get('roda_dua')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data-tnkb/roda_dua', $data);
        $this->load->view('templates/footer', $data);
    }
    public function roda_Empat()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Roda Empat';
        $data['data'] = $this->db->get('roda_Empat')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data-tnkb/roda_empat', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambahData($table)
    {

        $tanggal = $this->input->post('tanggal');
        $nomorPolisi = $this->input->post('nomorPolisi');
        $keterangan = $this->input->post('keterangan');
        $data_nopol  = $this->db->get_where($table, ['NomorPolisi' => $nomorPolisi])->row_array();

        if ($keterangan == NULL) {
            $keterangan = 0;
        }
        $data = [
            'Tanggal' => $tanggal,
            'NomorPolisi' => $nomorPolisi,
            'Keterangan' => $keterangan,
        ];

        if ($data_nopol != NULL) {
            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert" >Nomor Polisi Sudah Ada!!!</div>');
            redirect('data/' . $table);
        } else {
            $this->db->insert($table, $data);
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert" > Data Berhasil Di tambahkan </div>');
            redirect('data/' . $table);
        }
    }


    public function editDataR4($id)
    {
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('nopol', 'Nomor Polisi', 'required');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata['email']])->row_array();
        $data['title'] = 'Edit Data Kendaraan';
        $data['data'] = $this->db->get_where('roda_empat', ['id' => $id])->row_array();

        $tanggal = $this->input->post('tanggal');
        $nopol = $this->input->post('nopol');
        $keterangan = $this->input->post('keterangan');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('data-tnkb/edit-dataR4', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $update = [
                'Tanggal' => $tanggal,
                'NomorPolisi' => $nopol,
                'Keterangan' => $keterangan
            ];
            if ($update != NULL) {

                if ($nopol != $data['data']['NomorPolisi']) {
                    $key = $this->db->get_where('roda_empat', ['NomorPolisi' => $nopol])->row_array();
                    if ($key != null) {

                        $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert" > Data Gagal Di Ubah ! Nomor Polisi Sudah ada </div>');
                        redirect('data/editDataR4/' . $id);
                    } else {
                        $this->db->set($update);
                        $this->db->where('id', $id);
                        $this->db->update('roda_empat');
                        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert" > Data Berhasil Di Ubah </div>');
                        redirect('data/roda_empat');
                    }
                } else {
                    $this->db->set($update);
                    $this->db->where('id', $id);
                    $this->db->update('roda_empat');
                    $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert" > Data Berhasil Di Ubah </div>');
                    redirect('data/roda_empat');
                }
            }
        }
    }
    public function editDataR2($id)
    {
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('nopol', 'Nomor Polisi', 'required');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata['email']])->row_array();
        $data['title'] = 'Edit Data Kendaraan';
        $data['data'] = $this->db->get_where('roda_dua', ['id' => $id])->row_array();

        $tanggal = $this->input->post('tanggal');
        $nopol = $this->input->post('nopol');
        $keterangan = $this->input->post('keterangan');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('data-tnkb/edit-dataR2', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $update = [
                'Tanggal' => $tanggal,
                'NomorPolisi' => $nopol,
                'Keterangan' => $keterangan
            ];
            if ($update != NULL) {

                if ($nopol != $data['data']['NomorPolisi']) {
                    $key = $this->db->get_where('roda_dua', ['NomorPolisi' => $nopol])->row_array();
                    if ($key != null) {

                        $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert" > Data Gagal Di Ubah ! Nomor Polisi Sudah ada </div>');
                        redirect('data/editDataR2/' . $id);
                    } else {
                        $this->db->set($update);
                        $this->db->where('id', $id);
                        $this->db->update('roda_dua');
                        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert" > Data Berhasil Di Ubah </div>');
                        redirect('data/roda_dua');
                    }
                } else {
                    $this->db->set($update);
                    $this->db->where('id', $id);
                    $this->db->update('roda_dua');
                    $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert" > Data Berhasil Di Ubah </div>');
                    redirect('data/roda_dua');
                }
            }
        }
    }

    public function hapusDataR2($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('roda_dua');
        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert" > Data Berhasil Di Hapus </div>');
        redirect('data/roda_dua');
    }

    public function hapusDataR4($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('roda_empat');
        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert" > Data Berhasil Di Hapus </div>');
        redirect('data/roda_empat');
    }
}
