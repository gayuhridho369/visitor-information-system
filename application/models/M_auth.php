<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{
    public function insert($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function get_user($table, $field, $key)
    {
        return $this->db->get_where($table, [$field => $key])->row_array();
    }

    public function update($table, $update, $field, $key)
    {
        $this->db->where($field, $key);
        $this->db->update($table, $update);
    }

    public function delete($table, $field, $key)
    {
        $this->db->delete($table, [$field => $key]);
    }
}
