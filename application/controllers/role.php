<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Role extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Role_model');

    }

    public function index()
    {
        $data['content'] = $this->load->view('roles/index', '', true);
        $this->load->view('_shared/layout', $data);
    }

    public function get($id = null)
    {
        $result = $this->Role_model->select($id);
        echo json_encode($result);
    }

    public function add()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Role_model->insert($data);
        echo json_encode($result);
    }

    public function update()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Role_model->update($data);
        echo json_encode($result);
    }

    public function delete($id)
    {
        $result = $this->Role_model->delete($id);
        echo json_encode($result);
    }
}

/* End of file Staff.php */
