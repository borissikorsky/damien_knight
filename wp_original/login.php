<?php

$username = 'amazon@amazon.com';
$password = 'amazon';
$loginUrl = 'http://login.workforce.fm';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $loginUrl);
curl_setopt($ch, CURLOPT_POST, 1);

curl_setopt($ch, CURLOPT_POSTFIELDS, 'UserName='.$username.'&Password='.$password);
curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$store = curl_exec($ch);

header('Location: http://login.workforce.fm/UserAdmin/Manage');

?>