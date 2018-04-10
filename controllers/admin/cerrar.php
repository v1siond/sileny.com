<?php session_start();

session_destroy();

$_SESSION = array();

header('Refresh: 1; url= http://localhost/zilene/index.php?logout=success');

die();

?>