<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Opd_model extends CI_Model
{
    public function select($id = null)
    {
        if (is_null($id)) {
            return $this->db->query("SELECT
                `opd`.`id`,
                `opd`.`penggunaid`,
                `opd`.`opd`,
                `pengguna`.`nama`,
                `pengguna`.`nip`,
                `users`.`username`
            FROM
                `opd`
                LEFT JOIN `pengguna` ON `pengguna`.`id` = `opd`.`penggunaid`
                LEFT JOIN `users` ON `users`.`id` = `pengguna`.`usersid`")->result();
        } else {
            return $this->db->query("SELECT
                `opd`.`id`,
                `opd`.`penggunaid`,
                `opd`.`opd`,
                `pengguna`.`nama`,
                `pengguna`.`nip`,
                `users`.`username`
            FROM
                `opd`
                LEFT JOIN `pengguna` ON `pengguna`.`id` = `opd`.`penggunaid`
                LEFT JOIN `users` ON `users`.`id` = `pengguna`.`usersid` WHERE opd.id = '$id'")->row_object();
        }
    }

    public function insert($data)
    {
        $this->db->trans_begin();
        $opd = [
            'opd' => $data['opd'],
            'penggunaid' => $data['penggunaid'],
        ];
        $this->db->insert("opd", $opd);
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
        ];
        $this->db->update('users', $user, ['id' => $data['usersid']]);
        $opd = [
            'opd' => $data['opd'],
            'penggunaid' => $data['penggunaid'],
        ];
        $this->db->update('opd', $opd, ['id' => $data['id']]);
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
        return $this->db->delete('opd');
    }

}

/* End of file opd_model.php */
