<?php

class UserActivities_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'user_activities';
    }

    /**
     * get_by function
     *
     * @param [string] $targetField
     * @param [string] $value
     * @return array
     */
    public function get_by($targetField, $value)
    {
        $this->db->select('id, message_from as `messageFrom`, message_text as `value`, timestamp');
        $this->db->from($this->table_name);
        $this->db->where($targetField, $value);
        return $this->db->get()->result_array();
    }
}
