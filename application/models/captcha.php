<?php
class Captcha extends CI_Model{

    function  __construct() {
        parent::__construct();
        
    }
	
	function save($datas)
	{
		$query = $this->db->insert_string('captcha', $datas);
		$this->db->query($query);
	}
	
	function delete($expiration)
	{
		$this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration); 
	}
	
	function cap_exists()
	{
		$sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
		$binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
		$query = $this->db->query($sql, $binds);
		$row = $query->row();
		
		if ($row->count == 0)
		{
			echo "You must submit the word that appears in the image";
		}
	}
	
}