<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Role_model extends CI_Model
{

    public function select($id = null)
    {
        if ($id == null) {
            return $this->db->get('roles')->result();
        } else {
            return $this->db->get_where('roles', ['id' => $id])->row_array();
        }
    }

    public function insert($data)
    {
        $result = $this->db->insert('roles', $data);
        $data['id'] = $this->db->insert_id();
        if ($result) {
            return $data;
        } else {
            return false;
        }

    }
    public function update($data)
    {
        $item = [
            'role' => $data['role'],
        ];
        $this->db->where('id', $data['id']);
        $this->db->update('roles', $item);
        return $item;
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('roles');
    }

}

/* End of file roles_model.php */
