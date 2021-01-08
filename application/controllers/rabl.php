<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Rabl extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Rabl_model');
    }
    
    public function index()
    {
        $data['content'] = $this->load->view('rabl/index', '', true);
        $this->load->view('_shared/layout', $data);
    }

    public function get($id = null)
    {
        $result = $this->Rabl_model->select($id);
        echo json_encode($result);
    }

    public function add()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Rabl_model->insert($data);
        echo json_encode($result);
    }

    public function content()
    {
        $data['content'] = $this->load->view('rabl/'.$_GET['url'], '', true);
        $this->load->view('_shared/layout', $data);
    }

    public function update()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Rabl_model->update($data);
        echo json_encode($result);
    }

    public function delete($id)
    {
        $result = $this->Rabl_model->delete($id);
        echo json_encode($result);
    }
}

/* End of file Staff.php */
