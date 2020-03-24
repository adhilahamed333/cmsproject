<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


    public function login()
    {
        $data['message_error'] = '';
        $this->load->view('templates/header.php');
        $this->load->view('templates/sidebar.php');
        $this->load->view('login.php', $data);
        $this->load->view('templates/footer.php');
    }


    public function dash()
    {
        if (isset($_SESSION['username'])) {
            if ($_SESSION['role'] == 'student') {
                $this->load->view('templates/header.php');
                $this->load->view('templates/sidebar.php');
                $this->load->view('student/dash');
                $this->load->view('templates/footer.php');
            } else {
                $this->load->view('templates/header.php');
                $this->load->view('templates/sidebar.php');
                $this->load->view('staff/dash');
                $this->load->view('templates/footer.php');
            }
        } else {
            $data['message_error'] = '';
            redirect('home/login', $data);
        }
    }

    public function validate_login()
    {
        $this->load->model('users_model');

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $password = md5($password);
        $is_valid = $this->users_model->validate($username, $password);

        if ($is_valid) {
            $role = $this->users_model->fetch_role($username);
            if ($role == 'student') {
                $admno = $this->users_model->fetch_admno($username);

                $data = array(
                    'username' => $username,
                    'role' => $role,
                    'admission_no' => $admno,
                    'is_logged_in' => true
                );
            } elseif ($role == 'advisor') {
                $staff_details = $this->users_model->fetch_staff_details($username, $role);
                
                $data = array(
                    'username' => $username,
                    'role' => $role,
                    'staff_id' => $staff_details->staff_id,
                    'branch_in_charge' => $staff_details->branch_in_charge,
                    'sem_in_charge' => $staff_details->sem_in_charge,
                    'is_logged_in' => true
                );
            } elseif ($role == 'hod') {
                $staff_details = $this->users_model->fetch_staff_details($username, $role);
                
                $data = array(
                    'username' => $username,
                    'role' => $role,
                    'staff_id' => $staff_details->staff_id,
                    'branch_in_charge' => $staff_details->branch_in_charge,
                    'is_logged_in' => true
                );
            }

            $this->session->set_userdata($data);
            redirect('home/dash');
        } else // incorrect username or password
        {
            $data['message_error'] = 'Invalid credentials';
            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $this->load->view('login.php', $data);
            $this->load->view('templates/footer.php');
        }
    }

    public function profile()
    {
        if (isset($_SESSION['username'])) {
            if ($_SESSION['role'] == 'student') {
                $this->load->view('templates/header.php');
                $this->load->view('templates/sidebar.php');
                $this->load->view('student/profile');
                $this->load->view('templates/footer.php');
            } else {
                redirect('staff/profile');
            }
        } else {
            redirect('home/login');
        }
    }




    function logout()
    {
        $this->session->sess_destroy();
        redirect('home/login');
    }
}
