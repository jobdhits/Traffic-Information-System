<?php

class Admin_model extends CI_Model {

        function  __construct()
        {
            parent::__construct();
        }

	function cek_user($username, $password, $type)
	{
		$q = $this
                        ->db
                        ->where('username', $username)
                        ->where('password', sha1($password))
                        ->where('usertype =', $type)
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


}


