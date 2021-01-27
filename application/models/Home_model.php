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
}

/* End of file Home_model.php */
