<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('student/profile_model');
    }
    public function sbasics()
    {
        if (isset($_SESSION['username'])) {
            $content['basics'] = $this->profile_model->fetch_sbasics($_SESSION['admission_no']);

            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('student/profile/sbasics', $content);
            $this->load->view('templates/footer.php');
        } else {
            redirect('home/login');
        }
    }
    public function spersonal()
    {
        if (isset($_SESSION['username'])) {

            $content['personal'] = $this->profile_model->fetch_spersonal($_SESSION['admission_no']);

            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('student/profile/spersonal', $content);
            $this->load->view('templates/footer.php');
        } else {
            redirect('home/login');
        }
    }

    public function sfamily()
    {
        if (isset($_SESSION['username'])) {

            $content['family'] = $this->profile_model->fetch_sfamily($_SESSION['admission_no']);

            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('student/profile/sfamily', $content);
            $this->load->view('templates/footer.php');
        } else {
            redirect('home/login');
        }
    }

    public function sadmission()
    {
        if (isset($_SESSION['username'])) {

            $content['admission'] = $this->profile_model->fetch_sadmission($_SESSION['admission_no']);

            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('student/profile/sadmission', $content);
            $this->load->view('templates/footer.php');
        } else {
            redirect('home/login');
        }
    }

    public function shostel()
    {
        if (isset($_SESSION['username'])) {

            $content['hostel'] = $this->profile_model->fetch_shostel($_SESSION['admission_no']);

            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('student/profile/shostel', $content);
            $this->load->view('templates/footer.php');
        } else {
            redirect('home/login');
        }
    }

    public function sacadentry()
    {
        if (isset($_SESSION['username'])) {
            $content['acadentry'] = $this->profile_model->fetch_sacadentry($_SESSION['admission_no']);

            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('student/profile/sacadentry', $content);
            $this->load->view('templates/footer.php');
        } else {
            redirect('home/login');
        }
    }

    public function sacadexit()
    {
        if (isset($_SESSION['username'])) {
            $content['acadexit'] = $this->profile_model->fetch_sacadexit($_SESSION['admission_no']);

            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('student/profile/sacadexit', $content);
            $this->load->view('templates/footer.php');
        } else {
            redirect('home/login');
        }
    }
}
