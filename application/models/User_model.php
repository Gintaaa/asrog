<?php

class User_model extends CI_Model
{
    function get_admin()
    {
        $this->db->select('*');
        $this->db->from('team');
        $this->db->where('user.status', 'admin');
        $this->db->join('user', 'user.email = team.email');
        $query = $this->db->get()->result_array();
        return $query;
    }
    function get_data_user()
    {
        return $this->db->get_where('user', ['status' => 'member']);
    }

    public function add_user()
    {
        // PREPARE DATA
        $email = $this->input->post('email', true);
        $data = [
            'name'          => htmlspecialchars($this->input->post('name', true)),
            'telp'          => htmlspecialchars($this->input->post('phone', true)),
            'email'         => htmlspecialchars($email),
            'image'         => 'default.jpg',
            'status'        => 'Member',
            'password'      => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'role_id'       => 2,
            'is_active'     => 0,
            'date_created'  => time()
        ];

        // INSERT INTO DB
        $this->db->insert('user', $data);
    }

    public function delete_user($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }
    public function edit_user($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data_user($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

}
