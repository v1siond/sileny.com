<?php

session_start();
ob_start();
// Request Host to show correct plans

$host = $_SERVER['HTTP_HOST'];

if ($host == 'localhost') {
	$ip = $_SERVER['HTTP_HOST'];
	$name = 'Venezuela';
	$code = 'VE';
} else {
	$ip = $_SERVER['REMOTE_ADDR'];
	$details = json_decode(file_get_contents("https://api.ipdata.co/{$ip}"));
	$name = $details->country_name;
	$code = $details->country_code;
}

if ($name == 'Venezuela' && $code == 'VE') {
	$plans = '';
} else {
	$plans = '';
}

$adm = new Admin();
$admin = $adm->getAdmin();
require 'views/home/index.php';
ob_end_flush();

?>