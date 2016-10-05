<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Provinsi extends CI_Controller {

    function  __construct() {
        parent::__construct();
        $this->load->model('Provinsim');
        $data['sitetitle'] = 'Sistem Informasi Kepadatan Lalu Lintas';
        $this->load->vars($data);
    }

    function tambah()
    {
        $this->form_validation->set_rules('nama_provinsi', 'Nama Provinsi', 'trim|required|xss_clean');

        if($this->form_validation->run())
        {
            $data = array('nama_provinsi'  =>  $this->input->post('nama_provinsi'));

            $this->Provinsim->tambah($data);
            redirect('sip_admin');
        }
        else
        {
                $data['title'] = 'Tambah provinsi';
                $this->load->view('crud/tambahprovinsi', $data);
        }
    }

    function perbaharui()
    {
        if($this->uri->segment(3))
        {
            $this->form_validation->set_rules('nama_provinsi', 'Provinsi', 'trim|required|xss_clean');

            if($this->form_validation->run())
            {
                $data = array('nama_provinsi'  =>  $this->input->post('nama_provinsi'));

                $this->Provinsim->perbaharui($this->uri->segment(3), $data);
                redirect('sip_admin');
            }
            else
            {
                $data['title'] = 'perbaharui provinsi';
                $data['rows'] = $this->Provinsim->pilih_provinsi($this->uri->segment(3));
                $this->load->view('crud/perbaharuiprovinsi', $data);
            }

        }
        else
        {
             redirect(site_url('sip_admin'));
        }

    }


    function hapus()
    {
        if($this->uri->segment(3))
        {
            $this->Provinsim->hapus($this->uri->segment(3));
            redirect('sip_admin');
        }
        else
        {
            redirect(site_url(admin_beranda));
        }

    }
}