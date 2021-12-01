<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        //SET RULES
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'valid_email' => 'Invalid email'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        //CHECK FORM VALIDATION
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/index');
            $this->load->view('templates/auth_footer');
        } else {
            //Success validation
            $this->_login();
        }
    }

    private function _login()
    {
        //CATCH DATA
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        //GET USER
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        //CHECKING USER
        if ($user) {
            // check if user is_active
            if ($user['is_active'] == 1) {
                // check if password correct
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                        'image' => $user['image']
                    ];

                    $this->session->set_userdata($data);
                    redirect('home');
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="message message-danger">Wrong password! </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="message message-danger">this email has not been activated! </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="message message-danger">Email is not registered! </div>');
            redirect('auth');
        }
    }

    public function registration()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        // SET RULES
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('phone', 'Phone Number ', 'required|regex_match[/^[0-9]{12}$/]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'valid_email' => 'Invalid email',
            'is_unique' => 'This email has been registered!',
        ]);
        $this->form_validation->set_rules('address', 'Full Address', 'required');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'mathes' => 'password dont matches',
            'min_length' => 'password minimum 6 characters',
        ]);
        $this->form_validation->set_rules('password2', 'Confirm Password', 'required|trim|matches[password1]');

        // CHECK FORM VALIDATION
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            // PREPARE DATA
            $email = $this->input->post('email', true);
            $data = [
                'name'          => htmlspecialchars($this->input->post('name', true)),
                'telp'          => htmlspecialchars($this->input->post('phone', true)),
                'email'         => htmlspecialchars($email),
                'address'          => htmlspecialchars($this->input->post('address', true)),
                'image'         => 'default.jpg',
                'status'        => 'Member',
                'password'      => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id'       => 2,
                'is_active'     => 0,
                'date_created'  => time()
            ];

            // PREPARE TOKEN
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];


            // SEND EMAIL
            $this->_sendEmail($token, 'verify');

            // INSERT INTO DB
            $this->db->insert('user', $data);
            $this->db->insert('user_token', $user_token);

            // SET FLASHDATA
            $this->session->set_flashdata('message', '<div class="message message-success">Successfully registered, please activate your account! </div>');
            redirect('auth');
        }
    }

    private function _sendEmail($token, $type)
    {
        // SET CONFIG
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_user' => 'ojihalawa@gmail.com',
            'smtp_pass' => 'selamatmalam97',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8'
            // 'newline' => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->set_mailtype("html");

        // PREPARE THE EMAIL
        $this->email->from('ojihalawa@gmail.com', 'Oji Halawa');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Account Verification!');
            $this->email->message('Click this link to verify your account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) .  '">Activate</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password!');
            $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) .  '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        // GET EMAIL & TOKEN
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        // GET USER DATA
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            // GET USER TOKEN
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            // CHECK USER TOKEN
            if ($user_token) {
                // CHECK WHETHER THE TOKEN IS STILL VALID
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    // IF NOT EXPIRED
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="message message-success">Your account has been activated, please login!</div>');
                    redirect('auth');
                } else {
                    // IF TOKEN EXPIRED
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="message message-danger"> Token expired!</div>');
                    redirect('auth');
                }
            } else {
                // IF TOKEN INVALID
                $this->session->set_flashdata('message', '<div class="message message-danger">Invalid token!</div>');
                redirect('auth');
            }
        } else {
            // IF THERE ARE NOT USER EMAIL
            $this->session->set_flashdata('message', '<div class="message message-danger">Account activation failed, Wrong email! </div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="message message-success">Successfully logout! </div>');
        redirect('auth');
    }

    public function blocked()
    {
        echo "blocked";
    }

    public function forgotPassword()
    {
        $data['title'] = 'Forgot Password';
        //GET USER DATA
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // SET RULES
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'valid_email' => 'Invalid email'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/forgotpassword', $data);
            $this->load->view('templates/auth_footer');
        } else {
            // GET EMAIL
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('message', '<div class="message message-success">Please check your email to reset password! </div>');
                redirect('auth/forgotpassword');
            } else {
                $this->session->set_flashdata('message', '<div class="message message-danger">Email is not register or activated! </div>');
                redirect('auth/forgotpassword');
            }
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="message message-danger">Wrong token! </div>');
                redirect('auth/forgotpassword');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="message message-danger">Reset password failed,  Wrong password! </div>');
            redirect('auth');
        }
    }

    public function changePassword()
    {

        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }
        // SET RULES
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required|min_length[6]|matches[password1]');

        $data['title'] = "Change Password";
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/changepassword', $data);
            $this->load->view('templates/auth_footer');
        } else {

            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('message', '<div class="message message-succes">Password has been change, please login! </div>');
            redirect('auth');
        }
    }
}
