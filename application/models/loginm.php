<?php

class Loginm extends CI_Model {

	function  __construct()
	{
		parent::__construct();
	}
         
	function cek_user($username, $password)
	{
		$q = $this
                        ->db
                        ->where('username', $username)
                        ->where('password', sha1($password))
                        ->select('email')
                        ->select('usertype')
                        ->limit(1)
                        ->get('anggota');

		if ($q->num_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	function cek_status($username, $password, $status)
	{
		$q = $this
                        ->db
                        ->where('username', $username)
                        ->where('password', sha1($password))
						->where('status', $status)
                        ->select('email')
                        ->select('usertype')
                        ->limit(1)
                        ->get('anggota');

		if ($q->num_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	function get_user($username, $password)
	{
		$q = $this
                        ->db
                        ->where('username', $username)
                        ->where('password', sha1($password))
                        ->select('*')
                        ->limit(1)
                        ->get('anggota');

		if ($q->num_rows() > 0)
		{
                $row = $q->row();
                return $row;
		}
	}

	function mendaftar()
	{

		//generate activation code	
		$txt_encrypt = date($this->input->post('email').'l jS \of F Y h:i:s A');
		$code = md5($txt_encrypt);

		$data_anggota_baru = array(
			'namaawal' => $this->input->post('namaawal'),
			'namaakhir' => $this->input->post('namaakhir'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' =>$this->input->post('tanggal_lahir'),
			'email' => $this->input->post('email'),
			'username' => $this->input->post('username'),
			'password' => sha1($this->input->post('password')),
            'ipaddress' =>  $this->input->ip_address(),
			'activation' => $code //for activation code
		);

		$insert = $this->db->insert('anggota', $data_anggota_baru);
		return $insert;
	}
	
	function check_activation($id, $username, $code)
	{
		$q = $this
                        ->db
						->where('id_anggota', $id)
                        ->where('username', $username)
                        ->where('activation', $code)
                        ->select('*')
                        ->limit(1)
                        ->get('anggota');

		if ($q->num_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	function set_active($id, $username, $code)
	{
		$data = array(
					   'status' => '1',
					   'activation' => ''
					);
		
		$this->db->where('id_anggota', $id);
		$this->db->where('username', $username);
		$this->db->where('activation', $code);
		$this->db->update('anggota', $data); 
	}

}
