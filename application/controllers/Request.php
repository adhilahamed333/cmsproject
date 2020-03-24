<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Request extends CI_Controller
{
    public function index()
    {
        if (isset($_SESSION['username'])) {
            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');
            $content['error_msg'] = "";
            $this->load->view('student/request/request_s1', $content);
            $this->load->view('templates/footer.php');
        } else {
            redirect('home/login');
        }
    }

    public function request_s1()
    {
        if (isset($_SESSION['username'])) {
            $this->load->view('templates/header.php');
            $this->load->view('templates/sidebar.php');

            $this->load->model('request_model');
            $request = $this->input->post('request');
            $request = $this->input->post('other') . $request;
            $reason = $this->input->post('reason');
            $remarks = $this->input->post('remarks');
            $u1 = $this->input->post('undertaking1');
            $u2 = $this->input->post('undertaking2');
            $u3 = $this->input->post('undertaking3');
            $u4 = $this->input->post('undertaking4');
            $u5 = $this->input->post('undertaking5');
            $data = array(
                'request' => $request,
                'reason' => $reason,
                'remarks' => $remarks
            );
            $content['error_msg'] = "";

            $dtype = $this->input->post('dtype');

            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'pdf';

            $this->load->library('upload', $config);
            if ($dtype) {
                $uploaded = $this->upload->do_upload('userfile');
            } else {
                $uploaded = 0;
                $content['error_msg'] = $content['error_msg'] . "<br>Enter document type";
            }


            if ($request && $reason && $u1 && $u2 && $u3 && $u4 && $u5 && $uploaded) {
                $content['request_id'] = $this->request_model->create_request($data, $_SESSION['admission_no']);
                $this->request_model->request_flow($content['request_id']);
                $content['data'] = $this->upload->data();
                $dpath = $this->upload->data('full_path');
                $content['doc_id'] = $this->request_model->doc_upload($_SESSION['admission_no'], $dtype, $dpath);
                $this->load->view('student/request/request_s2', $content);
            } elseif ($request && $reason && $u1 && $u2 && $u3 && $u4 && $u5 && $uploaded) {
                $content['request_id'] = $this->request_model->create_request($data, $_SESSION['admission_no']);
                $this->request_model->request_flow($content['request_id']);
                $content['doc_id'] = 0;
                $this->load->view('student/request/request_s2', $content);
            } else {
                if (!($u1 && $u2 && $u3 && $u4 && $u5)) {
                    $content['error_msg'] = $content['error_msg'] . "<br>Check all undertakings";
                }
                if (!$request) {
                    $content['error_msg'] = $content['error_msg'] . "<br>Select a request";
                }
                if (!$reason) {
                    $content['error_msg'] = $content['error_msg'] . "<br>Specify reason";
                }
                if (!$uploaded) {
                    $content['error_msg'] = $content['error_msg'] . $this->upload->display_errors();
                }
                $this->load->view('student/request/request_s1', $content);
            }

            $this->load->view('templates/footer.php');
        } else {
            redirect('home/login');
        }
    }
}
