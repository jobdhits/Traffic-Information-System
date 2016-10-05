<?php

class Signup extends CI_Controller {

	function Signup()
	{
		 parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');			
		$this->load->database();
	}
	
	function index()
	{
		$this->load->helper(array('form', 'url'));
				
		$this->load->library('form_validation');
		$this->form_validation->set_rules('Captcha', 'security code', 'trim|required|callback_captcha_check');
					
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('form');
		}
		else
		{
			$this->load->view('formsuccess');
		}
		
	}
	
	function captcha_check($str)
	{
			// First, delete old captchas
			$expiration = time()-7200; // Two hour limit
			$this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);	

			// Then see if a captcha exists:
			$sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
			$binds = array($_POST['Captcha'], $this->input->ip_address(), $expiration);
			$query = $this->db->query($sql, $binds);
			$row = $query->row();

			if ($row->count == 0)
			{
    			$this->form_validation->set_message('captcha_check', 'Security code miss match. Try again');
				return FALSE;
			}
	}

/* End of file Signup.php */
/* Location: ./application/controllers/Signup.php */
}
?>