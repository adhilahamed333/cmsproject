<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mydash extends CI_Controller
{
    function index()
    {
        if (isset($_SESSION['username'])) {
            $this->load->model('mydash_model');
            $query = $this->mydash_model->getMyRequests();
            $data['myrequests'] = null;
            if ($query) {
                $data['myrequests'] = $query;
            }
            $query = $this->mydash_model->getMyDocs();
            $data['mydocs'] = null;
            if ($query) {
                $data['mydocs'] = $query;
            }
            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            if ($_SESSION['role'] == 'student') {
                $this->load->view('student/mydash/mydash.php', $data);
            } else {
                $this->load->view('staff/mydash.php', $data);
            }
            $this->load->view('templates/footer.php');
        } else {
            $data['message_error'] = '';
            redirect('home/login', $data);
        }
    }

    public function mydoc()
    {
        if (isset($_SESSION['username'])) {
            $this->load->model('mydash_model');
            $query = $this->mydash_model->getDocs();
            $data['mydocs'] = null;
            if ($query) {
                $data['mydocs'] = $query;
            }
            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('student/mydash/mydoc', $data);
            $this->load->view('templates/footer.php');
        } else {
            redirect('home/login');
        }
    }

    public function viewdoc($id)
    {
        $this->load->helper('download');
        $this->load->model('mydash_model');
        $query = $this->mydash_model->getpath($id);
        $path = $query->path;
        force_download($path, NULL);
    }
}
