<?php
session_start();
ob_start();

$adm = new Admin();
$admin = $adm->getAdmin();

if ($_POST) {
	$access = new Access();
	$access->login();
	exit;
} else {
	require 'views/session/new_session.php';
}

ob_end_flush();
?>
