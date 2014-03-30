<?php
include_once 'db_connect.php';
include_once 'psl-config.php';

$error-msg = "";
if(isset($_POST['username'],$_POST['email'], $_POST['p'])){
	$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);	
}



?>
