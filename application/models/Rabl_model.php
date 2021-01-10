<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Rabl_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('mylib');

    }

    public function select($id = null)
    {
        if (is_null($id)) {
            $penggunaid = $this->session->userdata('id');
            $string = $this->session->userdata('role') == 'OPD' ? " WHERE opd.penggunaid='$penggunaid'" : "";

            return $this->db->query("SELECT
                `rabl`.`tanggal` AS `tanggalpengajuan`,
                `suratperjanjian`.`nomor`,
                `suratperjanjian`.`tanggal`,
                `suratperjanjian`.`pekerjaan`,
                `suratperjanjian`.`nilaipekerjaan`,
                `suratperjanjian`.`sumberdana`,
                `suratperjanjian`.`lokasi`,
                `suratperjanjian`.`waktupelaksanaan`,
                `suratperjanjian`.`tahunanggaran`,
                `opd`.`opd`,
                `rabl`.`id`
            FROM
                `rabl`
                LEFT JOIN `suratperjanjian` ON `rabl`.`id` = `suratperjanjian`.`rablid`
                LEFT JOIN `opd` ON `rabl`.`opdid` = `opd`.`id` $string")->result();
        } else {
            $rabl = $this->db->get_where("rabl", ['id' => $id])->row_object();
            $rabl->suratperjanjian = $this->db->get_where("suratperjanjian", ['rablid' => $rabl->id])->row_object();
            $rabl->detailrabl = $this->db->get_where("detailrabl", ['rablid' => $rabl->id])->result();
        }
    }

    public function insert($data)
    {
        $this->db->trans_begin();
        $rabl = [
            'rabl' => $data['rabl'],
            'opdid' => $this->session->userdata('opdid'),
            'tanggal' => date('Y-m-d'),
        ];
        $rabl['id'] = $this->db->insert_id();
        $surat = [
            "rablid" => $rabl['id'],
            "nomor" => $data['nomor'],
            "tanggal" => $data['tanggal'],
            "pekerjaan" => $data['pekerjaan'],
            "nilaipekerjaan" => $data['nilaipekerjaan'],
            "sumberdana" => $data['sumberdana'],
            "lokasi" => $data['lokasi'],
            "waktupelaksanaan" => $data['waktupelaksanaan'],
            "tahunanggaran" => $data['tahunanggaran'],
            "tahunanggaran" => $data['pelaksana'],
        ];
        $this->db->insert("rabl", $rabl);
        $data['id'] = $this->db->insert_id();
        if ($this->db->trans_status()) {
            $this->db->trans_commit();
            return $data;
        } else {
            $this->db->trans_rollback();
            return false;
        }
    }
    public function update($data)
    {
        $this->db->trans_begin();
        $user = [
            'username' => $data['username'],
            'opdid' => $this->session->userdata('opdid'),
            'tanggal' => date('Y-m-d'),
        ];
        $this->db->update('users', $user, ['id' => $data['usersid']]);
        $rabl = [
            'rabl' => $data['rabl'],
            'penggunaid' => $data['penggunaid'],
        ];
        $this->db->update('rabl', $rabl, ['id' => $data['id']]);
        if ($this->db->trans_status()) {
            $this->db->trans_commit();
            return $data;
        } else {
            $this->db->trans_rollback();
            return false;
        }
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('rabl');
    }

}

/* End of file rabl_model.php */
