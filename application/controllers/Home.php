<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kost'] = $this->kost_model->get_data_kost()->result_array();

        $data['title'] = 'Asrog | Home';
        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }

    public function about()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['administrators'] = $this->user_model->get_admin();
        $data['title'] = 'Asrog | About';
        $this->load->view('templates/header', $data);
        $this->load->view('home/about', $data);
        $this->load->view('templates/footer');
    }

    public function details()
    {
        //GET USER DATA
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $kost_id = $this->uri->segment(3);
        $data['detail'] = $this->kost_model->detail_kost($kost_id);
        $data['title'] = 'Detail kost';
        $this->load->view('templates/header', $data);
        $this->load->view('detail/detail_kost', $data);
        $this->load->view('templates/footer');
    }

    public function booking()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $isLogin = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $kost_id = $this->uri->segment(3);
        $data['detail'] = $this->kost_model->detail_kost($kost_id);
        $data['title'] = 'Detail booking';
        if ($isLogin) {
            $this->load->view('detail/booking_kost', $data);
        } else {
            redirect('auth');
        }
    }

    public function contact()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Asrog | Contact Us';
        $this->load->view('templates/header', $data);
        $this->load->view('home/contact_us_input', $data);
        $this->load->view('templates/footer');

        $this->form_validation->set_rules('nama','Nama Pembeli','required|min_length[3]', [
            'required' => 'Nama Pembeli Harus diisi',
            'min_length' => 'Nama terlalu pendek'
        ]);

        $this->form_validation->set_rules('nohp', 'Nomor HP', 'required|min_length[3]', [
            'required' => 'Nomor HP Harus diisi',
        ]);

        $this->form_validation->set_rules('merek', 'Merek Sepatu', 'required|min_length[3]', [
            'required' => 'Merek Sepatu Harus diisi',
        ]);

        $this->form_validation->set_rules('ukuran', 'Ukuran Sepatu', 'required|min_length[2]', [
            'required' => 'Ukuran Sepatu Harus diisi',
        ]);
    }

    public function contactOutput()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Asrog | Contact Us';
        $this->load->view('templates/header', $data);
        $this->load->view('home/contact_us_output', $data);
        $this->load->view('templates/footer');
    }

}
  