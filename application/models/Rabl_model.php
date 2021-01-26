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
                $value->pelaksana = $this->db->get_where('pelaksana', ['id' => $value->pelaksanaid])->row_array();
                $value->suratperjanjian = $this->db->get_where('suratperjanjian', ['rablid' => $value->id])->row_array();
            }
            return $result;
        } else {
            $result = $this->db->query("SELECT
                    `opd`.`opd`,
                    `rabl`.`id`,
                    `rabl`.`tanggal`,
                    `rabl`.`pelaksanaid`
                FROM
                    `rabl`
                    LEFT JOIN `opd` ON `rabl`.`opdid` = `opd`.`id` WHERE rabl.id = '$id'")->row_object();
            $result->detail = $this->db->get_where('detailrabl', ['rablid' => $result->id])->result();
            $result->pelaksana = $this->db->get_where('pelaksana', ['id' => $result->pelaksanaid])->row_array();
            $result->suratperjanjian = $this->db->get_where('suratperjanjian', ['rablid' => $result->id])->row_array();
            return $result;
        }
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
                    'pejabat' => $value['pejabat'],
                    'jabatan' => $value['jabatan'],
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
                "suratpesankendaraan" => isset($data['suratperjanjian']['suratpesankendaraan']['base64']) ? $this->mylib->decodebase64($data['suratperjanjian']['suratpesankendaraan']['base64'], 'berkas') : "",
                "baserahterima" => isset($data['suratperjanjian']['baserahterima']['base64']) ? $this->mylib->decodebase64($data['suratperjanjian']['baserahterima']['base64'], 'berkas') : "",
                "bapembayaran" => isset($data['suratperjanjian']['bapembayaran']['base64']) ? $this->mylib->decodebase64($data['suratperjanjian']['bapembayaran']['base64'], 'berkas') : "",
                "bapemeriksaanpek" => isset($data['suratperjanjian']['bapemeriksaanpek']['base64']) ? $this->mylib->decodebase64($data['suratperjanjian']['bapemeriksaanpek']['base64'], 'berkas') : "",
                "bapemeriksaanadmnhslpek" => isset($data['suratperjanjian']['bapemeriksaanadmnhslpek']['base64']) ? $this->mylib->decodebase64($data['suratperjanjian']['bapemeriksaanadmnhslpek']['base64'], 'berkas') : "",
                "srtpenawaranhrg" => isset($data['suratperjanjian']['srtpenawaranhrg']['base64']) ? $this->mylib->decodebase64($data['suratperjanjian']['srtpenawaranhrg']['base64'], 'berkas') : "",
                "srtpersetujuanhrg" => isset($data['suratperjanjian']['srtpersetujuanhrg']['base64']) ? $this->mylib->decodebase64($data['suratperjanjian']['srtpersetujuanhrg']['base64'], 'berkas') : "",
                "srtpenunjukanlangsung" => isset($data['suratperjanjian']['srtpenunjukanlangsung']['base64']) ? $this->mylib->decodebase64($data['suratperjanjian']['srtpenunjukanlangsung']['base64'], 'berkas') : "",
                "srtpenunjukanpenyediabrg" => isset($data['suratperjanjian']['srtpenunjukanpenyediabrg']['base64']) ? $this->mylib->decodebase64($data['suratperjanjian']['srtpenunjukanpenyediabrg']['base64'], 'berkas') : "",
                "srtperjanjianpengadaan" => isset($data['suratperjanjian']['srtperjanjianpengadaan']['base64']) ? $this->mylib->decodebase64($data['suratperjanjian']['srtperjanjianpengadaan']['base64'], 'berkas') : "",
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
    public function updatesurat($data)
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
                "suratpesankendaraan" => isset($data['suratperjanjian']['suratpesankendaraan']['base64']) ? $this->mylib->decodebase64($data['suratperjanjian']['suratpesankendaraan']['base64'], 'berkas') : $data['suratperjanjian']['suratpesankendaraan'],
                "baserahterima" => isset($data['suratperjanjian']['baserahterima']['base64']) ? $this->mylib->decodebase64($data['suratperjanjian']['baserahterima']['base64'], 'berkas') : $data['suratperjanjian']['baserahterima'],
                "bapembayaran" => isset($data['suratperjanjian']['bapembayaran']['base64']) ? $this->mylib->decodebase64($data['suratperjanjian']['bapembayaran']['base64'], 'berkas') : $data['suratperjanjian']['bapembayaran'],
                "bapemeriksaanpek" => isset($data['suratperjanjian']['bapemeriksaanpek']['base64']) ? $this->mylib->decodebase64($data['suratperjanjian']['bapemeriksaanpek']['base64'], 'berkas') : $data['suratperjanjian']['bapemeriksaanpek'],
                "bapemeriksaanadmnhslpek" => isset($data['suratperjanjian']['bapemeriksaanadmnhslpek']['base64']) ? $this->mylib->decodebase64($data['suratperjanjian']['bapemeriksaanadmnhslpek']['base64'], 'berkas') : $data['suratperjanjian']['bapemeriksaanadmnhslpek'],
                "srtpenawaranhrg" => isset($data['suratperjanjian']['srtpenawaranhrg']['base64']) ? $this->mylib->decodebase64($data['suratperjanjian']['srtpenawaranhrg']['base64'], 'berkas') : $data['suratperjanjian']['srtpenawaranhrg'],
                "srtpersetujuanhrg" => isset($data['suratperjanjian']['srtpersetujuanhrg']['base64']) ? $this->mylib->decodebase64($data['suratperjanjian']['srtpersetujuanhrg']['base64'], 'berkas') : $data['suratperjanjian']['srtpersetujuanhrg'],
                "srtpenunjukanlangsung" => isset($data['suratperjanjian']['srtpenunjukanlangsung']['base64']) ? $this->mylib->decodebase64($data['suratperjanjian']['srtpenunjukanlangsung']['base64'], 'berkas') : $data['suratperjanjian']['srtpenunjukanlangsung'],
                "srtpenunjukanpenyediabrg" => isset($data['suratperjanjian']['srtpenunjukanpenyediabrg']['base64']) ? $this->mylib->decodebase64($data['suratperjanjian']['srtpenunjukanpenyediabrg']['base64'], 'berkas') : $data['suratperjanjian']['srtpenunjukanpenyediabrg'],
                "srtperjanjianpengadaan" => isset($data['suratperjanjian']['srtperjanjianpengadaan']['base64']) ? $this->mylib->decodebase64($data['suratperjanjian']['srtperjanjianpengadaan']['base64'], 'berkas') : $data['suratperjanjian']['srtperjanjianpengadaan'],
                "status" => 'P',
            ];

            $resultsurat = $this->db->update("suratperjanjian", $surat, ['id' => $data['suratperjanjian']['id']]);
            if (!$resultsurat) {
                throw new Exception($this->db->_error_message(), $this->db->_error_number());
            }
            $this->db->trans_commit();
            return $surat;
        } catch (Exception $e) {
            $this->db->trans_rollback();
            log_message('error', sprintf('%s : %s : DB transaction failed. Error no: %s, Error msg:%s, Last query: %s', __CLASS__, __FUNCTION__, $e->getCode(), $e->getMessage(), print_r($this->main_db->last_query(), true)));
        }
    }

    public function getsurat($id)
    {
        return $this->db->query("SELECT
            `suratperjanjian`.*
        FROM
            `suratperjanjian`
            LEFT JOIN `rabl` ON `rabl`.`id` = `suratperjanjian`.`rablid`
        WHERE rabl.id = '$id'")->row_object();
    }

    public function update($data)
    {
        try {
            $this->db->trans_begin();
            $rabl = [
                'pelaksanaid' => $data['pelaksanaid'],
                'opdid' => $this->session->userdata('opdid'),
                'tanggal' => $data['tanggal'],
            ];
            $resultrabl = $this->db->update('rabl', $rabl, ['id' => $data['id']]);
            if (!$resultrabl) {
                throw new Exception($this->db->_error_message(), $this->db->_error_number());
            }

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
                    'pejabat' => $value['pejabat'],
                    'jabatan' => $value['jabatan'],
                ];
                if (isset($value['id'])) {
                    $resultdetail = $this->db->update('detailrabl', $detail, ['id' => $value['id']]);
                    if (!$resultdetail) {
                        throw new Exception($this->db->_error_message(), $this->db->_error_number());
                    }
                } else {
                    $resultdetail = $this->db->insert('detailrabl', $detail);
                    if (!$resultdetail) {
                        throw new Exception($this->db->_error_message(), $this->db->_error_number());
                    }
                    $value['id'] = $this->db->insert_id();
                }
            }
            $this->db->trans_commit();
            return $data;
        } catch (Exception $e) {
            $this->db->trans_rollback();
            log_message('error', sprintf('%s : %s : DB transaction failed. Error no: %s, Error msg:%s, Last query: %s', __CLASS__, __FUNCTION__, $e->getCode(), $e->getMessage(), print_r($this->main_db->last_query(), true)));
        }
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('rabl');
    }
    public function persetujuan($data)
    {
        $item = ['status' => $data['status'], 'catatan' => $data['catatan'] !== "" ? $data['catatan'] : null];
        $result = $this->db->update('suratperjanjian', $item, ['id' => $data['id']]);
        return $result;
    }

}

/* End of file rabl_model.php */
