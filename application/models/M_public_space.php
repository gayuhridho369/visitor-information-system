<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_public_space extends CI_Model
{
    public function get_user($table, $field, $key)
    {
        return $this->db->get_where($table, [$field => $key])->row_array();
    }

    public function count_inside($public_space_id)
    {
        $this->db->where(['date_format(check_in,"%Y-%m-%d")' => date('Y-m-d'), 'check_out' => NULL, 'public_space_id' => $public_space_id]);
        return $this->db->get('record')->num_rows();
    }

    public function count_today($public_space_id)
    {
        $this->db->where(['date_format(check_in,"%Y-%m-%d")' => date('Y-m-d'), 'public_space_id' => $public_space_id]);
        return $this->db->get('record')->num_rows();
    }

    public function count_yesterday($public_space_id)
    {
        $this->db->where(['date_format(check_in,"%Y-%m-%d")' => date('Y-m-d', strtotime("-1 days")), 'public_space_id' => $public_space_id]);
        return $this->db->get('record')->num_rows();
    }

    public function count_thisweek($public_space_id)
    {
        $this->db->where('YEARWEEK(check_in) = YEARWEEK(NOW())');
        $this->db->where(['public_space_id' => $public_space_id]);
        return $this->db->get('record')->num_rows();
    }

    public function datamonth($m, $user)
    {
        $this->db->where(['MONTH(check_in)' => $m]);
        $this->db->where('YEAR(check_in) = YEAR(NOW())');
        $this->db->where(['public_space_id' => $user]);
        return $this->db->get('record')->num_rows();
    }

    public function visitor_inside($public_space_id)
    {
        $this->db->where(['check_out' => NULL, 'public_space_id' => $public_space_id]);
        return $this->db->get('record')->result_array();
    }

    public function visitor_history($public_space_id)
    {
        $this->db->where(['public_space_id' => $public_space_id]);
        $this->db->order_by('check_in', 'desc');
        return $this->db->get('record')->result_array();
    }

    public function visitor_history_date($public_space_id, $date1, $date2)
    {
        $this->db->where('check_in >=', $date1);
        $this->db->where('check_in <=', $date2);
        $this->db->where(['public_space_id' => $public_space_id]);
        return $this->db->get('record')->result_array();
    }

    public function check_out($id)
    {
        $this->db->where('id', $id);
        $this->db->update('record', ['check_out' => date("Y-m-d H:i:s")]);
    }

    public function update($table, $update, $field, $key)
    {
        $this->db->where($field, $key);
        $this->db->update($table, $update);
    }
}
