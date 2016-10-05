<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pesan extends CI_Controller {

    function  __construct()
    {
        parent::__construct();
        $this->ceklogin();
        $this->load->helper('date');
        $data['rute'] = $this->Rutem->ambil_rute($this->uri->segment(3));
	$data['dataprov'] = $this->Provinsim->get_prov();
        $this->load->vars($data);
        $this->load->model('Pesanm');
        $data['sitetitle'] = 'Sistem Informasi Kepadatan Lalu Lintas';
        $this->load->vars($data);
    }

    function index(){
        $user = $this->session->userdata('username');
        //echo $user;s
    }

    function tambah($idprov=0)
    {
        $this->form_validation->set_rules('pengantar', 'Pengantar', 'trim|required|xss_clean');
        $this->form_validation->set_rules('isi', 'Isi', 'trim|required|xss_clean');
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'trim|required|xss_clean');
		$this->form_validation->set_rules('rute_pesan', 'Rute', 'trim|required|xss_clean');
		$this->form_validation->set_rules('status', 'Tingkat Pelayanan', 'trim|required|xss_clean');

        if($this->form_validation->run())
        {
            $data = array(  'pengantar'     =>  $this->input->post('pengantar'),
                            'status'        =>  $this->input->post('status'),
                            'rute_pesan'    =>  $this->input->post('rute_pesan'),
                            'isi'           =>  $this->input->post('isi'),
                            'ipaddress'     =>  $this->input->ip_address(),
                            'penulis'       =>  $this->session->userdata('username'),
                            'waktu'        	=>  time(),
							'idprov'		=>	$idprov
 
                          );
            $this->Pesanm->tambah($data);
            redirect('sip_anggota');
        }
        else
        {
                $data['title'] = 'Tambah pesan';
//                $data['rows'] = $this->Pesanm->getposts($this->uri->segment(3));
//                $data['heading'] = $data['rows'] ->judul;
                $this->load->view('crud/tambah', $data);
        }
    }

    function perbaharui()
    {
        if($this->uri->segment(3))
        {
            $this->form_validation->set_rules('pengantar', 'Pengantar', 'trim|required|xss_clean');
            $this->form_validation->set_rules('isi', 'Isi', 'trim|required|xss_clean');

            if($this->form_validation->run())
            {
                $data = array('rute_pesan'=>$this->input->post('rute_pesan'),
                    'status'=>$this->input->post('status'),
                    'pengantar'=>$this->input->post('pengantar'),
                    'isi'=>$this->input->post('isi'));

                $this->Pesanm->perbaharui($this->uri->segment(3), $data);
                redirect('sip_anggota');
            }
            else
            {
                $data['title'] = 'perbaharui pesan';
                $data['rows'] = $this->Pesanm->ambil_pesan($this->uri->segment(3));
                //$data['heading'] = $data['rows']->pengantar;
                $this->load->view('crud/perbaharui', $data);
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
            $this->Pesanm->hapus($this->uri->segment(3));
            redirect('sip_anggota');
        }

        else
        {
            redirect(site_url(pesan));
        }

    }

    function ceklogin()
    {
            $ceklogin = $this->session->userdata('login');
            if(!isset($ceklogin) || $ceklogin != TRUE)
            {
                    echo 'Anda tidak mempunyai hak untuk mengakses halaman ini silahkan <a href="/sip_anggota">Login</a>';//yang bener terakhir kali ../login/
                    die();

            }
    }

}