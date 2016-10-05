<?php 
error_reporting(E_ALL); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>This is the view page</title>
</head>

<body>

						
					<?php echo form_open('signup'); ?>																	
						<div class="FormBox">						
						<?php 						      					
      					$this->load->helper('captcha');
							$vals = array(
    								'img_path'	 => './assets/captcha/',
    								'img_url'	 => 'http://localhost/PLC/assets/captcha/'
    								);

							$cap = create_captcha($vals);

							$data = array(
    								'captcha_time'	=> $cap['time'],
    								'ip_address'	=> $this->input->ip_address(),
   								'word'	 => $cap['word']
    								);

							$query = $this->db->insert_string('captcha', $data);
							$this->db->query($query);
							
							echo '<br>';							
							echo $cap['image'];
							echo '<br>';
						?>
						<label>Enter the above security code</label>
						<br><input id="CaptchaBox" type="text" name="Captcha" value="<?php echo set_value('Captcha'); ?>"/>
						</div>
												
						<div class="FormBox">
						<input id="SubmitButton" type="submit" value="Submit" />
						</div>														
					</form>
					
					<br clear="all"><br>
					<?php echo validation_errors(); ?>				
				
</body>
</html>