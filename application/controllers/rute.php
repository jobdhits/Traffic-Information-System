<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rute extends CI_Controller {

    function  __construct() {
        parent::__construct();
        $this->load->model('Rutem');
		$data['dataprov'] = $this->Provinsim->get_prov();
        $data['sitetitle'] = 'Sistem Informasi Kepadatan Lalu Lintas';
        $this->load->vars($data);
    }

    function tambah()
    {
        $this->form_validation->set_rules('nama_rute', 'Nama Rute', 'trim|required|xss_clean');
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'trim|required|xss_clean');

        if($this->form_validation->run())
        {	
            $datas = array(
						'nama_rute'  =>  $this->input->post('nama_rute'),
						'idprov'  =>  $this->uri->segment(3),
					);
            
            $this->Rutem->tambah($datas);
            redirect('sip_admin');
        }
        else
        {
                $data['title'] = 'Tambah pesan';
                $this->load->view('crud/tambahrute', $data);
        }
    }

    function perbaharui()
    {
        if($this->uri->segment(3))
        {
            $this->form_validation->set_rules('nama_rute', 'Rute', 'trim|required|xss_clean');

            if($this->form_validation->run())
            {
                $data = array('nama_rute'  =>  $this->input->post('nama_rute'));

                $this->Rutem->perbaharui($this->uri->segment(3), $data);
                redirect('sip_admin');
            }
            else
            {
                $data['title'] = 'perbaharui rute';
                $data['rows'] = $this->Rutem->pilih_rute($this->uri->segment(3));
                $this->load->view('crud/perbaharuirute', $data);
            }

        }
        else
        {
             redirect(site_url('sip_anggota'));
        }

    }


    function hapus()
    {
        if($this->uri->segment(3))
        {
            $this->Rutem->hapus($this->uri->segment(3));
            redirect('sip_admin');
        }

        else
        {
            redirect(site_url(admin_beranda));
        }

    }
}