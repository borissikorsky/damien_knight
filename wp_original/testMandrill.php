<?php
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);


	

	echo file_exists(dirname(__FILE__)."/Mandrill.php");

	date_default_timezone_set('Europe/London');
	require dirname(__FILE__)."/Mandrill.php";
	define('MANDRILL_API_KEY','bwZUhIRWNOPpzotFqoKO-Q');



	$str = 'hello there';

	$text_email = $str;
		$html_email = '';
		$email = array();
		$email['type'] = 'messages';
		$email['call'] = 'send';
		$message = array();
		$message['html'] = $html_email;
		$message['text'] = $text_email;
		$message['subject'] = 'Test';
		$message['from_email'] = 'no-reply@tpress.co.uk';
		$message['from_name'] = 'Test 1';
		$message['to'][] = array('email'=>'m_w_raza@hotmail.com', 'name'=>'Mo Raza');
		$message['track_opens'] = true;
		$message['track_clicks'] = true;
		$message['auto_text'] = true;
		$message['url_strip_qs'] = true;
		$email['message'] = $message;
		$ret = Mandrill::call_api($email);


?>