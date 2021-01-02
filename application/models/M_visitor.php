<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_visitor extends CI_Model
{
    public function get_user($table, $field, $key)
    {
        return $this->db->get_where($table, [$field => $key])->row_array();
    }

    public function insert($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function delete($table, $field, $key)
    {
        $this->db->delete($table, [$field => $key]);
    }

    public function update($table, $update, $field, $key)
    {
        $this->db->where($field, $key);
        $this->db->update($table, $update);
    }

    public function is_checkin($phone)
    {
        $this->db->where(['phone' => $phone, 'check_out' => NULL]);
        $this->db->order_by('id', 'desc');
        return  $this->db->get('record')->row_array();
    }
}
