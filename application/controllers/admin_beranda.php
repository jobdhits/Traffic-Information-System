<?php

class Admin_Beranda extends CI_Controller
{

    function  __construct()
    {
        parent::__construct();
        $data['sitetitle'] = 'Sistem Informasi Kepadatan Lalu Lintas';
        $this->load->helper('date');
        $data['rute'] = $this->Rutem->ambil_rute();
        //$data['provinsi'] = $this->Provinsim->ambil_rute();
        $this->load->vars($data);
        $this->ceklogin();
        $this->load->model('anggota_berandam');
        $this->load->model('admin_berandam');
        $this->load->model('Pesanm');
        $this->load->model('Provinsim');
    }

    function index()
    {
       $data['isi_provinsi'] = $this->admin_berandam->ambil_provinsi();
       $data['rute'] = $this->admin_berandam->ambil_rute();
       $data['anggota'] = $this->admin_berandam->ambil_anggota_5();
       $data['pesan'] = $this->admin_berandam->ambil_pesan_5();
       $data['komentar'] = $this->admin_berandam->ambil_komentar_5();
       $this->load->view('admin/beranda', $data);
    }

    function perbaharui_oleh_admin()
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

                $this->Pesanm->perbaharui_oleh_admin($this->uri->segment(3), $data);
                redirect('sip_admin');
            }
            else
            {
                $data['title'] = 'perbaharui pesan';
                $data['rows'] = $this->Pesanm->ambil_pesan($this->uri->segment(3));
                $this->load->view('crud/perbaharui_oleh_admin', $data);
            }

        }
        else
        {
             redirect(site_url('sip_admin'));
        }

    }

    function hapus_oleh_admin()
    {
        if($this->uri->segment(3))
        {
            $this->Pesanm->hapus_oleh_admin($this->uri->segment(3));
            redirect('sip_admin');
        }

        else
        {
            redirect(site_url(pesan));
        }

    }

    function perbaharui_profil_oleh_admin()
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

                $this->anggota_berandam->perbaharui_profil_oleh_admin($this->uri->segment(3), $data);
                redirect('/admin_beranda');

            }

            else
            {
                $data['rows'] = $this->anggota_berandam->ambil_profil_oleh_admin($this->uri->segment(3));
            }

            $this->load->view('admin/perbaharui_profil_oleh_admin', $data);
        }

        else{
            redirect('/admin_beranda' );
        }
    }

    function hapus_profil_oleh_admin()
    {
        if($this->uri->segment(3))
        {
            $this->Pesanm->hapus_profil_oleh_admin($this->uri->segment(3));
            redirect('sip_admin');
        }

        else
        {
            redirect(site_url(pesan));
        }

    }

    function hapus_komentar_oleh_admin()
    {
        if($this->uri->segment(3))
        {
            $this->Pesanm->hapus_komentar_oleh_admin($this->uri->segment(3));
            redirect('sip_admin');
        }

        else
        {
            redirect(site_url(pesan));
        }

    }

    function perbaharui_komentar()
    {
        if($this->uri->segment(3))
        {
            $this->form_validation->set_rules('komentar', 'Komentar', 'trim|required|xss_clean');
           
            if($this->form_validation->run())
            {
                $data = array(
                    'isi_komentar'=>$this->input->post('komentar')
                );

                $this->anggota_berandam->perbaharui_komentar($this->uri->segment(3), $data);
                redirect('/admin_beranda');

            }

            else
            {
                $data['rows'] = $this->anggota_berandam->ambil_komentar($this->uri->segment(3));
            }

            $this->load->view('admin/perbaharui_komentar', $data);
        }

        else{
            redirect('/admin_beranda' );
        }
    }

    function semua_pesan($row=0)
    {
        // load pagination library

        $this->load->library('pagination');

        // set pagination parameters

        $config['base_url']= 'http://job.web.ugm.ac.id/admin_beranda/semua_pesan';

        $config['total_rows']=$this->admin_berandam->jumlah_pesan();

        $config['per_page']='10';

        $this->pagination->initialize($config);

        // store data for being displayed on view file

        $data['pesan']=$this->admin_berandam->baris_pesan($row);

        $data['links']=$this->pagination->create_links();

        // load 'testview' view

        $this->load->view('admin/semua_pesan', $data);

    }

    function semua_komentar($row=0)
    {
            // load pagination library

        $this->load->library('pagination');

        // set pagination parameters

        $config['base_url']= 'http://job.web.ugm.ac.id/admin_beranda/semua_komentar';

        $config['total_rows']=$this->admin_berandam->jumlah_komentar();

        $config['per_page']='10';

        $this->pagination->initialize($config);

        // store data for being displayed on view file

        $data['komentar']=$this->admin_berandam->baris_komentar($row);

        $data['links']=$this->pagination->create_links();

        // load 'testview' view

        $this->load->view('admin/semua_komentar', $data);

    }

    function semua_anggota($row=0)
    {
            // load pagination library

        $this->load->library('pagination');

        // set pagination parameters

        $config['base_url']= 'http://job.web.ugm.ac.id/admin_beranda/semua_anggota';

        $config['total_rows']=$this->admin_berandam->jumlah_anggota();

        $config['per_page']='10';

        $this->pagination->initialize($config);

        // store data for being displayed on view file

        $data['anggota']=$this->admin_berandam->baris_anggota($row);

        $data['links']=$this->pagination->create_links();

        // load 'testview' view

        $this->load->view('admin/semua_anggota', $data);

    }

    function semua_rute($row=0)
    {
            // load pagination library

        $this->load->library('pagination');

        // set pagination parameters

        $config['base_url']= 'http://job.web.ugm.ac.id/admin_beranda/semua_rute';

        $config['total_rows']=$this->admin_berandam->jumlah_rute();

        $config['per_page']='10';

        $this->pagination->initialize($config);

        // store data for being displayed on view file

        $data['rute']=$this->admin_berandam->baris_rute($row);

        $data['links']=$this->pagination->create_links();

        // load 'testview' view

        $this->load->view('admin/semua_rute', $data);

    }


    function ceklogin()
    {
            $ceklogin = $this->session->userdata ('type');
            if(!isset($ceklogin) || $ceklogin != TRUE)
            {
                $this->load->view('akses');
                
            }
    }

}
