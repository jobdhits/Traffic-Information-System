<?php

class Sip_admin extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->model('Admin_model', '', TRUE);
        $data['sitetitle'] = 'Sistem Informasi Kepadatan Lalu Lintas';
        $this->load->vars($data);
    }

    function index()
    {
            if ($this->session->userdata('login') == TRUE)
            {
                    redirect('admin_beranda');
            }
            else
            {
                    $this->load->view('admin/login_view');
            }
    }


    function proses_login()
    {
            $this->form_validation->set_rules('username', 'Username', 'required|callback_check');
            $this->form_validation->set_rules('password', 'Password', 'required');


            if ($this->form_validation->run() == TRUE)
            {
                    $username = $this->input->post('username');
                    $password = $this->input->post('password');
                    $type = 'admin';

                    if ($this->Admin_model->cek_user($username, $password, $type) == TRUE)
                    {
                            $data = array(
                            'username' => $username,
                            'type' => TRUE,
                            'login' => TRUE);
                            $this->session->set_userdata($data);
                            redirect('admin_beranda');
                    }
                    else
                    {
                            $this->session->set_flashdata('message', 'Maaf, username atau password Anda salah');
                            redirect('sip_admin/index');
                    }
            }
            else
            {
                    $this->load->view('admin/login_view');
            }
    }

  
    function logout()
    {
            $this->session->unset_userdata(array('username' => '', 'login' => FALSE));
            $this->session->sess_destroy();
            redirect('sip_admin', 'refresh');
    }

}