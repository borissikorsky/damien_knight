<?php

	/* Temporary Queue */
	date_default_timezone_set('Europe/London');
	require dirname(__FILE__)."/Mandrill.php";
	define('MANDRILL_API_KEY','bwZUhIRWNOPpzotFqoKO-Q');

	
	
	if (isset($_GET['doSignUp'])) {

		$name = split_name($_GET['contactName']);
		$result['success'] = true;
		$response_message = '';
		$email_address = $_GET['emailAddress'];
		$valid_data = true;
		
		$parameters = array(
			//'firstname' => $name['firstname'],
			//'lastname' => (($name['surname']) ? $name['surname'] : ' '),
			'email' => $_GET['emailAddress'],
			'password' => $_GET['password'],
			'comapanyname' => $_GET['companyName'],
			//'nofieldworkers' => $_GET['noFieldWorkers'],
			//'phoneno' => $_GET['phoneNo'],
			'subdomain' => $_GET['subdomain'],
			//'industries' => $_GET['industries']
		);


		$url = "http://api.workforcefm.com/v1/login/subscription_company";    
		//$url = "http://api.workforcefm.com/Help/Api/POST-v1-login-subscription_company";	
	
		//Let's do some validation.
		//if valid email adddress
		if (filter_var($email_address, FILTER_VALIDATE_EMAIL)):
		else:		
		  $response_message .= '';
		  $result['success'] = false;
		  $result['error_messages']['emailAddress'] = 'Please enter a valid email address';
		  $result['response_message'] = $response_message;
		  $valid_data = false;
		  
		 	
		  
		endif;//if ( is_email( $email_address ) ):
		
		
		
		//Make sure company name does not contain an at.
		if (strpos($_GET['companyName'],'@') !== false):
		
		  $response_message .= '';
		  $result['success'] = false;
		  $result['error_messages']['companyName'] = 'This field is for your company name';
		  $result['response_message'] = $response_message;
		  $valid_data = false;
		  
		 
		else:		  
		endif;//if ( is_email( $email_address ) ):
		
		
		if(!$valid_data):
		 echo json_encode($result);
		 die();	
		endif;
			
		
		
		//If data is not valid then end our little trip here.
		if($valid_data):
		else:
		 echo json_encode($result);
		 die();
		endif;
		
		
		$content = json_encode($parameters);

		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER,
		        array("Content-type: application/json"));
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

		$json_response = curl_exec($curl);

		$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

		//if ( $status != 201 ) {
		  //  die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
		//}


		curl_close($curl);

		

		file_put_contents(dirname(__FILE__).'/queue.txt', print_r($parameters, true), FILE_APPEND);
		

		$str = "Trial Registration\n\n";
		foreach ($parameters as $p => $v) {
			$str .= $p.": ". $v. "\n";
		}
		$str .= "\n\n";
		$str .= "\n\n\nThis trial registration was made at: ". date('d-m-Y H:i'); 


		$text_email = $str;
		$html_email = '';
		$email = array();
		$email['type'] = 'messages';
		$email['call'] = 'send';
		$message = array();
		$message['html'] = $html_email;
		$message['text'] = $text_email;
		$message['subject'] = 'Trial Registration - workforce.fm';
		$message['from_email'] = 'no-reply@workforce.fm';
		$message['from_name'] = 'Workforce Trial Registration';
		//$message['to'][] = array('email'=>'m_w_raza@hotmail.com', 'name'=>'Mo Raza');
		$message['to'][] = array('email'=>'damien@workforce.fm', 'name'=>'Damien Knight');
		//$message['to'][] = array('email'=>'verbyop@yopmail.com', 'name'=>'VERB');
		$message['track_opens'] = true;
		$message['track_clicks'] = true;
		$message['auto_text'] = true;
		$message['url_strip_qs'] = true;
		$email['message'] = $message;
		$ret = Mandrill::call_api($email);


		$response = json_decode($json_response, true);

		$result['success'] = true;
		$result['data'] = $response;
		$result['response_message'] = 'Thanks for signing up, A member of the team will be in touch shortly to progress your account.';
		header("Content-Type: application/json");
		echo json_encode($result);
	}
	else {

		$result['exists'] = false;
		$result['response'] = false;


		header("Content-Type: application/json");
		echo json_encode($result);

	}



	die();
	



	
	//WSDL FILE
	$wsdl = "https://login.workforce.fm/wpfront.asmx?WSDL";


	//CREATE CLIENT
	$client = new SoapClient($wsdl);


	/* Do Sign Up */

	if (isset($_GET['doSignUp'])) {

		$name = split_name($_GET['contactName']);

		$parameters = array(
			'firstname' => $name['firstname'],
			'lastname' => (($name['surname']) ? $name['surname'] : ' '),
			'email' => $_GET['emailAddress'],
			'password' => $_GET['password'],
			'comapanyname' => $_GET['companyName'],
			'phoneno' => $_GET['phoneNo'],
			'subdomain' => $_GET['subdomain'],
			'nooffieldworker' => $_GET['noFieldWorkers']
		);

		$value = $client->CreateTrialCompany($parameters);

		$key = (string) $value->CreateTrialCompanyResult;

		$result['success'] = (strlen($key) ? true : false);
		$result['key'] = $key;
		$result['subdomain'] = $_GET['subdomain'];
		$result['response'] = $value;

		//before response wait 5 seconds (To allow subdomain to be set up at Amazon because immediate redirect to the account will follow)
		sleep(5);

		header("Content-Type: application/json");
		echo json_encode($result);
		exit;

	}



	/* Check if Subdomain Exists */

	if (isset($_GET['subdomainCheck'])) {

		$parameters = array(
			'Subdomain' => $_GET['subdomain']
		);

		$value = $client->IsSubDomainExists($parameters);

		$result['exists'] = $value->IsSubDomainExistsResult;
		$result['response'] = $value;

		header("Content-Type: application/json");
		echo json_encode($result);
		exit;

	}



	/* Check if Email Exists */

	if (isset($_GET['emailCheck'])) {

		$parameters = array(
			'Email' => $_GET['email']
		);

		$value = $client->IsEmailExists($parameters);

		$result['exists'] = $value->IsEmailExistsResult;
		$result['response'] = $value;


		header("Content-Type: application/json");
		echo json_encode($result);
		exit;

	}


	/* Split Name */

	function split_name($name, $prefix='') {
	  $pos = strrpos($name, ' ');

	  if ($pos === false) {
	    return array(
	     $prefix . 'firstname' => $name,
	     $prefix . 'surname' => null
	    );
	  }

	  $firstname = substr($name, 0, $pos + 1);
	  $surname = substr($name, $pos);

	  return array(
	    $prefix . 'firstname' => $firstname,
	    $prefix . 'surname' => $surname
	  );
	}


?>