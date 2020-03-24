<?php

class mydash_model extends CI_Model
{
    function getMyRequests()
    {

        $this->db->select("*");
        if ($_SESSION['role'] == 'advisor') {
            $this->db->where('student_basics.branch="' . $_SESSION['branch_in_charge'] . '"');
            $this->db->where('student_basics.semester=' . $_SESSION['sem_in_charge']);
        }
        $this->db->from('requests');
        $this->db->join('flows', 'requests.request_id=flows.request_id');
        $this->db->join('student_basics', 'requests.owner=student_basics.admission_no');
        $this->db->join('student_personals', 'requests.owner=student_personals.admission_no');
        $query = $this->db->get();
        return $query->result();
    }

    function getMyDocs()
    {

        $this->db->select("*");
        if (!$_SESSION['role'] == 'student') {
            $this->db->where('student_basics.branch="' . $_SESSION['branch_in_charge'] . '"');
            $this->db->where('student_basics.semester=' . $_SESSION['sem_in_charge']);
        }
        $this->db->from('doc_path');
        $this->db->join('student_basics', 'doc_path.owner=student_basics.admission_no');
        $this->db->join('student_personals', 'doc_path.owner=student_personals.admission_no');
        $query = $this->db->get();
        return $query->result();
    }


    function getDocs()
    {
        $this->db->select('*');
        $this->db->where('owner=' . $_SESSION['admission_no']);
        $this->db->where('verified=1');
        $this->db->from('doc_path');
        $query = $this->db->get();
        return $query->result();
    }

    function getpath($id)
    {
        $this->db->select('*');
        $this->db->where('id=' . $id);
        $this->db->from('doc_path');
        $query = $this->db->get();
        return $query->row();
    }
}
