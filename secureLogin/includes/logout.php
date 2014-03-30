<?php

include_once 'includes/functions.php';
sec_session_start();
$_SESSION = array();
$params = session_get_cookie_params();
setcookie(session_name(), '', time() -42000, 	$params["path"],
						$params["domain"],
						$params["secure"],
						$parmas["httponly"]);
session_destroy();
header('Location:../ index.php');




?>
