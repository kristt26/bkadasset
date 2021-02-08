<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Opd_model');

    }

    public function select()
    {
        if ($this->session->userdata('role') != 'OPD') {
            $data = $this->db->query("SELECT
            (SELECT
                COUNT(rabl.id)
                FROM
                `rabl`
            RIGHT JOIN `suratperjanjian` ON `rabl`.`id` = `suratperjanjian`.`rablid` WHERE suratperjanjian.id IS NOT NULL AND suratperjanjian.status = 'P') as pengajuan,
            (SELECT
                COUNT(rabl.id)
                FROM
                `rabl`
            RIGHT JOIN `suratperjanjian` ON `rabl`.`id` = `suratperjanjian`.`rablid` WHERE suratperjanjian.id IS NOT NULL AND suratperjanjian.status = 'Y') as disetujui,
            (SELECT
                COUNT(rabl.id)
                FROM
                `rabl`
            RIGHT JOIN `suratperjanjian` ON `rabl`.`id` = `suratperjanjian`.`rablid` WHERE suratperjanjian.id IS NOT NULL AND suratperjanjian.status = 'N') as ditolak,
            (SELECT
                COUNT(rabl.id)
                FROM
                `rabl`
            RIGHT JOIN `suratperjanjian` ON `rabl`.`id` = `suratperjanjian`.`rablid`) as rabl,
            (SELECT
                    COUNT(opd.id)
                FROM
                opd) as opd")->row_object();
            return $data;
        } else {
            $opd = $this->db->get_where("opd", ['penggunaid' => $this->session->userdata('id')])->row_object();
            $data = $this->db->query("SELECT
                (SELECT
                COUNT(rabl.id)
                FROM
                `rabl`
            LEFT JOIN `suratperjanjian` ON `rabl`.`id` = `suratperjanjian`.`rablid` WHERE rabl.opdid='$opd->id') as pengajuan,
                (SELECT
                COUNT(rabl.id)
                FROM
                `rabl`
            RIGHT JOIN `suratperjanjian` ON `rabl`.`id` = `suratperjanjian`.`rablid` WHERE rabl.opdid='$opd->id' AND suratperjanjian.id IS NOT NULL AND suratperjanjian.status = 'Y') as disetujui,
                (SELECT
                COUNT(rabl.id)
                FROM
                `rabl`
            RIGHT JOIN `suratperjanjian` ON `rabl`.`id` = `suratperjanjian`.`rablid` WHERE rabl.opdid='$opd->id' AND suratperjanjian.id IS NOT NULL AND suratperjanjian.status = 'N') as ditolak,
                (SELECT
                    COUNT(opd.id)
                FROM
                opd) as opd")->row_object();
            return $data;
        }
    }

    public function datagrafik()
    {
        $tahuns = $this->db->query("SELECT tahunperolehan as tahun FROM detailrabl group by tahunperolehan ASC")->result();
        $datatahun = [];
        $tahun = [];
        foreach ($tahuns as $key => $value) {
            $item = $this->db->query("SELECT COUNT(*) as jumlah FROM detailrabl WHERE tahunperolehan ='$value->tahun'")->row_object();
            array_push($datatahun, (int) $item->jumlah);
            array_push($tahun, $value->tahun);
        }
        $keterangan = $this->db->query("SELECT (SELECT COUNT(*) FROM detailrabl WHERE keterangan='Baik') as baik, (SELECT COUNT(*) FROM detailrabl WHERE keterangan='Rusak') as rusak")->row_object();
        $data = [
            'tahun' => $tahun,
            'datatahun' => $datatahun,
            'keterangan' => [
                ['name' => 'Baik', 'y' => ((int) $keterangan->baik / ((int) $keterangan->baik + (int) $keterangan->rusak)) * 100, 'sliced' => true, 'selected' => true],
                ['name' => 'Rusak', 'y' => ((int) $keterangan->rusak / ((int) $keterangan->baik + (int) $keterangan->rusak)) * 100, 'sliced' => true, 'selected' => true],
            ],
        ];
        return $data;
    }
}

/* End of file Home_model.php */
