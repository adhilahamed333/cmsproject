<?php

class request_model extends CI_Model
{
    public function approve($request_id, $remarks, $username)
    {
        $remarks = $remarks . ' By ' . $username;
        if ($_SESSION['role'] == 'advisor') {
            $this->db->set('advisor', 1, FALSE);
            $this->db->set('a_remarks', $remarks);
        } elseif ($_SESSION['role'] == 'hod') {
            $this->db->set('hod', 1, FALSE);
            $this->db->set('h_remarks', $remarks);
        }
        $this->db->where('request_id', $request_id);
        $this->db->update('flows');
    }

    public function verifydoc($doc_id, $remarks)
    {
        $this->db->set('verified', 1, FALSE);
        $this->db->set('remarks', $remarks);
        $this->db->where('doc_id', $doc_id);
        $this->db->update('doc_path');
    }

    function fetch_admno($arequest_id)
    {
        //$this->db->select('owner');
        $this->db->where('request_id', $arequest_id);
        $this->db->from('requests');
        $query = $this->db->get();
        $row = $query->row();
        return $row->owner;
    }
}
