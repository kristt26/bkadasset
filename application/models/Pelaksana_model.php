<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pelaksana_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('mylib');
    }

    public function select($id = null)
    {
        if ($id == null) {
            return $this->db->get('pelaksana')->result();
        } else {
            return $this->db->get_where('pelaksana', ['id' => $id])->row_array();
        }
    }

    public function insert($data)
    {
        $data['nama'] = strtoupper($data['nama']);
        $data['logo'] = $this->mylib->decodebase64($data['logo']['base64'], "img/pelaksana");
        $result = $this->db->insert('pelaksana', $data);
        $data['id'] = $this->db->insert_id();
        if ($result) {
            return $data;
        } else {
            return false;
        }

    }
    public function update($data)
    {
        $this->db->trans_begin();
        $item = [
            'nama' => $data['nama'],
            'alamat' => $data['alamat'],
            'kontak' => $data['kontak'],
            'logo' => $data['logo'],
        ];
        $this->db->update('pelaksana', $item, ['id' => $data['id']]);
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
        return $this->db->delete('pelaksana');
    }
}

/* End of file Pelaksana_model.php */
