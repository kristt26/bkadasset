<?php

defined('BASEPATH') or exit('No direct script access allowed');
require FCPATH . 'vendor/autoload.php';
use PhpOffice\PhpWord\PhpWord;

class Rabl extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Rabl_model');
        $this->load->model('Pelaksana_model');
        $this->load->library('mylib');
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
        echo json_decode($result);
    }

    public function addsurat()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Rabl_model->insertsurat($data);
        echo json_encode($result);
    }

    public function content()
    {
        $data['content'] = $this->load->view('rabl/' . $_GET['url'], '', true);
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

    public function downloadsurat($id, $pelaksanaid)
    {
        $surat = $this->Rabl_model->getsurat($id);
        $pelaksana = $this->Pelaksana_model->select($pelaksanaid);
        try {
            $phpWord = new \PhpOffice\PhpWord\TemplateProcessor(base_url('public/berkas/format/suratperjanjian.docx'));
            $phpWord->setValues([
                'nomor' => $surat->nomor,
                'tanggal' => $this->mylib->tgl_indo($surat->tanggal),
                'pekerjaan' => $surat->pekerjaan,
                'nilaipekerjaan' => number_format($surat->nilaipekerjaan, 2),
                'terbilang' => ucwords($this->mylib->penyebut($surat->nilaipekerjaan)),
                'sumberdana' => $surat->sumberdana,
                'lokasi' => $surat->lokasi,
                'waktupelaksanaan' => $surat->waktupelaksanaan,
                'tahunanggaran' => $surat->tahunanggaran,
                'pelaksana' => $pelaksana['nama'],
                'alamat' => $pelaksana['alamat'],
                'kontak' => $pelaksana['kontak'],
            ]);
            // header("Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document");
            header("Content-Disposition: attachment; filename=myFilewe.docx");
            // $objWriter->save('php://output');
            $phpWord->saveAs('php://output');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

/* End of file Staff.php */
