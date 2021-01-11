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
        $penggunaid = $this->session->userdata('id');
        $string = $this->session->userdata('role') == 'OPD' ? " WHERE opd.penggunaid='$penggunaid'" : "";
        $result = $this->db->query("SELECT
                `opd`.`opd`,
                `rabl`.`id`,
                `rabl`.`tanggal`,
                `rabl`.`pelaksanaid`
            FROM
                `rabl`
                LEFT JOIN `opd` ON `rabl`.`opdid` = `opd`.`id` $string")->result();
        foreach ($result as $key => $value) {
            $value->detail = $this->db->get_where('detailrabl', ['rablid' => $value->id])->result();
            $value->pelaksana = $this->db->get_where('pelaksana', ['id'=>$value->pelaksanaid])->row_array();
            $value->suratperjanjian = $this->db->get_where('suratperjanjian', ['rablid'=>$value->id])->row_array();
        }
        return $result;
    }

    public function insert($data)
    {
        try {
            $this->db->trans_begin();
            $rabl = [
                'pelaksanaid' => $data['pelaksanaid'],
                'opdid' => $this->session->userdata('opdid'),
                'tanggal' => $data['tanggal'],
            ];
            $resultrabl = $this->db->insert('rabl', $rabl);
            if (!$resultrabl) {
                throw new Exception($this->db->_error_message(), $this->db->_error_number());
            }
            $data['id'] = $this->db->insert_id();
            
            foreach ($data['detail'] as $key => $value) {
                $detail = [
                    'rablid' => $data['id'],
                    'jeniskendaraanid' => $value['jeniskendaraanid'],
                    'nomorrangka' => $value['nomorrangka'],
                    'nomorplat' => $value['nomorplat'],
                    'tahunperolehan' => $value['tahunperolehan'],
                    'keterangan' => $value['keterangan'],
                    'qty' => $value['qty'],
                    'hargasatuan' => $value['hargasatuan'],
                    'ppn' => $value['ppn'],
                    'totalharga' => $value['totalharga'],
                ];
                $resultdetail = $this->db->insert('detailrabl', $detail);
                if (!$resultdetail) {
                    throw new Exception($this->db->_error_message(), $this->db->_error_number());
                }
                $value['id'] = $this->db->insert_id();
            }
            $this->db->trans_commit();
            return $data;
        } catch (Exception $e) {
            $this->db->trans_rollback();
            log_message('error', sprintf('%s : %s : DB transaction failed. Error no: %s, Error msg:%s, Last query: %s', __CLASS__, __FUNCTION__, $e->getCode(), $e->getMessage(), print_r($this->main_db->last_query(), true)));
        }
    }

    public function insertsurat($data)
    {
        try {
            $surat = [
                "rablid" => $data['id'],
                "nomor" => $data['suratperjanjian']['nomor'],
                "tanggal" => $data['suratperjanjian']['tanggal'],
                "pekerjaan" => $data['suratperjanjian']['pekerjaan'],
                "nilaipekerjaan" => $data['suratperjanjian']['nilaipekerjaan'],
                "sumberdana" => $data['suratperjanjian']['sumberdana'],
                "lokasi" => $data['suratperjanjian']['lokasi'],
                "waktupelaksanaan" => $data['suratperjanjian']['waktupelaksanaan'],
                "tahunanggaran" => $data['suratperjanjian']['tahunanggaran'],
                "suratpesankendaraan" => $this->mylib->decodebase64($data['suratperjanjian']['suratpesankendaraan']['base64'], 'berkas'),
                "baserahterima" => $this->mylib->decodebase64($data['suratperjanjian']['baserahterima']['base64'], 'berkas'),
                "bapembayaran" => $this->mylib->decodebase64($data['suratperjanjian']['bapembayaran']['base64'], 'berkas'),
                "bapemeriksaanpek" => $this->mylib->decodebase64($data['suratperjanjian']['bapemeriksaanpek']['base64'], 'berkas'),
                "bapemeriksaanadmnhslpek" => $this->mylib->decodebase64($data['suratperjanjian']['bapemeriksaanadmnhslpek']['base64'], 'berkas'),
                "srtpenawaranhrg" => $this->mylib->decodebase64($data['suratperjanjian']['srtpenawaranhrg']['base64'], 'berkas'),
                "srtpersetujuanhrg" => $this->mylib->decodebase64($data['suratperjanjian']['srtpersetujuanhrg']['base64'], 'berkas'),
                "srtpenunjukanlangsung" => $this->mylib->decodebase64($data['suratperjanjian']['srtpenunjukanlangsung']['base64'], 'berkas'),
                "srtpenunjukanpenyediabrg" => $this->mylib->decodebase64($data['suratperjanjian']['srtpenunjukanpenyediabrg']['base64'], 'berkas'),
                "srtperjanjianpengadaan" => $this->mylib->decodebase64($data['suratperjanjian']['srtperjanjianpengadaan']['base64'], 'berkas'),
                "status" => 'P',
            ];

            $resultsurat = $this->db->insert("suratperjanjian", $surat);
            if (!$resultsurat) {
                throw new Exception($this->db->_error_message(), $this->db->_error_number());
            }
            $surat['id'] = $this->db->insert_id();
            $this->db->trans_commit();
            return $surat;
        } catch (Exception $e) {
            $this->db->trans_rollback();
            log_message('error', sprintf('%s : %s : DB transaction failed. Error no: %s, Error msg:%s, Last query: %s', __CLASS__, __FUNCTION__, $e->getCode(), $e->getMessage(), print_r($this->main_db->last_query(), true)));
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
