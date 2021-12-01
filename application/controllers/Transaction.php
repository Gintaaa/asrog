<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction extends CI_Controller
{
    public function booking()
    {
        $this->form_validation->set_rules('dateOfEntry', 'Date Of Entry', 'required|trim');

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $isLogin = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $kost_id = $this->uri->segment(3);
        $data['detail'] = $this->kost_model->detail_kost($kost_id);
        $data['title'] = 'Form booking';

        if ($isLogin) {
            if ($this->form_validation->run() == false) {
                $this->load->view('detail/booking_kost', $data);
            } else {
                // PREPARE DATA
                // $id = $this->input->post('id');
                // $kost = htmlspecialchars($this->input->post('kost', true));
                $data = [
                    'name'          => htmlspecialchars($this->input->post('name', true)),
                    'telp'          => htmlspecialchars($this->input->post('phone', true)),
                    'email'         => htmlspecialchars($this->input->post('email', true)),
                    'address'       => htmlspecialchars($this->input->post('address', true)),
                    'kost'          => htmlspecialchars($this->input->post('kost', true)),
                    'kost_location' => htmlspecialchars($this->input->post('full_address', true)),
                    'price'         => htmlspecialchars($this->input->post('price', true)),
                    'date'          => $this->input->post('dateOfEntry', true),
                    'payment_image'         => 'proof of payment',
                    'date_created'  => time()
                ];


                $this->db->insert('transaksi', $data);
                redirect('transaction/successBooking');
            }
        } else {
            redirect('auth');
        }
    }

    public function successBooking()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $kost_id = $this->uri->segment(3);
        $data['transaksi'] = $this->db->get('transaksi')->row_array();
        $data['title'] = 'Success Booking';

        $this->load->view('detail/success_booking', $data);
    }
}
