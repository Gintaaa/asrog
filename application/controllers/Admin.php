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
        //GET USER DATA
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['transaksi'] = $this->db->get('transaksi')->result_array();

        $data['title'] = 'Dashboard';
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/dashboard_sidebar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/dashboard_footer');
    }

    public function user()
    {
        //GET USER DATA
        $data['users'] = $this->user_model->get_data_user()->result_array();

        $data['title'] = 'Member';
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/dashboard_sidebar', $data);
        $this->load->view('admin/user', $data);
        $this->load->view('templates/dashboard_footer');
    }

    public function add()
    {
        // SET RULES
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('phone', 'Phone Number ', 'required|regex_match[/^[0-9]{12}$/]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'valid_email' => 'Invalid email',
            'is_unique' => 'This email has been registered!',
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'mathes' => 'password dont matches',
            'min_length' => 'password minimum 6 characters',
        ]);
        $this->form_validation->set_rules('password2', 'Confirm Password', 'required|trim|matches[password1]');

        // CHECK FORM VALIDATION
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('admin/add_member');
            $this->load->view('templates/auth_footer', $data);
        } else {
            $this->user_model->add_user();
            redirect('admin/user');
        }
    }
    function editUser($user_id)
    {
        $user_id = $this->uri->segment(3);
        $where = array('id' => $user_id);
        $data['title'] = 'Edit User';
        $data['user'] = $this->user_model->edit_user($where, 'user')->result_array();
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/dashboard_sidebar', $data);
        if (!$user_id) {
            $this->load->view('admin/not_allowed_edit', $data);
        } else {
            $this->load->view('admin/edit_user', $data);
        }
        $this->load->view('templates/dashboard_footer', $data);
    }
    public function updateUser()
    {
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('kost', 'Kost', 'required|trim');
        $this->form_validation->set_rules('kost_location', 'Kost Location', 'required|trim');

        $user_id = $this->uri->segment(3);
        $data['user'] = $this->db->get_where('user', ['id' => $user_id])->row_array();
        $data['title'] = 'Edit User';

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('templates/dashboard_sidebar', $data);
            if (!$user_id) {
                $this->load->view('admin/not_allowed_edit', $data);
            } else {
                $this->load->view('admin/edit_user', $data);
            }
            $this->load->view('templates/dashboard_footer', $data);
        } else {
            $id = $this->input->post('id');
            $inputDate = htmlspecialchars($this->input->post('member_since', true));
            $new_member_since = date("d-m-Y", strtotime($inputDate));
            $data = [
                'name'          => htmlspecialchars($this->input->post('name', true)),
                'kost'          => htmlspecialchars($this->input->post('kost', true)),
                'kost_location' => htmlspecialchars($this->input->post('kost_location', true)),
                'member_since' => $new_member_since,
            ];
            $where = array(
                'id' => $id
            );

            $this->user_model->update_data_user($where, $data, 'user');
            redirect('admin/user');
        }
    }

    public function deleteUser($id)
    {
        $this->user_model->delete_user($id);
        redirect('admin/user');
    }

    public function listKost()
    {
        $data['kost'] = $this->kost_model->get_data_kost()->result_array();
        $data['title'] = 'List Kost';
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/dashboard_sidebar', $data);
        $this->load->view('admin/list_kost', $data);
        $this->load->view('templates/dashboard_footer', $data);
    }

    public function deleteKost($id)
    {
        $this->kost_model->delete_kost($id);
        redirect('admin/listKost');
    }
    function editKost($kost_id)
    {
        $kost_id = $this->uri->segment(3);
        $where = array('id' => $kost_id);
        $data['title'] = 'Edit Kost';
        $data['details'] = $this->kost_model->edit_kost($where, 'kost')->result_array();
        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/dashboard_sidebar', $data);
        if (!$kost_id) {
            $this->load->view('admin/not_allowed_edit', $data);
        } else {
            $this->load->view('admin/edit_kost', $data);
        }
        $this->load->view('templates/dashboard_footer', $data);
    }
    public function updateKost()
    {
        $this->form_validation->set_rules('kode_kost', 'Kode Kost', 'required|trim');
        $this->form_validation->set_rules('room_size', 'Room Size', 'required|trim');
        $this->form_validation->set_rules('room_qty', 'Total Room', 'required|trim');
        $this->form_validation->set_rules('price', 'Price', 'required|trim');
        $this->form_validation->set_rules('facility', 'Facility', 'required|trim');
        $this->form_validation->set_rules('empty', 'Available Room', 'required|trim');
        $this->form_validation->set_rules('filled', 'Room Filled', 'required|trim');

        $kost_id = $this->uri->segment(3);
        $data['details'] = $this->db->get_where('kost', ['id' => $kost_id])->row_array();
        $data['title'] = 'Edit Kost';

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('templates/dashboard_sidebar', $data);
            if (!$kost_id) {
                $this->load->view('admin/not_allowed_edit', $data);
            } else {
                $this->load->view('admin/edit_kost', $data);
            }
            $this->load->view('templates/dashboard_footer', $data);
        } else {
            $id = $this->input->post('id');
            $data = [
                'kode_kost'     => htmlspecialchars($this->input->post('kode_kost', true)),
                'room_size'     => htmlspecialchars($this->input->post('room_size', true)),
                'price'         => htmlspecialchars($this->input->post('price', true)),
                'facility'      => htmlspecialchars($this->input->post('facility', true)),
                'price'         => htmlspecialchars($this->input->post('price', true)),
                'empty'         => htmlspecialchars($this->input->post('empty', true)),
                'filled'        => htmlspecialchars($this->input->post('filled', true)),
            ];

            $where = array(
                'id' => $id
            );

            $this->kost_model->update_data_kost($where, $data, 'kost');
            redirect('admin/listKost');
        }
    }
}
