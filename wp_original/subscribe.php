<?php

	include dirname(__FILE__).'/newsletter-subscription/ns.php';

	if ($email = $_REQUEST['email']) {

		//Do Simple MX Lookup for email validation
		$validEmail = true;

		if ($validEmail) {

	            $subscribed = newsletter_subscribe($email);
	        

		        if (false == $subscribed) {     
		        	$result['success'] = false;
		            $result['error'] = '';
		            $result['success_message'] =  'Subscription failed!';       
		                   
		        } 
		        else {        
		            $result['success'] = true;
		            $result['error'] = '';
		            $result['success_message'] =  'Thank you for subscribing.';
		              
		        }
    	
    	}
    	else {

    		$result['success'] = false;
		    $result['error'] = '';
		    $result['success_message'] =  'Invalid Email Address';

    	}

	}


	header("Content-Type: application/json");
	$response = json_encode($result); 
	echo $response;
?>