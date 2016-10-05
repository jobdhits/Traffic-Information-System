<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class SIP extends CI_Controller {

    function  __construct() {
        parent::__construct();
        $data['isi_provinsi'] = $this->Provinsim->ambil_provinsi();
        $data['rute_pesan'] = $this->Rutem->ambil_rute($this->session->userdata('idprov'));
        $data['sitetitle'] = 'Sistem Informasi Kepadatan Lalu Lintas';
        $this->load->vars($data);
    }

    public function index()
    {
		$this->session->unset_userdata('idprov');
        redirect('sip/konten');
    }

    public function konten($idrute = NULL)
    {
		$provinses = $this->session->userdata('idprov');
		if(!empty($provinses))
		{
			if(!empty($idrute))
			{
				$data['konten'] = $this->Kontenm->ambil_konten($idrute);
				$this->load->view('konten', $data);
			}
			else
			{
				$data['konten'] = $this->Kontenm->konten_provinsi($this->session->userdata('idprov'));
				$this->load->view('konten_provinsi', $data);
			}
		}
		else
		{
			if(!empty($idrute))
			{
				$data['konten'] = $this->Kontenm->ambil_konten($idrute);
				$this->load->view('konten', $data);
			}
			else
			{
				$data['konten'] = $this->Kontenm->ambil_konten();
				$this->load->view('konten', $data);
			}
		}
    }
    
    public function harga_murah_berkualitas()
    {
	$this->load->view('merekberkualitas');	
    }

    
    

    public function detail($idkonten = 0)
    {
        $data['title'] = 'Detail';
        $data['detail'] = $this->Kontenm->ambil_detail($idkonten);
        $data['komen'] = $this->Kontenm->ambil_komen($idkonten);
        $this->load->view('detail', $data);
    }
	
	public function provinsi($idprov = NULL, $idrute=NULL)
	{
		//$this->session->set_userdata('idprov', $idprov);
		if(!empty($idrute))
		{
			$data['konten'] = $this->Kontenm->ambil_konten($idrute);
		 	$this->load->view('konten', $data);
		}
		else{
			$data['konten'] = $this->Kontenm->konten_provinsi($idprov);
			$this->load->view('konten_provinsi', $data);
		}
	}
	
	public function set_session()
	{
		$idprov = $this->input->post('provinsi');
		
		if(!empty($idprov)) $this->session->set_userdata('idprov', $idprov);
        redirect('sip/konten');
	}
}