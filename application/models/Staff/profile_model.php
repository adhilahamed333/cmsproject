<?php

class profile_model extends CI_Model
{
    function fetch_adetails($staff_id)
    {
        $this->db->where('staff_id', $staff_id);
        $this->db->from('advisor_details');
        $query = $this->db->get();
        $row = $query->row();
        $data = array(
            'username' => $row->username,
            'staff_id' => $staff_id,
            'branch_in_charge' => $row->branch_in_charge,
            'sem_in_charge' => $row->sem_in_charge
        );
        return $data;
    }

    function fetch_hdetails($staff_id)
    {
        $this->db->where('staff_id', $staff_id);
        $this->db->from('hod_details');
        $query = $this->db->get();
        $row = $query->row();
        $data = array(
            'username' => $row->username,
            'staff_id' => $staff_id,
            'branch_in_charge' => $row->branch_in_charge,

        );
        return $data;
    }
}
