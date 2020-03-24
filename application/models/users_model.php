<?php

class users_model extends CI_Model
{
    function validate($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->from('users');
        $query = $this->db->get();
        $row = $query->row();

        if (isset($row)) {
            if ($row->password == $password) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function fetch_role($username)
    {
        $this->db->where('username', $username);
        $this->db->from('users');
        $query = $this->db->get();
        $row = $query->row();
        return $row->role;
    }

    function fetch_admno($username)
    {
        $this->db->where('username', $username);
        $this->db->from('student_basics');
        $query = $this->db->get();
        $row = $query->row();
        return $row->admission_no;
    }

    function fetch_staff_details($username, $role)
    {
        $this->db->where('username', $username);
        if ($role == 'advisor') {
            $this->db->from('advisor_details');
        } elseif ($role == 'hod') {
            $this->db->from('hod_details');
        }
        $query = $this->db->get();
        $row = $query->row();
        return $row;
    }
}
