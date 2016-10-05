<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//ini file config utk mail function

$config['protocol'] 	= 'mail'; // pilih mail, sendmail, or smtp
$config['mailpath'] 	= '/usr/sbin/sendmail';
$config['charset'] 		= 'iso-8859-1';
$config['wordwrap'] 	= TRUE;
$config['mailtype'] 	= 'html';
$config['priority'] 	= '1';
$config['priority'] 	= '\n';