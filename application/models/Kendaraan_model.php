<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kendaraan_model extends CI_Model
{
    public function select($id = null)
    {
        if (is_null($id)) {
            return $this->db->get("jeniskendaraan")->result();
        } else {
            return $this->db->get_where("jeniskendaraan", ['id' => $id])->row_object();
        }
    }

    public function insert($data)
    {
        $this->db->trans_begin();
        $this->db->insert('jeniskendaraan', $data);
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
        $kendaraan = [
            'type' => $data['type'],
            'merk' => $data['merk'],
        ];
        $this->db->update('jeniskendaraan', $kendaraan, ['id' => $data['id']]);
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
        return $this->db->delete('jeniskendaraan');
    }

}

/* End of file pengguna_model.php */
