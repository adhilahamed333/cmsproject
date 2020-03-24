<?php

class request_model extends CI_Model
{
    public function create_request($data, $admission_no)
    {
        $this->type = $data['request'];
        $this->owner = $admission_no;
        $this->reason = $data['reason'];
        $this->remarks = $data['remarks'];
        $this->db->insert('requests', $this);

        $request_id = $this->db->insert_id();

        return $request_id;
    }

    public function request_flow($request_id)
    {
        $data = array(
            'request_id' => $request_id,
            'submit' => 1
        );
        $this->db->insert('flows', $data);
    }

    public function doc_upload($admission_no,$dtype,$dpath)
    {
        $data = array(
            'dtype' => $dtype,
            'owner' => $admission_no,
            'path'  => $dpath
        );
        $this->db->insert('doc_path', $data);
        $doc_id = $this->db->insert_id();

        return $doc_id;
    }

    
    
}
