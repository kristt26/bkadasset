<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Opd_model');

    }

    public function ambilLaporan()
    {
        $opd = $this->Opd_model->select(null);
        foreach ($opd as $keyopd => $itemopd) {
            $itemopd->detail = $this->db->query("SELECT
                `detailrabl`.*,
                `opd`.`opd`,
                `jeniskendaraan`.`merk`,
                `jeniskendaraan`.`type`
            FROM
                `opd`
                RIGHT JOIN `rabl` ON `opd`.`id` = `rabl`.`opdid`
                RIGHT JOIN `detailrabl` ON `rabl`.`id` = `detailrabl`.`rablid`
                LEFT JOIN `suratperjanjian` ON `rabl`.`id` = `suratperjanjian`.`rablid`
                LEFT JOIN `jeniskendaraan` ON `jeniskendaraan`.`id` =
            `detailrabl`.`jeniskendaraanid`
            WHERE opd.id='$itemopd->id' AND suratperjanjian.id IS NOT NULL AND suratperjanjian.status='Y'")->result();
        }
        return $opd;
        // $awal = $data['awal'];
        // $akhir = $data['akhir'];
        // $result = $this->db->query("SELECT
        //     `permintaan`.`noregister`,
        //     `permintaan`.`tanggal`,
        //     `permintaan`.`namapemohon`,
        //     `permintaan`.`status`,
        //     `permintaan`.`pelangganid`,
        //     `permintaan`.`tanggalproses`,
        //     `permintaan`.`karyawanid`,
        //     `permintaan`.`jenispengajuan`,
        //     `permintaan`.`message`,
        //     `pelanggan`.`kodepelanggan`,
        //     `karyawan`.`nama`
        // FROM
        //     `permintaan`
        //     LEFT JOIN `pelanggan` ON `permintaan`.`pelangganid` = `pelanggan`.`id`
        //     LEFT JOIN `karyawan` ON `permintaan`.`karyawanid` = `karyawan`.`id` WHERE permintaan.tanggal > '$awal' AND permintaan.tanggal < '$akhir'")->result();
        // return $result;
    }

}

/* End of file Laporan_model.php */
