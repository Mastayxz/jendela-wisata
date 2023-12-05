<?php

defined('BASEPATH') or exit('No direct script access allowed');

class c_auth extends CI_Controller
{

    public function index()
    {

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Jendela wisata login';
            $this->load->view('templates/header', $data);
            $this->load->view('auth/v_login');
            $this->load->view('templates/footer');
        } else {
            $this->_login();
        }
    }
    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();
        //jika ada username
        if ($user) {
            //cek password
            if (password_verify($password, $user['password'])) {
                $data = [
                    'username' => $user['username'],
                ];
                $this->session->set_userdata($data);
                redirect('user/tempat_wisata');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                wrong password</div>');
                redirect('c_auth/index');
            }
        } else {
            //jika username tidak ada
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
           usernmae does not exits</div>');
            redirect('c_auth/index');
        }
    }
    public function register()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[user.username]', array(
            'required' => '  colom harus di isi',
            'is_unique' => 'username sudah ada'
        ));
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|matches[password1]', array(
            'matches' => 'password tidak sama',
            'min_length' => 'password kurang panjang'
        ));
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]', array(
            'is_unique' => 'email sudah ada'
        ));

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Jendela Register';
            $this->load->view('templates/header', $data);
            $this->load->view('auth/v_register');
            $this->load->view('templates/footer');
        } else {

            $username = $this->input->post('username');
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $date_user = time();

            $data = array(
                'username' => $username,
                'password' => $password,
                'nama' => $nama,
                'email' => $email,
                'date_user' => $date_user
            );
            //  var_dump($data);die;

            $subject = 'pesan';
            $message = '<html>
                <h2>Aktivasi Akun</h2>
                <p>akun anda sudah di buat</p>
                <html>';

            $this->db->insert('user', $data);


            if (isset($data)) {
                $this->send_email($email, $subject, $message);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                    account has ben created</div>');
                redirect('c_auth/index');
            } else {
                redirect('c_auth/register');
            }
        }
    }
    public function send_email($to, $subject, $message)
    {
        $from = $this->config->item('smtp_user');
        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
            // return show_error($this->email->print_debugger());
        }
    }

    public function forgot_pass()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Jendela wisata login';
            $this->load->view('templates/header', $data);
            $this->load->view('auth/v_forgot');
            $this->load->view('templates/footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email])->row_array();

            if ($user) {
                $this->session->set_userdata('email', $email);
                $this->edit();
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                your email has ben removed</div>');
                redirect('c_auth/forgot_pass');
            }
        }
    }
    public function edit()
    {
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|matches[password1]', array(
            'min_length' => 'password is to short',
            'matches' => 'password is not same'

        ));
        $this->form_validation->set_rules('password1', 'Password1', 'trim|required|min_length[3]|matches[password]', array(
            'min_length' => 'password is to short',
            'matches' => 'password is not same'
        ));

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Change Password ';
            $this->load->view('templates/header', $data);
            $this->load->view('auth/v_edit');
            $this->load->view('templates/footer');
        } else {
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('email');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            password has ben changed!</div>');
            redirect('c_auth/index');
        }
    }

    public function logout()
    {
        session_destroy();
        redirect('c_auth');
    }
}
