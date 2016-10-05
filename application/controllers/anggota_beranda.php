<?php

class Anggota_beranda extends CI_Controller
{

    function  __construct()
    {
        parent::__construct();
        $this->ceklogin();
        $this->load->helper('date');
        $this->load->model('anggota_berandam');
        $data['sitetitle'] = 'Sistem Informasi Kepadatan Lalu Lintas';
        $this->load->vars($data);
    }
    
    function index()
    {
        $data['pesan'] = $this->anggota_berandam->ambil_pesan_user();
        $data['komen'] = $this->anggota_berandam->ambil_komen_user();
        $data['tanggapan'] = $this->anggota_berandam->ambil_tanggapan();
        $data['profil'] = $this->anggota_berandam->profil();
        $this->load->view('anggota/beranda', $data);
    }

    function profil()
    {
        $data['profil'] = $this->anggota_berandam->profil();
        $this->load->view('anggota/profil', $data);
    }

    function perbaharui_profil()
    {
        if($this->uri->segment(3))
        {
            $this->form_validation->set_rules('nama_awal', 'Nama Awal', 'trim|required|xss_clean');
            $this->form_validation->set_rules('nama_akhir', 'Nama Akhir', 'trim|required|xss_clean');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');

            if($this->form_validation->run())
            {
                $data = array(
                    'namaawal'=>$this->input->post('nama_awal'),
                    'namaakhir'=>$this->input->post('nama_akhir'),
                    'email'=>$this->input->post('email')
                );

                $this->anggota_berandam->perbaharui_profil($this->uri->segment(3), $data);
                redirect('anggota_beranda');

            }

            else
            {
                $data['rows'] = $this->anggota_berandam->ambil_profil($this->uri->segment(3));
            }

            $this->load->view('anggota/perbaharui_profil', $data);
        }

        else{
            redirect('anggota/beranda' );
        }

    }

    function perbaharui_password()
     {
        if($this->uri->segment(3))
        {
            $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

            if($this->form_validation->run())
            {
                $data = array(
                    'password'=>sha1($this->input->post('password'))
                );
                $this->anggota_berandam->perbaharui_profil($this->uri->segment(3), $data);
                redirect('anggota_beranda');
            }
            else
            {
                $data['rows'] = $this->anggota_berandam->ambil_password($this->uri->segment(3));
            }

            $this->load->view('anggota/perbaharui_password', $data);
        }

        else{
            redirect('anggota/beranda' );
        }

    }


    function semua_pesan($row=0)
    {
         // load pagination library

        $this->load->library('pagination');

        // set pagination parameters        
        
        $config['base_url']= 'http://job.web.ugm.ac.id/anggota_beranda/semua_pesan';

        $config['total_rows']=$this->anggota_berandam->jumlah_pesan();

        $config['per_page']='10';

        $this->pagination->initialize($config);

        // store data for being displayed on view file

        $data['pesan']=$this->anggota_berandam->baris_pesan($row);

        $data['links']=$this->pagination->create_links();

        // load 'testview' view

        $this->load->view('anggota/semua_pesan', $data);

    }

    function semua_komentar($row=0)
    {
            // load pagination library

        $this->load->library('pagination');

        // set pagination parameters

        $config['base_url']= 'http://job.web.ugm.ac.id/anggota_beranda/semua_komentar';

        $config['total_rows']=$this->anggota_berandam->jumlah_komentar();

        $config['per_page']='10';

        $this->pagination->initialize($config);

        // store data for being displayed on view file

        $data['komentar']=$this->anggota_berandam->baris_komentar($row);

        $data['links']=$this->pagination->create_links();

        // load 'testview' view

        $this->load->view('anggota/semua_komentar', $data);

    }

    function semua_tanggapan($row=0)
    {
            // load pagination library

        $this->load->library('pagination');

        // set pagination parameters

        $config['base_url']= 'http://job.web.ugm.ac.id/anggota_beranda/semua_tanggapan';

        $config['total_rows']=$this->anggota_berandam->jumlah_tanggapan();

        $config['per_page']='10';

        $this->pagination->initialize($config);

        // store data for being displayed on view file

        $data['tanggapan']=$this->anggota_berandam->baris_tanggapan($row);

        $data['links']=$this->pagination->create_links();

        // load 'testview' view

        $this->load->view('anggota/semua_tanggapan', $data);

    }


    function kirim_komentar()
    {
     
        $this->form_validation->set_rules('isi_komentar', 'Komentar', 'trim|required|xss_clean');

        if($this->form_validation->run())
        {
            $data = array(  'isi_komentar'  =>  $this->input->post('isi_komentar'),
                            'id_pesan_komentar'      =>  $this->input->post('id_pesan'),
                            'komentator'    =>  $this->session->userdata('username'),
                            'ipaddress'     =>  $this->input->ip_address(),
                            'waktu_komen'   =>  time()
                          );
            $this->anggota_berandam->berikan_komentar($data);
            redirect('sip_anggota');
        }
        else
        {
            echo 'Komentar tidak dapat dikirimkan';
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
