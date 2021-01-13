<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function select($id = null)
    {
        if (is_null($id)) {
            return $this->db->query("SELECT
                `pengguna`.`id`,
                `pengguna`.`usersid`,
                `pengguna`.`nama`,
                `pengguna`.`email`,
                `pengguna`.`kontak`,
                `pengguna`.`alamat`,
                `pengguna`.`jabatan`,
                `pengguna`.`nip`,
                `users`.`username`
            FROM
                `pengguna`
                LEFT JOIN `users` ON `users`.`id` = `pengguna`.`usersid`")->result();
        } else {
            return $this->db->query("SELECT
                `pengguna`.`id`,
                `pengguna`.`usersid`,
                `pengguna`.`nama`,
                `pengguna`.`email`,
                `pengguna`.`kontak`,
                `pengguna`.`alamat`,
                `pengguna`.`jabatan`,
                `pengguna`.`nip`,
                `users`.`username`
            FROM
                `pengguna`
                LEFT JOIN `users` ON `users`.`id` = `pengguna`.`usersid` WHERE pengguna.id = '$id'")->row_object();
        }
    }

    public function insert($data)
    {
        $this->db->trans_begin();
        $user = [
            'username' => $data['username'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
        ];
        $this->User_model->insert($user);
        $userid = $this->db->insert_id();
        $role = [
            'rolesid' => $data['rolesid'],
            'usersid' => $userid,
        ];
        $this->db->insert('userinrole', $role);
        $pengguna = [
            'usersid' => $userid,
            'nama' => $data['nama'],
            'email' => $data['email'],
            'kontak' => $data['kontak'],
            'alamat' => $data['alamat'],
            'jabatan' => $data['jabatan'],
            'nip' => $data['nip'],
        ];
        $this->db->insert('pengguna', $pengguna);
        $pengguna['id'] = $this->db->insert_id();
        $pengguna['username'] = $data['username'];
        if ($this->db->trans_status()) {
            $this->db->trans_commit();
            return $pengguna;
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
        $pengguna = [
            'nama' => $data['nama'],
            'email' => $data['email'],
            'kontak' => $data['kontak'],
            'alamat' => $data['alamat'],
            'jabatan' => $data['jabatan'],
            'nip' => $data['nip'],
        ];
        $this->db->update('pengguna', $pengguna, ['id' => $data['id']]);
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
        return $this->db->delete('pengguna');
    }

}

/* End of file pengguna_model.php */
