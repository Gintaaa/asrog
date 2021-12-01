<?php

function is_logged_in()
{
    //Call the library ci in this file
    $ci = get_instance();
    // Check if there are session
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        // Check role_id & current menu
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        // Query table user_menu, get id
        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];
        $userAccess = $ci->db->get_where('user_access_menu', ['role_id' => $role_id, 'menu_id' => $menu_id]);

        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}
