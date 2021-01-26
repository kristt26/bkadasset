<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index()
    {
        $this->User_model->check();
        $this->load->view('login');
    }

    public function login()
    {
        // $data = $this->input->post();
        $data = $this->input->post();
        $result = $this->User_model->login($data);
        if ($result) {
            $result['is_login'] = true;
            $this->session->set_userdata($result);
            // echo json_encode($result);
            redirect('home');
        } else {
            $this->session->set_flashdata('pesan', 'Username tidak ditemukan!!!');
            redirect('auth');
            // echo json_encode($result);
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }

    public function islogin()
    {
        echo json_encode($this->session->userdata());
    }

}

/* End of file auth.php */
