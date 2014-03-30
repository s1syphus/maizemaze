<?php

//does not include hashing the password, add this in later?

include_once 'psl-config.php'

function sec_session_start(){
	$session_name = 'sec_session_id';	//Set a custom session name
	$secure = SECURE;
	//This stops JavaScript begin able to access the session id.
	$httponly = true;
	//Forces a session to only use cookies
	if (ini_set('session.use_only_cookies', 1) === FALSE){
		header("location: ../error.php?err=Could not initiate a safe session (ini_set)");
		exit();
	}
	//Gets current cookies params
	$cookieParams = session_get_cookie_params();
	session_set_cookie_params($cookieParams["lifetime"],
		$cookieParams["path"],
		$cookieParams["domain"],
		$secure,
		$httponly);
	//sets the session name to the one set above.
	session_name($session_name);
	session_start();
	session_regenerate_id();
}	

function login($email, $password, $mysqli){
	//Using prepared statements means that SQL injection is not possible
	if($stmt = $mysqli->prepare("Select userid, username, password from members where 
		email = ? limit 1")){	
		$stmt->bind_param('s',$email); //Bind $email to parameter
		$stmt->execture();		//execute the prepared statement
		$stmt->store_result();
		
		//get variables from result
		$stmt->bind_result($user_id, $username, $db_password);
		$stmt->fetch();
		if($stmt->num_rows == 1){
			//If the user exists we check to see if the account is locked
			//from too many login attempts
			if(checkbrute($user_id, $mysqli) == true){
				//account is locked...do something
				return false;
			}
			else{
				//check if the password in the database matches
				if($db_password == $password){
					$user_browser = $_SERVER['HTTP_USER_AGENT'];
					$user_id = preg_replace("/[^0-9]+/","", $user_id);
					$_SESSION['user_id'] = $user_id;
					$username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username);
					$_SESSION['username'] = $username;
					$_SESSION['login_string'] = $password;
					return true;
				}
				else{
					//password is not correct
					$now = time();
					$mysqli->query("intsert into login_attempts(user_id, time) values ('$user_id', $now')");
				}	
			
			}
			else{
				//no user exists
				return false;
		}

	}

}

function checkbrute($user_id, $mysqli){
	$now = time();
	$valid_attempts = $now - (2*60*60);
	if($stmt = $mysqli->prepare("select time from login_attempts where
		user_id = ? and time > '$valid_attempts'")){
			$stmt->bind_param('i',$user_id);
			$stmt->execute();
			$stmt->store_result();

			//if there have been more than 5 failed login attempts
			if($stmt->num_rows > 5){
				return true;
			}
			else{
				return false;
			}
		}
}

function login_check($mysqli){

	if(isset($_SESSION['user_id'], $_SESSION['username'],$_SESSION['login_string'])){
		$user_id = $_SESSION['user_id'];
		$username = $_SESSION['username'];
		$login_string = $_SESSION['login_string'];
		$user_browser = $_SERVER['HTTP_USER_AGENT'];
		if($stmt = $mysqli->prepare("select password from members where id = ? limit 1")){
			$stmt->bind_param('i', $user_id);
			$stmt->execute();
			$stmt->store_result();
			if($stmt->num_rows == 1){
				$stmt->bind_result($password);
				$stmt->fetch();
				$login_check = $password;
				if($login_check == $login_string){
					return true;
				}
				else{
					return false;
				}
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	else{
		return false;
	}


}
















































