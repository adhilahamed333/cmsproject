<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staff extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('staff/profile_model');
        $this->load->model('staff/request_model');
        $this->load->model('staff/myclass_model');
    }

    public function profile()
    {
        if (isset($_SESSION['username'])) {
            if ($_SESSION['role'] == 'advisor') {

                $content['sdetails'] = $this->profile_model->fetch_adetails($_SESSION['staff_id']);

                $this->load->view('templates/header.php');
                $this->load->view('templates/sidebar.php');
                $this->load->view('staff/profile', $content);
                $this->load->view('templates/footer.php');
            }
            elseif($_SESSION['role'] == 'hod') {

                $content['sdetails'] = $this->profile_model->fetch_hdetails($_SESSION['staff_id']);

                $this->load->view('templates/header.php');
                $this->load->view('templates/sidebar.php');
                $this->load->view('staff/profile', $content);
                $this->load->view('templates/footer.php');
            }
        } else {
            redirect('home/login');
        }
    }

    public function approve($arequest_id)
    {
        if (isset($_SESSION['username'])) {
            if ($_SESSION['role'] == 'advisor'||$_SESSION['role'] == 'hod') {
                $content['arequest_id'] = $arequest_id;
                $admission_no = $this->request_model->fetch_admno($arequest_id);
                $content['admission_no'] = $admission_no;
                $this->load->view('templates/header.php');
                $this->load->view('templates/sidebar.php');
                $this->load->view('staff/remark', $content);
                $this->load->view('templates/footer.php');
            }
        } else {
            redirect('home/login');
        }
    }

    public function verifydoc($doc_id)
    {
        $remarks = 'By ' . $_SESSION['username'];
        $this->request_model->verifydoc($doc_id, $remarks);
        redirect('mydash');
    }



    public function remark()
    {
        $remarks = $this->input->post('remark');
        $arequest_id = $this->input->post('arequest_id');
        $this->request_model->approve($arequest_id, $remarks, $_SESSION['username']);
        redirect('mydash');
    }


    public function myclass()
    {
        if (isset($_SESSION['username'])) {
            if ($_SESSION['role'] == 'advisor') {

                $content['myclass'] = $this->myclass_model->fetch_class($_SESSION['branch_in_charge'], $_SESSION['sem_in_charge']);

                $this->load->view('templates/header.php');
                $this->load->view('templates/sidebar.php');
                $this->load->view('staff/myclass', $content);
                $this->load->view('templates/footer.php');
            }
        } else {
            redirect('home/login');
        }
    }

    public function mystudent($admission_no)
    {
        if (isset($_SESSION['username'])) {
            if ($_SESSION['role'] == 'advisor'||$_SESSION['role'] == 'hod') {

                $content['myclass'] = $this->myclass_model->fetch_spersonal($admission_no);
                $this->load->view('templates/header.php');
                $this->load->view('templates/sidebar.php');
                $this->load->view('staff/mystudent', $content);
                $this->load->view('templates/footer.php');
            }
        } else {
            redirect('home/login');
        }
    }

    public function sbasics($admission_no)
    {
        if (isset($_SESSION['username'])) {
            $content['basics'] = $this->myclass_model->fetch_sbasics($admission_no);

            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('staff/mystudent/sbasics', $content);
            $this->load->view('templates/footer.php');
        } else {
            redirect('home/login');
        }
    }

    public function spersonal($admission_no)
    {
        if (isset($_SESSION['username'])) {
            $content['personal'] = $this->myclass_model->fetch_spersonal($admission_no);

            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('staff/mystudent/spersonal', $content);
            $this->load->view('templates/footer.php');
        } else {
            redirect('home/login');
        }
    }

    public function sfamily($admission_no)
    {
        if (isset($_SESSION['username'])) {
            $content['family'] = $this->myclass_model->fetch_sfamily($admission_no);

            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('staff/mystudent/sfamily', $content);
            $this->load->view('templates/footer.php');
        } else {
            redirect('home/login');
        }
    }

    public function sadmission($admission_no)
    {
        if (isset($_SESSION['username'])) {
            $content['admission'] = $this->myclass_model->fetch_sadmission($admission_no);

            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('staff/mystudent/sadmission', $content);
            $this->load->view('templates/footer.php');
        } else {
            redirect('home/login');
        }
    }

    public function shostel($admission_no)
    {
        if (isset($_SESSION['username'])) {
            $content['hostel'] = $this->myclass_model->fetch_shostel($admission_no);

            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('staff/mystudent/shostel', $content);
            $this->load->view('templates/footer.php');
        } else {
            redirect('home/login');
        }
    }

    public function sacadentry($admission_no)
    {
        if (isset($_SESSION['username'])) {
            $content['acadentry'] = $this->myclass_model->fetch_sacadentry($admission_no);

            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('staff/mystudent/sacadentry', $content);
            $this->load->view('templates/footer.php');
        } else {
            redirect('home/login');
        }
    }

    public function sacadexit($admission_no)
    {
        if (isset($_SESSION['username'])) {
            $content['acadexit'] = $this->myclass_model->fetch_sacadexit($admission_no);

            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('staff/mystudent/sacadexit', $content);
            $this->load->view('templates/footer.php');
        } else {
            redirect('home/login');
        }
    }

    public function getDocs($admission_no)
    {
        if (isset($_SESSION['username'])) {
            $content['mydocs'] = $this->myclass_model->fetch_docs($admission_no);

            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('staff/mystudent/sdocs', $content);
            $this->load->view('templates/footer.php');
        } else {
            redirect('home/login');
        }
    }
}
