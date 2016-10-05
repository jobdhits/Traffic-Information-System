<?php

class Sip_anggota extends CI_Controller{

	var $expiration = 7200; // Two hour limit

    function  __construct() {
        parent::__construct();
        $this->load->model('Loginm', '', TRUE);
        $this->load->model('captcha', '', TRUE);
        $data['sitetitle'] = 'Sistem Informasi Kepadatan Lalu Lintas';
        $this->load->vars($data);
    }

    function index()
    {
            if ($this->session->userdata('login') == TRUE)
            {
                    redirect('anggota_beranda');
            }
            else
            {
                    $this->load->view('login/login_view');
            }
    }

	function activate($username, $userid, $code)
    {
		if($this->Loginm->check_activation($userid, $username, $code) === TRUE)
		{
			$this->Loginm->set_active($userid, $username, $code);

			//load view sukses
			$this->load->view('login/activate');
		}
    }


    function proses_login()
    {
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');


            if ($this->form_validation->run() == TRUE)
            {
                    $username = $this->input->post('username');
                    $password = $this->input->post('password');

                    if ($this->Loginm->cek_user($username, $password) == TRUE)
                    {
                            if ($this->Loginm->cek_status($username, $password, 0) == TRUE)
                            {
                                    //user not active
                                    $user_email = $this->Loginm->get_user($username, $password)->email;

                                    $this->session->set_flashdata('message', 'Maaf akun anda belum aktif, Silahkan cek email (<u>'.$user_email.'</u>) untuk aktivasi');
                                    redirect('sip_anggota/index');

                            }
                            else if ($this->Loginm->cek_status($username, $password, 1) == TRUE)
                            {
                                    //user active

                                    $data = array(
                                    'username' => $username,
                                    'login' => TRUE);
                                    $this->session->set_userdata($data);
                                    redirect('anggota_beranda');
                            }
                    }
                    else
                    {
                            $this->session->set_flashdata('message', 'Maaf, username atau password Anda salah');
                            redirect('sip_anggota/index');
                    }
            }
            else
            {
                $this->load->view('login/login_view');
            }
    }


    function logout()
    {
            $this->session->unset_userdata(array('username' => '', 'login' => FALSE));
            $this->session->sess_destroy();
            redirect('sip_anggota', 'refresh');
    }

    function daftar()
    {
		// First, delete old captchas
		$exp = time() - $this->expiration;
		$this->captcha->delete($exp);

		//load helper captcha
		$this->load->helper('captcha');

		$vals = array(
			//'word' 		=> 'Random word',
			'img_path' 		=> './captcha/',
			'img_url' 		=> base_url().'captcha/',
			'font_path'             =>'./system/fonts/verdanab.ttf',
			'img_width'             => '200',
			'img_height'            => 30,
			'expiration'            => $this->expiration
			);

		$cap = create_captcha($vals);

		$datacap = array(
			'captcha_time' => $cap['time'],
			'ip_address' => $this->input->ip_address(),
			'word' => $cap['word']
		);

		$this->captcha->save($datacap);

		$vdata['captcha'] = $cap['image'];

        // field name, error message, validation rules
        $this->form_validation->set_rules('namaawal', 'Nama Depan', 'trim|required');
        $this->form_validation->set_rules('namaakhir', 'Nama Belakang', 'trim|required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|callback_email_exists');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|callback_user_exist');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'trim|required|matches[password]');
        $this->form_validation->set_rules('captcha', 'Kode Keamanan', 'trim|required|callback_captcha_check');

		if($this->form_validation->run() == FALSE)
		{
				$this->load->view('login/daftar', $vdata);
		}
        else
        {
                //$this->load->model('Loginm'); tak comment soale diatas dah di load

                if($this->Loginm->mendaftar() === TRUE)
                {
					//jika sukses kirim email activation code
					$dtuser = $this->Loginm->get_user($this->input->post('username'), $this->input->post('password'));

					$this->load->library('email');

                                            $config['protocol']    = 'smtp';
                                            $config['smtp_host']    = 'ssl://smtp.gmail.com';
                                            $config['smtp_port']    = '465';
                                            $config['smtp_timeout'] = '7';
                                            $config['smtp_user']    = 'masukkan alamat email';
                                            $config['smtp_pass']    = 'masukkan password email';
                                            $config['charset']    = 'utf-8';
                                            $config['newline']    = "\r\n";
                                            $config['mailtype'] = 'text'; // or html
                                            $config['validation'] = TRUE; // bool whether to validate email or not

                                            $this->email->initialize($config);

					$this->email->from('masukkan alamat email', 'no-reply');
					$this->email->to($this->input->post('email'));

					$this->email->subject('[JOB UGM] Aktifasi kode untuk member baru');

					$url_activation = base_url().'sip_anggota/activate/'.$dtuser->username.'/'.$dtuser->id_anggota.'/'.$dtuser->activation;

					$msg = "Kode Aktifasi Member \n";
					$msg .= "Silahkan klik link berikut : \n";
					$msg .= "{unwrap}".$url_activation."{/unwrap}";

					$this->email->message($msg);

					if ( ! $this->email->send())
					{
						// debug
						echo $this->email->print_debugger();
					}
					else
					{
						$vdata['usermail'] = $dtuser->email;
						// load success view
						$this->load->view('login/berhasil', $vdata);
					}

                }
                else
                {
					$this->load->view('login/daftar', $vdata);
                }
        }
    }

    function user_exist($username)
    {
        $query = $this->db->
                        get_where('anggota', array('username' => $username));

        if($query->num_rows() > 0)
        {
            $this->form_validation->set_message('user_exist', 'Maaf sudah ada yang menggunakan username ini, gunakan username lain.');

            return FALSE;
        }

        $query->free_result();

        return TRUE;
    }

    function email_exists($email)
    {
        $query = $this->db->get_where('anggota', array('email' => $email));

        if($query->num_rows() > 0)
        {
            $this->form_validation->set_message('email_exists', 'Maaf email ini sudah terdaftar, gunakan alamat email lain.');

            return FALSE;
        }

        $query->free_result();
        return TRUE;
    }

    function recaptcha_validation($string)
    {
            $return = recaptcha_check_answer($this->config->item('private_recaptcha_key'),
                                                                            $_SERVER["REMOTE_ADDR"],
                                                                            $this->input->post("recaptcha"),
                                                                            $this->input->post("recaptcha"));

            if(!$return->is_valid)
           {
                    $this->session->set_userdata("Mesg",'Code entered is invalid !');
                    return FALSE;
            }
            else
           {
                    return TRUE;
            }
    }

    function login_user_function()
    {
            $this->load->library('validation');
            $this->load->helper('recaptcha_helper');

            $rules['recaptcha'] = 'required|callback_recaptcha_validation';
            $this->validation->set_rules($rules);

            $fields['recaptcha'] = 'Code';
            $this->validation->set_fields($fields);

            if($this->validation->run() == FALSE) {
               // code is not correct
            }
            else
           {
                    // Code is verified now submit the form
            }
    }

    function captcha_check()
    {
		// Then see if a captcha exists:
		$exp 	= time() - $this->expiration;
		$sql 	= "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
		$binds 	= array($this->input->post('captcha'), $this->input->ip_address(), $exp);
		$query 	= $this->db->query($sql, $binds);
		$row 	= $query->row();

		if ($row->count == 0)
		{
			$this->form_validation->set_message('captcha_check', 'Kode Yang Anda Maksukkan Tidak Benar');
			return FALSE;
		}else{
			return TRUE;
		}

	}

}
