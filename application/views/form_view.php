<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Captcha in Codeigniter</title>
</head>
<body>
    <?php echo validation_errors('<p>'); ?>
    <?php echo form_open("home/add_message"); ?>
    <p>
        <label for="user_name">Name:</label>
        <input type="text" id="user_name" name="user_name" value="<?php echo set_value('user_name'); ?>" />
    </p>
    <p>
        <label for="con_password">Message:</label>
        <textarea name="message" id="message" value="" cols="50" rows="4"></textarea>
    </p>
    <p>
        <?php echo $cap_img ?>
        <input type="text" id="captcha" name="captcha" value="" />
    </p>
    <p>
        <input type="submit" value="Submit" />
    </p>
    <?php echo form_close(); ?>
</body>
</html>