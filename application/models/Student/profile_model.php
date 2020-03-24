<?php

class profile_model extends CI_Model
{
    function fetch_sbasics($admission_no)
    {
        $this->db->where('admission_no', $admission_no);
        $this->db->from('student_basics');
        $query = $this->db->get();
        $row = $query->row();

        $data = array(
            'admission_no' => $row->admission_no,
            'course' => $row->course,
            'branch' => $row->branch,
            'semester' => $row->semester,
            'username' => $row->username,
            'date_of_joining' => $row->date_of_joining,
            'date_of_leaving' => $row->date_of_leaving,
            'univercity_reg_no' => $row->univercity_reg_no
        );
        return $data;
    }

    function fetch_spersonal($admission_no)
    {
        $this->db->where('admission_no', $admission_no);
        $this->db->from('student_personals');
        $query = $this->db->get();
        $row = $query->row();
        $data = array(
            'admission_no' => $row->admission_no,
            'name' => $row->name,
            'gender' => $row->gender,
            'dob' => $row->dob,
            'phone' => $row->phone,
            'mobile' => $row->mobile,
            'address' => $row->address,
            'email' => $row->email,
            'category' => $row->category
        );
        return $data;
    }

    function fetch_sfamily($admission_no)
    {
        $this->db->where('admission_no', $admission_no);
        $this->db->from('student_familys');
        $query = $this->db->get();
        $row = $query->row();
        $data = array(
            'admission_no' => $row->admission_no,
            'name_of_fm' => $row->name_of_fm,
            'occupation_of_fm' => $row->occupation_of_fm,
            'address_of_fm' => $row->address_of_fm,
            'phone_of_fm' => $row->phone_of_fm,
            'email_of_fm' => $row->email_of_fm,
            'name_of_lg' => $row->name_of_lg,
            'relation_with_lg' => $row->relation_with_lg,
            'occupation_of_lg' => $row->occupation_of_lg,
            'address_of_lg' => $row->address_of_lg,
            'phone_of_lg' => $row->phone_of_lg,
            'email_of_lg' => $row->email_of_lg
        );
        return $data;
    }

    function fetch_sadmission($admission_no)
    {
        $this->db->where('admission_no', $admission_no);
        $this->db->from('student_admissions');
        $query = $this->db->get();
        $row = $query->row();
        $data = array(
            'admission_no' => $row->admission_no,
            'date_of_admission' => $row->date_of_admission,
            'adcard_memo_no' => $row->adcard_memo_no,
            'rank' => $row->rank,
            'category_admission' => $row->category_admission
        );
        return $data;
    }

    function fetch_shostel($admission_no)
    {
        $this->db->where('admission_no', $admission_no);
        $this->db->from('student_hostels');
        $query = $this->db->get();
        $row = $query->row();
        $data = array(
            'admission_no' => $row->admission_no,
            'hostel_name' => $row->hostel_name,
            'date_of_admission' => $row->date_of_admission
        );
        return $data;
    }


    function fetch_sacadentry($admission_no)
    {
        $this->db->where('admission_no', $admission_no);
        $this->db->from('student_academic_entrys');
        $query = $this->db->get();
        $row = $query->row();
        $data = array(
            'admission_no' => $row->admission_no,
            'qualifying_exam' => $row->qualifying_exam,
            'period_of_study' => $row->period_of_study,
            'name_of_institution' => $row->name_of_institution,
            'university_or_board' => $row->university_or_board,
            'total_marks_secured' => $row->total_marks_secured,
            'max_mark' => $row->max_mark,
            'tc_or_cc_no' => $row->tc_or_cc_no,
            'date_of_tc_or_cc' => $row->date_of_tc_or_cc,
        );
        return $data;
    }

    function fetch_sacadexit($admission_no)
    {
        $this->db->where('admission_no', $admission_no);
        $this->db->from('student_academic_exits');
        $query = $this->db->get();
        $row = $query->row();
        $data = array(
            'admission_no' => $row->admission_no,
            'cgpa' => $row->cgpa,
            'year_of_graduation' => $row->year_of_graduation,
            'conduct_and_chara' => $row->conduct_and_chara,
            'rank_in_class' => $row->rank_in_class,
            'remarks' => $row->remarks
        );
        return $data;
    }
}
